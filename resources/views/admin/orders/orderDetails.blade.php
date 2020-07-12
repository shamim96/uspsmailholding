@extends('layouts.admin')
@section('content')
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="row">
              <div class="col-sm-12">
                  @include('inc.message-success')
              </div>
                <div class="col-sm-6">
                    <div class="card pd-20 pd-sm-40 mg-t-10">
                        <h4 class="text-primary">Holdmail Information</h4>
                        <table class="table table-striped">
                            <tr>
                                <td class="font-weight-bold">First Name</td>
                                <td>: {{$order->firstName}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Last Name</td>
                                <td class="font-weight-bold">: {{$order->lastName}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Company</td>
                                <td>: {{$order->company}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Phone</td>
                                <td>: {{$order->phone}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Email</td>
                                <td>: {{$order->email}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Street Address</td>
                                <td>: {{$order->street}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Apt/Suite</td>
                                <td>: {{$order->apt}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">City</td>
                                <td>: {{$order->city}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">State</td>
                                <td>: {{$order->state}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Zip</td>
                                <td>: {{$order->zip}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Start Date</td>
                                <td>: {{$order->startDate}}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">End Date</td>
                                <td>: {{$order->endDate}}</td>
                            </tr>
                            <tr>
                                <td colspan="2"><b>Receive mail after the end date:</b>  <br/>
                                {{$order->receiveMail == 1 ? "Carrier delivers accumulated mail":"I will pick up accumulated mail"}}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><b>Additional Instructions:</b>
                                <br/> {!! nl2br($order->additionalInformation) !!}
                                </td>
                            </tr>

                            <tr>
                                <td>Status</td>
                                <td>: {{$order->orderStatus ? $order->orderStatus->name: ""}}</td>
                            </tr>
                            <tr>
                                <td>Confirmation</td>
                                <td>: {{$order->confirmation1}}</td>
                            </tr>
                        </table>
                        <a href="{{route('admin.editOrder',$order->id)}}" class="btn btn-primary">Edit</a>
                    </div>
                </div>

            <div class="col-sm-6">
                <div class="card pd-20 pd-sm-40 mg-t-10">
                    <h4 class="text-primary">Renewal Dates</h4>
                    <table class="table table-striped">
                        <tr>
                        <td class="font-weight-bold">Date</td>
                        <td class="font-weight-bold">Confirmation</td>
                        <td class="font-weight-bold">#</td>
                        </tr>
                        @if(count($renewalDates) > 0 && $renewalDates)
                            @php($sl = 1)
                        @foreach($renewalDates as $rDate)
                        <tr>
                            <td>{{$rDate->date}}</td>
                            <td> {{$rDate->confirmation}}</td>
                            <td>@include('inc.admin.addConfirmationRenewalDate',['modelId'=>"renewalConfirmation".$sl,"rDate"=>$rDate])</td>
                        </tr>
                            @php($sl++)
                            @endforeach
                            @endif
                    </table>
                    <a href="{{route('admin.orderRenewalDates',$order->id)}}" class="text-right" style="text-decoration: underline">Add renewal dates</a>
                </div>
                <div class="card pd-20 pd-sm-40 mg-t-10">
                    <h4 class="text-primary">Customer info</h4>
                    <table class="table table-striped">
                        <tr>
                            <td class="font-weight-bold">Order Id</td>
                            <td>: {{$order->id}}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Customer Ip</td>
                            <td>: {{$order->customerIp}} ({{$order->customerIpCountry}})</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Order created</td>
                            <td>: {{$order->created_at}}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Last Updated</td>
                            <td>: {{$order->updated_at}}</td>
                        </tr>
                    </table>
                </div>
                <div class="card pd-20 pd-sm-40 mg-t-10">
                    <h4 class="text-primary">Payment Details</h4>
                    <table class="table table-striped">
                        <tr>
                            <td class="font-weight-bold">Status</td>
                            <td>: Paid</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Amount</td>
                            <td>: {{$order->amount}}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Date</td>
                            <td>: {{$order->created_at}}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Transaction Id</td>
                            <td>: {{$order->txId}}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Card Holder Name</td>
                            <td>: {{$order->cardHolder}}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Last 4 digit of card</td>
                            <td>: {{$order->cardLast4Digits}}</td>
                        </tr>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>
