@extends('layouts.admin')
@section('content')
    <div class="sl-mainpanel">


        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40 mg-t-10 col-sm-12 d-block m-auto">
                <h3 class="text-center mb-4 mt-5">Update dispute script</h3>
                @include('inc.message-success')
                @include('inc.form_errors')
                <form action="{{route('admin.editScript.Dispute.post',$script->id)}}" method="post">
                    {!! csrf_field() !!}
               <div class="row">
                       <div class="col-sm-12">
                           <lable>Script Name</lable>
                           <input value="{{$script->name}}" type="text" class="form-control" name="name" />
                       </div>
                       <div class="col-sm-12 mt-2">
                           <lable>Script code</lable>
                           <textarea name="script" class="form-control" rows="10">{{$script->script}}</textarea>
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
