@if(Session::has('msg-success'))
    <p class="alert alert-success d-block text-center p-2">{{Session::get('msg-success')}}</p>
@endif
@if(Session::has('msg-danger'))
    <p class="alert alert-danger d-block text-center p-2">{{Session::get('msg-danger')}}</p>
@endif
@if(Session::has('msgs-danger'))
    <ul class="alert alert-danger d-block text-center p-2">
        @php($msgs = Session::get('msgs-danger'))
        @foreach($msgs as $msg)
            <li style="list-style: none">{{$msg}}</li>
        @endforeach
    </ul>
@endif
