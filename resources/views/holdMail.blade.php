@extends('layouts.front')
@section('content')
    <section>
        <div class="container shMt55">
            <div class="row">
                <div class="col-sm-12 mt-5">
                 <p>   Headed out of town? We can hold your mail safely at your local Post Office™️ until you return. USPS Hold Mail can provide you with Elite mail holding services. We will make sure we are available around the clock to make sure everything is up to the highest standard. Your mail care is out biggest concern, we will make sure your instructions are communicated correctly to give you the best experience possible.</p>

                    <p>  Schedule a USPS Hold Mail™️ Service. You can notify us up to 60 days in advance or as early as the next scheduled delivery day. Request your start date by 3 AM ET (2 AM CT or 12 AM PT) on your requested day, Monday – Saturday.</p>

                    <p>  You will need to enter your Contact Information (which consist of your first name, last name, phone and email address). As well as, your Hold Mail Information (street address, apt/suite, city, state, zip). Most importantly, the requested Start Date and End Date of your mail. And any extra instructions you believe would be helpful in making this a pleasant experience.</p>


                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 mt-5">

                    @include('inc.message-success')
                    @include('inc.front.forms.holdMail')
                </div>
            </div>
        </div>
    </section>
@endsection
@section('footer')

@endsection
