@extends('layouts.admin')
@section('content')
    <div class="sl-mainpanel">


        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40 mg-t-10">
                @include('inc.message-success')
                <div class="table-responsive">

                    <table class="table table-hover table-bordered table-primary mg-b-0">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Subject</th>
                            <th>Status</th>
                            <td>Date</td>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($sl = 1)
                        @if($contacts && count($contacts) > 0)
                        @foreach($contacts as $contact)
                        <tr>
                            <td>{{$sl}}.</td>
                            <td>{{$contact->name}}</td>
                            <td>{{$contact->subject}}</td>
                            <td>
                                @if($contact->status == 1)
                                    <span class="text-info">Unread</span>
                                @elseif($contact->status == 2)
                                    <span class="text-success">Read</span>
                                @endif
                            </td>
                            <td>{{$contact->created_at}}</td>
                            <td class="text-center">
                                <a class="mr-3" href="{{route('admin.contactDetails',$contact->id)}}">View</a>
                                <a class="text-danger" onclick="return confirm('Are you sure want to delete this data?')" href="{{route('admin.deleteContact',$contact->id)}}">Delete</a>

                            </td>
                        </tr>
                            @php($sl++)
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div><!-- table-responsive -->

                <div class="row">
                    <div class="col-sm-12 text-center mt-3 d-flex justify-content-center">
                        {{$contacts->links()}}
                    </div>
                </div>

            </div><!-- card -->
        </div>
    </div>

@endsection
