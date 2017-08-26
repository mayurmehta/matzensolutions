<div class="wrapper wrapper-content animated fadeInRight" id="sortable-view">

<div class="row" >
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

                        $check_var = $this->session->userdata('check_var');

                        if(isset($check_var) && !empty($check_var)){
                            foreach ($check_var as $key => $value) {
                                if($key == 'id' || $key == 'email' || $key == 'contactnumber' || $key == 'name'){
                                    $main_search = $value;
                                }
                                if($key == 'date_start'){
                                    $date_start = $value;
                                }
                                if($key == 'date_end'){
                                    $date_end = $value;
                                }
                                if($key == 'vid'){
                                    $vid = $value;
                                }
                                if($key == 'gender'){
                                    $gender = $value;
                                }
                                if($key == 'status'){
                                    $status = $value;
                                }
                                if($key == 'call_verification_status'){
                                    $call_verification_status = $value;
                                }
                                if($key == 'talentid'){
                                    $talentid = $value;
                                }
                                if($key == 'fresherorexperience'){
                                    $fresherorexperience = $value;
                                }
                                if($key == 'age_start'){
                                    $age_start = $value;
                                }
                                if($key == 'age_end'){
                                    $age_end = $value;
                                }
                                if($key == 'registration_step'){
                                    $registration_step = $value;
                                }
                                if($key == 'active'){
                                    $active = $value;
                                }
                                if($key == 'usertype'){
                                    $usertype = $value;
                                }
                            }
                        }

                        ?>
                        <div class="ibox-content">
                            <form role="form" method="post" action="<?=site_url('dashboard/set_filter_session')?>">
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
                                                <input type="text" class="input-sm form-control" placeholder="Start date" name="date_start" readonly="true" style="background-color: white;" value="<?php if(isset($date_start)){ echo $date_start; }?>" />
                                                <span class="input-group-addon white">to</span>
                                                <input type="text" class="input-sm form-control" placeholder="End date" name="date_end" readonly="true" style="background-color: white;" value="<?php if(isset($date_end)){ echo $date_end; }?>" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3 b-r">
                                        <div class="form-group"><label>VID</label>
                                            <select class="form-control m-b chosen-select" name="vid">
                                                <option value="">Select VID</option>
                                                <?php
                                                    foreach($vids as $key=>$val){
                                                        echo "<option value='$key' ".((isset($vid) && $vid != '' && $vid == $key) ? 'selected="selected"' : '' ).">$val</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group"><label>Gender</label>
                                            <select class="form-control m-b chosen-select" name="gender">
                                                <option value="">Select Gender</option>
                                                <?php
                                                    foreach($GLOBALS['GENDER'] as $key=>$val){
                                                        echo "<option value='$key' ".((isset($gender) && $gender != '' && $gender == $key) ? 'selected="selected"' : '' ).">$val</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 b-r">
                                        <div class="form-group"><label>Email Authentication Status</label>
                                            <select class="form-control m-b chosen-select" name="status">
                                                <option value="">Select Status</option>
                                                <?php
                                                    foreach($GLOBALS['USER_STATUS'] as $key=>$val){
                                                        echo "<option value='$key' ".((isset($status) && $status != '' && $status == $key) ? 'selected="selected"' : '' ).">$val</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group"><label>Call Verification Status</label>
                                            <select class="form-control m-b chosen-select" name="call_verification_status">
                                                <option value="">Select Status</option>
                                                <?php
                                                    foreach($GLOBALS['CALL_VARIFIED'] as $key=>$val){
                                                        echo "<option value='$key' ".((isset($call_verification_status) && $call_verification_status != '' && $call_verification_status == $key) ? 'selected="selected"' : '' ).">$val</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 b-r">                                        
                                        <div class="form-group"><label>Talent type</label>
                                            <select class="form-control m-b chosen-select" name="talentid">
                                                <option value="">Select Talent</option>
                                                <?php
                                                    foreach($talents as $key=>$val){
                                                        echo "<option value='$key' ".((isset($talentid) && $talentid != '' && $talentid == $key) ? 'selected="selected"' : '' ).">$val</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group"><label>Experiance</label>
                                            <select class="form-control m-b chosen-select" name="fresherorexperience">
                                                <option value="">Select Fresher/Experiance</option>
                                                <?php
                                                    foreach($GLOBALS['EXPERIENCE'] as $key=>$val){
                                                        echo "<option value='$key' ".((isset($fresherorexperience) && $fresherorexperience != '' && $fresherorexperience == $key) ? 'selected="selected"' : '' ).">$val</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group"><label>Profile Completion</label>
                                            <select class="form-control m-b chosen-select" name="registration_step">
                                                <option value="3">Completed Registration</option>
                                                <?php
                                                    foreach($GLOBALS['PROFILE_COMPLETION'] as $key=>$val){
                                                        echo "<option value='$key' ".((isset($registration_step) && $registration_step != '' && $registration_step == $key) ? 'selected="selected"' : '' ).">$val</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group"><label>Profile Status</label>
                                            <select class="form-control m-b chosen-select" name="active">
                                                <option value="1">Activated</option>
                                                <?php
                                                    foreach($GLOBALS['PROFILE_STATUS'] as $key=>$val){
                                                        echo "<option value='$key' ".((isset($active) && $active != '' && $active == $key) ? 'selected="selected"' : '' ).">$val</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-6"><h3 class="m-t-none m-b">User type</h3>
                                        <div class="form-group"><label>Artist / Producer</label>
                                            <select class="form-control m-b chosen-select" name="usertype">
                                                <option value="1">Artist</option>
                                                <?php
                                                    foreach($GLOBALS['USER_TYPE'] as $key=>$val){
                                                        echo "<option value='$key' ".((isset($usertype) && $usertype != '' && $usertype == $key) ? 'selected="selected"' : '' ).">$val</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div> 
                                    <div class="col-sm-6"><h3 class="m-t-none m-b">Age</h3>
                                        <div id="ionrange_1"></div>
                                        <input type="hidden" id="age_start" name="age_start" value="<?php if(isset($age_start) && $age_start != ''){ echo $age_start; } else { echo '0'; } ?>" class="form-control" />
                                        <input type="hidden" id="age_end" name="age_end" value="<?php if(isset($age_end) && $age_end != ''){ echo $age_end; } else { echo '100'; } ?>" class="form-control" />
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div>
                                            <button class="btn btn-primary" type="submit"><i class="fa fa-filter"></i>&nbsp;Filter</button>
                                            <button class="btn btn-default" id="reset_form" type="button"><i class="fa fa-eraser"></i>&nbsp;Reset</button>
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
                <!-- <div class="table-responsive" style="width: 100%;"> -->
                    <table class="table table-striped table-bordered table-hover dataTable-user dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="10%">User ID</th>
                                <th width="20%">Profile URL</th>
                                <th width="20%">Name</th>
                                <th width="15%">Email</th>
                                <th width="5%">Mobile</th>
                                <th width="5%">User type</th>
                                <th width="5%">PS</th>
                                <th width="5%">VID</th>
                                <th width="">Reg Date</th>
                                <th width="">Email Status</th>
                                <th width="">Call Verification Status</th>
                                <th width="">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th width="10%">User ID</th>
                                <th width="20%">Profile URL</th>
                                <th width="20%">Name</th>
                                <th width="15%">Email</th>
                                <th width="5%">Mobile</th>
                                <th width="5%">User type</th>
                                <th width="5%">PS</th>
                                <th width="5%">VID</th>
                                <th width="">Reg Date</th>
                                <th width="">Email Status</th>
                                <th width="">Call Verification Status</th>
                                <th width="">Action</th>
                                <!-- <th>User ID</th>
                                <th>Profile URL</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>VID</th>
                                <th>User type</th>
                                <th>PS</th>
                                <th>Mobile</th>
                                <th>Reg Date</th>
                                <th>Email Status</th>
                                <th>Call Verification Status</th>
                                <th>Action</th> -->
                            </tr>
                        </tfoot>
                    </table>
                <!-- </div> -->
            </div>
        </div>
    </div>
    </div>
</div>

<!-- Delete User Modal -->
<div class="modal fade" id="delete_user_madal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <h4 class="modal-title">Confirm</h4>
            </div>
            <div class="modal-body">
                <strong>Are you sure want to delete this user ??</strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button type="button" id="" class="btn btn-primary">Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- Profile Strength Display Modal -->
<div class="modal fade" id="show_profile_strength_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <h4 class="modal-title">Profile Strength</h4>
            </div>
            <div class="modal-body">
                <div class="form-group hide-form">
                    <div class="col-lg-10">
                        <select class="form-control m-b" id="country" required>
                            <option value="">Select Country</option>
                        </select>
                        <input type="text" placeholder="City" id="city" class="form-control" required />
                    </div>
                </div>
                <div class="ajax-loader sk-spinner sk-spinner-rotating-plane"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>