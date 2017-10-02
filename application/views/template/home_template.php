<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="format-detection" content="telephone=no"/>
        <!-- <script src="<?=base_url()?>public/js/main.js"></script> -->
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">
        <title><?=$page_title?></title>

        <!-- Bootstrap -->
        <link href="<?=base_url()?>public/css/bootstrap.css" rel="stylesheet">

        <link href="<?=base_url()?>public/css/mailform.css" rel="stylesheet">

        <link href="<?=base_url()?>public/css/jquery.fancybox.min.css" rel="stylesheet">

        <link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css" rel="stylesheet">

        <!-- Links -->
        <link href="<?=base_url()?>public/css/camera.css" rel="stylesheet">

        <!--JS-->
        <script src="<?=base_url()?>public/js/jquery.js"></script>
        <script src="<?=base_url()?>public/js/jquery-migrate-1.2.1.min.js"></script>

        <!--[if lt IE 9]>
        <div style=' clear: both; text-align:center; position: relative;'>
            <a href="https://windows.microsoft.com/en-US/internet-explorer/..">
                <img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820"
                     alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/>
            </a>
        </div>
        <script src="js/html5shiv.js"></script>
        <![endif]-->
        <script src='<?=base_url()?>public/js/device.min.js'></script>
        
    </head>

    <body>
    <div class="page">
        <!--========================================================
                                  HEADER
        =========================================================-->
        <header>
            <div id="stuck_container" class="stuck_container">
                <div class="container">
                    <div class="navbar-header">
                        <h1 class="navbar-brand">
                            <a href="<?=site_url()?>">
                                <img src="<?=base_url()?>public/images/matzen-60x60.png">
                            </a>
                        </h1>
                    </div>

                    <nav class="navbar navbar-default navbar-static-top">

                        <ul class="navbar-nav sf-menu navbar-right" data-type="navbar">
                            <li <?php if($url=='index' || $url==''){ echo 'class="active"'; } ?>>
                                <a href="<?=site_url()?>">Home</a>
                            </li>
                            <li <?php if($url=='about'){ echo 'class="active"'; } ?>>
                                <a href="<?=site_url('site/about')?>">About</a>
                            </li>
                            <li <?php if($url=='services' || $url=='steel_shop_drawings_services' || $url=='rebar_detailing_services' || $url=='mep_and_hvac_services' || $url=='precast_detailing_services' || $url=='architectural_engineering_services'){ echo 'class="active dropdown"'; } else { echo 'class="dropdown"'; } ?>>
                                <a href="<?=site_url('site/services')?>">Services</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="<?=site_url('site/steel_shop_drawings_services')?>">Steel Shop Drawings Services</a>
                                    </li>
                                    <li>
                                        <a href="<?=site_url('site/rebar_detailing_services')?>">Rebar Detailing Services</a>
                                    </li>
                                    <li>
                                        <a href="<?=site_url('site/mep_and_hvac_services')?>">MEP & HVAC Services</a>
                                    </li>
                                    <li>
                                        <a href="<?=site_url('site/precast_detailing_services')?>">Precast Detailing Services</a>
                                    </li>
                                    <li>
                                        <a href="<?=site_url('site/architectural_engineering_services')?>">Architectural Engineering Services</a>
                                    </li>
                                </ul>
                            </li>
                            <li <?php if($url=='projects'){ echo 'class="active"'; } ?>>
                                <a href="<?=site_url('site/projects')?>">Our Projects</a>
                            </li>
                            <li <?php if($url=='contactus'){ echo 'class="active"'; } ?>>
                                <a href="<?=site_url('site/contactus')?>">Contact Us</a>
                            </li>
                            <li <?php if($url=='get_quote'){ echo 'class="active"'; } ?>>
                                <a href="<?=site_url('site/get_quote')?>">Get Quote</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>

        <!--========================================================
                                  CONTENT
        =========================================================-->

        <?php echo $body; ?>

        <!--========================================================
                                FOOTER
      =========================================================-->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <h4>Overview</h4>
                        <ul>
                            <li><a href="<?=site_url()?>">Home</a></li>
                            <li><a href="<?=site_url('site/about')?>#aboutus">About us</a></li>
                            <li><a href="<?=site_url('site/about')?>#whychooseus">Why Choose Us?</a></li>
                            <li><a href="<?=site_url('site/about')?>#ourmission">Our Mission</a></li>
                            <li><a href="<?=site_url('site/about')?>#ourvalues">Our Core Values</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <h4>Services</h4>
                        <ul>
                            <li><a href="<?=site_url('site/steel_shop_drawings_services')?>">Steel Shop Drawings</a></li>
                            <li><a href="<?=site_url('site/rebar_detailing_services')?>">Rebar Shop Drawings</a></li>
                            <li><a href="<?=site_url('site/mep_and_hvac_services')?>">MEP & HVAC Services</a></li>
                            <li><a href="<?=site_url('site/precast_detailing_services')?>">Precast Detailing Services</a></li>
                            <li><a href="<?=site_url('site/architectural_engineering_services')?>">Architectural Drafting & Designing</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <h4>Contact Us</h4>
                        <p style="margin-top: 11px;"><a href="<?=site_url('site/contactus')?>" style="color:#F9AE19;">Contact Us</a> for all your requirements for Tender Projects, Industrial Projects, Residential Projects to be part of structural engineering projects where our role ensures you and your clients quality services with cost effective solutions.</p>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    Matzen Solutions &#169; <span id="copyright-year"></span>
                    <!-- | <a href="index-5.html">Privacy Policy</a> -->
                    <!-- {%FOOTER_LINK} -->
                </div>
            </div>
        </footer>
    </div>
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript">
        function isIE() {
            var myNav = navigator.userAgent.toLowerCase();
            return (myNav.indexOf('msie') != -1) ? parseInt(myNav.split('msie')[1]) : false;
        }
    </script>
    <script src="<?=base_url()?>public/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>public/js/jquery.cookie.js"></script>
    <script src="<?=base_url()?>public/js/jquery.easing.1.3.js"></script>
    <script src="<?=base_url()?>public/js/jquery.ui.totop.js"></script>
    <script src="<?=base_url()?>public/js/superfish.js"></script>
    <script src="<?=base_url()?>public/js/wow.js"></script>
    <script src="<?=base_url()?>public/js/camera.js"></script>
    <script src="<?=base_url()?>public/js/jquery.touch-touch.js"></script>
    <script src="//maps.google.com/maps/api/js?sensor=false"></script>
    <script src="<?=base_url()?>public/js/jquery.rd-google-map.js"></script>
    <script src="<?=base_url()?>public/js/jquery.rd-parallax.js"></script>
    <script src="<?=base_url()?>public/js/jquery.responsive.tabs.js"></script>
    <script src="<?=base_url()?>public/js/jquery.fancybox.min.js"></script>

    <!-- <script src="<?=base_url()?>public/js/mailform/jquery.form.min.js"></script>
    <script src="<?=base_url()?>public/js/mailform/jquery.rd-mailform.min.js"></script> -->

    
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

    <script type="text/javascript">
        (function($) {
            if ($('html').hasClass('desktop')) {
                $.getScript('<?=base_url()?>public/js/jquery.ui.totop.js');
                $(document).ready(function() {
                    $().UItoTop({
                        easingType: 'easeOutQuart',
                        containerClass: 'toTop fa fa-angle-up'
                    });
                });
            }
        })(jQuery);;
        (function($) {
            if ($('[data-equal-group]').length > 0) {
                $.getScript('<?=base_url()?>public/js/jquery.equalheights.js');
            }
        })(jQuery);;
        (function($) {
            var currentYear = (new Date).getFullYear();
            $(document).ready(function() {
                $("#copyright-year").text((new Date).getFullYear());
            });
        })(jQuery);;
        
        (function($) {
            $.getScript('<?=base_url()?>public/js/jquery.rd-navbar.js');
        })(jQuery);;
        (function($) {
            if ($('.accordion').length > 0) {
                $.getScript('<?=base_url()?>public/js/jquery.ui.accordion.min.js');
                $(document).ready(function() {
                    $('.accordion').accordion({
                        active: false,
                        header: '.accordion_header',
                        heightStyle: 'content',
                        collapsible: true
                    });
                });
            }
        })(jQuery);;
        (function($) {
            if (document.getElementById("google-map")) {
                // $.getScript('//maps.google.com/maps/api/js?sensor=false');
                // $.getScript('<?=base_url()?>public/js/jquery.rd-google-map.js');
                $(document).ready(function() {
                    if ($('#google-map').length > 0) {
                        $('#google-map').googleMap({
                            styles: []
                        });
                    }
                });
            }
        })
        (jQuery);;
        (function($) {
            if ($('.owl-carousel').length > 0) {
                $.getScript('<?=base_url()?>public/js/owl.carousel.min.js');
                $(document).ready(function() {
                    $('.owl-carousel').owlCarousel({
                        margin: 30,
                        smartSpeed: 450,
                        loop: true,
                        dots: false,
                        dotsEach: 1,
                        nav: true,
                        navClass: ['owl-prev fa fa-angle-left', 'owl-next fa fa-angle-right'],
                        responsive: {
                            0: {
                                items: 1
                            },
                            768: {
                                items: 1
                            },
                            980: {
                                items: 1
                            }
                        }
                    });
                });
            }
        })(jQuery);;
        (function($) {
            if ($('.resp-tabs').length > 0) {
                // $.getScript('<?=base_url()?>public/js/jquery.responsive.tabs.js');
                $(document).ready(function() {
                    $('.resp-tabs').easyResponsiveTabs();
                });
            }
        })(jQuery);;
        (function($) {
            if ((navigator.userAgent.toLowerCase().indexOf('msie') == -1) || (isIE() && isIE() > 9)) {
                if ($('html').hasClass('desktop')) {
                    $(document).ready(function() {
                        new WOW().init();
                    });
                }
            }
        })(jQuery);
        $(function() {
            var viewportmeta = document.querySelector && document.querySelector('meta[name="viewport"]'),
                ua = navigator.userAgent,
                gestureStart = function() {
                    viewportmeta.content = "width=device-width, minimum-scale=0.25, maximum-scale=1.6, initial-scale=1.0";
                },
                scaleFix = function() {
                    if (viewportmeta && /iPhone|iPad/.test(ua) && !/Opera Mini/.test(ua)) {
                        viewportmeta.content = "width=device-width, minimum-scale=1.0, maximum-scale=1.0";
                        document.addEventListener("gesturestart", gestureStart, false);
                    }
                };
            scaleFix();
            if (window.orientation != undefined) {
                var regM = /ipod|ipad|iphone/gi,
                    result = ua.match(regM);
                if (!result) {
                    $('.sf-menus li').each(function() {
                        if ($(">ul", this)[0]) {
                            $(">a", this).toggle(function() {
                                return false;
                            }, function() {
                                window.location.href = $(this).attr("href");
                            });
                        }
                    })
                }
            }
        });
        var ua = navigator.userAgent.toLocaleLowerCase(),
            regV = /ipod|ipad|iphone/gi,
            result = ua.match(regV),
            userScale = "";
        if (!result) {
            userScale = ",user-scalable=0"
        }
        document.write('<meta name="viewport" content="width=device-width,initial-scale=1.0' + userScale + '">');;
        (function($) {
            if ($('#camera').length > 0) {
                if (!(isIE() && (isIE() > 9))) {
                    $.getScript('<?=base_url()?>public/js/jquery.mobile.customized.min.js');
                }
                $(document).ready(function() {
                    $('#camera').camera({
                        autoAdvance: true,
                        height: '31.21951%',
                        minHeight: '350px',
                        pagination: false,
                        thumbnails: false,
                        playPause: false,
                        hover: false,
                        loader: 'none',
                        navigation: true,
                        navigationHover: true,
                        mobileNavHover: false,
                        fx: 'simpleFade'
                    })
                });
            }
        })(jQuery);;  
    </script>
    <!-- </script> -->

    <script type="text/javascript">
        $(document).ready(function(){
            $('.selectpicker').selectpicker();
        });
    </script>

    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', '']);
        _gaq.push(['_trackPageview']);
        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'https://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.hideAll').hide();
            $('.beams').show();
            $('.image_type_list ul li:first').addClass('active');
        });
        $('.image_type_list ul li').on('click', function(){
            var value = $(this).data('val');
            $('.image_type_list ul li').removeClass('active');
            $('.hideAll').hide();
            $('.'+value).show();
            $(this).addClass('active');
        });
    </script>

    </body>
</html>