<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Alzeena | Fashion House </title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Css Styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{ asset('web/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('web/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('web/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('web/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('web/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('web/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('web/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('web/css/style.css')}}" type="text/css">
</head>

<body>
<div id="app">
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>


    <publicheader></publicheader>
{{--    here is the header code--}}
    <!-- Header Section End -->
    <router-view></router-view>
</div>
<!-- Footer Section Begin -->
<div class="footer spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__about__logo">
                        <router-link to="/"><img src="{{ asset('web/img/logo.png')}}" alt=""></router-link>

                    </div>
                    <ul>
                        <li>Address: 14/22 asad avenue,townhall,</br> Mohammadpur,Dhaka</li>
                        <li>Phone: +880 1303-203212</li>
                        <li>Email: info@alzeena.com.bd</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                <div class="footer__widget">
                    <h6> Find Us on MAP</h6>
                    <div class="footer-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.646315253687!2d90.36531461467379!3d23.759988694327564!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755bff296ee14a7%3A0x6730cf756c73ae8b!2sAlzeena!5e0!3m2!1sen!2sbd!4v1592945440920!5m2!1sen!2sbd" width="600" height="220" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="footer__widget">
                    <h6>Join Our Facebook Now</h6>
                    <div class="fb-page" data-href="https://web.facebook.com/alzeena.com.bd/" data-tabs="timeline" data-width="320" data-height="220" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://web.facebook.com/alzeena.com.bd/" class="fb-xfbml-parse-ignore"><a href="https://web.facebook.com/alzeena.com.bd/">Alzeena</a></blockquote></div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer__copyright">
                    <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                    <div class="footer__copyright__payment"><img src="{{ asset('web/img/payment-item.png')}}" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</div>
</footer>
<!-- Footer Section End -->


<!-- Js Plugins -->
<!-- <script src="{{ asset('js/app.js')}}"></script> -->
<script src="{{ asset('web/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{ asset('web/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('web/js/jquery.nice-select.min.js')}}"></script>
<script src="{{ asset('web/js/jquery-ui.min.js')}}"></script>
<script src="{{ asset('web/js/jquery.slicknav.js')}}"></script>
<script src="{{ asset('web/js/mixitup.min.js')}}"></script>
<script src="{{ asset('web/js/owl.carousel.min.js')}}"></script>
<script src="{{ asset('web/js/main.js')}}"></script>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v7.0" nonce="adwsjvGx"></script>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml            : true,
            version          : 'v7.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Your Chat Plugin code -->
<div class="fb-customerchat"
     attribution=setup_tool
     page_id="271074933082051">
</div>

</body>

</html>

