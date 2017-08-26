<?php include('dashboard/header.php'); ?>
    
    <div id="wrapper">
        
        <?php include('dashboard/sidebar_nav.php'); ?>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        
        <?php include('dashboard/top_header.php'); ?>

        </div>

        <?php if($url != 'index') { include('dashboard/breadcrumb.php'); } ?>
            
        <?=$body?>

        <?php include('dashboard/footer.php'); ?>
        
    </div>

<?php include('dashboard/footer_js.php'); ?>