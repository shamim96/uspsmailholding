@extends('layouts.admin')
@section('content')
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40 mg-t-10">
                @include('inc.message-success')
                <div class="row">
                    <div class="col-sm-6">
                        <h2 class="card-body-title">All
                            {{isset($status) && $status ? $status->name:""}}
                            {{isset($updated) && $updated ? "updated":""}}
                            {{isset($cancelled) && $cancelled ? "cancelled":""}}
                            orders</h2>
                        @if(isset($paginate) && $paginate)
                        <p>Showing {{$paginate['currentPageFrom']}}-{{$paginate['currentPageTo']}} within total <strong>{{$paginate['total']}}</strong> data</p>
                            @endif
                    </div>
                <div class="col-sm-6 text-right">
                    <form method="post" action="{{route('admin.searchAllOrders')}}">
                        {!! csrf_field() !!}
                        <select name="searchType" style="width: 200px; padding: 3px; margin-right: 15px">
                            <option value="">-search type-</option>
                            <option value="id">Order Id</option>
                            <option value="firstName">First Name</option>
                            <option value="lastName">Last Name</option>
                            <option value="company">Company</option>
                            <option value="phone">Phone</option>
                            <option value="email">Email</option>
                            <option value="street">Street Address</option>
                            <option value="apt">Apt/Suite</option>
                            <option value="city">City</option>
                            <option value="state">State</option>
                            <option value="zip">Zip</option>
                            <option value="startDate">Start Date</option>
                            <option value="endDate">End Date</option>
                            <option value="customerIp">Customer Ip</option>
                            <option value="txId">Transaction Id</option>
                            <option value="cardHolder">Card Holder Name</option>
                            <option value="cardLast4Digits">Last 4 digit of card</option>
                        </select>
                    <input placeholder="Search..." type="text" style="width: 200px; padding: 3px" name="query" />
                        <input  type="submit" value="Search" class="btn btn-primary btn-sm" />
                    </form>
                </div>
                </div>
                <div class="table-responsive">

                    <table class="table table-hover table-bordered table-primary mg-b-0">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Order Id</th>
                            <th>Order By</th>
                            <th>Email</th>
                            <th>Order Date</th>
                            @if(isset($status) && $status && $status->id == 11)
                            <th>Renewal Dates</th>
                            @endif
                            <th>Status</th>
                            <th>Confirmation</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($sl = isset($paginate) && $paginate ? $paginate['currentPageFrom'] : 1)
                        @if($orders && count($orders) > 0)

                        @foreach($orders as $order)
                        <tr>
                            <td>{{$sl}}.</td>
                            <td>{{$order->id}}</td>
                            <td>{{$order->firstName . " ". $order->lastName}}</td>
                            <td>{{$order->email}}</td>
                            <td>{{$order->created_at}}</td>
                            @if(isset($status) && $status && $status->id == 11)
                                <td>
                                    @if($order->renewalDates && count($order->renewalDates) > 0)
                                    @php($i = 1)
                                        @foreach($order->renewalDates as $date)
                                          {{$i}}.  {{$date->date}}<br/>
                                         @php($i++)
                                        @endforeach
                                    @endif
                                </td>
                            @endif
                            <td>{{$order->orderStatus? $order->orderStatus->name : ""}}</td>
                            <td>{{$order->confirmation1}}</td>
                            <td class="text-center"><a class="mr-2" href="{{route('admin.orderDetails',$order->id)}}"><i class="fa fa-eye"></i></a>
                            <a onclick="return confirm('Be careful for deleting this order! Are you sure want to delete this order?')" href="{{route('admin.deleteOrder',$order->id)}}"><i class="fa fa-trash text-danger"></i></a>
@if($order->status == 11)
                                <a class="ml-2" href="{{route('admin.orderRenewalDates',$order->id)}}"><span class="fa fa-clock-o"></span></a>
    @endif
                            </td>
                        </tr>
                            @php($sl++)
                            @endforeach
                            @else
                                <tr>
                                    <td colspan="7" class="text-info text-center p-3">Nothing found!</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div><!-- table-responsive -->

                @if(isset($paginate) && $paginate)
                <div class="row">
                    <div class="col-sm-12 text-center mt-3 d-flex justify-content-center">
                        {{$orders->links()}}
                    </div>
                </div>
                    @endif
            </div><!-- card -->
        </div>
    </div>
@endsection
