@extends('layouts.admin')
@section('content')
    <div class="sl-mainpanel">


        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40 mg-t-10 col-sm-12 d-block m-auto">
                <h3 class="text-center mb-4 mt-5">Update Address validation API</h3>
                @include('inc.message-success')
                @include('inc.form_errors')
                <form action="{{route('admin.updateAddressApi',$api->id)}}" method="post">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-sm-12">
                            <label>Email</label>
                            <input value="{{$api->email}}" type="email" name="email" class="form-control">
                            <label class="mt-3">API key</label>
                            <input type="text" value="{{$api->api}}" name="api" class="form-control">

                            <label class="mt-3">API key</label>
                            <input type="number" value="{{$api->uses}}" name="uses" class="form-control">

                            <label class="mt-3">End Date</label>
                            <input required type="date" value="{{$api->endDate}}" name="endDate" class="form-control">
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
