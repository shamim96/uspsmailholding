@extends('layouts.admin')
@section('content')
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40 mg-t-6 col-sm-12">
                <h3 class="text-center mb-1 mt-5">Update order</h3>
                <h5 class="text-center mb-5">Transaction Id: {{$order->txId}}</h5>
                @include('inc.message-success')
                @include('inc.form_errors')
                <form action="{{route('admin.updateOrder',$order->id)}}" method="post">
                    {!! csrf_field() !!}
                    <div class="row text-center">
                        <div class="col-sm-12">
                            <input value="1" name="businessAddress" style="height: 14px" type="checkbox" @if($order->businessAddress == "1") checked @endif class="mr-2"> Business Address
                        </div>
                    </div>
                    <div class="row mt-2">

                        <div class="col-sm-6">
                            <lable>First Name</lable>
                            <input required value="{{$order->firstName}}" type="text" class="form-control" name="firstName" />
                        </div>
                        <div class="col-sm-6">
                            <lable>Last Name</lable>
                            <input required value="{{$order->firstName}}" type="text" class="form-control" name="lastName" />
                        </div>
                    </div>
                    <div class="row mt-2">

                        <div class="col-sm-4">
                            <lable>Company</lable>
                            <input value="{{$order->company}}" type="text" class="form-control" name="company" />
                        </div>
                        <div class="col-sm-4">
                            <lable>Phone</lable>
                            <input required value="{{$order->phone}}" type="text" class="form-control" name="phone" />
                        </div>
                        <div class="col-sm-4">
                            <lable>Email</lable>
                            <input required value="{{$order->email}}" type="text" class="form-control" name="Email" />
                        </div>
                    </div>
                    <div class="row mt-2">

                        <div class="col-sm-6">
                            <lable>Street Address</lable>
                            <input required value="{{$order->street}}" type="text" class="form-control" name="street" />
                        </div>
                        <div class="col-sm-6">
                            <lable>Apt/Suite</lable>
                            <input value="{{$order->apt}}" type="text" class="form-control" name="apt" />
                        </div>
                    </div>
                    <div class="row mt-2">

                        <div class="col-sm-4">
                            <lable>City</lable>
                            <input required value="{{$order->city}}" type="text" class="form-control" name="city" />
                        </div>
                        <div class="col-sm-4">
                            <lable>State</lable>
                            <select required class="form-control" name="state">
                                <option value="">-select a state-</option>
                                @foreach($states as $state)
                                    <option {{$state->STATE_NAME == $order->state? 'selected':""}} value="{{$state->STATE_NAME}}">{{$state->STATE_NAME}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <lable>Zip</lable>
                            <input required value="{{$order->zip}}" type="text" class="form-control" name="zip" />
                        </div>
                    </div>
                    <div class="row mt-2">

                        <div class="col-sm-6">
                            <lable>Start Date</lable>
                            <input required value="{{$order->startDate}}" type="date" class="form-control" name="startDate" />
                        </div>
                        <div class="col-sm-6">
                            <lable>End Date</lable>
                            <input required value="{{$order->endDate}}" type="date" class="form-control" name="endDate" />
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-sm-12">
                            <lable>How would you like to receive your mail after the end date?</lable>
                            <div class="col-sm-12">
                                <input {{$order->receiveMail == 1 ? 'checked':""}} value="1" type="radio" name="receiveMail">  Carrier delivers accumulated mail
                            </div>
                            <div class="col-sm-12">
                                <input {{$order->receiveMail == 2 ? 'checked':""}} value="2" type="radio" name="receiveMail">  I will pick up accumulated mail
                            </div>

                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-sm-12">
                            <lable>Additional Instructions?</lable>
                            <textarea name="additionalInformation" class="form-control" rows="4">{{$order->additionalInformation}}</textarea>
                        </div>
                    </div>
                    <div class="row mt-2">

                        <div class="col-sm-6">
                            <lable>Status</lable>
                            <select required class="form-control" name="status">
                                <option value="">-select a status-</option>
                                @foreach($statuses as $status)
                                    <option {{$status->id == $order->status? 'selected':""}} value="{{$status->id}}">{{$status->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <lable>Confirmation</lable>
                            <input value="{{$order->confirmation1}}" type="text" class="form-control" name="confirmation1" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-center mt-5">
                            <input type="submit" value="Update" class="btn btn-primary btn-lg cursorPointer" />
                        </div>
                    </div>
                </form>

            </div><!-- card -->
        </div>
    </div>
@endsection
