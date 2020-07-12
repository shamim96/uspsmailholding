@extends('layouts.admin')
@section('content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <span class="text-primary"> National Family Database Bangladesh</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40 mg-t-6 col-md-6 col-sm-8 d-block m-auto">
                <h3 class="text-center mb-4 mt-5">Create a new admin</h3>
                @include('inc.message-success')
                @include('inc.form_errors')
                <form action="{{route('admin.admin.create.post')}}" method="post">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-sm-12">
                            <lable>Name</lable>
                            <input type="text" class="form-control" name="name" />
                        </div>
                        <div class="col-sm-12 mt-3">
                            <lable>Email</lable>
                            <input type="email" class="form-control" name="email" />
                        </div>
                        <div class="col-sm-12 mt-3">
                            <lable>Type Password</lable>
                            <input type="password" class="form-control" name="password" />
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
