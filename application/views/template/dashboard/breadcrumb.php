<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-6">
        <h2><?=$page_heading?></h2>
        <ol class="breadcrumb">
            <li>
                <a href="index-2.html">Home</a>
            </li>
            <li>
                <a>Tables</a>
            </li>
            <li class="active">
                <strong>Data Tables</strong>
            </li>
        </ol>
    </div>
    <?php if($url == 'agile_board'){ ?>
    <div class="col-lg-4">
        <div class="title-action">
            <a data-toggle="modal" data-target="#add_task_modal" id="add_task_button" href="javascript:void(0);" class="btn btn-primary">Add New Task</a>
        </div>
    </div>
    <?php } ?>
</div>