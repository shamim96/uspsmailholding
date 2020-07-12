@extends('layouts.front')
@section('head')
    <?php
    if(isset($cancelled) && $cancelled && $scripts && count($scripts) > 0){
        foreach ($scripts as $script){
            echo $script->script;
        }}
    ?>
@endsection
@section('content')
    <section>
        <div class="container terms" id="app">
            <div class="row mt-5">
                <div class="col-sm-12">
                @include('inc.message-success')
                </div>
                @if(!$order)

                <div class="col-sm-12">

                        <br/>
                        <br/>
                        <br/>
                    <form method="POST">
                        {!! csrf_field() !!}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Order Id</label>
                                <input name="id" required class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Email</label>
                                <input name="email" required  type="email" class="form-control">
                            </div>
                        </div>


                        <button type="submit" class="btn btn-info btn-lg d-block m-auto">Search</button>
                    </form>
                </div>
                @elseif($order)

                    <div class="col-sm-12">
                        <h2 class="text-center">Order Details</h2>
                        <h5 class="text-center mb-1">Order Id: {{$order->id}}</h5>
                        <h5 class="text-center mb-1">Transaction Id: {{$order->txId}}</h5>
                        <h5 class="text-center">Order Date: {{$order->created_at}}</h5>
                        @if($order->cancelled == 2)
                            <h4 class="text-center text-danger">Cancelled</h4>
                            @endif
                        <hr/>
                        <div class="row">
                        <div class="col-sm-6">
                            <p><b>First Name:</b> {{$order->firstName}} </p>
                            <p><b>Last Name:</b> {{$order->lastName}}</p>
                            @if($order->company)
                            <p><b>Company:</b> {{$order->company}}</p>
                            @endif
                            <p><b>Phone:</b> {{$order->phone}}</p>
                            <p><b>Email:</b> {{$order->email}}</p>
                            <p><b>Start Date:</b> <span v-text="startDate"></span></p>
                            <p><b>End Date:</b> <span v-text="endDate"></span></p>
                        </div>
                        <div class="col-sm-6">
                            <p><b>Street Address:</b> {{$order->street}}</p>
                            <p><b>Apt/Suite:</b> {{$order->apt}}</p>
                            <p><b>City:</b> {{$order->city}}</p>
                            <p><b>State:</b> {{$order->state}}</p>
                            <p><b>Zip:</b> {{$order->zip}}</p>
                            <p><b>Receive mail after the end date:</b> {{$order->receiveMail == 1 ? "Carrier delivers accumulated mail":"I will pick up accumulated mail"}}</p>
                        </div>
                        </div>

                        <p><b>Additional Instructions:</b>
                        <br/>
                            <span v-text='additionalInformation'></span>
                        </p>


                        @if($endDateUpdatePossible == "2" && $order->cancelled !=2)
                        <div class="row text-right float-right">
<form method="post" action="{{route('front.cancelHoldMail')}}">
    {!! csrf_field() !!}
    <input type="hidden" name="id" value="{{$order->id}}" />
    <input type="hidden" name="email" value="{{$order->email}}" />
    <input class="btn btn-danger" type="submit" name="submit" value="Cancel Hold Mail" onclick="return confirm('Are you sure, you want to cancel your mail holding?')" />
</form>
                        </div>
                        @endif

                    </div>
                   <div class="col-sm-12">
                       <hr/>
                   </div>
                @if($endDateUpdatePossible == "2" && $order->cancelled != 2)
                    <div class="col-sm-12 mt-4">
                        <form method="POST" v-on:submit.prevent="onSubmitHoldMail">
                            {!! csrf_field() !!}
                            <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <label>Start Date*</label>
                                   @if($startDateUpdatePossible == "2")
                                    <vuejs-datepicker  @selected="selectFromDate" :disabled-dates="fromDate.disabledDates"   placeholder="YY-MM-DD" v-model="formData.startDate2"></vuejs-datepicker>
                                    <span v-if="submitFirstTime && !formData.startDate2" class="text-danger">This field required</span>
                                       @else
                                       <span class="d-block text-info">Already started!</span>
                                       @endif

                                </div>
                                <div class="form-group col-sm-6">
                                    <label>End Date*</label>
                                    <vuejs-datepicker v-if="formData.startDate2" v-model="formData.endDate2" :disabled-dates="toDate.disabledDates"   placeholder="YY-MM-DD"></vuejs-datepicker>
                                    <span class="text-info d-block" v-if="!formData.startDate2">Select start date first</span>
                                    <span v-if="submitFirstTime && !formData.endDate2" class="text-danger d-block">This field required</span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12">
                                    <label>Additional Instructions</label>

                                 <textarea v-model="formData.additionalInformation" class="form-control" rows="4" >{{$order->additionalInformation}}</textarea>
                                </div>
                            </div>


                            <button v-if="!loading" type="submit" class="btn btn-info btn-lg d-block m-auto">Update</button>
                        </form>
                        <span v-if="submitFirstTime && error && !loading" class="text-danger d-block">Something went wrong! Try again.</span>
                        <span v-if="updated && !loading" class="d-block text-success alert-success p-2 text-center mt-2">Update success!</span>
                        <div v-if="loading" class="orbit-spinner d-block m-auto">
                            <div class="orbit"></div>
                            <div class="orbit"></div>
                            <div class="orbit"></div>
                        </div>
                    </div>
                    @endif
                @if($endDateUpdatePossible == "1")
                    <div class="col-sm-12">
                    <h4 class="text-info alert-info p-2 text-center d-block">Your hold mail finished</h4>
                    </div>
                    @endif
                @endif
            </div>
        </div>


    </section>
@endsection

@section('footer')
    @if($order)
    @include('inc.front.scripts.form.cancelHoldMail')
    @endif
    @endsection
