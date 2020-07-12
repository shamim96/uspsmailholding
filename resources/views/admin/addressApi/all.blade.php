@extends('layouts.admin')
@section('content')
    <div class="sl-mainpanel">


        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40 mg-t-10">
                <h4 class="mb-3">All Address validation API</h4>
                @include('inc.message-success')
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-primary mg-b-0">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Email</th>
                            <th>API</th>
                            <th>Usage</th>
                            <th>Max Usage</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($sl = 1)
                        @if($all && count($all) > 0)
                        @foreach($all as $api)
                        <tr>
                            <td>{{$sl}}.</td>
                            <td>{{$api->email}}</td>
                            <td>{{$api->api}}</td>
                            <td>{{$api->uses}}</td>
                            <td>480</td>
                            <td>{{$api->endDate}}</td>
                            <td class="{{$api->status == 2 ? "" : "text-danger"}}">{{$api->status == 2 ? "Active" : "Not active"}}</td>
                            <td class="text-center">
                                <a href="{{route('admin.editAddressApi',$api->id)}}">
                                    <i class="fa fa-pencil font-weight-bold text-info" ></i>
                                </a>
                                <span class="mr-3"></span>
                                <a onclick="return confirm('Are you sure want to delete this API')" href="{{route('admin.deleteAddressApi',$api->id)}}">
                                    <i class="fa fa-trash font-weight-bold text-danger" ></i>
                                </a>

                            </td>
                        </tr>
                            @php($sl++)
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div><!-- table-responsive -->



            </div><!-- card -->
        </div>
    </div>

@endsection
