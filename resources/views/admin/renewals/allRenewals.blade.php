@extends('layouts.admin')
@section('content')
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40 mg-t-10">
                @include('inc.message-success')
                <div class="row">
                    <div class="col-sm-6">
                        <h2 class="card-body-title">All
                        renewals
                            @if(isset($dateText) && $dateText)
                               for {{$dateText}}
                                @endif
                        </h2>
                        @if(isset($paginate) && $paginate)
                        <p>Showing {{$paginate['currentPageFrom']}}-{{$paginate['currentPageTo']}} within total <strong>{{$paginate['total']}}</strong> data</p>
                            @endif
                    </div>
                <div class="col-sm-6 text-right">
                    <form method="post" action="{{route('admin.allRenewalByDatePost')}}">
                        {!! csrf_field() !!}
                    <input required type="date" style="width: 200px; padding: 3px" name="date" />
                        <input  type="submit" value="Search" class="btn btn-primary btn-sm" />
                    </form>
                </div>
                </div>
                <div class="table-responsive">

                    <table class="table table-hover table-bordered table-primary mg-b-0">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Renewal Date</th>
                            <th>Order id</th>
                            <th>Order By</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Confirmation</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($sl = isset($paginate) && $paginate ? $paginate['currentPageFrom'] : 1)
                        @if($all && count($all) > 0)

                        @foreach($all as $renewal)
                        <tr>
                            <td>{{$sl}}.</td>
                            <td>{{$renewal->date}}</td>
                            <td>{{$renewal->order->id}}</td>
                            <td>{{$renewal->order->firstName . " ". $renewal->order->lastName}}</td>
                            <td>{{$renewal->order->email}}</td>
                            <td>{{$renewal->order->orderStatus? $renewal->order->orderStatus->name : ""}}</td>
                            <td>{{$renewal->order->confirmation1}}</td>
                            <td class="text-center"><a class="mr-2" href="{{route('admin.orderDetails',$renewal->order->id)}}"><i class="fa fa-eye"></i></a>
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
                        {{$all->links()}}
                    </div>
                </div>
                    @endif
            </div><!-- card -->
        </div>
    </div>
@endsection
