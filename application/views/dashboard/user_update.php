<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Update</h5>
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
                
                if(isset($user_data['createdate'])){
                    $reg_date = date('d/m/Y h:i A', strtotime($user_data['createdate']));
                }
                if(isset($user_data['birthdate'])){
                    $birth_date = date('d/m/Y', strtotime($user_data['birthdate']));
                }

                /*echo '<pre>';
                print_r($user_data);
                echo '</pre>';
                exit;*/

                ?>
                <div class="ibox-content">
                    <!-- onsubmit="return convert_talent_as_input();" -->
                    <form role="form" id="userupdateform" method="post" action="<?=site_url('dashboard/user_update/'.$user_data["id"])?>">
                        <div class="row">
                            <div class="col-sm-12">
                                <h1>Personal Info</h1>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-sm-6 b-r">
                                <div class="form-group">
                                    <label>Full name *</label>
                                    <input type="text" name="name" placeholder="Please enter Name" class="form-control" value="<?php if(isset($user_data['name'])){ echo $user_data['name']; }?>">
                                </div>                                
                                
                                <div class="form-group">
                                    <label>Mobile No. *</label>
                                    <input type="text" name="contactnumber" id="contactnumber" onkeypress="return isNumberKey(event);" maxlength="10" placeholder="Please enter Mobile No" class="form-control" value="<?php if(isset($user_data['contactnumber'])){ echo $user_data['contactnumber']; }?>">
                                </div>
                                <?php if($user_data['registration_step'] > 1){ ?>
                                    <?php if($user_data['profile_step'] == 4){ ?>
                                        <div class="form-group">
                                            <label>Profile URL *</label>
                                            <input type="text" name="profileurl" id="profileurl" placeholder="Please enter Profile URL" class="form-control" value="<?php if(isset($user_data['profileurl'])){ echo $user_data['profileurl']; }?>">
                                        </div>
                                    <?php } ?>
                                    <div class="form-group">
                                        <label>Gender *</label>
                                        <div>
                                            <div class="radio-inline i-checks">
                                                <label style="padding-left: 0;"><input type="radio" <?php if(isset($user_data['gender']) && $user_data['gender'] == 1){ echo 'checked="checked"'; } ?> value="1" name="gender"><i></i>  Male  </label>
                                            </div>
                                            <div class="radio-inline i-checks">
                                                <label style="padding-left: 0;"><input type="radio" <?php if(isset($user_data['gender']) && $user_data['gender'] == 2){ echo 'checked="checked"'; } ?> value="2" name="gender"><i></i>  Female  </label>
                                            </div>
                                            <div class="radio-inline i-checks">
                                                <label style="padding-left: 0;"><input type="radio" <?php if(isset($user_data['gender']) && $user_data['gender'] == 3){ echo 'checked="checked"'; } ?> value="3" name="gender"><i></i>  Other  </label>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email ID *</label>
                                    <input type="text" name="email" id="email" placeholder="Please enter Email ID" class="form-control" value="<?php if(isset($user_data['email'])){ echo $user_data['email']; }?>">
                                </div>
                                <div class="form-group" id="data_1" class="form-inline">
                                    <label>Registration Date</label>
                                    <input type="text" placeholder="Please enter Email ID" readonly="true" style="background-color: white;" class="form-control" value="<?php if(isset($reg_date)){ echo $reg_date; }?>">
                                </div>
                                <?php if($user_data['registration_step'] > 1){ ?>
                                    <div class="form-group" id="data_1" class="form-inline">
                                        <label>Birthdate *</label>
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input name="birthdate" type="text" class="form-control" readonly="true" style="background-color: white;" value="<?php if(isset($birth_date)){ echo $birth_date; }?>">
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <?php if($user_data['registration_step'] >= 2){ ?>

                            <hr>

                            <div class="row">
                                <div class="col-sm-12">
                                    <h1>Living Info</h1>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-sm-6 b-r">
                                    <div class="form-group">
                                        <label>Living Country *</label>
                                        <select class="form-control m-b chosen-select" id="countrycode"  name="countrycode">
                                            <option value="">Select Country</option>
                                            <?php
                                                foreach($countries as $key=>$val){
                                                    echo "<option value='$key' ".((isset($user_data['countrycode']) && $user_data['countrycode'] != '' && $user_data['countrycode'] == $key) ? 'selected="selected"' : '' ).">$val</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Native Country *</label>
                                        <select class="form-control m-b chosen-select" id="native_country" name="native_country">
                                            <option value="">Select Country</option>
                                            <?php
                                                foreach($countries as $key=>$val){
                                                    echo "<option value='$key' ".((isset($user_data['native_country']) && $user_data['native_country'] != '' && $user_data['native_country'] == $key) ? 'selected="selected"' : '' ).">$val</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Ready to work in another cities *</label>
                                        <span id="errNm1"></span>
                                        <div class="checkbox i-checks"><label style="padding-left: 0;"><input type="checkbox" id="ready_work_city_checkbox" name="ready_work_city_checkbox" value=""> <i></i> Ready to work anywhere in Country </label></div>
                                        <select data-placeholder="Select Cities" class="form-control m-b chosen-select" multiple id="ready_work_city" name="ready_work_city[]" data-error="#errNm1">
                                            <?php
                                                foreach($home_cities as $key=>$val){
                                                    echo "<option value='$key' ".((isset($ready_cities) && $ready_cities != '' && in_array($key, $ready_cities)) ? 'selected="selected"' : '' ).">$val</option>";
                                                }
                                            ?>
                                        </select>
                                        <input id="ready_cities_is_array" type="hidden" value="<?php echo $ready_cities_is_array; ?>" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Living City *</label>
                                        <?php $living_city = $user_data['living_city']; ?>
                                        <select class="form-control m-b chosen-select" name="living_city" id="living_city">
                                            <option value="">Select City</option>
                                            <?php
                                                foreach($home_cities as $key=>$val){
                                                    echo "<option value='$key' ".((isset($living_city) && $living_city != '' && $living_city == $key) ? 'selected="selected"' : '' ).">$val</option>";
                                                }
                                            ?>
                                        </select>
                                        <!-- <input type="text" name="living_city" placeholder="Please enter City Name" class="form-control" value="<?php if(isset($user_data['living_city'])){ echo $user_data['living_city']; }?>"> -->
                                    </div>
                                    <div class="form-group">
                                        <label>Native City *</label>
                                        <?php $native_city = $user_data['native_city']; ?>
                                        <select class="form-control m-b chosen-select" id="native_city" name="native_city">
                                            <option value="">Select City</option>
                                            <?php
                                                foreach($native_cities as $key=>$val){
                                                    echo "<option value='$key' ".((isset($native_city) && $native_city != '' && $native_city == $key) ? 'selected="selected"' : '' ).">$val</option>";
                                                }
                                            ?>
                                        </select>
                                        <!-- <input type="text" name="native_city" placeholder="Please enter Native Name" class="form-control" value="<?php if(isset($user_data['native_city'])){ echo $user_data['native_city']; }?>"> -->
                                    </div>
                                    <!-- <div class="form-group">
                                        <label>Ready to work in another country *</label>
                                        <span id="errNm1"></span>
                                        <div class="checkbox i-checks"><label style="padding-left: 0;"><input type="checkbox" id="ready_work_city_checkbox" name="ready_work_city_checkbox" value=""> <i></i> Ready to work anywhere in Country </label></div>
                                        <select data-placeholder="Select Cities" class="form-control m-b chosen-select" multiple id="ready_work_city" name="ready_work_city[]" data-error="#errNm1">
                                            <?php
                                                foreach($home_cities as $key=>$val){
                                                    echo "<option value='$key' ".((isset($ready_cities) && $ready_cities != '' && in_array($key, $ready_cities)) ? 'selected="selected"' : '' ).">$val</option>";
                                                }
                                            ?>
                                        </select>
                                        <input id="ready_cities_is_array" type="hidden" value="<?php echo $ready_cities_is_array; ?>" />
                                    </div> -->
                                </div>
                            </div>

                        <?php } ?>

                        <?php if($user_data['registration_step'] == 3){

                                if(isset($pri_talent) && !empty($pri_talent)){ ?>

                                <div class="main_talent lazy" style="position: relative;">
                                    <div class="ajax_loader">
                                        <div class="alignment_loader"><img src="<?=base_url()?>public/img/ajax_loader.gif"></div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h1>Primary Talent</h1>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-sm-6 b-r">
                                            <div class="form-group">
                                                <label>Talent Type *</label>
                                                <?php 
                                                    $talent_id = $pri_talent['talentid'];
                                                    $array_to_disable_talent1 = array();
                                                    if(isset($sec_talent['talentid'])){
                                                        $array_to_disable_talent1[] = $sec_talent['talentid'];
                                                    }
                                                    if(isset($third_talent['talentid'])){
                                                        $array_to_disable_talent1[] = $third_talent['talentid'];
                                                    }
                                                ?>
                                                <select class="form-control m-b chosen-select" name="pri[talentid]" id="talentid1">
                                                    <option value="">Select Talent</option>
                                                    <?php
                                                        foreach($all_talents_list as $key=>$val){
                                                            echo "<option value='$key' ".((isset($talent_id) && $talent_id != '' && $talent_id == $key) ? 'selected="selected"' : '' )." ".(isset($array_to_disable_talent1) && !empty($array_to_disable_talent1) && in_array($key, $array_to_disable_talent1) ? 'disabled' : '' ).">$val</option>";
                                                        }
                                                    ?>
                                                </select>
                                                <input type="hidden" id="talent_priority" value="1" />
                                                <input type="hidden" id="current_talent" value="<?php if(isset($talent_id) && !empty($talent_id)) { echo $talent_id; }?>" />
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Experienced / Fresher *</label>
                                                <div>
                                                    <div class="radio-inline i-checks col-sm-4">
                                                        <label style="padding-left: 0;"><input type="radio" <?php if(isset($pri_talent['fresherorexperience']) && $pri_talent['fresherorexperience'] == 1){ echo 'checked="checked"'; } ?> value="1" data-error="#fresherorexp_valid" name="pri[fresherorexperience]" id="fresher1"><i></i>  Fresher  </label>
                                                    </div>
                                                    <div class="radio-inline i-checks col-sm-4">
                                                        <label style="padding-left: 0;"><input type="radio" <?php if(isset($pri_talent['fresherorexperience']) && $pri_talent['fresherorexperience'] == 2){ echo 'checked="checked"'; } ?> value="2" data-error="#fresherorexp_valid" name="pri[fresherorexperience]" id="experianced1"><i></i>  Experienced  </label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <span id="fresherorexp_valid"></span>
                                        </div>
                                    </div>

                                    <div id="fresher_div">

                                        <div class="row">
                                            <div class="col-md-6 b-r">
                                                <div class="form-group">
                                                    <label>Trained At</label>
                                                    <input type="text" id="trainedat1" name="pri[trainedat]" data-error="#trained_type" placeholder="Name of the Institute" class="form-control" value="<?php if(isset($pri_talent['trainedat']) && !empty($pri_talent['trainedat'])) { echo $pri_talent['trainedat']; } ?>">
                                                    <span id="trained_type"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Trained By</label>
                                                    <input type="text" id="trainedby1" name="pri[trainedby]" data-error="#trained_type" placeholder="Name of the Educator/Trainer" class="form-control" value="<?php if(isset($pri_talent['trainedby']) && !empty($pri_talent['trainedby'])) { echo $pri_talent['trainedby']; } ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" id="training_exp">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Training Experience *</label>
                                                    <div>
                                                        <div class="radio-inline i-checks">
                                                            <label style="padding-left: 0;"><input type="radio" data-name="training_status" id="goingon1" data-error="#training_status_type" value="1" name="pri[training_status]"><i></i>  On Going  </label>
                                                        </div>

                                                        <div class="radio-inline i-checks">
                                                            <label style="padding-left: 0;"><input type="radio" data-name="training_status" id="completed1" data-error="#training_status_type" value="2" name="pri[training_status]"><i></i>  Completed  </label>
                                                        </div>

                                                    </div>
                                                    <span id="training_status_type"></span>
                                                </div>
                                                <div id="from_date">
                                                    <?php $fromdate = date('d/m/Y', strtotime($pri_talent['fromdate'])); ?>
                                                    <div class="form-group" id="data_1" class="form-inline">
                                                        <label>From Date *</label>
                                                        <div>
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input name="pri[fromdate]" value="<?php if(!empty($fromdate) && $fromdate != '01/01/1970') { echo $fromdate; } ?>" data-error="#fromdate" id="from_date_vlue" placeholder="From date" type="text" class="form-control" readonly="true" style="background-color: white;">
                                                            </div>
                                                            <span id="fromdate"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="to_date">
                                                    <?php $todate = date('d/m/Y', strtotime($pri_talent['todate'])); ?>
                                                    <div class="form-group" id="data_1" class="form-inline">
                                                        <label>To Date *</label>
                                                        <div>
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input name="pri[todate]" value="<?php if(!empty($todate) && $todate != '01/01/1970') { echo $todate; } ?>" data-error="#todate" id="to_date_vlue" placeholder="To date" type="text" class="form-control" readonly="true" style="background-color: white;" value="">
                                                            </div>
                                                            <span id="todate"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div id="experianced_div">

                                        <div class="row">
                                            <div class="col-sm-6 b-r">
                                                <div class="form-group">
                                                    <label>No. of Years *</label>
                                                    <?php $nofyears = $pri_talent['nofyears']; ?>
                                                    <select class="form-control m-b chosen-select" name="pri[nofyears]" data-error="#noofyears_valid" id="nofyears1">
                                                        <option value="0">Select No. of Years</option>
                                                        <?php
                                                            for ($i=1; $i < 100; $i++) { 
                                                                echo "<option value='$i' ".((isset($nofyears) && $nofyears != '' && $nofyears == $i) ? 'selected="selected"' : '' ).">$i</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                    <span id="noofyears_valid"></span>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>No. of Projects *</label>
                                                    <?php $nofprojects = $pri_talent['nofprojects']; ?>
                                                    <select class="form-control m-b chosen-select" name="pri[nofprojects]" data-error="#noofyears_valid" id="nofprojects1">
                                                        <option value="0">Select No. of Projects</option>
                                                        <?php
                                                            for ($i=1; $i < 100; $i++) { 
                                                                echo "<option value='$i' ".((isset($nofprojects) && $nofprojects != '' && $nofprojects == $i) ? 'selected="selected"' : '' ).">$i</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row talent1" id="specialization_div">
                                        <div class="col-sm-3 b-r">
                                            <div class="form-group">
                                                <label>Specializations *</label>
                                                <?php $pri_talent_specializations = $this->user_model->get_specializations_by_talid($pri_talent['talentid']); ?>
                                                <div class="form-control specialization_talent_box">
                                                    <?php
                                                        foreach ($pri_talent_specializations as $key => $value) { ?>
                                                            <div class="checkbox i-checks"><label style="padding-left:0;"><input type="checkbox" id="select_specialization_<?php echo $value['id']; ?>" data-error="#errNm2" name="specialization[]" value="<?php echo trim($value['name']); ?>"> <i></i> <?php echo "&nbsp;&nbsp;&nbsp;".$value['name']; ?></label></div>
                                                    <?php } ?>
                                                </div>
                                                <span id="errNm2"></span>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="specialization_name">&nbsp;</label>
                                                <input type="hidden" id="specialization_box_id" value="" />
                                                <div class="form-control specification_talent_box" id="specification_box_1"></div>
                                                <span id="specification_valid_1"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="specialization_name">&nbsp;</label>
                                                <input type="hidden" id="specialization_box_id" value="" />
                                                <div class="form-control specification_talent_box" id="specification_box_2"></div>
                                                <span id="specification_valid_2"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="specialization_name">&nbsp;</label>
                                                <input type="hidden" id="specialization_box_id" value="" />
                                                <div class="form-control specification_talent_box" id="specification_box_3"></div>
                                                <span id="specification_valid_3"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="specialization_name">&nbsp;</label>
                                                <input type="hidden" id="specialization_box_id" value="" />
                                                <div class="form-control specification_talent_box" id="specification_box_4"></div>
                                                <span id="specification_valid_4"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="specialization_name">&nbsp;</label>
                                                <input type="hidden" id="specialization_box_id" value="" />
                                                <div class="form-control specification_talent_box" id="specification_box_5"></div>
                                                <span id="specification_valid_5"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 selection_list">
                                            <h3></h3>
                                        </div>
                                    </div>

                                    <?php $pri_spec_interest = ((isset($pri_talent['newinterest'])) ? $pri_talent['newinterest'] : '' )?>

                                    <div id="interest">
                                        <div class="row">
                                            <div class="col-sm-6 b-r">
                                                <div class="form-group">
                                                    <label>Interest Specialization</label>
                                                    <select class="form-control m-b chosen-select" name="pri[newinterest]" data-error="#newinterest_valid" onchange="get_interest_specifications(this.value,this);" id="newinterest">
                                                        <option value="">Select Specialization</option>
                                                        <?php
                                                            foreach ($pri_talent_specializations as $key => $value) {
                                                                echo "<option value='".$value['id']."' ".((isset($pri_spec_interest) && $pri_spec_interest != '' && $pri_spec_interest == $value['id']) ? 'selected="selected"' : '' ).">".$value['name']."</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <span id="interest1"></span>

                                            <div class="col-sm-6" id="interest_specification">
                                                <div class="form-group">
                                                    <label>Interest Specification</label>
                                                    <select class="form-control m-b chosen-select" name="pri[spnewinterest]" data-error="#spnewinterest_valid" id="spnewinterest">
                                                        <option value="">Select Specification</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" id="add_intrest">
                                        <div class="col-sm-12">
                                            <span><h4>Willing to explore new Specializations of but not experienced yet?</h4></span><button type="button" id="interest_button1" class="btn btn-w-m btn-info">ADD AN INTEREST</button>
                                        </div>
                                    </div>

                                    <!-- <div class="talent1"></div> -->
                                </div>
                        <?php   } 

                        if(isset($sec_talent) && !empty($sec_talent)){ ?>

                                <div class="main_talent lazy" style="position: relative;">
                                    <div class="ajax_loader">
                                        <div class="alignment_loader"><img src="<?=base_url()?>public/img/ajax_loader.gif"></div>
                                    </div>
                                    
                                    <hr>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h1>Secondary Talent</h1>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-sm-6 b-r">
                                            <div class="form-group">
                                                <label>Talent Type *</label>
                                                <?php 
                                                    $talent_id = $sec_talent['talentid'];
                                                    $array_to_disable_talent2 = array();
                                                    if(isset($pri_talent['talentid'])){
                                                        $array_to_disable_talent2[] = $pri_talent['talentid'];
                                                    }
                                                    if(isset($third_talent['talentid'])){
                                                        $array_to_disable_talent2[] = $third_talent['talentid'];
                                                    }
                                                ?>
                                                <select class="form-control m-b chosen-select" name="sec[talentid]" id="talentid2">
                                                    <option value="">Select Talent</option>
                                                    <?php
                                                        foreach($all_talents_list as $key=>$val){
                                                            echo "<option value='$key' ".((isset($talent_id) && $talent_id != '' && $talent_id == $key) ? 'selected="selected"' : '' )." ".(isset($array_to_disable_talent2) && !empty($array_to_disable_talent2) && in_array($key, $array_to_disable_talent2) ? 'disabled' : '' ).">$val</option>";
                                                        }
                                                    ?>
                                                </select>
                                                <input type="hidden" id="talent_priority" value="2" />
                                                <input type="hidden" id="current_talent" value="<?php if(isset($talent_id) && !empty($talent_id)) { echo $talent_id; }?>" />
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Experienced / Fresher *</label>
                                                <div>
                                                    <div class="radio-inline i-checks col-sm-4">
                                                        <label style="padding-left: 0;"><input type="radio" <?php if(isset($sec_talent['fresherorexperience']) && $sec_talent['fresherorexperience'] == 1){ echo 'checked="checked"'; } ?> value="1" data-error="#fresherorexp_valid" name="sec[fresherorexperience]" id="fresher2"><i></i>  Fresher  </label>
                                                    </div>
                                                    <div class="radio-inline i-checks col-sm-4">
                                                        <label style="padding-left: 0;"><input type="radio" <?php if(isset($sec_talent['fresherorexperience']) && $sec_talent['fresherorexperience'] == 2){ echo 'checked="checked"'; } ?> value="2" data-error="#fresherorexp_valid" name="sec[fresherorexperience]" id="experianced2"><i></i>  Experienced  </label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <span id="fresherorexp_valid"></span>
                                        </div>
                                    </div>

                                    <div id="fresher_div">

                                        <div class="row">
                                            <div class="col-md-6 b-r">
                                                <div class="form-group">
                                                    <label>Trained At</label>
                                                    <input type="text" id="trainedat2" name="sec[trainedat]" data-error="#trained_type" placeholder="Name of the Institute" class="form-control" value="<?php if(isset($sec_talent['trainedat']) && !empty($sec_talent['trainedat'])) { echo $sec_talent['trainedat']; } ?>">
                                                    <span id="trained_type"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Trained By</label>
                                                    <input type="text" id="trainedby2" name="sec[trainedby]" data-error="#trained_type" placeholder="Name of the Educator/Trainer" class="form-control" value="<?php if(isset($sec_talent['trainedby']) && !empty($sec_talent['trainedby'])) { echo $sec_talent['trainedby']; } ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" id="training_exp">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Training Experience *</label>
                                                    <div>
                                                        <div class="radio-inline i-checks">
                                                            <label style="padding-left: 0;"><input type="radio" data-name="training_status" id="goingon2" data-error="#training_status_type" value="1" name="sec[training_status]"><i></i>  On Going  </label>
                                                        </div>

                                                        <div class="radio-inline i-checks">
                                                            <label style="padding-left: 0;"><input type="radio" data-name="training_status" id="completed2" data-error="#training_status_type" value="2" name="sec[training_status]"><i></i>  Completed  </label>
                                                        </div>

                                                    </div>
                                                    <span id="training_status_type"></span>
                                                </div>
                                                <div id="from_date">
                                                    <?php $fromdate = date('d/m/Y', strtotime($sec_talent['fromdate'])); ?>
                                                    <div class="form-group" id="data_1" class="form-inline">
                                                        <label>From Date *</label>
                                                        <div>
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input name="sec[fromdate]" value="<?php if(!empty($fromdate) && $fromdate != '01/01/1970') { echo $fromdate; } ?>" data-error="#fromdate" id="from_date_vlue" placeholder="From date" type="text" class="form-control" readonly="true" style="background-color: white;">
                                                            </div>
                                                            <span id="fromdate"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="to_date">
                                                    <?php $todate = date('d/m/Y', strtotime($sec_talent['todate'])); ?>
                                                    <div class="form-group" id="data_1" class="form-inline">
                                                        <label>To Date *</label>
                                                        <div>
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input name="sec[todate]" value="<?php if(!empty($todate) && $todate != '01/01/1970') { echo $todate; } ?>" data-error="#todate" id="to_date_vlue" placeholder="To date" type="text" class="form-control" readonly="true" style="background-color: white;" value="">
                                                            </div>
                                                            <span id="todate"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div id="experianced_div">

                                        <div class="row">
                                            <div class="col-sm-6 b-r">
                                                <div class="form-group">
                                                    <label>No. of Years *</label>
                                                    <?php $nofyears = $sec_talent['nofyears']; ?>
                                                    <select class="form-control m-b chosen-select" name="sec[nofyears]" data-error="#noofyears_valid" id="nofyears2">
                                                        <option value="0">Select No. of Years</option>
                                                        <?php
                                                            for ($i=1; $i < 100; $i++) { 
                                                                echo "<option value='$i' ".((isset($nofyears) && $nofyears != '' && $nofyears == $i) ? 'selected="selected"' : '' ).">$i</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                    <span id="noofyears_valid"></span>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>No. of Projects *</label>
                                                    <?php $nofprojects = $sec_talent['nofprojects']; ?>
                                                    <select class="form-control m-b chosen-select" name="sec[nofprojects]" data-error="#noofyears_valid" id="nofprojects2">
                                                        <option value="0">Select No. of Projects</option>
                                                        <?php
                                                            for ($i=1; $i < 100; $i++) { 
                                                                echo "<option value='$i' ".((isset($nofprojects) && $nofprojects != '' && $nofprojects == $i) ? 'selected="selected"' : '' ).">$i</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row talent2" id="specialization_div">
                                        <div class="col-sm-3 b-r">
                                            <div class="form-group">
                                                <label>Specializations *</label>
                                                <?php $sec_talent_specializations = $this->user_model->get_specializations_by_talid($sec_talent['talentid']); ?>
                                                <div class="form-control specialization_talent_box">
                                                    <?php
                                                        foreach ($sec_talent_specializations as $key => $value) { ?>
                                                            <div class="checkbox i-checks"><label style="padding-left:0;"><input type="checkbox" onclick="return validator.element(this);" id="select_specialization_<?php echo $value['id']; ?>" data-error="#errNm2" name="specialization_2[]" value="<?php echo trim($value['name']); ?>"> <i></i> <?php echo "&nbsp;&nbsp;&nbsp;".$value['name']; ?></label></div>
                                                    <?php } ?>
                                                </div>
                                                <span id="errNm2"></span>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="specialization_name">&nbsp;</label>
                                                <input type="hidden" id="specialization_box_id" value="" />
                                                <div class="form-control specification_talent_box" id="specification_box_1"></div>
                                                <span id="specification_valid_1"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="specialization_name">&nbsp;</label>
                                                <input type="hidden" id="specialization_box_id" value="" />
                                                <div class="form-control specification_talent_box" id="specification_box_2"></div>
                                                <span id="specification_valid_2"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="specialization_name">&nbsp;</label>
                                                <input type="hidden" id="specialization_box_id" value="" />
                                                <div class="form-control specification_talent_box" id="specification_box_3"></div>
                                                <span id="specification_valid_3"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="specialization_name">&nbsp;</label>
                                                <input type="hidden" id="specialization_box_id" value="" />
                                                <div class="form-control specification_talent_box" id="specification_box_4"></div>
                                                <span id="specification_valid_4"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="specialization_name">&nbsp;</label>
                                                <input type="hidden" id="specialization_box_id" value="" />
                                                <div class="form-control specification_talent_box" id="specification_box_5"></div>
                                                <span id="specification_valid_5"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 selection_list">
                                            <h3></h3>
                                        </div>
                                    </div>

                                    <?php $sec_spec_interest = ((isset($sec_talent['newinterest'])) ? $sec_talent['newinterest'] : '' )?>

                                    <div id="interest">
                                        <div class="row">
                                            <div class="col-sm-6 b-r">
                                                <div class="form-group">
                                                    <label>Interest Specialization</label>
                                                    <select class="form-control m-b chosen-select" name="sec[newinterest]" data-error="#newinterest_valid" onchange="get_interest_specifications(this.value,this);" id="newinterest">
                                                        <option value="">Select Specialization</option>
                                                        <?php
                                                            foreach ($sec_talent_specializations as $key => $value) {
                                                                echo "<option value='".$value['id']."' ".((isset($sec_spec_interest) && $sec_spec_interest != '' && $sec_spec_interest == $value['id']) ? 'selected="selected"' : '' ).">".$value['name']."</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <span id="interest2"></span>

                                            <div class="col-sm-6" id="interest_specification">
                                                <div class="form-group">
                                                    <label>Interest Specification</label>
                                                    <select class="form-control m-b chosen-select" name="sec[spnewinterest]" data-error="#spnewinterest_valid" id="spnewinterest">
                                                        <option value="">Select Specification</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" id="add_intrest">
                                        <div class="col-sm-12">
                                            <span><h4>Willing to explore new Specializations of but not experienced yet?</h4></span><button type="button" id="interest_button2" class="btn btn-w-m btn-info">ADD AN INTEREST</button>
                                        </div>
                                    </div>

                                    <!-- <div class="talent2"></div> -->

                                </div>
                        <?php   }

                        if(isset($third_talent) && !empty($third_talent)){ ?>

                                <div class="main_talent lazy" style="position: relative;">
                                    <div class="ajax_loader">
                                        <div class="alignment_loader"><img src="<?=base_url()?>public/img/ajax_loader.gif"></div>
                                    </div>
                                    
                                    <hr>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h1>Third Talent</h1>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-sm-6 b-r">
                                            <div class="form-group">
                                                <label>Talent Type *</label>
                                                <?php 
                                                    $talent_id = $third_talent['talentid'];
                                                    $array_to_disable_talent3 = array();
                                                    if(isset($pri_talent['talentid'])){
                                                        $array_to_disable_talent3[] = $pri_talent['talentid'];
                                                    }
                                                    if(isset($sec_talent['talentid'])){
                                                        $array_to_disable_talent3[] = $sec_talent['talentid'];
                                                    }
                                                ?>
                                                <select class="form-control m-b chosen-select" name="third[talentid]" id="talentid3">
                                                    <option value="">Select Talent</option>
                                                    <?php
                                                        foreach($all_talents_list as $key=>$val){
                                                            echo "<option value='$key' ".((isset($talent_id) && $talent_id != '' && $talent_id == $key) ? 'selected="selected"' : '' )." ".(isset($array_to_disable_talent3) && !empty($array_to_disable_talent3) && in_array($key, $array_to_disable_talent3) ? 'disabled' : '' ).">$val</option>";
                                                        }
                                                    ?>
                                                </select>
                                                <input type="hidden" id="talent_priority" value="3" />
                                                <input type="hidden" id="current_talent" value="<?php if(isset($talent_id) && !empty($talent_id)) { echo $talent_id; }?>" />
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Experienced / Fresher *</label>
                                                <div>
                                                    <div class="radio-inline i-checks col-sm-4">
                                                        <label style="padding-left: 0;"><input type="radio" <?php if(isset($third_talent['fresherorexperience']) && $third_talent['fresherorexperience'] == 1){ echo 'checked="checked"'; } ?> value="1" data-error="#fresherorexp_valid" name="third[fresherorexperience]" id="fresher3"><i></i>  Fresher  </label>
                                                    </div>
                                                    <div class="radio-inline i-checks col-sm-4">
                                                        <label style="padding-left: 0;"><input type="radio" <?php if(isset($third_talent['fresherorexperience']) && $third_talent['fresherorexperience'] == 2){ echo 'checked="checked"'; } ?> value="2" data-error="#fresherorexp_valid" name="third[fresherorexperience]" id="experianced3"><i></i>  Experienced  </label>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <span id="fresherorexp_valid"></span>
                                        </div>
                                    </div>

                                    <div id="fresher_div">

                                        <div class="row">
                                            <div class="col-md-6 b-r">
                                                <div class="form-group">
                                                    <label>Trained At</label>
                                                    <input type="text" id="trainedat3" name="third[trainedat]" data-error="#trained_type" placeholder="Name of the Institute" class="form-control" value="<?php if(isset($third_talent['trainedat']) && !empty($third_talent['trainedat'])) { echo $third_talent['trainedat']; } ?>">
                                                    <span id="trained_type"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Trained By</label>
                                                    <input type="text" id="trainedby3" name="third[trainedby]" data-error="#trained_type" placeholder="Name of the Educator/Trainer" class="form-control" value="<?php if(isset($third_talent['trainedby']) && !empty($third_talent['trainedby'])) { echo $third_talent['trainedby']; } ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" id="training_exp">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Training Experience *</label>
                                                    <div>
                                                        <div class="radio-inline i-checks">
                                                            <label style="padding-left: 0;"><input type="radio" data-name="training_status" id="goingon3" data-error="#training_status_type" value="1" name="third[training_status]"><i></i>  On Going  </label>
                                                        </div>

                                                        <div class="radio-inline i-checks">
                                                            <label style="padding-left: 0;"><input type="radio" data-name="training_status" id="completed3" data-error="#training_status_type" value="2" name="third[training_status]"><i></i>  Completed  </label>
                                                        </div>

                                                    </div>
                                                    <span id="training_status_type"></span>
                                                </div>
                                                <div id="from_date">
                                                    <?php $fromdate = date('d/m/Y', strtotime($third_talent['fromdate'])); ?>
                                                    <div class="form-group" id="data_1" class="form-inline">
                                                        <label>From Date *</label>
                                                        <div>
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input name="third[fromdate]" value="<?php if(!empty($fromdate) && $fromdate != '01/01/1970') { echo $fromdate; } ?>" data-error="#fromdate" id="from_date_vlue" placeholder="From date" type="text" class="form-control" readonly="true" style="background-color: white;">
                                                            </div>
                                                            <span id="fromdate"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="to_date">
                                                    <?php $todate = date('d/m/Y', strtotime($third_talent['todate'])); ?>
                                                    <div class="form-group" id="data_1" class="form-inline">
                                                        <label>To Date *</label>
                                                        <div>
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input name="third[todate]" value="<?php if(!empty($todate) && $todate != '01/01/1970') { echo $todate; } ?>" data-error="#todate" id="to_date_vlue" placeholder="To date" type="text" class="form-control" readonly="true" style="background-color: white;" value="">
                                                            </div>
                                                            <span id="todate"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div id="experianced_div">

                                        <div class="row">
                                            <div class="col-sm-6 b-r">
                                                <div class="form-group">
                                                    <label>No. of Years *</label>
                                                    <?php $nofyears = $third_talent['nofyears']; ?>
                                                    <select class="form-control m-b chosen-select" name="third[nofyears]" data-error="#noofyears_valid" id="nofyears3">
                                                        <option value="0">Select No. of Years</option>
                                                        <?php
                                                            for ($i=1; $i < 100; $i++) { 
                                                                echo "<option value='$i' ".((isset($nofyears) && $nofyears != '' && $nofyears == $i) ? 'selected="selected"' : '' ).">$i</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                    <span id="noofyears_valid"></span>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>No. of Projects *</label>
                                                    <?php $nofprojects = $third_talent['nofprojects']; ?>
                                                    <select class="form-control m-b chosen-select" name="third[nofprojects]" data-error="#noofyears_valid" id="nofprojects3">
                                                        <option value="0">Select No. of Projects</option>
                                                        <?php
                                                            for ($i=1; $i < 100; $i++) { 
                                                                echo "<option value='$i' ".((isset($nofprojects) && $nofprojects != '' && $nofprojects == $i) ? 'selected="selected"' : '' ).">$i</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row talent3" id="specialization_div">
                                        <div class="col-sm-3 b-r">
                                            <div class="form-group">
                                                <label>Specializations *</label>
                                                <?php $third_talent_specializations = $this->user_model->get_specializations_by_talid($third_talent['talentid']); ?>
                                                <div class="form-control specialization_talent_box">
                                                    <?php
                                                        foreach ($third_talent_specializations as $key => $value) { ?>
                                                            <div class="checkbox i-checks"><label style="padding-left:0;"><input type="checkbox" id="select_specialization_<?php echo $value['id']; ?>" data-error="#errNm2" name="specialization_3[]" value="<?php echo trim($value['name']); ?>"> <i></i> <?php echo "&nbsp;&nbsp;&nbsp;".$value['name']; ?></label></div>
                                                    <?php } ?>
                                                </div>
                                                <span id="errNm2"></span>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="specialization_name">&nbsp;</label>
                                                <input type="hidden" id="specialization_box_id" value="" />
                                                <div class="form-control specification_talent_box" id="specification_box_1"></div>
                                                <span id="specification_valid_1"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="specialization_name">&nbsp;</label>
                                                <input type="hidden" id="specialization_box_id" value="" />
                                                <div class="form-control specification_talent_box" id="specification_box_2"></div>
                                                <span id="specification_valid_2"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="specialization_name">&nbsp;</label>
                                                <input type="hidden" id="specialization_box_id" value="" />
                                                <div class="form-control specification_talent_box" id="specification_box_3"></div>
                                                <span id="specification_valid_3"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="specialization_name">&nbsp;</label>
                                                <input type="hidden" id="specialization_box_id" value="" />
                                                <div class="form-control specification_talent_box" id="specification_box_4"></div>
                                                <span id="specification_valid_4"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="specialization_name">&nbsp;</label>
                                                <input type="hidden" id="specialization_box_id" value="" />
                                                <div class="form-control specification_talent_box" id="specification_box_5"></div>
                                                <span id="specification_valid_5"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 selection_list">
                                            <h3></h3>
                                        </div>
                                    </div>

                                    <?php $third_spec_interest = ((isset($third_talent['newinterest'])) ? $third_talent['newinterest'] : '' )?>

                                    <div id="interest">
                                        <div class="row">
                                            <div class="col-sm-6 b-r">
                                                <div class="form-group">
                                                    <label>Interest Specialization</label>
                                                    <select class="form-control m-b chosen-select" name="third[newinterest]" data-error="#newinterest_valid" onchange="get_interest_specifications(this.value,this);" id="newinterest">
                                                        <option value="">Select Specialization</option>
                                                        <?php
                                                            foreach ($third_talent_specializations as $key => $value) {
                                                                echo "<option value='".$value['id']."' ".((isset($third_spec_interest) && $third_spec_interest != '' && $third_spec_interest == $value['id']) ? 'selected="selected"' : '' ).">".$value['name']."</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <span id="interest3"></span>

                                            <div class="col-sm-6" id="interest_specification">
                                                <div class="form-group">
                                                    <label>Interest Specification</label>
                                                    <select class="form-control m-b chosen-select" name="third[spnewinterest]" data-error="#spnewinterest_valid" id="spnewinterest">
                                                        <option value="">Select Specification</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" id="add_intrest">
                                        <div class="col-sm-12">
                                            <span><h4>Willing to explore new Specializations of but not experienced yet?</h4></span><button type="button" id="interest_button3" class="btn btn-w-m btn-info">ADD AN INTEREST</button>
                                        </div>
                                    </div>

                                    <!-- <div class="talent3"></div> -->
                                </div>
                        <?php   } 

                        } ?>

                        <hr>

                        <div class="row lazy">
                            <div class="col-sm-12">
                                <h1>User Feedback</h1>
                            </div>
                        </div>

                        <hr>

                        <div class="row lazy">
                            <div class="form-group"><label class="col-sm-3 control-label">Heard / learnt of MMT via</label>
                                <div class="col-sm-8">
                                    <div class="radio-inline i-checks col-sm-2">
                                        <label style="padding-left: 0;"><input type="radio" id="heard_facebook" <?php if(isset($user_feedback['heard_from']) && $user_feedback['heard_from'] == 1){ echo 'checked="checked"'; } ?> value="1" name="heard_from"><i></i>  Facebook  </label>
                                    </div>
                                    <div class="radio-inline i-checks col-sm-2">
                                        <label style="padding-left: 0;"><input type="radio" id="heard_friend" <?php if(isset($user_feedback['heard_from']) && $user_feedback['heard_from'] == 2){ echo 'checked="checked"'; } ?> value="2" name="heard_from"><i></i>  Friend  </label>
                                    </div>
                                    <div class="radio-inline i-checks col-sm-2">
                                        <label style="padding-left: 0;"><input type="radio" id="heard_other" <?php if(isset($user_feedback['heard_from']) && $user_feedback['heard_from'] == 3){ echo 'checked="checked"'; } ?> value="3" name="heard_from"><i></i>  Other  </label>
                                    </div>
                                </div>
                            </div>

                            <div id="select_friend">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                    </div>
                                    <div class="form-group">
                                    </div>
                                </div>

                                <div class="col-sm-9">
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6"><input type="text" id="friend_full_name" name="friend_full_name" placeholder="Full name" class="form-control" value="<?php if(isset($user_feedback['friend_full_name']) && $user_feedback['friend_full_name'] != ''){ echo $user_feedback['friend_full_name']; } ?>"></div>
                                        <div class="col-md-6"><input type="text" id="friend_contact_number" onkeypress="return isNumberKey(event);" maxlength="10" name="friend_contact_number" placeholder="Contact number" class="form-control" value="<?php if(isset($user_feedback['friend_contact_number']) && $user_feedback['friend_contact_number'] != ''){ echo $user_feedback['friend_contact_number']; } ?>"></div>
                                    </div>
                                    <br>
                                </div>
                            </div>

                            <div id="select_other">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                    </div>
                                    <div class="form-group">
                                    </div>
                                </div>

                                <div class="col-sm-9">
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6"><input type="text" id="heard_from_other" name="heard_from_other" placeholder="Please Specify" class="form-control" value="<?php if(isset($user_feedback['heard_from_other']) && $user_feedback['heard_from_other'] != ''){ echo $user_feedback['heard_from_other']; } ?>"></div>
                                    </div>
                                    <br>
                                </div>
                            </div>

                            <br>

                            <div class="form-group"><label class="col-sm-3 control-label">Understanding of MMT</label>
                                <div class="col-sm-8">
                                    <div class="radio-inline i-checks col-sm-2">
                                        <label style="padding-left: 0;"><input type="radio" <?php if(isset($user_feedback['understanding']) && $user_feedback['understanding'] == 1){ echo 'checked="checked"'; } ?> value="1" name="understanding"><i></i>  Perfect  </label>
                                    </div>
                                    <div class="radio-inline i-checks col-sm-2">
                                        <label style="padding-left: 0;"><input type="radio" <?php if(isset($user_feedback['understanding']) && $user_feedback['understanding'] == 2){ echo 'checked="checked"'; } ?> value="2" name="understanding"><i></i>  Fair  </label>
                                    </div>
                                    <div class="radio-inline i-checks col-sm-2">
                                        <label style="padding-left: 0;"><input type="radio" <?php if(isset($user_feedback['understanding']) && $user_feedback['understanding'] == 3){ echo 'checked="checked"'; } ?> value="3" name="understanding"><i></i>  Poor  </label>
                                    </div>
                                    <div class="radio-inline i-checks col-sm-4">
                                        <label style="padding-left: 0;"><input type="radio" <?php if(isset($user_feedback['understanding']) && $user_feedback['understanding'] == 4){ echo 'checked="checked"'; } ?> value="4" name="understanding"><i></i>  Has no clue at all  </label>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="col-sm-3">
                                    <br>
                                    <div class="checkbox i-checks"><label style="padding-left: 0;"><input type="checkbox" id="has_other_reference" name="has_other_reference" value="1"> <i></i> <b>Wants to invite </b></label></div>
                                    <br>
                                </div>

                                <div class="col-sm-9" id="has_other_reference_div">
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6"><input type="text" id="friend_full_name_2" name="friend_full_name_2" placeholder="Full name" class="form-control" value="<?php if(isset($user_feedback['friend_full_name_2']) && $user_feedback['friend_full_name_2'] != ''){ echo $user_feedback['friend_full_name_2']; } ?>"></div>
                                        <div class="col-md-6"><input type="text" id="friend_contact_number_2" onkeypress="return isNumberKey(event);" maxlength="10" name="friend_contact_number_2" placeholder="Contact number" class="form-control" value="<?php if(isset($user_feedback['friend_contact_number_2']) && $user_feedback['friend_contact_number_2'] != ''){ echo $user_feedback['friend_contact_number_2']; } ?>"></div>
                                    </div>
                                    <br>
                                </div>
                            </div>

                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-sm-6 b-r">
                                <?php if($user_data['registration_step'] == 3){ ?>
                                    <div class="form-group">
                                        <label>Email Authentication Status</label>
                                        <select class="form-control m-b chosen-select" name="status">
                                            <?php
                                                foreach($GLOBALS['USER_STATUS'] as $key=>$val){
                                                    echo "<option value='$key' ".((isset($user_data['status']) && $user_data['status'] != '' && $user_data['status'] == $key) ? 'selected="selected"' : '' ).">$val</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                <?php } ?>
                                <div class="form-group">
                                    <label>Comments</label>
                                    <textarea class="form-control" name="comment"><?php if(isset($user_feedback['comment']) && $user_feedback['comment'] != ''){ echo $user_feedback['comment']; } ?></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Profile Completion Status</label>
                                    <input type="text" readonly="true" style="background-color: white;" class="form-control" value="<?php if(isset($profile_completion_status)){ echo $profile_completion_status; }?>" >
                                </div>
                                <div class="form-group">
                                    <label>Verification Call Status</label>
                                    <select class="form-control m-b chosen-select" name="call_verification_status">
                                        <?php
                                            foreach($GLOBALS['CALL_VARIFIED'] as $key=>$val){
                                                echo "<option value='$key' ".((isset($user_data['call_verification_status']) && $user_data['call_verification_status'] != '' && $user_data['call_verification_status'] == $key) ? 'selected="selected"' : '' ).">$val</option>";
                                            }
                                        ?>
                                    </select>
                                </div>                                
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-sm-3">
                                <div>
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-check"></i>&nbsp;Update</button>
                                    <button class="btn btn-default" id="cancel_user_update" type="button"><i class="fa fa-times"></i>&nbsp;Cancel</button>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="userid" value="<?php echo $user_data['id']; ?>" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <img class="lazyimage" data-src="<?=base_url()?>public/img/mmt1.jpg" width="100%"> -->

<!-- Delete user talent model -->
<div class="modal fade" id="change_talent_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <h4 class="modal-title">Confirm Delete</h4>
            </div>
            <div class="modal-body">
                <strong>Are you sure want to change this user's talent ?? This will delete current talent of user.</strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="change_talent_modal_function();">Delete</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="cancel_change_talent();">Cancel</button>
            </div>
            <input type="hidden" id="talent_priority" value="" />
            <input type="hidden" id="new_talent_id" value="" />
            <input type="hidden" id="current_talent" value="" />
        </div>
    </div>
</div>