
<section class="pt-1 pb-4">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">

                <img src="{{asset('public/front/assets/img/ssl2.jpg')}}" style="max-width: 100%" />

            </div>
        </div>
    </div>
</section>
<footer class="bg-primary-3 text-white links-white pb-4 footer-1 pt-4">
    <div class="container">

        <div class="row text-center">
            <div class="text-muted m-auto d-block"><a href="{{route('terms')}}" target=""> Terms & Conditions </a> |
                <a href="{{route('privacy')}}" target=""> Privacy Policy </a>
                <br/>

                <span style="text-align: left">    uspsmailholding.com is owned by a private company that simplifies and offers extended customer service during the process of holding mail. uspsmailholding.com serves as an authorized agent for its customers who wish to submit a request to hold mail to the United States Postal Service. uspsmailholding.com is not affiliated with the United States Postal Service. For only $14.95, we provide premium customer service, offer access to valuable coupons, provide mobile-friendly filing, accept multiple holds, and allow up to 1 year to file. If you wish to file free with the uspsmailholding.com and not receive our additional benefits, you may do so by visiting the USPS website. By placing an order with us, you agree to the Terms & Conditions and Privacy Policy </span> <br/> © 2020 All rights reserved by USPS Mail Holding
            </div>
        </div>
    </div>
</footer>
<a href="#top" class="btn btn-primary rounded-circle btn-back-to-top" data-smooth-scroll data-aos="fade-up" data-aos-offset="2000" data-aos-mirror="true" data-aos-once="false">
    <img src="{{ asset('public') }}/front/assets/img/icons/interface/icon-arrow-up.svg" alt="Icon" class="icon bg-white" data-inject-svg>
</a>
<!-- Required vendor scripts (Do not remove) -->
<script type="text/javascript" src="{{ asset('public') }}/front/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('public') }}/front/assets/js/popper.min.js"></script>
<script type="text/javascript" src="{{ asset('public') }}/front/assets/js/bootstrap.js"></script>

<!-- Optional Vendor Scripts (Remove the plugin script here and comment initializer script out of index.js if site does not use that feature) -->

<!-- AOS (Animate On Scroll - animates elements into view while scrolling down) -->
<script type="text/javascript" src="{{ asset('public') }}/front/assets/js/aos.js"></script>
<!-- Clipboard (copies content from browser into OS clipboard) -->
<script type="text/javascript" src="{{ asset('public') }}/front/assets/js/clipboard.min.js"></script>
<!-- Fancybox (handles image and video lightbox and galleries) -->
<script type="text/javascript" src="{{ asset('public') }}/front/assets/js/jquery.fancybox.min.js"></script>
<!-- Flatpickr (calendar/date/time picker UI) -->
<script type="text/javascript" src="{{ asset('public') }}/front/assets/js/flatpickr.min.js"></script>
<!-- Flickity (handles touch enabled carousels and sliders) -->
<script type="text/javascript" src="{{ asset('public') }}/front/assets/js/flickity.pkgd.min.js"></script>
<!-- Ion rangeSlider (flexible and pretty range slider elements) -->
<script type="text/javascript" src="{{ asset('public') }}/front/assets/js/ion.rangeSlider.min.js"></script>
<!-- Isotope (masonry layouts and filtering) -->
<script type="text/javascript" src="{{ asset('public') }}/front/assets/js/isotope.pkgd.min.js"></script>
<!-- jarallax (parallax effect and video backgrounds) -->
<script type="text/javascript" src="{{ asset('public') }}/front/assets/js/jarallax.min.js"></script>
<script type="text/javascript" src="{{ asset('public') }}/front/assets/js/jarallax-video.min.js"></script>
<script type="text/javascript" src="{{ asset('public') }}/front/assets/js/jarallax-element.min.js"></script>
<!-- jQuery Countdown (displays countdown text to a specified date) -->
<script type="text/javascript" src="{{ asset('public') }}/front/assets/js/jquery.countdown.min.js"></script>
<!-- jQuery smartWizard facilitates steppable wizard content -->
<script type="text/javascript" src="{{ asset('public') }}/front/assets/js/jquery.smartWizard.min.js"></script>
<!-- Plyr (unified player for Video, Audio, Vimeo and Youtube) -->
<script type="text/javascript" src="{{ asset('public') }}/front/assets/js/plyr.polyfilled.min.js"></script>
<!-- Prism (displays formatted code boxes) -->
<script type="text/javascript" src="{{ asset('public') }}/front/assets/js/prism.js"></script>
<!-- ScrollMonitor (manages events for elements scrolling in and out of view) -->
<script type="text/javascript" src="{{ asset('public') }}/front/assets/js/scrollMonitor.js"></script>
<!-- Smooth scroll (animation to links in-page)-->
<script type="text/javascript" src="{{ asset('public') }}/front/assets/js/smooth-scroll.polyfills.min.js"></script>
<!-- SVGInjector (replaces img tags with SVG code to allow easy inclusion of SVGs with the benefit of inheriting colors and styles)-->
<script type="text/javascript" src="{{ asset('public') }}/front/assets/js/svg-injector.umd.production.js"></script>
<!-- TwitterFetcher (displays a feed of tweets from a specified account)-->
<script type="text/javascript" src="{{ asset('public') }}/front/assets/js/twitterFetcher_min.js"></script>
<!-- Typed text (animated typing effect)-->
<script type="text/javascript" src="{{ asset('public') }}/front/assets/js/typed.min.js"></script>
<!-- Required theme scripts (Do not remove) -->
<script type="text/javascript" src="{{ asset('public') }}/front/assets/js/theme.js"></script>
<!-- Removes page load animation when window is finished loading -->

<script type="text/javascript">
    window.addEventListener("load",function(){document.querySelector('body').classList.add('loaded');});
</script>



@yield('footer')
</body>

</html>
