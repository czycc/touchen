<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Touch World</title>
    <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">
    <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap style -->
    <link rel="stylesheet" href="css/hero-slider-style.css">
    <!-- Hero slider style (https://codyhouse.co/gem/hero-slider/) -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- Magnific popup style (http://dimsemenov.com/plugins/magnific-popup/) -->
    <link rel="stylesheet" href="css/templatemo-style.css">
    <!-- Templatemo style -->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]
  -->
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">
    <style>
        #owl-pic {
            margin-left: auto;
            margin-right: auto;
        }

        #owl-pic .item {
            display: block;
        }

        .selected .cd-full-width .owl-wrapper-outer {
            /* position: absolute;
            top: 30%;
            bottom: 0;
            margin: auto; */
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .tm-footer {
            pointer-events: none;
        }

    </style>
    <script src="js/jquery-1.11.3.min.js"></script>
    <!-- jQuery (https://jquery.com/download/) -->
    <script src="js/owl.carousel.js"></script>
    <script>
        $(function () {
            $('#owl-pic').owlCarousel({
                items: 1,
                autoPlay: true,
                itemsCustom: [1920, 1],

            });
        });
    </script>
</head>

<body>
<!-- Content -->
<div class="cd-hero">
    <!-- Navigation -->
    <div class="cd-slider-nav">
        <nav class="navbar">
            <div class="tm-navbar-bg">
                <a class="navbar-brand text-uppercase" href="#">
                    <img src="img/logo.png">Touch World</a>
                <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse"
                        data-target="#tmNavbar">
                    &#9776;
                </button>
                <div class="collapse navbar-toggleable-md text-xs-center text-uppercase tm-navbar" id="tmNavbar">
                    <ul class="nav navbar-nav">
                        <li class="nav-item active selected">
                            <a class="nav-link" href="#0" data-no="1">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#0" data-no="2">News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#0" data-no="3">Cases</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#0" data-no="4">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#0" data-no="5">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <ul class="cd-hero-slider">
        <!-- Page 1 Home -->
        <li class="selected">
            <div class="cd-full-width" data-page-no="1">
                <div style="width: 100%;height: 100%;" id="owl-pic" class="owl-carousel">
                    <div class="video">
                        <video
                            autoplay
                            controls
                            loop
                            poster="img/poster.jpg"
                            controlslist="nodownload"
                            style="width: 100%;height: 100%"
                            src="https://touchworld.oss-cn-shanghai.aliyuncs.com/touch/%E5%85%AC%E5%8F%B8%E5%AE%A3%E4%BC%A0%E7%89%87.mp4"></video>
                    </div>
                    <!-- <a class="item">
                        <img src="img/tm-bg-1.jpeg">
                    </a> -->
                    <!-- <a class="item">
                        <img src="img/tm-bg-2.jpeg">
                    </a>
                    <a class="item">
                        <img src="img/tm-bg-3.jpeg">
                    </a>
                    <a class="item">
                        <img src="img/tm-bg-4.jpeg">
                    </a>
                    <a class="item">
                        <img src="img/tm-bg-5.jpeg">
                    </a> -->
                </div>
            </div>
        </li>
        <!-- Page 2 Gallery One -->
        <li>
            <div class="cd-full-width">
                <div class="container-fluid js-tm-page-content" data-page-no="2" data-page-type="gallery">
                    <div class="tm-img-gallery-container">
                        <div class="tm-img-gallery gallery-one">
                            <!-- Gallery One pop up connected with JS code below -->
                            <div class="tm-img-gallery-info-container">
                                <h2 class="tm-text-title tm-gallery-title tm-white">
                                    <span class="tm-white">News Classification</span>
                                </h2>
                                <p class="tm-text">
                                    Shanghai Touch Digital Technology Co., Ltd. is committed to providing the most
                                    innovative multimedia display effects and the most unique creative design, using
                                    holographic imaging for new listings, exhibitions, city halls, planning galleries,
                                    advertising planning, interactive ball screen, 360 Holographic, fog screen
                                    projection, ring screen movie, electronic sign-in and multi-touch technology to
                                    achieve the most shocking and dazzling effects.
                                </p>
                            </div>
                            @foreach($categories as $category)
                                <div class="grid-item">
                                    <figure class="effect-ruby">
                                        <img src="img/tm-img-0{{ $loop->index + 1 }}-tn.jpg" alt="Image"
                                             class="img-fluid tm-img">
                                        <figcaption>
                                            <h2 class="tm-figure-title">{{ $category->category }}</h2>
                                            <p class="tm-figure-description">{{ $category->description }}</p>
                                            <a href="{{ url('category') . '/' . $category->id }}">View more</a>
                                        </figcaption>
                                    </figure>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <!-- Page 3 Gallery Two -->
        <li>
            <div class="cd-full-width">
                <div class="container-fluid js-tm-page-content" data-page-no="3" data-page-type="gallery">
                    <div class="tm-img-gallery-container tm-img-gallery-container-2">
                        <div class="tm-img-gallery gallery-two">
                            <!-- Gallery Two pop up connected with JS code below -->
                            <div class="tm-img-gallery-info-container">
                                <h2 class="tm-text-title tm-gallery-title">
                                    <span class="tm-white">Hot Topic</span>
                                </h2>
                                <p class="tm-text">
										<span class="tm-white">Introduce the most popular product types in the market recently.</span>
                                </p>
                            </div>
                            <div class="grid-item">
                                <figure class="effect-ruby">
                                    <img src="img/tm-img-05-tn.jpg" alt="Image" class="img-fluid tm-img">
                                    <figcaption>
                                        <h2 class="tm-figure-title">Picture
                                            <span>One</span>
                                        </h2>
                                        <p class="tm-figure-description">Suspendisse id placerat risus. Mauris quis
                                            luctus risus.</p>
                                        <a href="img/tm-img-05.jpg">View more</a>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="grid-item">
                                <figure class="effect-ruby">
                                    <img src="img/tm-img-06-tn.jpg" alt="Image" class="img-fluid tm-img">
                                    <figcaption>
                                        <h2 class="tm-figure-title">Picture
                                            <span>Two</span>
                                        </h2>
                                        <p class="tm-figure-description">Maecenas purus sem, lobortis id odio in sapien.
                                        </p>
                                        <a href="img/tm-img-06.jpg">View more</a>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="grid-item">
                                <figure class="effect-ruby">
                                    <img src="img/tm-img-07-tn.jpg" alt="Image" class="img-fluid tm-img">
                                    <figcaption>
                                        <h2 class="tm-figure-title">Picture
                                            <span>Three</span>
                                        </h2>
                                        <p class="tm-figure-description">Suspendisse id placerat risus. Mauris quis
                                            luctus risus.</p>
                                        <a href="img/tm-img-07.jpg">View more</a>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="grid-item">
                                <figure class="effect-ruby">
                                    <img src="img/tm-img-08-tn.jpg" alt="Image" class="img-fluid tm-img">
                                    <figcaption>
                                        <h2 class="tm-figure-title">Picture
                                            <span>Four</span>
                                        </h2>
                                        <p class="tm-figure-description">Maecenas purus sem, lobortis id odio in sapien.
                                        </p>
                                        <a href="img/tm-img-08.jpg">View more</a>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="grid-item">
                                <figure class="effect-ruby">
                                    <img src="img/tm-img-09-tn.jpg" alt="Image" class="img-fluid tm-img">
                                    <figcaption>
                                        <h2 class="tm-figure-title">Picture
                                            <span>Five</span>
                                        </h2>
                                        <p class="tm-figure-description">Suspendisse id placerat risus. Mauris quis
                                            luctus risus.</p>
                                        <a href="img/tm-img-09.jpg">View more</a>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="grid-item">
                                <figure class="effect-ruby">
                                    <img src="img/tm-img-10-tn.jpg" alt="Image" class="img-fluid tm-img">
                                    <figcaption>
                                        <h2 class="tm-figure-title">Picture
                                            <span>Six</span>
                                        </h2>
                                        <p class="tm-figure-description">Maecenas purus sem, lobortis id odio in sapien.
                                        </p>
                                        <a href="img/tm-img-10.jpg">View more</a>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <!-- Page 4 About -->
        <li>
            <div class="cd-full-width">
                <div class="container-fluid js-tm-page-content tm-page-width" data-page-no="4">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="tm-flex">
                                <div
                                    class="tm-bg-white-translucent text-xs-left tm-textbox tm-textbox-padding tm-white-box-margin-b">
                                    <h2 class="tm-text-title">Shanghai TouchWorld Of Digital technology CO.,LTD</h2>
                                    <p class="tm-text indent">
                                        Shanghai touch field Digital Technology Co. Ltd. is committed to providing the
                                        most innovative multimedia display and creative
                                        design of the most unique, for the new listing, exhibition hall, museum, city
                                        planning, advertising planning and
                                        the use of holographic imaging, interactive dome, 360 holographic, fog screen
                                        projection, movie screen, electronic
                                        sign and multi touch technology to achieve the most shocking, stunning effect.
                                        <br/>
                                    <p class="tm-text indent">
                                        At the same time undertake a variety of professional 3D animation, Flash
                                        animation, can provide different solutions according
                                        to customer needs; Tongji University we have the most professional R & D team,
                                        is committed to providing the
                                        most advanced technology, we have many well-known brand to provide high-quality
                                        service; the company is the concept
                                        of respect for customers, understanding customers, continue to provide the
                                        products and services that exceed
                                        customer expectations, so customers are always partners.
                                    </p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .cd-full-width -->
        </li>

        <!-- Page 5 Contact Us -->
        <li>
            <div class="cd-full-width">
                <div class="container-fluid js-tm-page-content tm-page-pad" data-page-no="5">
                    <div class="tm-contact-page">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="tm-flex tm-contact-container">
                                    <div
                                        class="tm-bg-white-translucent text-xs-left tm-textbox tm-2-col-textbox-2 tm-textbox-padding tm-textbox-padding-contact">
                                        <h2 class="tm-contact-info">Contact Us</h2>
                                        <p class="tm-text">
                                            Tel：+021 35091225 / 35090001
                                            <br/> Fax：+021 35090001
                                            <br/> Phone：18917292695 / 13331891225 / 13761189700
                                            <br/> QQ：407688499 / 1793901862 / 1296076770
                                            <br/>
                                        </p>
                                        <!-- contact form -->
                                        <form class="tm-contact-form" onsubmit="return formSubmit(this);" id="formData">
                                            <div class="form-group">
                                                <input type="text" id="contact_name" name="name"
                                                       class="form-control" placeholder="Name" required/>
                                            </div>
                                            <div class="form-group">
                                                <input type="email" id="contact_email" name="email"
                                                       class="form-control" placeholder="Email" required/>
                                            </div>
                                            <div class="form-group">
                                                <textarea id="contact_message" name="message"
                                                          class="form-control" rows="5" placeholder="Your message"
                                                          required></textarea>
                                            </div>
                                            <button type="submit" class="pull-xs-right tm-submit-btn" id="submit">Send</button>
                                        </form>
                                    </div>
                                    <div
                                        class="tm-bg-white-translucent text-xs-left tm-textbox tm-2-col-textbox-2 tm-textbox-padding tm-textbox-padding-contact">
                                        <h2 class="tm-contact-info">Room 401, no.7628, zhongchun road, minhang district,
                                            Shanghai
                                        </h2>
                                        <!-- map goes here -->
                                        <div id="map" style="min-height: 300px">map</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .cd-full-width -->
        </li>
    </ul>
    <!-- .cd-hero-slider -->
    <footer class="tm-footer">
        <p class="tm-copyright-text">
            Copyright &copy; 2017 Touch World
        </p>
    </footer>
</div>
<!-- .cd-hero -->


<!-- Preloader, https://ihatetomatoes.net/create-custom-preloading-screen/ -->
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>

<!-- load JS files -->

<script src="js/tether.min.js"></script>
<!-- Tether for Bootstrap (http://stackoverflow.com/questions/34567939/how-to-fix-the-error-error-bootstrap-tooltips-require-tether-http-github-h) -->
<script src="js/bootstrap.min.js"></script>
<!-- Bootstrap js (v4-alpha.getbootstrap.com/) -->
<script src="js/hero-slider-main.js"></script>
<!-- Hero slider (https://codyhouse.co/gem/hero-slider/) -->
<script src="js/jquery.magnific-popup.min.js"></script>
<!-- Magnific popup (http://dimsemenov.com/plugins/magnific-popup/) -->

<!-- 高德地图 -->
{{--<script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=9919b3652eba25eb2e2ef0839e3b8692"></script>--}}
{{--<script type="text/javascript">--}}
    {{--var map = new AMap.Map('map', {--}}
        {{--resizeEnable: true,--}}
        {{--zoom: 15,--}}
        {{--center: [121.3620145118, 31.1360110791]--}}
    {{--});--}}
    {{--map.plugin(['AMap.ToolBar', 'AMap.Scale', 'AMap.OverView'],--}}
        {{--function () {--}}
            {{--map.addControl(new AMap.ToolBar());--}}
            {{--map.addControl(new AMap.Scale());--}}
            {{--map.addControl(new AMap.OverView({isOpen: true}));--}}
        {{--});--}}
    {{--var marker = new AMap.Marker({--}}
        {{--position: [121.3620145118, 31.1360110791]--}}
    {{--});--}}
    {{--marker.setMap(map);--}}

{{--</script>--}}

<!-- 谷歌地图 -->
<!-- 将'YOUR_API_KEY'改成的谷歌的注册的key -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCYMiA5xn5hqZZGg9IvKcVeIwmcatw4y3o&callback=initMap"></script>
<script>
    function initMap() {
        var uluru = {lat: 31.136, lng: 121.362};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
    }
</script>

<script>
    function adjustHeightOfPage(pageNo) {
        var offset = 80;
        var pageContentHeight = 0;
        var pageType = $('div[data-page-no="' + pageNo + '"]').data("page-type");
        if (pageType != undefined && pageType == "gallery") {
            pageContentHeight = $(".cd-hero-slider li:nth-of-type(" + pageNo + ") .tm-img-gallery-container").height();
        }
        else {
            pageContentHeight = $(".cd-hero-slider li:nth-of-type(" + pageNo + ") .js-tm-page-content").height();
        }
        if ($(window).width() >= 992) {
            offset = 120;
        }
        else if ($(window).width() < 480) {
            offset = 40;
        }
        // Get the page height
        var totalPageHeight = 15 + $('.cd-slider-nav').height()
            + pageContentHeight + offset
            + $('.tm-footer').height();
        // Adjust layout based on page height and window height
        if (totalPageHeight > $(window).height()) {
            $('.cd-hero-slider').addClass('small-screen');
            $('.cd-hero-slider li:nth-of-type(' + pageNo + ')').css("min-height", totalPageHeight + "px");
        }
        else {
            $('.cd-hero-slider').removeClass('small-screen');
            $('.cd-hero-slider li:nth-of-type(' + pageNo + ')').css("min-height", "100%");
        }
    }

    /*
            Everything is loaded including images.
    */
    $(window).load(function () {
        adjustHeightOfPage(1); // Adjust page height
        /* Gallery One pop up
        -----------------------------------------*/
        // $('.gallery-one').magnificPopup({
        //     delegate: 'a', // child items selector, by clicking on it popup will open
        //     type: 'image',
        //     gallery:{enabled:true}
        // });
        /* Gallery Two pop up
        -----------------------------------------*/
        $('.gallery-two').magnificPopup({
            delegate: 'a',
            type: 'image',
            gallery: {enabled: true}
        });
        /* Gallery Three pop up
        -----------------------------------------*/
        $('.gallery-three').magnificPopup({
            delegate: 'a',
            type: 'image',
            gallery: {enabled: true}
        });
        /* Collapse menu after click
        -----------------------------------------*/
        $('#tmNavbar a').click(function () {
            $('#tmNavbar').collapse('hide');
            adjustHeightOfPage($(this).data("no")); // Adjust page height
        });
        /* Browser resized
        -----------------------------------------*/
        $(window).resize(function () {
            var currentPageNo = $(".cd-hero-slider li.selected .js-tm-page-content").data("page-no");
            // wait 3 seconds
            setTimeout(function () {
                adjustHeightOfPage(currentPageNo);
            }, 1000);
        });

        // Remove preloader (https://ihatetomatoes.net/create-custom-preloading-screen/)
        $('body').addClass('loaded');

    });

    function formSubmit() {
        let formData = new FormData(document.querySelector("#formData"));
        // let formData= new FormData($('#formData')[0]);
        // formData.append("CustomField", "This is some extra data");
        console.log(formData.getAll('name'))
        $.ajax({
            url: "{{ url('api/email') }}",
            type: "post",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            data: formData,
            async: true,
            cache: false,
            contentType: false,
            processData: false,
        }).success(function (res) {
            alert('提交信息成功');
            $('submit').attr('disabled', 'disabled');
            console.log(res)
        }).fail(function (res) {
            alert('提交信息失败');
            console.log(res)
        });
        return false;
    }

</script>
</body>
</html>
