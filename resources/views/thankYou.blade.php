@extends('layouts.front')
@section('head')
    <?php
        if($order && $scripts && count($scripts) > 0){
            foreach ($scripts as $script){
               echo $script->script;
            }
        }

    ?>
@endsection
@section('content')
    <section class="shMt55">
        <div class="container terms">
            <div class="row">
                @if($error)
                <div class="col-sm-12 mt-5">
                        <br/>
                        <br/>
                        <br/>
                       <h4 class="text-danger alert-danger p-3 mt-5 text-center">
                           Something went wrong!
                           <br/>
                           {{$error}}
                       </h4>
                </div>
                @elseif($order)
                   <div class="col-sm-12 mt-5">
                       <h4 class="text-success alert-success text-center p-2">
                          Thank you, you have successfully placed the order.
                       </h4>
                   </div>
                    <div id="print" class="col-sm-12">
                        <h2 class="text-center">Order Details</h2>
                        <h3 class="text-center">Order Id: {{$order->id}}</h3>
                        <h5 class="text-center">Transaction Id: {{$order->txId}}</h5>
                        <h3 class="text-center">Order Date: {{$order->created_at}}</h3>
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
                            <p><b>Start Date:</b> {{$order->startDate}}</p>
                            <p><b>End Date:</b> {{$order->endDate}}</p>
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
                        @if($order->additionalInformation)
                        <p><b>Additional Instructions:</b>
                        <br/>
                            {{$order->additionalInformation}}
                        </p>
                            @endif

                    </div>
                    <div class="col-sm-12 text-center">
{{--                        <button onclick="print()" class="btn btn-lg btn-outline-info">Print</button>--}}
                        <script type="text/javascript">
                            function print() {
                                var printContents = document.getElementById("print").innerHTML;
                                var originalContents = document.body.innerHTML;

                                document.body.innerHTML = printContents;

                                window.print();

                                document.body.innerHTML = originalContents;
                            }
                        </script>
                    </div>
                @endif
            </div>
        </div>
    </section>

@endsection
