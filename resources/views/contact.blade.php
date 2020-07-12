@extends('layouts.front')
@section('content')
    <section>
        <div class="container shMt55">
            <div class="row">
                <div class="col-sm-12 mt-5">
                    <h3 class="display-4 text-center mb-1" >Get in touch</h3>
                    <p class="text-center mt-0">Contact us any time if you need any help or have any inquiry</p>
                    @include('inc.message-success')
                    @include('inc.front.forms.contact')
                </div>
            </div>
        </div>
    </section>
@endsection
@section('footer')
    <script src="https://www.google.com/recaptcha/api.js?render=6LeCzvkUAAAAAJV7rnyjqp_kbnIWX2KPeK5yqmUa"></script>
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('6LeCzvkUAAAAAJV7rnyjqp_kbnIWX2KPeK5yqmUa', {action: 'homepage'}).then(function(token) {
                document.getElementById("captchaToken").value = token;
            });
        });
    </script>
@endsection
