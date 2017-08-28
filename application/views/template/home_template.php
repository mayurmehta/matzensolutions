<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="format-detection" content="telephone=no"/>
        <script src="../cdn-cgi/apps/head/3ts2ksMwXvKRuG480KNifJ2_JNM.js"></script><link rel="icon" href="images/favicon.ico" type="image/x-icon">
        <title><?=$page_title?></title>

        <!-- Bootstrap -->
        <link href="<?php echo base_url()?>public/css/bootstrap.css" rel="stylesheet">

        <!-- Links -->
        <link href="<?php echo base_url()?>public/css/camera.css" rel="stylesheet">

        <!--JS-->
        <script src="<?php echo base_url()?>public/js/jquery.js"></script>
        <script src="<?php echo base_url()?>public/js/jquery-migrate-1.2.1.min.js"></script>

        <!--[if lt IE 9]>
        <div style=' clear: both; text-align:center; position: relative;'>
            <a href="https://windows.microsoft.com/en-US/internet-explorer/..">
                <img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820"
                     alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/>
            </a>
        </div>
        <script src="js/html5shiv.js"></script>
        <![endif]-->
        <script src='<?php echo base_url()?>public/js/device.min.js'></script>
        
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
                            <a href="index.html">
                                Drafting
                            </a>
                        </h1>
                    </div>

                    <nav class="navbar navbar-default navbar-static-top ">

                        <ul class="navbar-nav sf-menu navbar-right" data-type="navbar">
                            <li class="active">
                                <a href="index.html">Home</a>
                            </li>
                            <li>
                                <a href="index-1.html">About</a>
                            </li>
                            <li class="dropdown">
                                <a href="index-2.html">Services</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="index.html#">Lorem ipsum dolor </a>
                                    </li>
                                    <li>
                                        <a href="index.html#">Ait amet conse </a>
                                    </li>
                                    <li>
                                        <a href="index.html#">Ctetur adipisicing elit</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="index.html#">Lorem</a>
                                            </li>
                                            <li>
                                                <a href="index.html#">Dolor</a>
                                            </li>
                                            <li>
                                                <a href="index.html#">Sit amet</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="index.html#">Sed do eiusmod </a>
                                    </li>
                                    <li>
                                        <a href="index.html#">Tempor incididunt </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="index-3.html">Gallery</a>
                            </li>

                            <li>
                                <a href="index-4.html">Contacts</a>
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

        <!-- <main>
            <div class="camera_container">
                <div id="camera" class="camera_wrap">
                    <div data-src="images/page-1_slide01.jpg">
                        <div class="camera_caption fadeIn">
                            <img class="img_cam" src="images/page-1_img01.png" alt=""/>

                            <h2>Powerful drafting solution for any client</h2>

                            <p class="off1">Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut
                                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>

                            <div class="btn-wrap">
                                <a class="btn btn-secondary2" href="index.html#">Get A Quote</a>
                                <a class="btn btn-default" href="index.html#">Join Our Team</a>
                            </div>
                        </div>
                    </div>
                    <div data-src="images/page-1_slide02.jpg">
                        <div class="camera_caption fadeIn">
                            <img class="img_cam" src="images/page-1_img01.png" alt=""/>

                            <h2>Accuracy is the main feature of our drawings</h2>

                            <p class="off1">Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut
                                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>

                            <div class="btn-wrap">
                                <a class="btn btn-primary" href="index.html#">Get A Quote</a>
                                <a class="btn btn-default" href="index.html#">Join Our Team</a>
                            </div>
                        </div>
                    </div>
                    <div data-src="images/page-1_slide03.jpg">
                        <div class="camera_caption fadeIn">
                            <img class="img_cam" src="images/page-1_img01.png" alt=""/>

                            <h2>Premier drafting services for any project</h2>

                            <p class="off1">Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut
                                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>

                            <div class="btn-wrap">
                                <a class="btn btn-secondary" href="index.html#">Get A Quote</a>
                                <a class="btn btn-default" href="index.html#">Join Our Team</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="well bg-seconday text-center wow fadeIn" data-wow-delay="0.4s">
                <div class="container">
                    <h3>Global CAD Services, CAD Conversion, Architectural Drafting, 3D/BIM Modeling</h3>

                    <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt
                        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                        nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                        esse
                        cillum dolore eu fugiat nulla pariatur. </p>
                </div>
            </section>
            <section class="well1 text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-5 col-xs-12 wow fadeInLeft" data-wow-delay="0.5s"><img
                                src="images/page-1_img02.png" alt=""/>
                        </div>
                        <div class="col-md-8 col-sm-7 col-xs-12  wow fadeInRight" data-wow-delay="0.7s">
                            <h2 class="off1">Our drawings exceed your
                                expectations</h2>

                            <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet
                                conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                ex ea commodo consequat.</p>
                            <a class="btn btn-default btn-sm" href="index.html#">Read More</a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="bg-primary">
                <section class="parallax" data-url="images/parallax1.png" data-mobile="true" data-direction="inverse"
                         data-speed="0.7">
                    <section class="parallax" data-url="images/parallax2.png" data-mobile="true" data-speed="1.0">
                        <section class="well well__ins1">
                            <div class="container">
                                <h3 class="text-center">Featured CAD Services:</h3>
                                <ul class="row product-list">
                                    <li class="col-md-6 col-sm-6 col-xs-12 media media-sm-none media-xs-none">
                                        <div class="media-left">
                                            <div class="hexagon hexagon1">
                                                <div class="hexagon-in1">
                                                    <div class="hexagon-in2 hexagon-in2__col1"><span
                                                            class="fa-cubes"></span></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="media-body">
                                            <h4>Excepteur sint occaecat cupidatat non</h4>

                                            <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod
                                                tempor
                                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                                nostrud
                                                exercitation ullamco laboris nisi ut aliquip ex</p>
                                        </div>
                                    </li>
                                    <li class="col-md-6 col-sm-6 col-xs-12 media media-sm-none media-xs-none">
                                        <div class="media-left">
                                            <div class="hexagon hexagon1">
                                                <div class="hexagon-in1">
                                                    <div class="hexagon-in2 hexagon-in2__col2"><span
                                                            class="fa-building-o"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="media-body">
                                            <h4>Quis nostrud exercitation ullamco laboris</h4>

                                            <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod
                                                tempor
                                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                                nostrud
                                                exercitation ullamco laboris nisi ut aliquip ex</p>
                                        </div>
                                    </li>
                                    <li class="col-md-6 col-sm-6 col-xs-12 media media-sm-none media-xs-none">
                                        <div class="media-left">
                                            <div class="hexagon hexagon1">
                                                <div class="hexagon-in1">
                                                    <div class="hexagon-in2 hexagon-in2__col3"><span
                                                            class="fa-pencil"></span></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="media-body">
                                            <h4>Lorem ipsum dolor sit amet conse ctetur</h4>

                                            <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod
                                                tempor
                                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                                nostrud
                                                exercitation ullamco laboris nisi ut aliquip ex</p>
                                        </div>
                                    </li>
                                    <li class="col-md-6 col-sm-6 col-xs-12 media media-sm-none media-xs-none">
                                        <div class="media-left">
                                            <div class="hexagon hexagon1">
                                                <div class="hexagon-in1">
                                                    <div class="hexagon-in2 hexagon-in2__col4"><span
                                                            class="fa-shield"></span></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="media-body">
                                            <h4>Nisi ut aliquip ex ea commodo conseq</h4>

                                            <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod
                                                tempor
                                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                                nostrud
                                                exercitation ullamco laboris nisi ut aliquip ex</p>
                                        </div>
                                    </li>
                                    <li class="col-md-6 col-sm-6 col-xs-12 media media-sm-none media-xs-none">
                                        <div class="media-left">
                                            <div class="hexagon hexagon1">
                                                <div class="hexagon-in1">
                                                    <div class="hexagon-in2 hexagon-in2__col5"><span
                                                            class="fa-laptop"></span></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="media-body">
                                            <h4>Adipisicing elit, sed do eiusmod tempo</h4>

                                            <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod
                                                tempor
                                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                                nostrud
                                                exercitation ullamco laboris nisi ut aliquip ex</p>
                                        </div>
                                    </li>
                                    <li class="col-md-6 col-sm-6 col-xs-12 media media-sm-none media-xs-none">
                                        <div class="media-left">
                                            <div class="hexagon hexagon1">
                                                <div class="hexagon-in1">
                                                    <div class="hexagon-in2 hexagon-in2__col6"><span
                                                            class="fa-signal"></span></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="media-body">
                                            <h4>Sint occaecat cupidatat non</h4>

                                            <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod
                                                tempor
                                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                                nostrud
                                                exercitation ullamco laboris nisi ut aliquip ex</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </section>
                    </section>
                </section>
            </section>
            <section>
                <ul class="inline-list">
                    <li>
                        <img src="images/page-1_img03.jpg" alt=""/>

                        <h3>BIM/Architectural Detailing<br/>
                            Services</h3>
                        <a href="index.html#" class="btn btn-primary">Read More</a>
                    </li>
                    <li>
                        <img src="images/page-1_img04.jpg" alt=""/>

                        <h3>CAD<br/>
                            Drafting Services</h3>
                        <a href="index.html#" class="btn btn-primary">Read More</a>
                    </li>
                    <li>
                        <img src="images/page-1_img05.jpg" alt=""/>

                        <h3>3D Rendering/Modeling<br/>
                            Walkthroughs</h3>
                        <a href="index.html#" class="btn btn-primary">Read More</a>
                    </li>
                    <li>
                        <img src="images/page-1_img06.jpg" alt=""/>

                        <h3>CAD<br/>
                            Conversion Services</h3>
                        <a href="index.html#" class="btn btn-primary">Read More</a>
                    </li>
                </ul>
            </section>
            <section class="well1 well1__ins1 text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-7 col-xs-12 wow fadeInLeft">
                            <h2 class="off1">The highest possible
                                quality of work</h2>

                            <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet
                                conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                ex ea commodo consequat.</p>
                            <a class="btn btn-default btn-sm" href="index.html#">Read More</a>
                        </div>
                        <div class="col-md-4 col-sm-5 col-xs-12 wow fadeInRight" data-wow-delay="0.3s">
                            <img src="images/page-1_img07.png" alt=""/></div>
                    </div>
                </div>
            </section>
            <section class="well well__ins2 bg-primary text-center">
                <div class="container">
                    <h3>Our Latest Projects:</h3>

                    <div class="row">

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="hexagon">
                                <div class="hexagon-in1">
                                    <div class="hexagon-in2">
                                        <a class="thumb" data-gallery='1' href="images/page-1_img08_original.jpg">
                                            <img src="images/page-1_img08.jpg" alt=""/>
                                            <span class="thumb_overlay"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <h4>Excepteur sint occaecat cupidatat
                                non proident sunt</h4>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="hexagon">
                                <div class="hexagon-in1">
                                    <div class="hexagon-in2">
                                        <a class="thumb" data-gallery='1' href="images/page-1_img09_original.jpg">
                                            <img src="images/page-1_img09.jpg" alt=""/>
                                            <span class="thumb_overlay"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <h4>Excepteur sint occaecat cupidatat
                                non proident sunt</h4>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="hexagon">
                                <div class="hexagon-in1">
                                    <div class="hexagon-in2">
                                        <a class="thumb" data-gallery='1' href="images/page-1_img10_original.jpg">
                                            <img src="images/page-1_img10.jpg" alt=""/>
                                            <span class="thumb_overlay"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <h4>Excepteur sint occaecat cupidatat
                                non proident sunt</h4>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="hexagon">
                                <div class="hexagon-in1">
                                    <div class="hexagon-in2">
                                        <a class="thumb" data-gallery='1' href="images/page-1_img11_original.jpg">
                                            <img src="images/page-1_img11.jpg" alt=""/>
                                            <span class="thumb_overlay"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <h4>Excepteur sint occaecat cupidatat
                                non proident sunt</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="hexagon">
                                <div class="hexagon-in1">
                                    <div class="hexagon-in2">
                                        <a class="thumb" data-gallery='1' href="images/page-1_img12_original.jpg">
                                            <img src="images/page-1_img12.jpg" alt=""/>
                                            <span class="thumb_overlay"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <h4>Excepteur sint occaecat cupidatat
                                non proident sunt</h4>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="hexagon">
                                <div class="hexagon-in1">
                                    <div class="hexagon-in2">
                                        <a class="thumb" data-gallery='1' href="images/page-1_img13_original.jpg">
                                            <img src="images/page-1_img13.jpg" alt=""/>
                                            <span class="thumb_overlay"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <h4>Excepteur sint occaecat cupidatat
                                non proident sunt</h4>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="hexagon">
                                <div class="hexagon-in1">
                                    <div class="hexagon-in2">
                                        <a class="thumb" data-gallery='1' href="images/page-1_img14_original.jpg">
                                            <img src="images/page-1_img14.jpg" alt=""/>
                                            <span class="thumb_overlay"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <h4>Excepteur sint occaecat cupidatat
                                non proident sunt</h4>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="hexagon">
                                <div class="hexagon-in1">
                                    <div class="hexagon-in2">
                                        <a class="thumb" data-gallery='1' href="images/page-1_img15_original.jpg">
                                            <img src="images/page-1_img15.jpg" alt=""/>
                                            <span class="thumb_overlay"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <h4>Excepteur sint occaecat cupidatat
                                non proident sunt</h4>
                        </div>
                    </div>
                    <a class="btn btn-secondary btn-xl" href="index.html#">See all</a>
                </div>
            </section>
        </main> -->

        <!--========================================================
                                FOOTER
      =========================================================-->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <h4>About</h4>
                        <ul>
                            <li><a href="index.html#">Lorem ipsum dolor sit amet</a></li>
                            <li><a href="index.html#">Conse ctetur adipisicing</a></li>
                            <li><a href="index.html#">Elit sed do eiusmod tempor</a></li>
                            <li><a href="index.html#">Incididunt ut labore</a></li>
                            <li><a href="index.html#">Et dolore magna aliqua</a></li>
                            <li><a href="index.html#">Ut enim ad minim veniam</a></li>
                            <li><a href="index.html#">Quis nostrud exercitation</a></li>
                            <li><a href="index.html#">Ullamco laboris nisi</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <h4>Services</h4>
                        <ul>
                            <li><a href="index.html#">Conse ctetur adipisicing</a></li>
                            <li><a href="index.html#">Elit sed do eiusmod tempor</a></li>
                            <li><a href="index.html#">Incididunt ut labore</a></li>
                            <li><a href="index.html#">Et dolore magna aliqua</a></li>
                            <li><a href="index.html#">Ut enim ad minim veniam</a></li>
                            <li><a href="index.html#">Quis nostrud exercitation</a></li>
                            <li><a href="index.html#">Ullamco laboris nisi</a></li>
                        </ul>
                    </div>
                    <div class="col-md-offset-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="fb-page" data-href="https://www.facebook.com/TemplateMonster" data-width="280px"
                             data-height="300px" data-hide-cover="false" data-show-facepile="true"
                             data-show-posts="false">
                            <div class="fb-xfbml-parse-ignore">
                                <blockquote cite="https://www.facebook.com/TemplateMonster"><a
                                        href="https://www.facebook.com/TemplateMonster">TemplateMonster</a></blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    Drafting &#169; <span id="copyright-year"></span> |
                    <a href="index-5.html">Privacy Policy</a>
                    <!-- {%FOOTER_LINK} -->
                </div>
            </div>
        </footer>
    </div>
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url()?>public/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>public/js/tm-scripts.js"></script>
    <!-- </script> -->

    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-7078796-5']);
        _gaq.push(['_trackPageview']);
        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'https://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>
    </body>
    <!-- Google Tag Manager -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P9FT69"height="0" width="0" style="display:none;visibility:hidden"></iframe>
        </noscript>
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-P9FT69');
        </script>
    <!-- End Google Tag Manager -->
</html>