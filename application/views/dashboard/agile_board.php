<div class="wrapper wrapper-content  animated fadeInRight">
    <div class="row">

        <div class="col-lg-3">
            <div class="ibox">
                <div class="ibox-content">
                    <h3>To-do</h3>
                    <p class="small"><i class="fa fa-hand-o-up"></i> Drag task between list</p>
                    <input type="hidden" value="1" class="status" />
                    <ul class="sortable-list connectList agile-list first_bar" data-bar-id="1">
                        <?php if(isset($tasks['todo'])) { 
                            foreach ($tasks['todo'] as $key => $value) { 
                                switch ($value['priority']) {
                                    case '1':
                                        $class = 'danger-element';
                                        break;
                                    case '2':
                                        $class = 'warning-element';
                                        break;
                                    case '3':
                                        $class = 'success-element';
                                        break;
                                    default:
                                        break;
                                }
                                $due_date = date('d/m/Y H:i',strtotime($value['due_date']));?>
                                <li class="<?php echo $class; ?> call_edit_model" data-id="<?php echo $value['id']; ?>">
                                    <?php if($value['reassigned'] > 0){ ?>
                                        <span class="reassigned_task label label-danger">Reassigned <?php echo $value['reassigned']; ?> Time</span><br>
                                    <?php } ?>
                                    <span data-toggle="modal" data-target="#delete_task_modal" class="close_task delete_task_button"><i class="fa fa-trash"></i></span>
                                    <span class="edit_task" onclick="edit_task('<?php echo $value['id']; ?>');"><i class="fa fa-pencil"></i></span>
                                    <span class="view_task" onclick="view_task('<?php echo $value['id']; ?>');"><i class="fa fa-eye"></i></span>
                                    <p><b><?php echo $value['task_title']; ?></b></p>
                                    <?php echo $value['task_description']; ?>
                                    <div class="agile-detail">
                                        <i class="fa fa-clock-o"></i> <?php echo $due_date; ?>
                                    </div>
                                </li>
                        <?php }
                        } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox">
                <div class="ibox-content">
                    <h3>In Progress</h3>
                    <p class="small"><i class="fa fa-hand-o-up"></i> Drag task between list</p>
                    <input type="hidden" value="2" class="status" />
                    <ul class="sortable-list connectList agile-list second_bar" data-bar-id="2">
                        <?php if(isset($tasks['progress'])) { 
                            foreach ($tasks['progress'] as $key => $value) { 
                                switch ($value['priority']) {
                                    case '1':
                                        $class = 'danger-element';
                                        break;
                                    case '2':
                                        $class = 'warning-element';
                                        break;
                                    case '3':
                                        $class = 'success-element';
                                        break;
                                    default:
                                        break;
                                }
                                $due_date = date('d/m/Y H:i',strtotime($value['due_date']));?>
                                <li class="<?php echo $class; ?> call_edit_model" data-id="<?php echo $value['id']; ?>">
                                    <?php if($value['reassigned'] > 0){ ?>
                                        <span class="reassigned_task label label-danger">Reassigned <?php echo $value['reassigned']; ?> Time</span><br>
                                    <?php } ?>
                                    <!-- <span data-toggle="modal" data-target="#delete_task_modal" class="close_task delete_task_button"><i class="fa fa-trash"></i></span> -->
                                    <span class="edit_task" onclick="edit_task('<?php echo $value['id']; ?>');"><i class="fa fa-pencil"></i></span>
                                    <span class="view_task" onclick="view_task('<?php echo $value['id']; ?>');"><i class="fa fa-eye"></i></span>
                                    <p><b><?php echo $value['task_title']; ?></b></p>
                                    <?php echo $value['task_description']; ?>
                                    <div class="agile-detail">
                                        <i class="fa fa-clock-o"></i> <?php echo $due_date; ?>
                                    </div>
                                </li>
                        <?php } 
                        } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox">
                <div class="ibox-content">
                    <h3>Testing</h3>
                    <p class="small"><i class="fa fa-hand-o-up"></i> Drag task between list</p>
                    <input type="hidden" value="3" class="status" />
                    <ul class="sortable-list connectList agile-list" data-bar-id="3">
                        <?php if(isset($tasks['testing'])) { 
                            foreach ($tasks['testing'] as $key => $value) { 
                                switch ($value['priority']) {
                                    case '1':
                                        $class = 'danger-element';
                                        break;
                                    case '2':
                                        $class = 'warning-element';
                                        break;
                                    case '3':
                                        $class = 'success-element';
                                        break;
                                    default:
                                        break;
                                }
                                $due_date = date('d/m/Y H:i',strtotime($value['due_date']));?>
                                <li class="<?php echo $class; ?> call_edit_model" data-id="<?php echo $value['id']; ?>">
                                    <!-- <span data-toggle="modal" data-target="#delete_task_modal" class="close_task delete_task_button"><i class="fa fa-trash"></i></span> -->
                                    <span class="edit_task" onclick="edit_task('<?php echo $value['id']; ?>');"><i class="fa fa-pencil"></i></span>
                                    <span class="view_task" onclick="view_task('<?php echo $value['id']; ?>');"><i class="fa fa-eye"></i></span>
                                    <p><b><?php echo $value['task_title']; ?></b></p>
                                    <?php echo $value['task_description']; ?>
                                    <div class="agile-detail">
                                        <i class="fa fa-clock-o"></i> <?php echo $due_date; ?>
                                    </div>
                                </li>
                        <?php } 
                        } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox">
                <div class="ibox-content">
                    <h3>Completed</h3>
                    <p class="small"><i class="fa fa-hand-o-up"></i> Drag task between list</p>
                    <input type="hidden" value="4" class="status" />
                    <ul class="sortable-list connectList agile-list" data-bar-id="4">
                        <?php if(isset($tasks['completed'])) { 
                            foreach ($tasks['completed'] as $key => $value) { 
                                switch ($value['priority']) {
                                    case '1':
                                        $class = 'danger-element';
                                        break;
                                    case '2':
                                        $class = 'warning-element';
                                        break;
                                    case '3':
                                        $class = 'success-element';
                                        break;
                                    default:
                                        break;
                                }
                                $due_date = date('d/m/Y H:i',strtotime($value['due_date']));?>
                                <li class="<?php echo $class; ?> call_edit_model" data-id="<?php echo $value['id']; ?>">
                                    <span data-toggle="modal" data-target="#delete_task_modal" class="close_task delete_task_button"><i class="fa fa-trash"></i></span>
                                    <span class="edit_task" onclick="edit_task('<?php echo $value['id']; ?>');"><i class="fa fa-pencil"></i></span>
                                    <span class="view_task" onclick="view_task('<?php echo $value['id']; ?>');"><i class="fa fa-eye"></i></span>
                                    <p><b><?php echo $value['task_title']; ?></b></p>
                                    <?php echo $value['task_description']; ?>
                                    <div class="agile-detail">
                                        <i class="fa fa-clock-o"></i> <?php echo $due_date; ?>
                                    </div>
                                </li>
                        <?php } 
                        } ?>
                    </ul>
                </div>
            </div>
        </div>


        

    </div>

