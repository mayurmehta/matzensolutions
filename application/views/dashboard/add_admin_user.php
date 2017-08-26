<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Add Admin</h5>
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

                ?>
                <div class="ibox-content">
                    <!-- onsubmit="return convert_talent_as_input();" -->
                    <form role="form" id="userupdateform" method="post" action="<?=site_url('dashboard/add_admin_user')?>">
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
                                    <input type="text" name="fullname" placeholder="Please Enter Name" class="form-control" value="<?php if(isset($user_data['fullname'])){ echo $user_data['fullname']; }?>">
                                </div>

                                <div class="form-group">
                                    <label>User name *</label>
                                    <input type="text" name="username" placeholder="Please Enter Username" class="form-control" value="<?php if(isset($user_data['username'])){ echo $user_data['username']; }?>">
                                </div>

                                <div class="form-group">
                                    <label>Password *</label>
                                    <input type="password" name="password" placeholder="Please Enter Password" class="form-control" value="<?php if(isset($user_data['password'])){ echo $user_data['password']; }?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Usertype *</label>
                                    <select class="form-control m-b chosen-select" id="countrycode"  name="countrycode">
                                        <option value="">Select Usertype</option>
                                        <?php
                                            foreach($usertypes as $key=>$val){
                                                $id = $val['id'];
                                                $name = $val['name'];
                                                echo "<option value='$id'>$name</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>VID</label>
                                    <input type="text" name="vid" placeholder="Please enter VID(Optional)" class="form-control" value="<?php if(isset($user_data['username'])){ echo $user_data['username']; }?>">
                                </div>
                                <div class="form-group" class="form-inline">
                                    <label>Status</label><br>
                                    <input type="checkbox" class="js-switch" name="status" checked />
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row lazy">
                            <div class="col-sm-12">
                                <h1>Permissions</h1>
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
                        <input type="hidden" id="userid" value="<?php  ?>" />
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