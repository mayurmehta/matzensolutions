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
    <script src="<?=base_url()?>public/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>public/js/tm-scripts.js"></script>
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