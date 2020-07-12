@extends('layouts.front')

@section('content')
    <?php
    $help = new \App\Help();
    ?>
    <div data-overlay class="bg-primary-3 jarallax text-white" data-jarallax data-speed="0.2" id="home">
      <img src="{{ asset('public') }}/front/assets/img/mailbox.jpg" alt="Background" class="jarallax-img opacity-30">
      <section class="pb-0">
        <div class="container pb-5">
          <div class="row justify-content-center text-center">
            <div class="col-xl-8 col-lg-10 col-md-11">


              <h2 class="display-2" data-aos="fade-up" data-aos-delay="100" style="font-size: 30px">
                  Fast and Secure Hold Mail Order
              </h2>
              <div class="d-flex flex-column flex-sm-row justify-content-center mt-4 mt-md-5" data-aos="fade-up" data-aos-delay="300">
                <a  href="{{route('front.page.hold-mail')}}" class="btn btn-primary btn-lg mx-sm-2 my-1 my-sm-0">Holdmail Request</a>
                <a href="{{route('front.cancelUpdatePage')}}" class="btn btn-outline-light btn-lg mx-sm-2 my-1 my-sm-0">Cancellation/Update</a>
              </div>
            </div>
          </div>
        </div>
        <div class="divider divider-bottom bg-white"></div>
      </section>
    </div>
    <section class="pb-0 pt-5">
      <div class="container">
        <div class="row">
         <div class="col-sm-12">
            <h1 class=" mb-0 text-center">Welcome to USPS Mail Holding</h1>
             <h5 class="font-weight-normal mt-0 text-center">We do USPS Mail Hold requests to make your life easier and efficient to help you do bigger and better objectives with your day.
             </h5>
             <hr/>
             <p class="text-center">
                 We offer Hold Mail requests and mail Cancellation/Update all in submitting one form. No need to create an account or login into any account. Just fill out the information needed, and you will receive an email confirming your USPS hold mail request. Therefore, your information will be 100% secure and not used for any external websites except for USPS hold mail requests. Above all, you can schedule to hold your mail as early as the next scheduled delivery day (a day prior to the delivery business day) or up to 1-year in advance with us. In other words, request your start date from Monday-Saturday. As a result, note that the USPS holds all mail for the address specified, rather than a particular individuals. In addition, an address can have only one Mail Hold Service scheduled at a time. Therefore, you are also able to cancel your hold mail or update it as well in just few seconds if you hold your mail through us. Above all, start filling up your requests today!
             </p>
            <div class="text-center m-lg-5">
                <a  href="{{route('front.page.hold-mail')}}" class="btn btn-primary btn-lg mx-sm-2 my-1 my-sm-0">Hold Your Mail</a>
            </div>
         </div>


        </div>
      </div>
    </section>

    <section class="bg-primary-3 pt-5 pb-5 text-white">

        <div class="container">
            <div class="row justify-content-center">

                    <div class="row justify-content-center">
                        <div class="col-md-6 mb-3 mb-md-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="10">
                            <div class="card card-body bg-white min-vh-md-30 hover-box-shadow">
                                <div class="flex-fill">
                                    <h4 class="h3">USPS Hold Mail Services</h4>
                                  <ul class="services">
                                      <li>
                                          Additionally, we offer high quality customer service around the clock.
                                      </li>
                                      <li>
                                          Offer USPS hold mail to make sure it gets held for the time requested.
                                      </li>
                                      <li>
                                          We allow you to hold your mail with no registration needed.
                                      </li>
                                      <li>
                                          Allow you to hold your mail from a day prior to 365 days.
                                      </li>
                                      <li>
                                          Our support is always available for support when needed, you can contact us
                                      </li>
                                  </ul>
                                </div>
                                <a href="{{route('front.page.hold-mail')}}" class="stretched-link text-right " style="margin-top: 33px">Hold Your Mail</a>

                            </div>
                        </div>
                        <div class="col-md-6 mb-3 mb-md-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="20">
                            <div class="card card-body bg-white min-vh-md-30 hover-box-shadow">
                                <div class="flex-fill">
                                    <h4 class="h3">USPS Mail Cancellation/Update Services</h4>
                                  <ul class="services">
                                      <li>
                                          Offering to cancel your usps hold mail within minutes.
                                      </li>
                                      <li>
                                          In Addition, offer to cancel your hold mail without any registration just fill the 3 field form!
                                      </li>
                                      <li>
                                          Being available for hold mail support or any inquiry information around the clock.
                                      </li>
                                      <li>
                                          Contact USPS mail Hold to check on your mail hold dates to make sure it is the exact information you require.
                                      </li>
                                      <li>
                                          As well as, being able to change the dates if needed.
                                      </li>

                                  </ul>
                                </div>
                                <a href="{{route('front.cancelUpdatePage')}}" class="stretched-link text-right">Cancel/Update Your HoldMail</a>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </section>







@endsection
