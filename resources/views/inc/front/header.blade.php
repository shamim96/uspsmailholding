<!doctype html>
<html lang="en">
@php($help = new \App\Help())
<head>
    <meta charset="utf-8">
    <title>USPS Mail Holding</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{asset('public/front/assets')}}/img/icon.png" type="image/png">
    <!-- Begin loading animation -->
    <link href="{{ asset('public') }}/front/assets/css/loaders/loader-pulse.css" rel="stylesheet" type="text/css" media="all" />
    <!-- End loading animation -->
    <link href="{{ asset('public') }}/front/assets/css/theme.css" rel="stylesheet" type="text/css" media="all" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,400i,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('public') }}/front/assets/css/custom.css" rel="stylesheet" type="text/css" media="all" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.11/vue.js" integrity="sha256-NSuqgY2hCZJUN6hDMFfdxvkexI7+iLxXQbL540RQ/c4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js" integrity="sha256-T/f7Sju1ZfNNfBh7skWn0idlCBcI3RwdLSS4/I7NQKQ=" crossorigin="anonymous"></script>

    <script src="{{ asset('public') }}/admin/js/dynamic.js"></script>

    <?php
        $headerScripts = $help->headerScripts();
        if($headerScripts && count($headerScripts) > 0){
            foreach ($headerScripts as $script){
                echo ($script->script);
            }
        }
    ?>

    @yield('head')
</head>

<body>
<div class="loader">
    <div class="loading-animation"></div>
</div>

