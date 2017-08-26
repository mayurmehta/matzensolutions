<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <?php 
                        $followers = $task_details['followers'];
                        $followers_arr = explode(',', $followers);
                        foreach ($followers_arr as $key => $value) {
                            $user_array = $this->user_model->get_admin_details($value, '1');
                            $followers_names[] = $user_array['fullname'];
                        }
                        if($task_details['priority']==1){$priority='High';$label='danger';}elseif($task_details['priority']==2){$priority='Medium';$label='warning';}else{$priority='Low';$label='info';};
                        if($task_details['status']==1){$status='To Do';}elseif($task_details['status']==2){$status='Progress';}elseif($task_details['status']==3){$status='Testing';}elseif($task_details['status']==4){$status='Completed';};
                    ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="task_display"><b>Task Title :</b> <?php echo ucfirst($task_details['task_title']); ?></div>
                            <div class="task_display"><b>Task Description :</b> <?php echo ucfirst($task_details['task_description']); ?></div>
                            <div class="task_display"><b>Task Creator :</b> <?php echo $creator_array['fullname']; ?></div>
                            <div class="task_display"><b>Task Assignee :</b> <?php echo $assignee_array['fullname']; ?></div>
                            <div class="task_display"><b>Task Followers :</b> <?php echo implode(', ', $followers_names); ?></div>
                            <div class="task_display"><b>Task Priority :</b> <span class="label label-<?php echo $label; ?>"><?php echo $priority; ?></span></div>
                        </div>
                        <div class="col-sm-6">
                            <div class="task_display"><b>Task Due date  :</b> <?php echo $due_date = date('d/m/Y H:i',strtotime($task_details['due_date'])); ?></div>
                            <div class="task_display"><b>Task Status :</b> <?php echo $status; ?></div>
                            <div class="task_display"><b>Task Reassigned :</b> <?php echo $task_details['reassigned'].' Times'; ?></div>
                            <div class="task_display"><b>Task Create Date :</b> <?php echo $cdate = date('d/m/Y H:i',strtotime($task_details['cdate'])); ?></div>
                            <div class="task_display"><b>Task Last Modified Date :</b> <?php echo $mdate = date('d/m/Y H:i',strtotime($task_details['mdate'])); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
                <div class="panel blank-panel">

                    <div class="panel-heading">
                        <div class="panel-options">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#tab-1">Comments</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-2">Activity</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="panel-body">

                        <div class="tab-content">

                            <div id="tab-1" class="col-lg-12 tab-pane active">

                                <div class="ibox chat-view">

                                    <div class="ibox-title">
                                        <span id="comment_count"><?php echo sizeof($comments); ?></span> Comments
                                    </div>


                                    <div class="ibox-content">

                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="comment-discussion comment_box">
                                                    <?php
                                                        if(sizeof($comments) > 0){ 
                                                            foreach ($comments as $key => $value){ 
                                                            $admin_details = $this->user_model->get_admin_details($value['admin_id'], '1');
                                                            ?>
                                                            <div class="chat-message">
                                                                <img class="message-avatar" src="<?=base_url()?>public/img/a7.jpg" alt="" >
                                                                <div class="message">
                                                                    <a class="message-author" href="#"><?php echo $admin_details["fullname"]; ?></a>
                                                                    <span class="message-date"><?php echo date('m/d/Y h:i',strtotime($value["cdate"])); ?></span>
                                                                    <span class="message-content">
                                                                        <?php echo $value["comment"]; ?>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        <?php } 
                                                        } else { ?>
                                                            <div class="chat-message">
                                                                No comments
                                                            </div>
                                                        <?php }?>
                                                </div>

                                            </div>
                                            

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="chat-message-form">
                                                    <div class="form-group">
                                                        <textarea class="form-control message-input" name="message" placeholder="Enter message text"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                        </div>

                            <div id="tab-2" class="col-lg-12 tab-pane">

                                <div class="ibox">
                                    <div class="ibox-title">
                                        <?php echo sizeof($activity); ?> Activities
                                    </div>
                                    <div class="ibox-content">

                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="comment-discussion" style="background: #fff;">

                                                    <div class="users-list">
                                                        <?php 
                                                            if(sizeof($activity) > 0){ 
                                                                foreach ($activity as $key => $value){
                                                                   $data = explode('::', $value); ?>
                                                                <div class="chat-user">
                                                                    <img class="chat-avatar" src="<?=base_url()?>public/img/a7.jpg" alt="" >
                                                                    <div class="chat-user-name">
                                                                        <a href="#"><?php echo trim($data[0]); ?></a>
                                                                        <span class="activity_time"><?php echo trim($data[1]); ?></span>
                                                                    </div>
                                                                </div>
                                                            <?php } 
                                                            } else { ?>
                                                                <div class="chat-user">
                                                                    No activities
                                                                </div>
                                                            <?php }?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        

    </div>

    <input type="hidden" id="taskid" value="<?php echo $taskid; ?>" />
</div>