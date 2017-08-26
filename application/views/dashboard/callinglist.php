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

                        $calling_var = $this->session->userdata('calling_var');

                        if(isset($calling_var) && !empty($calling_var)){
                            foreach ($calling_var as $key => $value) {
                                if($key == 'id' || $key == 'email' || $key == 'contactnumber' || $key == 'name'){
                                    $main_search = $value;
                                }
                                if($key == 'date_start'){
                                    $date_start = $value;
                                }
                                if($key == 'date_end'){
                                    $date_end = $value;
                                }
                                if($key == 'agent_id'){
                                    $agent_id = $value;
                                }
                                if($key == 'call_type'){
                                    $call_type = $value;
                                }
                                if($key == 'disposition'){
                                    $disposition = $value;
                                }
                            }
                        }

                        ?>
                        <div class="ibox-content">
                            <form role="form" method="post" action="<?=site_url('dashboard/set_filter_session_callinglist')?>">
                                <div class="row">
                                    <div class="col-sm-6 b-r">
                                        <div class="form-group">
                                            <label>First name / Last name</label>
                                            <input type="text" name="main_search" placeholder="First name / Last name" class="form-control" value="<?php if(isset($main_search)){ echo $main_search; }?>">
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
                                    <div class="col-sm-4 b-r">
                                        <div class="form-group"><label>Agents</label>
                                            <select class="form-control m-b" name="agent_id">
                                                <option value="">Select Agent</option>
                                                <?php
                                                    foreach($agent_ids as $key=>$val){
                                                        echo "<option value='$val' ".((isset($agent_id) && $agent_id != '' && $agent_id == $val) ? 'selected="selected"' : '' ).">$val</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 b-r">
                                        <div class="form-group"><label>Call Type</label>
                                            <select class="form-control m-b" name="call_type" id="call_type_select">
                                                <option value="">Select Call Type</option>
                                                <?php
                                                    foreach($GLOBALS['CALL_TYPE'] as $key=>$val){
                                                        echo "<option value='$key' ".(($call_type != '' && $call_type == $key) ? 'selected="selected"' : '' ).">$val</option>";
                                                    }
                                                ?>                                                
                                            </select>
                                        </div>
                                    </div>                                    
                                    <div class="col-sm-4">
                                        <div class="form-group"><label>Dispositions</label>
                                            
                                            <select class="form-control m-b" name="disposition" id="dispositions">
                                                <option value="">Select Disposition</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div>
                                            <button class="btn btn-primary" type="submit"><i class="fa fa-filter"></i>&nbsp;Filter</button>
                                            <button class="btn btn-default" id="reset_callinglist_form" type="button"><i class="fa fa-eraser"></i>&nbsp;Reset</button>
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

            <table class="table table-striped table-bordered table-hover dataTable-callinglist" >
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Contact Number</th>
                    <th>Call Type</th>
                    <th>Disposition</th>
                    <th>Agent Name</th>
                    <th>Name</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Contact Number</th>
                    <th>Call Type</th>
                    <th>Disposition</th>
                    <th>Agent Name</th>
                    <th>Name</th>
                    <th>Date</th>
                </tr>
            </tfoot>
        </table>

            </div>
        </div>
    </div>
    </div>
</div>