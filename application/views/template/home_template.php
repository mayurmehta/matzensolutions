<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?=$page_title?></title>

    <link href="<?=base_url()?>public/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>public/css/font-awesome.css" rel="stylesheet">
    <link href="<?=base_url()?>public/css/animate.css" rel="stylesheet">
    <link href="<?=base_url()?>public/css/style.css" rel="stylesheet">
</head>
<body class="gray-bg">
    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>
                <!-- <h1 class="logo-name">MMT</h1> -->
                <h1 class="logo-name"><img src="<?=base_url()?>public/img/logo.jpg" /></h1>
            </div>
            <h3>Welcome to Match MY Talent</h3>
            <!-- <p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.</p> -->
            <?php echo $body; ?>
            <p class="m-t">
                <small>&copy; <?=date('Y');?> Match My Talent</small>
            </p>
        </div>
    </div>
    <!-- Mainly scripts -->
    <script src="<?=base_url()?>public/js/jquery-2.1.1.js"></script>
    <script src="<?=base_url()?>public/js/bootstrap.min.js"></script>
</body>
</html>