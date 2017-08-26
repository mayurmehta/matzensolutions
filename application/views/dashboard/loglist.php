<div class="wrapper wrapper-content animated fadeInRight">

<div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title" id="user_filter_div">
                            <h5>Filtration</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>

                        <?php

                        $log_var = $this->session->userdata('log_var');

                        if(isset($log_var) && !empty($log_var)){
                            foreach ($log_var as $key => $value) {
                                if($key == 'id' || $key == 'email' || $key == 'contactnumber' || $key == 'name'){
                                    $main_search = $value;
                                }
                                if($key == 'date_start'){
                                    $date_start = $value;
                                }
                                if($key == 'date_end'){
                                    $date_end = $value;
                                }
                            }
                        }

                        ?>
                        <div class="ibox-content">
                            <form role="form" method="post" action="<?=site_url('dashboard/set_filter_session_loglist')?>">
                                <div class="row">
                                    <div class="col-sm-6 b-r">
                                        <div class="form-group">
                                            <label>ID / ProfileURL / Name / Mobile / Email ID</label>
                                            <input type="text" name="main_search" placeholder="Please enter ID / ProfileURL / Name / Mobile / Email ID" class="form-control" value="<?php if(isset($main_search)){ echo $main_search; }?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group" id="data_5" class="form-inline">
                                            <label>Date</label>
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input type="text" class="input-sm form-control" placeholder="Start date" name="date_start" value="<?php if(isset($date_start)){ echo $date_start; }?>" />
                                                <span class="input-group-addon white">to</span>
                                                <input type="text" class="input-sm form-control" placeholder="End date" name="date_end" value="<?php if(isset($date_end)){ echo $date_end; }?>" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div>
                                            <button class="btn btn-primary" type="submit"><i class="fa fa-filter"></i>&nbsp;Filter</button>
                                            <button class="btn btn-default" id="reset_loglist_form" type="button"><i class="fa fa-eraser"></i>&nbsp;Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Manage Users</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">

            <table class="table table-striped table-bordered table-hover dataTable-loglist" >
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Login/Logout Logs</th>
                    <th>Registration Logs</th>
                    <th>Account Activity Logs</th>
                    <th>Profile Completion Logs</th>
                    <th>Showreel Add/Update Logs</th>
                    <th>Profile Updation Logs</th>
                    <th>Talent Add/Update Logs</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Login/Logout Logs</th>
                    <th>Registration Logs</th>
                    <th>Account Activity Logs</th>
                    <th>Profile Completion Logs</th>
                    <th>Showreel Add/Update Logs</th>
                    <th>Profile Updation Logs</th>
                    <th>Talent Add/Update Logs</th>
                    <th>Date</th>
                </tr>
            </tfoot>
        </table>

            </div>
        </div>
    </div>
    </div>
</div>