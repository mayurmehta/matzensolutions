<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MatchMyTalent | Dashboard</title>

    <link href="<?=base_url()?>public/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>public/css/font-awesome.css" rel="stylesheet">

    <?php if($url == 'users' || $url == 'user_update' || $url == 'loglist' 
            || $url == 'callinglist' || $url == 'languages' || $url == 'cities'
            || $url == 'administrators' || $url == 'add_admin' || $url == 'agile_board'
            || $url == 'view_task'){ ?>
            
        <!-- Data Tables -->
        <link href="<?=base_url()?>public/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
        <link href="<?=base_url()?>public/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
        <link href="<?=base_url()?>public/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
        
        <!-- Range Slider nouslider -->
        <!-- <link href="<?=base_url()?>public/css/plugins/nouslider/jquery.nouislider.css" rel="stylesheet"> -->

        <!-- Range Slider ionRangeSlider -->
        <link href="<?=base_url()?>public/css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
        <link href="<?=base_url()?>public/css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">

        <!-- Date picker -->
        <link href="<?=base_url()?>public/css/plugins/datapicker/datepicker3.css" rel="stylesheet">

        <!-- Date time picker -->
        <link href="<?=base_url()?>public/css/plugins/datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet">

        <!-- Chosen -->
        <link href="<?=base_url()?>public/css/plugins/chosen/chosen.css" rel="stylesheet">

        <!-- iCheck -->
        <link href="<?=base_url()?>public/css/plugins/iCheck/custom.css" rel="stylesheet">

        <!-- Lazy Load Spiner -->
        <link href="<?=base_url()?>public/css/plugins/lazyload/jquery.lazyloadxt.spinner.min.css" rel="stylesheet">

        <!-- Switchery -->
        <link href="<?=base_url()?>public/css/plugins/switchery/switchery.css" rel="stylesheet">

        <!-- Toastr style -->
        <link href="<?=base_url()?>public/css/plugins/toastr/toastr.min.css" rel="stylesheet">
        
    <?php } ?>


    <?php if($url == 'index'){ ?>
        <!-- Morris -->
        <link href="<?=base_url()?>public/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

        <!-- Gritter -->
        <link href="<?=base_url()?>public/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

        
    <?php } ?>

    <link href="<?=base_url()?>public/css/animate.css" rel="stylesheet">
    <link href="<?=base_url()?>public/css/style.css" rel="stylesheet">

</head>

<body>