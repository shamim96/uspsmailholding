@extends('layouts.admin')
@section('content')
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40 mg-t-10">
                @include('inc.message-success')
                <h2 class="card-body-title">All Status</h2>
                <div class="table-responsive">

                    <table class="table table-hover table-bordered table-primary mg-b-0">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($sl = 1)
                        @foreach($statuses as $status)
                       <tr>
                           <td>{{$sl}}</td>
                           <td>{{$status->name}}</td>
                           <td class="text-center"><a href="{{route('admin.editStatus',$status->id)}}" class="mr-5"><i class="fa fa-pencil"></i></a>  <a href="{{route('admin.deleteStatus',$status->id)}}" onclick="return confirm('Are you sure want to delete this data')"><i class="fa fa-trash text-danger"></i></a> </td>
                       </tr>
                            @php($sl++)
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- table-responsive -->
            </div><!-- card -->
        </div>
    </div>
@endsection
