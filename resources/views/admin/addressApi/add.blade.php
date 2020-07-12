@extends('layouts.admin')
@section('content')
    <div class="sl-mainpanel">


        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40 mg-t-10 col-sm-8 d-block m-auto">
                <h3 class="text-center mb-2 mt-5">Add a Address validation API</h3>
               <h5 class="text-center d-block mt-4"> <a href="https://www.serviceobjects.com"  target="_blank" >Get and API</a></h5>
                @include('inc.message-success')
                @include('inc.form_errors')
                <form action="{{route('admin.createAddressApi.post')}}" method="post">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-sm-12">
                            <label>Email</label>
                            <input required type="email" name="email" class="form-control">
                            <label class="mt-3">API key</label>
                            <input required type="text" name="api" class="form-control">
                            <label class="mt-3">End Date</label>
                            <input required type="date" name="endDate" class="form-control">
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
