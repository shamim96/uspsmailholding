@extends('layouts.admin')
@section('content')
    <div class="sl-mainpanel">


        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40 mg-t-10">


                <div class="row mt-5 mb-5">
                    <div class="col-sm-8 d-block m-auto">
                        <p><b>Name: </b> {{$contact->name}}</p>
                        <p><b>Email: </b> {{$contact->email}}</p>
                        <p><b>Phone: </b> {{$contact->phone}}</p>
                        <p><b>Subject: </b> {{$contact->subject}}</p>
                        <p><b>Message: </b></p>
                        <p>{!! nl2br($contact->message) !!}</p>

                    </div>
                </div>



            </div><!-- card -->
        </div>
    </div>

@endsection
