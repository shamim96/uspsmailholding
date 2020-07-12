@extends('layouts.admin')
@section('content')
    <div class="sl-mainpanel">

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40 mg-t-10">
                @include('inc.message-success')
                <h2 class="card-body-title">All admins
                </h2>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-primary mg-b-0">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($sl = 1)
                        @if($admins && count($admins) > 0)
                        @foreach($admins as $admin)
                            @if($admin->id != Auth::user()->id)
                        <tr>
                            <td>{{$sl}}.</td>
                            <td>{{$admin->name}}</td>
                            <td>{{$admin->email}}</td>
                            <td class="text-center">
                                <a href="{{route('admin.userPasswordReset',$admin->id)}}">
                                    <i class="fa fa-cog font-weight-bold text-info" ></i>
                                </a>
                                <span class="mr-3"></span>
                                <a onclick="return confirm('Are you sure want to delete this admin')" href="{{route('admin.deleteAdmin',$admin->id)}}">
                                    <i class="fa fa-trash font-weight-bold text-danger" ></i>
                                </a>

                            </td>
                        </tr>
                            @php($sl++)
                        @endif
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div><!-- table-responsive -->


            </div><!-- card -->
        </div>
    </div>
@endsection