</div>

<!-- Add new task modal -->
<div class="modal fade" id="add_task_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <form class="form-horizontal" id="form_add_task">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Task</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group hide-form">
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label>Task Title *</label>
                                <input type="text" placeholder="Task Title" name="task_title" id="task_title" class="form-control" required />
                            </div>

                            <div class="form-group">
                                <label>Task Description *</label>
                                <!-- <input type="text" placeholder="Task Description" name="task_description" id="task_description" class="form-control" required /> -->
                                <textarea placeholder="Task Description" name="task_description" id="task_description" class="form-control" required></textarea>
                            </div>

                            <div class="form-group">
                                <label>Priority *</label>
                                <div class="priority_box">
                                    <div class="radio-inline i-checks col-sm-2">
                                        <label style="padding-left: 0;"><input type="radio" value="1" data-p-id="1" name="priority" id="priority"><i></i>  High  </label>
                                    </div>
                                    <div class="radio-inline i-checks col-sm-2">
                                        <label style="padding-left: 0;"><input type="radio" value="2" data-p-id="2" checked name="priority" id="priority"><i></i>  Med  </label>
                                    </div>
                                    <div class="radio-inline i-checks col-sm-2">
                                        <label style="padding-left: 0;"><input type="radio" value="3" data-p-id="3" name="priority" id="priority"><i></i>  Low  </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Due Date *</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input name="due_date" id="due_date" type="text" class="form-control form_datetime" placeholder="Please Select Due Date" readonly="true" style="background-color: white;" required />
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Task Assignee *</label>
                                <select class="form-control m-b chosen-select" name="assignee" id="assignee" placeholder="Select Assignee" required>
                                    <?php
                                        foreach($members as $key=>$val){
                                            echo "<option value='$key'>$val</option>";
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Task Followers *</label>
                                <select class="form-control m-b chosen-select" name="followers" multiple id="followers" data-placeholder="Select Followers" required>
                                    <?php
                                        foreach($members as $key=>$val){
                                            echo "<option value='$key'>$val</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="ajax-loader sk-spinner sk-spinner-rotating-plane"></div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
                <input type="hidden" id="edit_task_id" value="" />
            </form>
        </div>
    </div>
</div>

<!-- Delete City Modal -->
<div class="modal fade" id="delete_task_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <h4 class="modal-title">Confirm</h4>
            </div>
            <div class="modal-body">
                <strong>Are you sure want to delete this Task ??</strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button type="button" id="" class="btn btn-primary">Delete</button>
            </div>
        </div>
    </div>
</div>