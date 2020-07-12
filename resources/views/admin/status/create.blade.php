@extends('layouts.admin')
@section('content')
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40 mg-t-6 col-md-6 col-sm-8 d-block m-auto">
                <h3 class="text-center mb-4 mt-5">Create a new status</h3>
                @include('inc.message-success')
                @include('inc.form_errors')
                <form action="{{route('admin.createStatus.post')}}" method="post">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-sm-12">
                            <lable>Status Name</lable>
                            <input required type="text" class="form-control" name="name" />
                        </div>
                        <div class="col-sm-12 text-center mt-5">
                            <input type="submit" value="Save" class="btn btn-primary btn-lg cursorPointer" />
                        </div>
                    </div>
                </form>

            </div><!-- card -->
        </div>
    </div>
@endsection
