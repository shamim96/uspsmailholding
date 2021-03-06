@extends('layouts.admin')
@section('content')
    <div class="sl-mainpanel">


        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40 mg-t-10 col-sm-8 col-md-6 d-block m-auto">
                <h3 class="text-center mb-4 mt-5">Change password for {{$user->name}}</h3>
                @include('inc.message-success')
                @include('inc.form_errors')
                <form action="{{route('admin.userPasswordReset.post',$user->id)}}" method="post">
                    {!! csrf_field() !!}
               <div class="row">
                       <div class="col-sm-12">
                           <lable>Type Password</lable>
                           <input type="password" class="form-control" name="password" />
                       </div>
                       <div class="col-sm-12">
                           <lable>Re Type Password</lable>
                           <input type="password" class="form-control" name="reTypePassword" />
                       </div>
                   <div class="col-sm-12 text-center mt-5">
                       <input type="submit" value="Update" class="btn btn-primary btn-lg cursorPointer" />
                   </div>
               </div>
                </form>

            </div><!-- card -->
        </div>
    </div>
@endsection
