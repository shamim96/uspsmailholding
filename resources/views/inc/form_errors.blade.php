@if(count($errors)>0)
    <div class="alert alert-danger">
        <ul style="margin-bottom: 0">
            @foreach($errors->all() as $error)

                <li style="list-style: none">  {{str_replace('id','',$error)}} </li>

            @endforeach
        </ul>
    </div>
@endif
<?php
if(Session::has('allErrors')){
    $allErrors =   Session::get('allErrors');
}

?>
@if(isset($allErrors) && count($allErrors)>0)
    <div class="alert alert-danger">
        <ul style="margin-bottom: 0">
            @foreach($allErrors as $error)

                <li style="list-style: none">  {{str_replace('id','',$error)}} </li>

            @endforeach
        </ul>
    </div>
@endif