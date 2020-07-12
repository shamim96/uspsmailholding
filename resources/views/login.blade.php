@extends('layouts.front')
@section('content')
    <section>
        <div class="container ">
            <div class="row mt-sm-5">
                <div class="col-md-7 col-sm-9 d-block m-auto border mt-sm-5">
                    <div class="p-3">
                        <h1 class="text-center">Login</h1>
                        @include('inc.form_errors')
                        @include('inc.message-success')
                    <form class="" method="post" action="{{route('front.attemptLogin')}}">
                        {!! csrf_field() !!}
<div class="form-row">
    <lable>Email</lable>
    <input required type="email" name="email" class="form-control">
</div>
                        <div class="form-row">
                            <lable>Password</lable>
                            <input required type="password" name="password" class="form-control">
                        </div>
                        <div class="text-center mt-2">
                            <input type="submit" name="Submit" value="Login Now" class="btn btn-primary" />
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
