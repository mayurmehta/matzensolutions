    <!-- Mainly scripts -->
    <script src="<?=base_url()?>public/js/jquery-2.1.1.js"></script>
    <script src="<?=base_url()?>public/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>public/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?=base_url()?>public/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="<?=base_url()?>public/js/plugins/flot/jquery.flot.js"></script>
    <script src="<?=base_url()?>public/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?=base_url()?>public/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="<?=base_url()?>public/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="<?=base_url()?>public/js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="<?=base_url()?>public/js/plugins/flot/jquery.flot.symbol.js"></script>
    <script src="<?=base_url()?>public/js/plugins/flot/jquery.flot.time.js"></script>

    <!-- Peity -->
    <script src="<?=base_url()?>public/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="<?=base_url()?>public/js/demo/peity-demo.js"></script>

    <script type="text/javascript">
        paceOptions = {
            ajax: false, // disabled pace js when ajax called in any page
        };
    </script>

    <!-- Custom and plugin javascript -->
    <script src="<?=base_url()?>public/js/inspinia.js"></script>
    <script src="<?=base_url()?>public/js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="<?=base_url()?>public/js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Jvectormap -->
    <script src="<?=base_url()?>public/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?=base_url()?>public/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- EayPIE -->
    <script src="<?=base_url()?>public/js/plugins/easypiechart/jquery.easypiechart.js"></script>

    <!-- Sparkline -->
    <script src="<?=base_url()?>public/js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="<?=base_url()?>public/js/demo/sparkline-demo.js"></script>

    <?php if($url == 'users' || $url == 'user_update' || $url == 'loglist' 
            || $url == 'callinglist' || $url == 'languages' || $url == 'cities'
            || $url == 'administrators' || $url == 'add_admin' || $url == 'agile_board'
            || $url == 'view_task'){ ?>

        <!-- Date picker -->
        <script src="<?=base_url()?>public/js/plugins/datapicker/bootstrap-datepicker.js"></script>

        <!-- Date time picker -->
        <script src="<?=base_url()?>public/js/plugins/datetimepicker/bootstrap-datetimepicker.min.js"></script>

        <!-- Range Slider nouslider -->
        <script src="<?=base_url()?>public/js/plugins/nouslider/jquery.nouislider.min.js"></script>

        <!-- Range Slider ionRangeSlider -->
        <script src="<?=base_url()?>public/js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>

        <script src="<?=base_url()?>public/js/plugins/jeditable/jquery.jeditable.js"></script>

        <!-- Chosen -->
        <script src="<?=base_url()?>public/js/plugins/chosen/chosen.jquery.js"></script>

        <!-- iCheck -->
        <script src="<?=base_url()?>public/js/plugins/iCheck/icheck.min.js"></script>

        <!-- Data Tables -->
        <script src="<?=base_url()?>public/js/plugins/dataTables/jquery.dataTables.js"></script>
        <script src="<?=base_url()?>public/js/plugins/dataTables/dataTables.bootstrap.js"></script>
        <script src="<?=base_url()?>public/js/plugins/dataTables/dataTables.responsive.js"></script>
        <script src="<?=base_url()?>public/js/plugins/dataTables/dataTables.tableTools.min.js"></script>

        <!-- Jquery Validate -->
        <script src="<?=base_url()?>public/js/plugins/validate/jquery.validate.min.js"></script>

        <!-- Page-Level Scripts -->
        <script>
            $(document).ready(function() {

                <!-- Enable drag & drop -->
                //WinMove();

                var userid = "<?php echo $this->session->userdata('id'); ?>";

                $(".sortable-list").sortable({
                    connectWith: ".connectList",
                    cursor: "move",
                    opacity: 0.8,
                    //revert: true,
                    beforeStop: function(event, ui) {
                        var sender_panel = $(this).data('bar-id');
                        var receive_panel = ui.placeholder.parents('ul').data('bar-id');

                        if((sender_panel == 3 || sender_panel == 4) &&
                            (receive_panel == 1 || receive_panel == 2 || 
                            receive_panel == 3 || receive_panel == 4) && userid != '33'){
                            $(this).sortable('cancel');
                        } else if(sender_panel == 1 && receive_panel != 2 && userid != '33'){
                            $(this).sortable('cancel');
                        } else if(sender_panel == 2 && receive_panel != 3 && userid != '33'){
                            $(this).sortable('cancel');
                        }
                    },
                    receive: function( event, ui ) {
                        $('.page_loader').show();
                        var sender_panel = ui.sender.data('bar-id');
                        var receive_panel = $(this).data('bar-id');
                        if((sender_panel == 3 || sender_panel == 4) && 
                            (receive_panel == 1 || receive_panel == 2)){
                            var reassigned = 1;
                        } else {
                            var reassigned = 0;
                        }
                        var task_id = ui.item.data('id');
                        var current_status = $(this).parents('.ibox').find('.status').val();
                        $.ajax({
                            url: '<?php echo site_url("dashboard/change_task_status_ajax"); ?>',
                            data: 'task_id='+task_id+'&current_status='+current_status+'&reassigned='+reassigned,
                            type: 'POST',
                            success: function(data){
                                $('.page_loader').hide();
                                if(data != 'true'){
                                    alert('Some error occured..Please try again..');
                                }
                            },
                        });
                    }

                }).disableSelection();

                var config = {
                    '.chosen-select' : {},
                }
                for (var selector in config) {
                    $(selector).chosen(config[selector]);
                }

                $('#data_5 .input-daterange').datepicker({
                    keyboardNavigation: false,
                    forceParse: false,
                    autoclose: true,
                    format: 'dd/mm/yyyy'
                });
                
                $('#data_1 .input-group.date').datepicker({
                    todayBtn: "linked",
                    keyboardNavigation: false,
                    forceParse: false,
                    calendarWeeks: true,
                    autoclose: true,
                    format: 'dd/mm/yyyy'
                });

                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });

                $('.dataTable-user').dataTable({
                    "responsive": true,
                    "scrollX": true,
                    //"scrollY": "200px",
                    "ScrollCollapse": true,
                    "dom": '<"clear_new">pitipr',
                    //"dom": "<'row'<'col-xs-6'l><'col-xs-6'f>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
                    //"dom": 'Tf<"clear_new">pitipr',
                    /*"tableTools": {
                        "sSwfPath": "'<?php echo base_url();?>'/public/js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
                    },*/
                    "aaSorting": [[ 0, "desc" ]],
                    "processing": true,
                    "serverSide": true,
                    "ajax": "<?php echo site_url('dashboard/users_simple_mod_ajax'); ?>",
                    //"autoWidth": false,
                    //"bStateSave": true,
                    //"stateSave": true
                });

                $('.dataTable-loglist').dataTable({
                    "responsive": true,
                    "dom": 'f<"clear_new">pitipr',
                    "aaSorting": [[ 0, "desc" ]],
                    "processing": true,
                    "serverSide": true,
                    "ajax": "<?php echo site_url('dashboard/loglist_result_ajax'); ?>"
                });

                $('.dataTable-callinglist').dataTable({
                    "responsive": true,
                    "dom": 'f<"clear_new">pitipr',
                    "aaSorting": [[ 0, "desc" ]],
                    "processing": true,
                    "serverSide": true,
                    "ajax": "<?php echo site_url('dashboard/callinglist_result_ajax'); ?>"
                });

                $('#add_city_button').on('click',function(){
                    $('#add_city_modal').find('.hide-form').hide();
                    $('.ajax-loader').show();
                    $.ajax({
                        url: '<?php echo site_url("dashboard/get_countries_ajax"); ?>',
                        type: 'POST',
                        success: function(data){
                            var list = $.parseJSON(data);
                            $('#country').html(list);
                            $('#add_city_modal').find('.hide-form').show();
                            $('.ajax-loader').hide();
                        },
                    });
                });

                $('#form_add_city').on('submit',function(event){
                    event.preventDefault();
                    $('#add_city_modal').find('.hide-form').hide();
                    $('.ajax-loader').show();
                    var country = $('#country').val();
                    var city = $('#city').val();
                    $.ajax({
                        url: '<?php echo site_url("dashboard/add_city_ajax"); ?>',
                        data: 'country='+country+'&city='+city,
                        type: 'POST',
                        success: function(data){
                            if(data == 1){
                                $('#add_city_modal').find('.hide-form').show();
                                $('.ajax-loader').hide();
                                window.location = '<?php echo site_url("dashboard/cities?reset=1"); ?>';
                            } else {
                                $('#add_city_modal').find('.hide-form').show();
                                $('.ajax-loader').hide();
                                alert('City is already exist');
                            }
                        },
                    });
                });

                $('#reset_form').on('click',function(){
                    localStorage.clear();
                    window.location = '<?=site_url("dashboard/users?reset=1")?>';
                });

                $('#cancel_user_update').on('click',function(){
                    window.location = '<?=site_url("dashboard/users")?>';
                });

                $('#reset_loglist_form').on('click',function(){
                    window.location = '<?=site_url("dashboard/loglist?reset=1")?>';
                });

                $('#reset_callinglist_form').on('click',function(){
                    window.location = '<?=site_url("dashboard/callinglist?reset=1")?>';
                });

                $('#call_type_select').on('change',function(){
                    var call_type = $(this).val();
                    $.ajax({
                        url: '<?php echo site_url("dashboard/get_dispositions_ajax"); ?>',
                        data: 'call_type='+call_type,
                        type: 'POST',
                        success: function(data){
                            var list = $.parseJSON(data);
                            $('#dispositions').html(list);
                        },
                    });
                });

                var check_call_type = $('#get_call_type').val();
                var check_disposition = $('#get_disposition').val();

                if(check_call_type != ''){
                    $('#call_type_select').trigger('change');
                }

                $("#ionrange_1").ionRangeSlider({
                    min: 0,
                    max: 100,
                    from: $('#age_start').val(),
                    to: $('#age_end').val(),
                    type: 'double',
                    postfix: " Years",
                    prettify: false,
                    hasGrid: true,
                    onChange: function(data){
                        $('#age_start').val(data.fromNumber);
                        $('#age_end').val(data.toNumber);
                    }
                });

                $('[data-modal=delete_user_madal]').on('click',function(){
                    alert($(this).attr('data-id'));
                });

                <?php //if(empty($this->session->userdata('check_var'))
                        //|| empty($this->session->userdata('log_var'))
                        //|| empty($this->session->userdata('calling_var'))){ ?>
                    $('#user_filter_div').find('.collapse-link').trigger('click');
                <?php //} ?>

            });

            function delete_user(id,usertype){
                window.location = '<?php echo site_url("dashboard/user_delete/'+id+'/'+usertype+'"); ?>';
            }

            function delete_admin(id){
                window.location = '<?php echo site_url("dashboard/admin_delete/'+id+'"); ?>';
            }

            function delete_language(id){
                window.location = '<?php echo site_url("dashboard/language_delete/'+id+'"); ?>';
            }

            function delete_city(id){
                window.location = '<?php echo site_url("dashboard/city_delete/'+id+'"); ?>';
            }

            function delete_task(id){
                window.location = '<?php echo site_url("dashboard/task_delete/'+id+'"); ?>';
            }

            function pass_data(id,usertype){
                var func = "delete_user("+id+","+usertype+");";
                $('#delete_user_madal').find('.btn-primary').attr('onclick',func);
            }

            function pass_admin_data(id){
                var func = "delete_admin("+id+");";
                $('#delete_admin_madal').find('.btn-primary').attr('onclick',func);
            }

            function pass_data_language(id){
                var func = "delete_language("+id+");";
                $('#delete_language_madal').find('.btn-primary').attr('onclick',func);
            }

            function pass_data_city(id){
                var func = "delete_city("+id+");";
                $('#delete_city_madal').find('.btn-primary').attr('onclick',func);
            }

            function show_profile_strength(id){
                $('#show_profile_strength_modal').find('.hide-form').hide();
                $('.ajax-loader').show();
                if(id != ""){
                    $.ajax({
                        url: '<?php echo site_url("dashboard/get_profile_strength_ajax"); ?>',
                        data: 'id='+id,
                        type: 'POST',
                        success: function(data){
                            var strength_table = $.parseJSON(data);
                            //console.log(strength_table);
                            $('#show_profile_strength_modal').find('.hide-form').html(strength_table);
                            $('#show_profile_strength_modal').find('.hide-form').show();
                            $('.ajax-loader').hide();
                        },
                    });
                } else {
                    $('#show_profile_strength_modal').find('.hide-form').show();
                    $('.ajax-loader').hide();
                    alert('You must be login');
                }
            }

        </script>

        <?php if($url == 'user_update'){ ?>

            <!-- Lazy Load -->
            <script src="<?=base_url()?>public/js/plugins/lazyload/jquery.lazyloadxt.min.js"></script>
            <script src="<?=base_url()?>public/js/plugins/lazyload/jquery.lazyloadxt.extra.min.js"></script>

            <script>
                $(document).ready(function() {

                    //$('.lazy').lazyLoadXT();
                    // $('.lazyimage').lazyLoadXT({effect : "fadeIn"});

                    $.validator.addMethod("valid_email", function(value, element){
                        var count = $.trim(value).split(" ");
                        if(/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/i.test(value)) return true;
                        else return false;
                    }, "Enter valid email address");

                    $.validator.addMethod("valid_fullname", function(value, element){
                        var count = $.trim(value).split(" ");
                        var check_the = $.trim(value).substring(0,4);
                        if(count.length >= 2 && count.length <= 4 && /^[A-Za-z]+\s[A-Za-z ]+$/i.test(value) && value.length <= 35 && check_the.toLowerCase()!='the '){
                            return true;
                        } else { 
                            console.log('false');
                            return false;
                        }
                    }, "Enter valid full name");

                    $.validator.addMethod("valid_ready_work_city", function(value, element){
                        var checkbox_value = $('#ready_work_city_checkbox').val();
                        if(checkbox_value == 1){
                            return true;
                        } else if(checkbox_value == 2 && value != null){
                            return true;
                        } else {
                            console.log('false');
                            return false;
                        }
                    }, "Select ready to work city");

                    $.validator.addMethod("friend_full_name_valid", function(value, element){
                        if($('input[id=heard_friend]').is(':checked')){
                            var friend_full_name = $('#friend_full_name').val();
                            var count = $.trim(friend_full_name).split(" ");
                            var check_the = $.trim(friend_full_name).substring(0,4);
                            if(friend_full_name != '' && count.length >= 2 && count.length <= 4 && /^[A-Za-z]+\s[A-Za-z ]+$/i.test(friend_full_name) && friend_full_name.length <= 35 && check_the.toLowerCase()!='the '){
                                return true;
                            } else { 
                                console.log('false');
                                return false;
                            }                            
                        } else {
                            return true;
                        }
                    }, "Enter your friend's name");

                    $.validator.addMethod("friend_contact_number_valid", function(value, element){
                        if($('input[id=heard_friend]').is(':checked')){
                            var friend_contact_number = $('#friend_contact_number').val();
                            if(friend_contact_number == ''){
                                console.log('false');
                                return false;
                            } else {
                                return true;
                            }                            
                        } else {
                            return true;
                        }
                    }, "Enter your friend's contact number");

                    $.validator.addMethod("heard_from_other_valid", function(value, element){
                        if($('input[id=heard_other]').is(':checked')){
                            var heard_from_other = $('#heard_from_other').val();
                            if(heard_from_other == ''){
                                console.log('false');
                                return false;
                            } else {
                                return true;
                            }                            
                        } else {
                            return true;
                        }
                    }, "Please specify other term");

                    $.validator.addMethod("friend_full_name_2_valid", function(value, element){
                        if($('input[id=has_other_reference]').is(':checked')){
                            var friend_full_name_2 = $('#friend_full_name_2').val();
                            var count = $.trim(friend_full_name_2).split(" ");
                            var check_the = $.trim(friend_full_name_2).substring(0,4);
                            if(friend_full_name_2 != '' && count.length >= 2 && count.length <= 4 && /^[A-Za-z]+\s[A-Za-z ]+$/i.test(friend_full_name_2) && friend_full_name_2.length <= 35 && check_the.toLowerCase()!='the '){
                                return true;
                            } else { 
                                console.log('false');
                                return false;
                            }
                        } else {
                            return true;
                        }
                    }, "Enter invited friend's name");

                    $.validator.addMethod("friend_contact_number_2_valid", function(value, element){
                        if($('input[id=has_other_reference]').is(':checked')){
                            var friend_contact_number_2 = $('#friend_contact_number_2').val();
                            if(friend_contact_number_2 == ''){
                                console.log('false');
                                return false;
                            } else {
                                return true;
                            }                            
                        } else {
                            return true;
                        }
                    }, "Enter invited friend's contact number");

                    $.validator.addMethod("check_specializations_length_valid", function(value, element){
                        var main_talent = $(element).closest('.main_talent');

                        if(main_talent.find('input[id^=experianced]').is(':checked')){
                            if(main_talent.find('input[id^=select_specialization]:checked').length > 5 
                                || main_talent.find('input[id^=select_specialization]:checked').length < 1){
                                console.log('false');
                                return false;
                            } else {
                                return true;
                            }
                        } else {
                            if(main_talent.find('input[id^=select_specialization]:checked').length > 5){
                                console.log('false');
                                return false;
                            } else {
                                return true;
                            }
                        }
                    }, "Select 1 to maximum 5 specializations");

                    $.validator.addMethod("check_specification_length_valid", function(value, element){
                        var main_talent = $(element).closest('.main_talent');
                        var name = $(element).attr('name');
                        if(main_talent.find('input[id^=experianced]').is(':checked')){
                            if(main_talent.find('input[name='+name+']:checked').length > 3
                                || main_talent.find('input[name='+name+']:checked').length < 1){
                                console.log('false');
                                return false;
                            } else {
                                return true;
                            }
                        } else {
                            if(main_talent.find('input[name='+name+']:checked').length > 3){
                                console.log('false');
                                return false;
                            } else {
                                return true;
                            }
                        }
                    }, "Select 1 to maximum 3 specifications");

                    // $.validator.addMethod("training_valid", function(value, element){
                    //     if($('#fresher').is(':checked')){
                    //         if($('#trainedat').val() != '' || $('#trainedby').val() != ''){
                    //             return true;
                    //         } else {
                    //             return false;
                    //         }
                    //     } else {
                    //         return true;
                    //     }                        
                    // }, "Enter Trained At OR Trained By field");

                    $.validator.addMethod("training_status_valid", function(value, element){

                        var main_talent = $(element).closest('.main_talent');
                        if(main_talent.find('input[id^=fresher]').is(':checked') && (main_talent.find('input[id^=trainedat]').val() != ''
                            || main_talent.find('input[id^=trainedby]').val() != '')){
                            //console.log($(element));
                            if(main_talent.find('input[id^=goingon]').is(':checked')
                                || main_talent.find('input[id^=completed]').is(':checked')){
                                //console.log('asd');
                                return true;
                            } else {
                                //console.log('yyyy');
                                console.log('false');
                                return false;
                            }
                        } else {
                            return true;
                        }                        
                    }, "Select Traing Status");

                    $.validator.addMethod("training_from_date_valid", function(value, element){
                        var main_talent = $(element).closest('.main_talent');
                        console.log(main_talent.find('input[id^=from_date_vlue]'));
                        if(main_talent.find('input[id^=fresher]').is(':checked') && (main_talent.find('input[id^=trainedat]').val() != ''
                            || main_talent.find('input[id^=trainedby]').val() != '')
                            && main_talent.find('input[data-name^=training_status]').is(':checked')){
                            if(main_talent.find('#from_date_vlue').val() == ''){
                                console.log('false');
                                return false;
                            } else {
                                return true;
                            }
                        } else {
                            return true;
                        }
                    }, "Select start date of your training");

                    $.validator.addMethod("training_to_date_valid", function(value, element){
                        var main_talent = $(element).closest('.main_talent');
                        if(main_talent.find('input[id^=fresher]').is(':checked')){
                            if(main_talent.find('input[id^=completed]').is(':checked')
                                && main_talent.find('input[id^=to_date_vlue]').val() == ''){
                                console.log('false');
                                return false;
                            } else {
                                return true;
                            }
                        } else {
                            return true;
                        }
                    }, "Select end date of your training");

                    $.validator.addMethod("valid_date_range", function(value, element){
                        var main_talent = $(element).closest('.main_talent');
                        if(main_talent.find('input[id^=fresher]').is(':checked')){
                            if(main_talent.find('input[id^=completed]').is(':checked') 
                                && main_talent.find('input[id^=to_date_vlue]').val() != ''){
                                var from_date = main_talent.find('#from_date_vlue').val();
                                var to_date = value;
                                var sfdate = from_date.split('/');
                                var from_date_obj = new Date(sfdate[2],sfdate[1]-1,sfdate[0]);
                                var stdate = to_date.split('/');
                                var to_date_obj = new Date(stdate[2],stdate[1]-1,stdate[0]);
                                if(to_date_obj >= from_date_obj){
                                    return true;
                                } else {
                                    console.log('false');
                                    return false;
                                }
                            } else {
                                return true;
                            }
                        } else {
                            return true;
                        }
                    }, "To date must be higher than From date");

                    $.validator.addMethod("noofyears_valid", function(value, element){
                        var main_talent = $(element).closest('.main_talent');
                        console.log('Experiance : '+main_talent.find('input[id^=experianced]').is(':checked'));
                        console.log('No of Years : '+main_talent.find('select[id^=nofyears]').val());
                        console.log('No of Projects : '+main_talent.find('select[id^=nofprojects]').val());
                        if(main_talent.find('input[id^=experianced]').is(':checked')){
                            console.log(main_talent.find('input[id^=experianced]').attr('id')+' is checked');
                            if(main_talent.find('select[id^=nofyears]').val() != 0 
                                || main_talent.find('select[id^=nofprojects]').val() != 0){
                                return true;
                            } else {
                                console.log('false');
                                return false;
                                
                            }
                        } else {
                            return true;
                        }            
                    }, "Select No. of years OR No. of Projects");

                    var validator = $("#userupdateform").validate({
                        ignore: [],
                        //debug: true,
                        rules: {
                            name: { required : true, valid_fullname: true },
                            birthdate: { required : true },
                            profileurl: { required : true,
                                remote: {
                                    url: '<?php echo site_url("dashboard/check_profileurl_exist"); ?>',
                                    type: "post",
                                    data: {
                                        profileurl: function() {
                                            return $("#profileurl").val();
                                        },
                                        id: function() {
                                            return $('#userid').val();
                                        }
                                    }
                                }
                            },
                            gender: { required : true },
                            email: { required : true, email: true, valid_email: true,
                                remote: {
                                    url: '<?php echo site_url("dashboard/check_email_exist"); ?>',
                                    type: "post",
                                    data: {
                                        email: function() {
                                            return $("#email").val();
                                        },
                                        id: function() {
                                            return $('#userid').val();
                                        }
                                    }
                                } 
                            },
                            contactnumber: { required : true, digits : true , minlength: 10, maxlength: 10,
                                remote: {
                                    url: '<?php echo site_url("dashboard/check_mobile_exist"); ?>',
                                    type: "post",
                                    data: {
                                        contactnumber: function() {
                                            return $("#contactnumber").val();
                                        },
                                        id: function() {
                                            return $('#userid').val();
                                        }
                                    }
                                }
                            },
                            countrycode: { required : true },
                            native_country: { required : true },
                            living_city: { required : true },
                            native_city: { required : true },
                            'ready_work_city[]': { valid_ready_work_city : true },
                            //'pri[trainedat]': { training_valid : true },
                            //'pri[trainedby]': { training_valid : true },
                            'pri[talentid]': { required : true },
                            'pri[fresherorexperience]': { required : true },
                            'pri[training_status]': { training_status_valid : true },
                            'pri[fromdate]': { training_from_date_valid : true },
                            'pri[todate]': { training_to_date_valid : true, valid_date_range: true },
                            'pri[nofyears]': { noofyears_valid : true },
                            'sec[talentid]': { required : true },
                            'sec[fresherorexperience]': { required : true },
                            'sec[training_status]': { training_status_valid : true },
                            'sec[fromdate]': { training_from_date_valid : true },
                            'sec[todate]': { training_to_date_valid : true, valid_date_range: true },
                            'sec[nofyears]': { noofyears_valid : true },
                            'third[talentid]': { required : true },
                            'third[fresherorexperience]': { required : true },
                            'third[training_status]': { training_status_valid : true },
                            'third[fromdate]': { training_from_date_valid : true },
                            'third[todate]': { training_to_date_valid : true, valid_date_range: true },
                            'third[nofyears]': { noofyears_valid : true },
                            //'pri[nofprojects]': { noofyears_valid : true },

                            'specialization[]': { check_specializations_length_valid: true },
                            'specialization_2[]': { check_specializations_length_valid: true },
                            'specialization_3[]': { check_specializations_length_valid: true },
                            //specification_1: { check_specification_length_valid: true },
                            
                            
                            friend_full_name: { friend_full_name_valid : true },
                            friend_contact_number: { friend_contact_number_valid : true, digits : true , minlength: 10, maxlength: 10,
                                remote: {
                                    url: '<?php echo site_url("dashboard/check_mobile_exist"); ?>',
                                    type: "post",
                                    data: {
                                        contactnumber: function() {
                                            return $("#friend_contact_number").val();
                                        },
                                        id: function() {
                                            return $('#userid').val();
                                        },
                                        type: 1
                                    }
                                }
                            },
                            heard_from_other: { heard_from_other_valid : true },
                            friend_full_name_2: { friend_full_name_2_valid : true },
                            friend_contact_number_2: { friend_contact_number_2_valid : true, digits : true , minlength: 10, maxlength: 10,
                                remote: {
                                    url: '<?php echo site_url("dashboard/check_mobile_exist"); ?>',
                                    type: "post",
                                    data: {
                                        contactnumber: function() {
                                            return $("#friend_contact_number_2").val();
                                        },
                                        id: function() {
                                            return $('#userid').val();
                                        },
                                        type: 1
                                    }
                                }
                            },
                        },
                        messages:{
                            email: { remote : "Email is already exist" },
                            contactnumber: { remote : "Mobile No. is already exist" },
                            profileurl: { remote : "Profile URL is already exist" },
                            friend_contact_number: { remote : "Mobile No. is already registered" },
                            friend_contact_number_2: { remote : "Mobile No. is already registered" },
                        },
                        errorPlacement: function(error, element) {
                            var placement = $(element).data('error');
                            //console.log(placement);
                            if (placement) {
                                $(element).closest('.main_talent').find(placement).append(error);
                            } else {
                                error.insertAfter(element);
                            }

                            // if (placement) {
                            //     $(placement).append(error);
                            // } else {
                            //     error.insertAfter(element);
                            // }
                        },
                        submitHandler: function(form) {
                            //var valid = validator.element("input[name=specification_1]");
                            //alert('valid');
                            //return false;
                            $('.selection_list').find('span').each(function(i){
                                var talent_name = $(this).attr('name');
                                html = '<input type="hidden" name="'+talent_name+'"  />';
                                $("#userupdateform").append(html);
                            });

                            console.log('Validate : '+validator.valid());
                            //return false;
                            form.submit();
                        }
                    });

                    $('#talentid1,#talentid2,#talentid3').on('change',function(){
                        var new_talent_id = $(this).val();
                        var tal_pri = $(this).parents('.form-group').find('#talent_priority').val();
                        var current_talent = $(this).parents('.form-group').find('#current_talent').val();
                        if(new_talent_id != ''){
                            $('#change_talent_modal').find('#talent_priority').val(tal_pri);
                            $('#change_talent_modal').find('#new_talent_id').val(new_talent_id);
                            $('#change_talent_modal').find('#current_talent').val(current_talent);
                            $('#change_talent_modal').modal({
                                backdrop: 'static',
                                keyboard: false
                            });
                        } else {
                            $(this).val(current_talent);
                            $(this).trigger("chosen:updated");
                        }
                    });

                    $('#native_country').on('change',function(){
                        var native_country_code = $(this).val();
                        $.ajax({
                            url: '<?php echo site_url("dashboard/get_cities_by_country_code_ajax"); ?>',
                            data: 'countrycode='+native_country_code,
                            type: 'POST',
                            success: function(data){
                                var list = $.parseJSON(data);
                                var native_city = list.living_city;
                                $('#native_city').html(native_city);
                                $("#native_city").trigger("chosen:updated");
                            },
                        });
                    });

                    $('#countrycode').on('change',function(){
                        var country_code = $(this).val();
                        $.ajax({
                            url: '<?php echo site_url("dashboard/get_cities_by_country_code_ajax"); ?>',
                            data: 'countrycode='+country_code,
                            type: 'POST',
                            success: function(data){
                                var list = $.parseJSON(data);
                                var living_city_list = list.living_city;
                                var ready_another_city_list = list.ready_another_city;
                                $('#living_city').html(living_city_list);
                                $('#ready_work_city').html(ready_another_city_list);
                                $("#living_city").trigger("chosen:updated");
                                $("#ready_work_city").trigger("chosen:updated");
                            },
                        });
                    });

                    $('input[type=checkbox]').on('ifChecked', function (event) {
                        if($(this).attr('id') == 'ready_work_city_checkbox'){
                            $('#ready_work_city_checkbox').val(1);
                            check_checkbox_event(1);
                        }
                    });

                    $('input[type=checkbox]').on('ifUnchecked', function (event) {
                        if($(this).attr('id') == 'ready_work_city_checkbox'){
                            $('#ready_work_city_checkbox').val(2);
                            check_checkbox_event(2);
                        }
                    });

                    $('input[name=heard_from]').on('ifChecked', function (event) {
                        if($(this).val() == 1){
                            $('#select_friend').hide();
                            $('#select_other').hide();
                        } else if($(this).val() == 2){
                            $('#select_friend').show();
                            $('#select_other').hide();
                        } else if($(this).val() == 3){
                            $('#select_friend').hide();
                            $('#select_other').show();
                        }
                    });

                    $('input[id=has_other_reference]').on('ifChecked', function (event) {
                        $('#has_other_reference_div').show();
                    });

                    $('input[id=has_other_reference]').on('ifUnchecked', function (event) {
                        $('#has_other_reference_div').hide();
                    });

                    $('#goingon1,#goingon2,#goingon3').on('ifChecked', function (event) {
                        $(this).parents('.form-group').siblings('#to_date').hide();
                        //console.log(this);
                        validator.element(this);
                        //validator.element("input[name='pri[training_status]']");
                    });

                    $('#completed1,#completed2,#completed3').on('ifChecked', function (event) {
                        $(this).parents('.form-group').siblings('#to_date').show();
                        validator.element(this);
                        //validator.element("input[name='pri[training_status]']");
                    });

                    $('#trainedat1,#trainedat2,#trainedat3').on('keyup', function(e){
                        var main_talent = $(this).closest('.main_talent');
                        if($(this).val() != '' || main_talent.find('input[id^=trainedby]').val() != ''){
                            main_talent.find('#training_exp').show();
                        } else {
                            main_talent.find('#training_exp').hide();
                        }
                    });

                    $('#trainedby1,#trainedby2,#trainedby3').on('keyup', function(e){
                        var main_talent = $(this).closest('.main_talent');
                        if($(this).val() != '' || main_talent.find('input[id^=trainedat]').val() != ''){
                            main_talent.find('#training_exp').show();
                        } else {
                            main_talent.find('#training_exp').hide();
                        }
                    });

                    // console.log('Trained At 1: '+$('#trainedat1').val());
                    // console.log('Trained By 1: '+$('#trainedby1').val());
                    // console.log('Trained At 2: '+$('#trainedat2').val());
                    // console.log('Trained By 2: '+$('#trainedby2').val());
                    
                    var main_talent_1 = $('#trainedat1').closest('.main_talent');
                    if($('#trainedat1').val() != '' || $('#trainedby1').val() != ''){
                        main_talent_1.find('#training_exp').show();
                    } else {
                        main_talent_1.find('#training_exp').hide();
                    }

                    var main_talent_2 = $('#trainedat2').closest('.main_talent');
                    if($('#trainedat2').val() != '' || $('#trainedby2').val() != ''){
                        main_talent_2.find('#training_exp').show();
                    } else {
                        main_talent_2.find('#training_exp').hide();
                    }

                    var main_talent_3 = $('#trainedat3').closest('.main_talent');
                    if($('#trainedat3').val() != '' || $('#trainedby3').val() != ''){
                        main_talent_3.find('#training_exp').show();
                    } else {
                        main_talent_3.find('#training_exp').hide();
                    }

                    $('#nofyears1,#nofyears2,#nofyears3').on('change', function (event) {
                        var main_talent = $(this).closest('.main_talent');
                        var experienced_div = $(this).closest('#experianced_div');
                        var specialization_div = main_talent.find('#specialization_div');
                        if(main_talent.find('input[id^=experianced]').is(':checked')){
                            //alert('experienced_div : '+experienced_div.find('select[id^=nofyears]').attr('id'));
                            //alert('No of years : '+$(this).val());
                            //alert('No of projects : '+experienced_div.find('select[id^=nofprojects]').val());
                            if($(this).val() != 0 || experienced_div.find('select[id^=nofprojects]').val() != 0){
                                specialization_div.show();
                            } else {
                                specialization_div.hide();
                            }
                        } else {
                            specialization_div.show();
                        }
                        validator.element(this);
                    });

                    $('#nofprojects1,#nofprojects2,#nofprojects3').on('change', function (event) {
                        var main_talent = $(this).closest('.main_talent');
                        var experienced_div = $(this).closest('#experianced_div');
                        var specialization_div = main_talent.find('#specialization_div');
                        if(main_talent.find('input[id^=experianced]').is(':checked')){
                            //alert('in project trigger');
                            //alert('No of projects : '+$(this).val());
                            //alert('No of years : '+experienced_div.find('select[id^=nofyears]').val());
                            if($(this).val() != 0 || experienced_div.find('select[id^=nofyears]').val() != 0){
                                specialization_div.show();
                            } else {
                                specialization_div.hide();
                            }
                        } else {
                            specialization_div.show();
                        }
                        validator.element(this);
                    });

                    $('#fresher1,#fresher2,#fresher3').on('ifChecked', function (event) {
                        var main_talent = $(this).closest('.main_talent');
                        main_talent.find('#fresher_div').show();
                        main_talent.find('#experianced_div').hide();
                        main_talent.find('select[id^=nofyears]').trigger('change');
                        main_talent.find('select[id^=nofprojects]').trigger('change');
                        validator.element(this);
                        // $('#fresher_div').show();
                        // $('#experianced_div').hide();
                        // validator.element("#fresher");
                        // $('#nofyears').trigger('change');
                        // $('#nofprojects').trigger('change');
                        
                    });

                    $('#experianced1,#experianced2,#experianced3').on('ifChecked', function (event) {
                        var main_talent = $(this).closest('.main_talent');
                        main_talent.find('#fresher_div').hide();
                        main_talent.find('#experianced_div').show();
                        main_talent.find('select[id^=nofyears]').trigger('change');
                        validator.element(this);
                        // $('#fresher_div').hide();
                        // $('#experianced_div').show();
                        // validator.element("#experianced");
                        // $('#nofyears').trigger('change');
                        // $('#nofprojects').trigger('change');
                        
                    });

                    

                    var specification_arr = [ "1", "2", "3", "4", "5" ];

                    // $('input[id^=select_specialization]').on('ifChecked',function(){
                        
                    //     var check_valid = validator.element($(this));
                    //     if(!check_valid){
                    //         //alert('asd');
                    //         setTimeout(function(){
                    //             $(this).iCheck('uncheck');
                    //             $(this).trigger('ifUnchecked');
                    //             //alert('asd');
                    //         },1000);                            
                    //         return false;
                    //     }

                    //     var talent_pri = $(this).closest('.main_talent').find('#talent_priority').val();
                    //     var selected_specialization = get_spec_id($(this).attr('id'));
                    //     var thiss = $(this);

                    //     console.log(talent_pri);
                    //     console.log(selected_specialization);

                    //     //console.log($(this).closest('.main_talent').html());

                    //     //var check_valid = validator.element("input[id^=select_specialization]");
                        
                    //     switch (talent_pri) {
                    //         case '1':
                    //             pri_specializations.push(selected_specialization);
                    //             disable_interest_spec(selected_specialization, talent_pri, thiss);
                    //             break;
                    //         case '2':
                    //             sec_specializations.push(selected_specialization);
                    //             disable_interest_spec(selected_specialization, talent_pri, thiss);
                    //             break;
                    //         case '3':
                    //             third_specializations.push(selected_specialization);
                    //             disable_interest_spec(selected_specialization, talent_pri, thiss);
                    //             break;
                    //         default:
                    //             break;
                    //     }
                    //     // if(check_valid){
                    //         $.ajax({
                    //             url: '<?php echo site_url("dashboard/get_speci_by_spid_ajax"); ?>',
                    //             data: 'spid='+selected_specialization,
                    //             type: 'POST',
                    //             async: false,
                    //             success: function(data){
                    //                 var list = $.parseJSON(data);
                    //                 var spec_name = $.trim(thiss.val());
                    //                 var specialization_div = thiss.parents('#specialization_div');
                    //                 //console.log(specialization_div);
                    //                 $.each( specification_arr, function( i, val ) {
                    //                     //var specialization_box_id = $("#specification_box_" + val ).parent().find('#specialization_box_id');
                    //                     var specification_box = specialization_div.find("#specification_box_" + val );
                    //                     var specialization_box_id = specification_box.parent().find('#specialization_box_id');
                    //                     //var html_check = $("#specification_box_" + val ).html();
                    //                     var html_check = specification_box.html();
                    //                     if(html_check == ''){
                    //                         specialization_box_id.val(selected_specialization);
                    //                         specification_box.html(list);
                    //                         specification_box.find('input[type=checkbox]').each(function(){
                    //                             //console.log('Priority '+talent_pri);
                    //                             $(this).attr('data-error','#specification_valid_'+val);
                    //                             $(this).attr('data-spe_name',spec_name);
                    //                             $(this).attr('name','specification_'+talent_pri+'_'+val);
                    //                             //console.log($(this).attr('id'));
                    //                             // $(this).rules('add', {
                    //                             //     check_specification_length_valid: true,
                    //                             // });
                    //                             $('input[name=specification_'+talent_pri+'_'+val+']').rules('add', {
                    //                                 check_specification_length_valid: true,
                    //                             });
                    //                         });
                    //                         if(list != ''){
                    //                             var specialization_name_label = specification_box.parent().find('label#specialization_name');
                    //                             //var specialization_name_label = $("#specification_box_" + val ).parent().find('label#specialization_name');
                    //                             specialization_name_label.html(spec_name+"'s Specifications");
                    //                             if(specialization_name_label.text().length > 34){
                    //                                 var word_array = specialization_name_label.text().split(" ");
                    //                                 first_word = word_array[0];
                    //                                 last_word = word_array[word_array.length-1];
                    //                                 specialization_name_label.html(first_word+" ... "+last_word);
                    //                             }
                    //                         }
                    //                         return false;
                    //                     } else {
                    //                         return true;
                    //                     }
                    //                 });
                    //                 //thiss.parents('.row').find('#specification_box').html(list);
                    //                 $('.i-checks-speci').iCheck({
                    //                     checkboxClass: 'icheckbox_square-green',
                    //                     radioClass: 'iradio_square-green',
                    //                 });
                    //                 var string = '<span name="specializations_ids_'+talent_pri+'['+selected_specialization+']" data-value="'+selected_specialization+'" id="spec_'+selected_specialization+'">'+spec_name+', </span>';
                    //                 //var string = '<span name="specializations_ids[]" data-value="'+selected_specialization+'" id="spec_'+selected_specialization+'">'+spec_name+', </span>';
                    //                 if(list == ''){

                    //                     var selection_list = thiss.closest('.main_talent').find('.selection_list').find('h3');
                    //                     //console.log(thiss);
                    //                     //console.log(selection_list);
                    //                     if(selection_list.find('span#spec_'+selected_specialization).length == 0){
                    //                         var count_ele = selection_list.find('span').length;
                    //                         selection_list.append(string);
                    //                         set_list_color(thiss);
                    //                         //setTimeout(function(){ set_list_color(); },500);
                    //                     }
                    //                 } else {
                                        
                    //                 }
                    //             },
                    //         });
                    //     // }

                    // });

                    $(document).on('ifChecked', 'input[id^=select_specification]', function(event) {
                        var talent_pri = $(this).closest('.main_talent').find('#talent_priority').val();
                        var selected_specification = get_spec_id($(this).attr('id'));
                        var parent_specialization = $(this).data('spe_name');
                        var parent_specialization_id = get_spec_id($(this).data('spid'));

                        var specification_name = $(this).attr('name');
                        //validator.element("input[name="+specification_name+"]");
                        validator.element($(this));


                        var spec_name = $.trim($(this).val());
                        var string = '<span name="specializations_ids_'+talent_pri+'['+parent_specialization_id+']['+selected_specification+']" data-value="'+parent_specialization_id+'['+selected_specification+']" id="sup_spec_'+selected_specification+'" data-spid="parent_spec_'+parent_specialization_id+'">'+spec_name+' ('+parent_specialization+'), </span>';
                        
                        var selection_list = $(this).closest('.main_talent').find('.selection_list').find('h3');
                        if(selection_list.find('span#sup_spec_'+selected_specification).length == 0){
                            selection_list.append(string);
                        }
                        set_list_color($(this));
                    });

                    $('input[id^=select_specialization]').on('ifUnchecked',function(){
                        //alert('sss');
                        var talent_pri = $(this).closest('.main_talent').find('#talent_priority').val();
                        var specialization_div = $(this).parents('#specialization_div');
                        var selected_specialization = get_spec_id($(this).attr('id'));

                        console.log(selected_specialization);

                        switch (talent_pri) {
                            case '1':
                                var indexofele = pri_specializations.indexOf(selected_specialization);
                                if (indexofele > -1) {
                                    pri_specializations.splice(indexofele, 1);
                                }
                                enable_interest_spec(selected_specialization, talent_pri, $(this));
                                break;
                            case '2':
                                var indexofele = sec_specializations.indexOf(selected_specialization);
                                if (indexofele > -1) {
                                    sec_specializations.splice(indexofele, 1);
                                }
                                enable_interest_spec(selected_specialization, talent_pri, $(this));
                                break;
                            case '3':
                                var indexofele = third_specializations.indexOf(selected_specialization);
                                if (indexofele > -1) {
                                    third_specializations.splice(indexofele, 1);
                                }
                                enable_interest_spec(selected_specialization, talent_pri, $(this));
                                break;
                            default:
                                break;
                        }

                        var selection_list = $(this).closest('.main_talent').find('.selection_list').find('h3');
                        selection_list.find('span#spec_'+selected_specialization).remove();
                        selection_list.find('span[data-spid=parent_spec_'+selected_specialization+']').each(function(){
                            $(this).remove();
                        });
                        set_list_color($(this));

                        validator.element($(this));

                        $.each( specification_arr, function( i, val ) {
                            var specification_box = specialization_div.find("#specification_box_" + val );
                            var specialization_box_id = specification_box.parent().find('#specialization_box_id');
                            if(specialization_box_id.val() == selected_specialization){
                                specification_box.html('');
                                specialization_box_id.val('');
                                specification_box.parent().find('label#specialization_name').html('&nbsp;');
                                return false;
                            } else {
                                return true;
                            }
                        });

                        $('#specification_box').html('&nbsp;');

                        validator.element($(this));
                    });

                    $('input[id^=select_specialization]').on('ifChecked',function(){
                        
                        var check_valid = validator.element($(this));
                        if(!check_valid){
                            var dd = $(this).attr('id');
                            //$('#'+dd).iCheck('uncheck');
                            $('#'+dd).trigger('ifUnchecked');
                            //console.log($('#'+dd));
                            return false;
                        }

                        var talent_pri = $(this).closest('.main_talent').find('#talent_priority').val();
                        var selected_specialization = get_spec_id($(this).attr('id'));
                        var thiss = $(this);

                        console.log(talent_pri);
                        console.log(selected_specialization);

                        //console.log($(this).closest('.main_talent').html());

                        //var check_valid = validator.element("input[id^=select_specialization]");
                        
                        switch (talent_pri) {
                            case '1':
                                pri_specializations.push(selected_specialization);
                                disable_interest_spec(selected_specialization, talent_pri, thiss);
                                break;
                            case '2':
                                sec_specializations.push(selected_specialization);
                                disable_interest_spec(selected_specialization, talent_pri, thiss);
                                break;
                            case '3':
                                third_specializations.push(selected_specialization);
                                disable_interest_spec(selected_specialization, talent_pri, thiss);
                                break;
                            default:
                                break;
                        }
                        // if(check_valid){
                            $.ajax({
                                url: '<?php echo site_url("dashboard/get_speci_by_spid_ajax"); ?>',
                                data: 'spid='+selected_specialization,
                                type: 'POST',
                                async: false,
                                success: function(data){
                                    var list = $.parseJSON(data);
                                    var spec_name = $.trim(thiss.val());
                                    var specialization_div = thiss.parents('#specialization_div');
                                    //console.log(specialization_div);
                                    $.each( specification_arr, function( i, val ) {
                                        //var specialization_box_id = $("#specification_box_" + val ).parent().find('#specialization_box_id');
                                        var specification_box = specialization_div.find("#specification_box_" + val );
                                        var specialization_box_id = specification_box.parent().find('#specialization_box_id');
                                        //var html_check = $("#specification_box_" + val ).html();
                                        var html_check = specification_box.html();
                                        if(html_check == ''){
                                            specialization_box_id.val(selected_specialization);
                                            specification_box.html(list);
                                            specification_box.find('input[type=checkbox]').each(function(){
                                                //console.log('Priority '+talent_pri);
                                                $(this).attr('data-error','#specification_valid_'+val);
                                                $(this).attr('data-spe_name',spec_name);
                                                $(this).attr('name','specification_'+talent_pri+'_'+val);
                                                //console.log($(this).attr('id'));
                                                // $(this).rules('add', {
                                                //     check_specification_length_valid: true,
                                                // });
                                                $('input[name=specification_'+talent_pri+'_'+val+']').rules('add', {
                                                    check_specification_length_valid: true,
                                                });
                                            });
                                            if(list != ''){
                                                var specialization_name_label = specification_box.parent().find('label#specialization_name');
                                                //var specialization_name_label = $("#specification_box_" + val ).parent().find('label#specialization_name');
                                                specialization_name_label.html(spec_name+"'s Specifications");
                                                if(specialization_name_label.text().length > 34){
                                                    var word_array = specialization_name_label.text().split(" ");
                                                    first_word = word_array[0];
                                                    last_word = word_array[word_array.length-1];
                                                    specialization_name_label.html(first_word+" ... "+last_word);
                                                }
                                            }
                                            return false;
                                        } else {
                                            return true;
                                        }
                                    });
                                    //thiss.parents('.row').find('#specification_box').html(list);
                                    $('.i-checks-speci').iCheck({
                                        checkboxClass: 'icheckbox_square-green',
                                        radioClass: 'iradio_square-green',
                                    });
                                    var string = '<span name="specializations_ids_'+talent_pri+'['+selected_specialization+']" data-value="'+selected_specialization+'" id="spec_'+selected_specialization+'">'+spec_name+', </span>';
                                    //var string = '<span name="specializations_ids[]" data-value="'+selected_specialization+'" id="spec_'+selected_specialization+'">'+spec_name+', </span>';
                                    if(list == ''){

                                        var selection_list = thiss.closest('.main_talent').find('.selection_list').find('h3');
                                        //console.log(thiss);
                                        //console.log(selection_list);
                                        if(selection_list.find('span#spec_'+selected_specialization).length == 0){
                                            var count_ele = selection_list.find('span').length;
                                            selection_list.append(string);
                                            set_list_color(thiss);
                                            //setTimeout(function(){ set_list_color(); },500);
                                        }
                                    } else {
                                        
                                    }
                                },
                            });
                        // }

                    });

                    $(document).on('ifUnchecked', 'input[id^=select_specification]', function(event) { 
                        var selected_specification = get_spec_id($(this).attr('id'));
                        var selection_list = $(this).closest('.main_talent').find('.selection_list').find('h3');

                        var specification_name = $(this).attr('name');
                        validator.element(this);
                        //validator.element("input[name="+specification_name+"]");

                        selection_list.find('span#sup_spec_'+selected_specification).remove();
                        set_list_color($(this));
                    });

                    var ready_cities_is_array = $('#ready_cities_is_array').val();
                    if(ready_cities_is_array == '0'){
                        $('#ready_work_city_checkbox').iCheck('check');
                        $('#ready_work_city_checkbox').css('display', 'block');
                        $('#ready_work_city_checkbox').trigger('ifChecked');
                    } else {
                        $('#ready_work_city_checkbox').iCheck('uncheck');
                        $('#ready_work_city_checkbox').trigger('ifUnchecked');
                    }

                    var heard_from = '<?php if(isset($user_feedback["heard_from"])) { echo $user_feedback["heard_from"]; } else { echo "0"; } ?>';
                    if(heard_from == '2'){
                        $('#select_friend').toggle();
                    } else if(heard_from == '3'){
                        $('#select_other').toggle();
                    }

                    var friend_full_name_2 = '<?php if(isset($user_feedback["friend_full_name_2"]) && $user_feedback["friend_full_name_2"] != "") { echo $user_feedback["friend_full_name_2"]; } else { echo ""; } ?>';
                    if(friend_full_name_2 != ''){
                        $('#has_other_reference').iCheck('check');
                        $('#has_other_reference').trigger('ifChecked');
                    } else if(heard_from == '3'){
                        $('#has_other_reference').iCheck('uncheck');
                        $('#has_other_reference').trigger('ifUnchecked');
                    }

                    var fresherorexperience1 = '<?php if(isset($pri_talent["fresherorexperience"]) && $pri_talent["fresherorexperience"] != "") { echo $pri_talent["fresherorexperience"]; } else { echo ""; } ?>';
                    if(fresherorexperience1 == '1'){
                        $('#fresher1').iCheck('check');
                        $('#fresher1').trigger('ifChecked');
                    } else if(fresherorexperience1 == '2'){
                        $('#experianced1').iCheck('check');
                        $('#experianced1').trigger('ifChecked');
                    }

                    var fresherorexperience2 = '<?php if(isset($sec_talent["fresherorexperience"]) && $sec_talent["fresherorexperience"] != "") { echo $sec_talent["fresherorexperience"]; } else { echo ""; } ?>';
                    if(fresherorexperience2 == '1'){
                        $('#fresher2').iCheck('check');
                        $('#fresher2').trigger('ifChecked');
                    } else if(fresherorexperience2 == '2'){
                        $('#experianced2').iCheck('check');
                        $('#experianced2').trigger('ifChecked');
                    }

                    var fresherorexperience3 = '<?php if(isset($third_talent["fresherorexperience"]) && $third_talent["fresherorexperience"] != "") { echo $third_talent["fresherorexperience"]; } else { echo ""; } ?>';
                    if(fresherorexperience3 == '1'){
                        $('#fresher3').iCheck('check');
                        $('#fresher3').trigger('ifChecked');
                    } else if(fresherorexperience3 == '2'){
                        $('#experianced3').iCheck('check');
                        $('#experianced3').trigger('ifChecked');
                    }

                    var training_status1 = '<?php if(isset($pri_talent["training_status"]) && $pri_talent["training_status"] != "") { echo $pri_talent["training_status"]; } else { echo ""; } ?>';
                    if(training_status1 == '1'){
                        $('#goingon1').iCheck('check');
                    } else if(training_status1 == '2'){
                        $('#completed1').iCheck('check');
                    }

                    var training_status2 = '<?php if(isset($sec_talent["training_status"]) && $sec_talent["training_status"] != "") { echo $sec_talent["training_status"]; } else { echo ""; } ?>';
                    if(training_status2 == '1'){
                        $('#goingon2').iCheck('check');
                    } else if(training_status2 == '2'){
                        $('#completed2').iCheck('check');
                    }

                    var training_status3 = '<?php if(isset($third_talent["training_status"]) && $third_talent["training_status"] != "") { echo $third_talent["training_status"]; } else { echo ""; } ?>';
                    if(training_status3 == '1'){
                        $('#goingon3').iCheck('check');
                    } else if(training_status3 == '2'){
                        $('#completed3').iCheck('check');
                    }

                    $('#interest_button1,#interest_button2,#interest_button3').on('click',function(){
                        var main_talent = $(this).closest('.main_talent');
                        main_talent.find('#interest').fadeIn();
                        main_talent.find('#add_intrest').fadeOut();
                    });

                    $('#nofyears1').trigger('change');
                    $('#nofyears2').trigger('change');
                    $('#nofyears3').trigger('change');
                    $('#nofprojects1').trigger('change');
                    $('#nofprojects2').trigger('change');
                    $('#nofprojects3').trigger('change');

                    var pri_specializations = [];
                    var sec_specializations = [];
                    var third_specializations = [];

                    <?php if(isset($pri_talent) && !empty($pri_talent)){ ?>
                        // var utid = '<?php echo $pri_talent["id"]; ?>';
                        // $.ajax({
                        //     url: '<?php echo site_url("dashboard/get_uts_n_utss_by_utid_ajax"); ?>',
                        //     data: 'utid='+utid,
                        //     type: 'POST',
                        //     async: false,
                        //     success: function(data){
                        //         //console.log(data);
                        //         //if(data!=undefined){
                        //             var list = $.parseJSON(data);
                        //             //console.log(list);
                        //             $.each(list, function(specialization, specification){
                        //                 $('#select_specialization_'+specialization).rules('add', {
                        //                     check_specializations_length_valid: true,
                        //                 });
                        //                 //console.log($('#select_specialization_'+specialization).attr('name'));
                        //                 $('#select_specialization_'+specialization).iCheck('check',function(){
                        //                     //pri_specializations.push(specialization);
                        //                     if(specification != 0){
                        //                         $.each(specification, function(i, spec){
                        //                             $('#select_specification_'+spec).iCheck('check');
                        //                         });
                        //                     }
                        //                 });
                        //             });
                        //         //}
                        //     },
                        // });

                        // var int_speci1 = '<?php if(isset($pri_talent["newinterest"]) && $pri_talent["newinterest"] != "") { echo $pri_talent["newinterest"]; } else { echo ""; } ?>';
                        // if(int_speci1 != 0 && int_speci1 != ''){
                        //     var int_sup_spec1 = '<?php if(isset($pri_talent["spnewinterest"]) && $pri_talent["spnewinterest"] != "") { echo $pri_talent["spnewinterest"]; } else { echo ""; } ?>';
                        //     $('#interest_button1').trigger('click');
                        //     get_interest_specifications(int_speci1,'#interest1',int_sup_spec1);
                        // }

                    <?php } ?>

                    <?php if(isset($sec_talent) && !empty($sec_talent)){ ?>
                        // var utid = '<?php echo $sec_talent["id"]; ?>';
                        // $.ajax({
                        //     url: '<?php echo site_url("dashboard/get_uts_n_utss_by_utid_ajax"); ?>',
                        //     data: 'utid='+utid,
                        //     type: 'POST',
                        //     async: false,
                        //     success: function(data){
                        //         //console.log(data);
                        //         //if(data!=undefined){
                        //             var list = $.parseJSON(data);
                        //             //console.log(list);
                        //             $.each(list, function(specialization, specification){
                        //                 $('#select_specialization_'+specialization).rules('add', {
                        //                     check_specializations_length_valid: true,
                        //                 });
                        //                 //console.log($('#select_specialization_'+specialization).attr('name'));
                        //                 $('#select_specialization_'+specialization).iCheck('check',function(){
                        //                     //sec_specializations.push(specialization);
                        //                     if(specification != 0){
                        //                         $.each(specification, function(i, spec){
                        //                             $('#select_specification_'+spec).iCheck('check');
                        //                         });
                        //                     }
                        //                 });
                        //             });
                        //         //}
                        //     },
                        // });

                        // var int_speci2 = '<?php if(isset($sec_talent["newinterest"]) && $sec_talent["newinterest"] != "") { echo $sec_talent["newinterest"]; } else { echo ""; } ?>';
                        // if(int_speci2 != 0 && int_speci2 != ''){
                        //     var int_sup_spec2 = '<?php if(isset($sec_talent["spnewinterest"]) && $sec_talent["spnewinterest"] != "") { echo $sec_talent["spnewinterest"]; } else { echo ""; } ?>';
                        //     $('#interest_button2').trigger('click');
                        //     get_interest_specifications(int_speci2,'#interest2',int_sup_spec2);
                        // }

                    <?php } ?>

                    <?php if(isset($third_talent) && !empty($third_talent)){ ?>
                        // var utid = '<?php echo $third_talent["id"]; ?>';
                        // $.ajax({
                        //     url: '<?php echo site_url("dashboard/get_uts_n_utss_by_utid_ajax"); ?>',
                        //     data: 'utid='+utid,
                        //     type: 'POST',
                        //     async: false,
                        //     success: function(data){
                        //         //console.log(data);
                        //         //if(data!=undefined){
                        //             var list = $.parseJSON(data);
                        //             //console.log(list);
                        //             $.each(list, function(specialization, specification){
                        //                 $('#select_specialization_'+specialization).rules('add', {
                        //                     check_specializations_length_valid: true,
                        //                 });
                        //                 //console.log($('#select_specialization_'+specialization).attr('name'));
                        //                 $('#select_specialization_'+specialization).iCheck('check',function(){
                        //                     //third_specializations.push(specialization);
                        //                     if(specification != 0){
                        //                         $.each(specification, function(i, spec){
                        //                             $('#select_specification_'+spec).iCheck('check');
                        //                         });
                        //                     }
                        //                 });
                        //             });
                        //         //}
                        //     },
                        // });

                        // var int_speci3 = '<?php if(isset($third_talent["newinterest"]) && $third_talent["newinterest"] != "") { echo $third_talent["newinterest"]; } else { echo ""; } ?>';
                        // if(int_speci3 != 0 && int_speci3 != ''){
                        //     var int_sup_spec3 = '<?php if(isset($third_talent["spnewinterest"]) && $third_talent["spnewinterest"] != "") { echo $third_talent["spnewinterest"]; } else { echo ""; } ?>';
                        //     $('#interest_button3').trigger('click');
                        //     get_interest_specifications(int_speci3,'#interest3',int_sup_spec3);
                        // }
                    <?php } ?>


                    $(window).scroll(function() {
                        if($('.talent1').length > 0){
                            if ($(window).scrollTop() + $(window).height() >= $('.talent1').offset().top) {
                                if(!$('.talent1').attr('loaded')) {
                                    <?php if(isset($pri_talent) && !empty($pri_talent)){ ?>
                                        var utid = '<?php echo $pri_talent["id"]; ?>';
                                        $.ajax({
                                            url: '<?php echo site_url("dashboard/get_uts_n_utss_by_utid_ajax"); ?>',
                                            data: 'utid='+utid,
                                            type: 'POST',
                                            async: false,
                                            success: function(data){
                                                var list = $.parseJSON(data);
                                                $.each(list, function(specialization, specification){
                                                    $('#select_specialization_'+specialization).rules('add', {
                                                        check_specializations_length_valid: true,
                                                    });
                                                    $('#select_specialization_'+specialization).iCheck('check',function(){
                                                        //pri_specializations.push(specialization);
                                                        if(specification != 0){
                                                            $.each(specification, function(i, spec){
                                                                $('#select_specification_'+spec).iCheck('check');
                                                            });
                                                        }
                                                    });
                                                });
                                            },
                                        });

                                        var int_speci1 = '<?php if(isset($pri_talent["newinterest"]) && $pri_talent["newinterest"] != "") { echo $pri_talent["newinterest"]; } else { echo ""; } ?>';
                                        if(int_speci1 != 0 && int_speci1 != ''){
                                            var int_sup_spec1 = '<?php if(isset($pri_talent["spnewinterest"]) && $pri_talent["spnewinterest"] != "") { echo $pri_talent["spnewinterest"]; } else { echo ""; } ?>';
                                            $('#interest_button1').trigger('click');
                                            get_interest_specifications(int_speci1,'#interest1',int_sup_spec1);
                                        }

                                    <?php } ?>
                                    $('.talent1').closest('.main_talent').find('.ajax_loader').fadeOut(1000);
                                    $('.talent1').attr('loaded', true);
                                }
                            }
                        }

                        if($('.talent2').length > 0){
                            if ($(window).scrollTop() + $(window).height() >= $('.talent2').offset().top) {
                                if(!$('.talent2').attr('loaded')) {
                                    <?php if(isset($sec_talent) && !empty($sec_talent)){ ?>
                                        var utid = '<?php echo $sec_talent["id"]; ?>';
                                        $.ajax({
                                            url: '<?php echo site_url("dashboard/get_uts_n_utss_by_utid_ajax"); ?>',
                                            data: 'utid='+utid,
                                            type: 'POST',
                                            async: false,
                                            success: function(data){
                                                var list = $.parseJSON(data);
                                                $.each(list, function(specialization, specification){
                                                    $('#select_specialization_'+specialization).rules('add', {
                                                        check_specializations_length_valid: true,
                                                    });
                                                    $('#select_specialization_'+specialization).iCheck('check',function(){
                                                        //sec_specializations.push(specialization);
                                                        if(specification != 0){
                                                            $.each(specification, function(i, spec){
                                                                $('#select_specification_'+spec).iCheck('check');
                                                            });
                                                        }
                                                    });
                                                });
                                            },
                                        });

                                        var int_speci2 = '<?php if(isset($sec_talent["newinterest"]) && $sec_talent["newinterest"] != "") { echo $sec_talent["newinterest"]; } else { echo ""; } ?>';
                                        if(int_speci2 != 0 && int_speci2 != ''){
                                            var int_sup_spec2 = '<?php if(isset($sec_talent["spnewinterest"]) && $sec_talent["spnewinterest"] != "") { echo $sec_talent["spnewinterest"]; } else { echo ""; } ?>';
                                            $('#interest_button2').trigger('click');
                                            get_interest_specifications(int_speci2,'#interest2',int_sup_spec2);
                                        }

                                    <?php } ?>

                                    $('.talent2').closest('.main_talent').find('.ajax_loader').fadeOut(1000);
                                    $('.talent2').attr('loaded', true);
                                }
                            }
                        }

                        if($('.talent3').length > 0){
                            if ($(window).scrollTop() + $(window).height() >= $('.talent3').offset().top) {
                                if(!$('.talent3').attr('loaded')) {
                                    <?php if(isset($third_talent) && !empty($third_talent)){ ?>
                                        var utid = '<?php echo $third_talent["id"]; ?>';
                                        $.ajax({
                                            url: '<?php echo site_url("dashboard/get_uts_n_utss_by_utid_ajax"); ?>',
                                            data: 'utid='+utid,
                                            type: 'POST',
                                            async: false,
                                            success: function(data){
                                                var list = $.parseJSON(data);
                                                $.each(list, function(specialization, specification){
                                                    $('#select_specialization_'+specialization).rules('add', {
                                                        check_specializations_length_valid: true,
                                                    });
                                                    $('#select_specialization_'+specialization).iCheck('check',function(){
                                                        //third_specializations.push(specialization);
                                                        if(specification != 0){
                                                            $.each(specification, function(i, spec){
                                                                $('#select_specification_'+spec).iCheck('check');
                                                            });
                                                        }
                                                    });
                                                });
                                            },
                                        });

                                        var int_speci3 = '<?php if(isset($third_talent["newinterest"]) && $third_talent["newinterest"] != "") { echo $third_talent["newinterest"]; } else { echo ""; } ?>';
                                        if(int_speci3 != 0 && int_speci3 != ''){
                                            var int_sup_spec3 = '<?php if(isset($third_talent["spnewinterest"]) && $third_talent["spnewinterest"] != "") { echo $third_talent["spnewinterest"]; } else { echo ""; } ?>';
                                            $('#interest_button3').trigger('click');
                                            get_interest_specifications(int_speci3,'#interest3',int_sup_spec3);
                                        }
                                    <?php } ?>

                                    $('.talent3').closest('.main_talent').find('.ajax_loader').fadeOut(1000);
                                    $('.talent3').attr('loaded', true);
                                }
                            }
                        }

                    });


                });

                function check_checkbox_event(type){
                    if(type == 1){
                        $('#ready_work_city_checkbox').show();
                        $('#ready_work_city_chosen').hide();
                    } else {
                        $('#ready_work_city_checkbox').hide();
                        $('#ready_work_city_chosen').show();
                    }
                }

                function isNumberKey(evt){
                    if(evt.keyCode == 9 || evt.keyCode == 8)
                    {
                    
                    } else {
                        var charCode = (evt.which) ? evt.which : event.keyCode 
                        if (charCode < 46 || charCode > 57) {
                            return false;
                        }
                    }
                    return true;
                }

                function set_list_color(thiss){
                    var main_talent = thiss.closest('.main_talent');
                    var selection_list = main_talent.find('.selection_list').find('h3').find('span');
                    selection_list.each(function(i){
                        if(i%2 == '0'){
                            $(this).removeClass('even_color').removeClass('odd_color').addClass('odd_color');
                        } else {
                            $(this).removeClass('even_color').removeClass('odd_color').addClass('even_color');
                        }
                    });
                }

                function get_spec_id(id){
                    var selected_id = id.split('_');
                    return selected_id[2];
                }

                function change_talent_modal_function(){
                    var tal_pri = $('#change_talent_modal').find('#talent_priority').val();
                    var new_talent_id = $('#change_talent_modal').find('#new_talent_id').val();
                    var userid = $('#userid').val();

                    $.ajax({
                        url: '<?php echo site_url("dashboard/delete_user_talent_ajax"); ?>',
                        data: 'tal_pri='+tal_pri+'&userid='+userid+'&new_talent_id='+new_talent_id,
                        type: 'POST',
                        async: false,
                        success: function(data){
                            if(data){
                                window.location.href = window.location.href;
                            } else {
                                alert('something cause problem. Pleas relogin');
                            }
                        },
                    });
                }

                function cancel_change_talent(){
                    var current_talent = $('#change_talent_modal').find('#current_talent').val();
                    var tal_pri = $('#change_talent_modal').find('#talent_priority').val();
                    //console.log($('#talentid'));
                    $('#talentid'+tal_pri).val(current_talent);
                    $('#talentid'+tal_pri).trigger("chosen:updated");
                }

                function disable_interest_spec(specialization,tal_pri,thiss){
                    var main_talent = $(thiss).closest('.main_talent');
                    main_talent.find('#newinterest').find('option[value='+specialization+']').attr('disabled', true);
                    if(specialization == main_talent.find('#newinterest option:selected').attr('value')){
                        main_talent.find('#newinterest').val('');
                        main_talent.find('#interest_specification').val('');
                        main_talent.find('#interest_specification').hide();
                    }
                    main_talent.find('#newinterest').trigger("chosen:updated");
                }

                function enable_interest_spec(specialization,tal_pri,thiss){
                    var main_talent = $(thiss).closest('.main_talent');
                    main_talent.find('#newinterest').find('option[value='+specialization+']').attr('disabled', false);
                    if(specialization == main_talent.find('#newinterest option:selected').attr('value')){
                        main_talent.find('#newinterest').val('');
                        main_talent.find('#interest_specification').val('');
                        main_talent.find('#interest_specification').hide();
                    }
                    main_talent.find('#newinterest').trigger("chosen:updated");
                }

                function get_interest_specifications(int_speci,thiss,int_sup_spec){
                    if(int_sup_spec == undefined){
                        int_sup_spec = '';
                    }
                    var main_talent = $(thiss).closest('.main_talent');
                    $.ajax({
                        url: '<?php echo site_url("dashboard/get_superspec_by_spec_ajax"); ?>',
                        data: 'specialization='+int_speci,
                        type: 'POST',
                        async: false,
                        success: function(data){
                            var list = $.parseJSON(data);
                            if(list != '0'){
                                main_talent.find('#spnewinterest').html(list);
                                main_talent.find('#spnewinterest').val(int_sup_spec);
                                main_talent.find("#spnewinterest").trigger("chosen:updated");
                                main_talent.find('#interest_specification').show();
                            } else {
                                main_talent.find('#spnewinterest').html('');
                                main_talent.find("#spnewinterest").trigger("chosen:updated");
                                main_talent.find('#interest_specification').hide();
                            }
                        },
                    });
                }

            </script>
        <?php } ?>

        <?php if($url == 'add_admin'){ ?>
            <!-- Switchery -->
            <script src="<?=base_url()?>public/js/plugins/switchery/switchery.js"></script>
            <script>
                $(document).ready(function() {
                    var elem = document.querySelector('.js-switch');
                    var switchery = new Switchery(elem, { color: '#1AB394' });
                });
            </script>
        <?php } ?>

        <?php if($url == 'agile_board'){ ?>
            <script>
                $(document).ready(function() {

                    var startDate = new Date();

                    $(".form_datetime").datetimepicker({
                        format: 'dd/mm/yyyy hh:ii',
                        autoclose: true,
                        startDate: startDate
                    });

                    $('#form_add_task').on('submit',function(event){
                        event.preventDefault();
                        $('#add_task_modal').find('.hide-form').hide();
                        $('.ajax-loader').show();
                        var task_title = encodeURIComponent($('#task_title').val());
                        var task_description = encodeURIComponent($('#task_description').val());
                        var due_date = $('#due_date').val();
                        var assignee = $('#assignee').val();
                        var followers = $('#followers').val();
                        var priority = $('#priority:checked').val();
                        var id = $('#edit_task_id').val();

                        $.ajax({
                            url: '<?php echo site_url("dashboard/add_task_ajax"); ?>',
                            data: 'id='+id+'&task_title='+task_title+'&task_description='+task_description+'&assignee='+assignee+'&followers='+followers+'&due_date='+due_date+'&priority='+priority,
                            type: 'POST',
                            success: function(data){
                                if(data == 1){
                                    $('#add_task_modal').find('.hide-form').show();
                                    $('.ajax-loader').hide();
                                    window.location = '<?php echo site_url("dashboard/agile_board"); ?>';
                                } else {
                                    $('#add_task_modal').find('.hide-form').show();
                                    $('.ajax-loader').hide();
                                    alert('Some error occured. Please try again');
                                }
                            },
                        });
                    });

                    $('#add_task_button').on('click', function(){
                        $('#add_task_modal').find('input[type=text]').each(function(){
                            $(this).val('');
                        });
                        $('#add_task_modal').find('select').each(function(){
                            $(this).find('option').removeAttr('selected');
                            $(this).trigger("chosen:updated");
                        });
                        $('#task_description').val('');
                        $('#form_add_task').find('button[type=submit]').html('Add');
                        $('#edit_task_id').val('');
                    });

                    /*$('.call_edit_model').on('dblclick',function(){
                        $('.page_loader').show();
                        var edit_task_id = $(this).data('id');
                        $('#edit_task_id').val(edit_task_id);
                        $.ajax({
                            url: '<?php echo site_url("dashboard/get_task_details_ajax"); ?>',
                            data: 'edit_task_id='+edit_task_id,
                            type: 'POST',
                            async: false,
                            success: function(data){
                                var res = $.parseJSON(data);
                                //console.log(res);
                                //alert(res.priority);
                                $('#task_title').val(res.task_title);
                                $('#task_description').val(res.task_description);
                                $('#due_date').val(res.due_date);
                                $('#assignee').html(res.assignee);
                                $("#assignee").trigger("chosen:updated");
                                $('#followers').html(res.followers);
                                $("#followers").trigger("chosen:updated");
                                //$('#priority').val(res.priority);
                                $('.priority_box').find('[data-p-id='+res.priority+']').iCheck('check');
                                $('#form_add_task').find('button[type=submit]').html('Update');
                                $('#add_task_modal').modal('show');
                                $('.page_loader').hide();
                            },
                        });
                    });*/
    
                    $('ul.connectList > li').on('mouseover',function(){
                        $(this).find('.close_task').show();
                        $(this).find('.view_task').show();
                        $(this).find('.edit_task').show();
                    });

                    $('ul.connectList > li').on('mouseleave',function(){
                        $(this).find('.close_task').hide();
                        $(this).find('.view_task').hide();
                        $(this).find('.edit_task').hide();
                    });

                    $('.delete_task_button').on('click', function(){
                        var id = $(this).parents('li').data('id');
                        var func = "delete_task("+id+");";
                        $('#delete_task_modal').find('.btn-primary').attr('onclick',func);
                    });

                });

                function view_task(id){
                    window.location = '<?php echo site_url("dashboard/view_task/'+id+'"); ?>';
                }

                function edit_task(id){
                    $('.page_loader').show();
                    var edit_task_id = id;
                    $('#edit_task_id').val(edit_task_id);
                    $.ajax({
                        url: '<?php echo site_url("dashboard/get_task_details_ajax"); ?>',
                        data: 'edit_task_id='+edit_task_id,
                        type: 'POST',
                        async: false,
                        success: function(data){
                            var res = $.parseJSON(data);
                            $('#task_title').val(res.task_title);
                            $('#task_description').val(res.task_description);
                            $('#due_date').val(res.due_date);
                            $('#assignee').html(res.assignee);
                            $("#assignee").trigger("chosen:updated");
                            $('#followers').html(res.followers);
                            $("#followers").trigger("chosen:updated");
                            //$('#priority').val(res.priority);
                            $('.priority_box').find('[data-p-id='+res.priority+']').iCheck('check');
                            $('#form_add_task').find('button[type=submit]').html('Update');
                            $('#add_task_modal').modal('show');
                            $('.page_loader').hide();
                        },
                    });
                }
                
            </script>
        <?php } ?>

        <?php if($url == 'view_task'){ ?>
            <script>
                $(document).ready(function() {

                    var userid = "<?php echo $this->session->userdata('id'); ?>";
                    $('comment_box').scrollTop(100);
                    $('textarea.message-input').keyup(function(e){
                        if(e.keyCode == 13)
                        {
                            var thiss = $(this);
                            var comment = $.trim($(this).val());
                            var taskid = $('#taskid').val();
                            if(comment != '' && taskid != ''){
                                $('.page_loader').show();
                                $(this).attr('readonly','readonly');
                                $('.comment_box').find('.message-author:last').focus();
                                $.ajax({
                                    url: '<?php echo site_url("dashboard/add_task_comment_ajax"); ?>',
                                    data: 'userid='+userid+'&taskid='+taskid+'&comment='+comment,
                                    type: 'POST',
                                    async: false,
                                    success: function(data){
                                        var res = $.parseJSON(data);
                                        $('.comment_box').html(res);
                                        thiss.val('');
                                        thiss.attr('readonly',false);
                                        var comment_count = parseInt($('#comment_count').html());
                                        $('#comment_count').html(comment_count+1)
                                        $('.page_loader').hide();
                                    },
                                });
                            } else {
                                //alert('Please fill comment before enter');
                                thiss.val('');
                            }
                        }
                    });

                });
            </script>
        <?php } ?>

        <?php if($url == 'languages'){ ?>
            <script>
                $(document).ready(function() {
                    var languages_data = $('#languages_data').val();
                    var data = JSON.parse(languages_data);

                    /* Init DataTables */
                    var oTable = $('#editable').dataTable({
                        "data": data,
                        "dom": 'f<"clear_new">pitipr',
                        "columns": [
                            { "data": "id" },
                            { "data": "language" },
                            { "data": "action" }
                        ],
                        "aoColumnDefs": [{
                            "mRender": function ( data, type, row ) {
                                return '<div class="ibox-tools"><a onclick=pass_data_language("'+data+'"); data-toggle="modal" data-target="#delete_language_madal"><i class="fa fa-trash"></i></a></div>';
                            },
                            "aTargets": [2], "bSortable": true
                        }],
                    });

                    /* Apply the jEditable handlers to the table */
                    $('td:eq(1)', oTable.fnGetNodes()).editable('<?php echo site_url("dashboard/edit_languages"); ?>', {
                        "callback": function( sValue, y ) {
                            var aPos = oTable.fnGetPosition( this );
                            oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                        },
                        "submitdata": function ( value, settings ) {
                            return {
                                "row_id": this.parentNode.getAttribute('id'),
                                "column": oTable.fnGetPosition(this)[2],
                                "lang_id": $(this).closest('tr').find('td:eq(0)').text(),
                            };
                        },

                        "width": "90%",
                        "height": "100%"
                    });

                    $('#form_add_lang').on('submit',function(event){
                        event.preventDefault();
                        $('#add_language_modal').find('.hide-form').hide();
                        $('.ajax-loader').show();
                        var language = $('#language').val();
                        $.ajax({
                            url: '<?php echo site_url("dashboard/add_language_ajax"); ?>',
                            data: 'language='+language,
                            type: 'POST',
                            success: function(data){
                                if(data == 1){
                                    $('#add_language_modal').find('.hide-form').show();
                                    $('.ajax-loader').hide();
                                    window.location = '<?php echo site_url("dashboard/languages?reset=1"); ?>';
                                } else {
                                    $('#add_language_modal').find('.hide-form').show();
                                    $('.ajax-loader').hide();
                                    alert('Language does not added. Please try again after re-login');
                                }
                            },
                        });
                    });

                });
            </script>
        <?php } 

        if($url == 'cities'){ ?>
            <script>
                $(document).ready(function() {

                    var city_table = $('.dataTable-cities').dataTable({
                        "responsive": true,
                        "dom": 'f<"clear_new">pitipr',
                        "aaSorting": [[ 0, "desc" ]],
                        "processing": true,
                        "serverSide": true,
                        "ajax": "<?php echo site_url('dashboard/cities_result_ajax'); ?>"
                    });

                    /* Apply the jEditable handlers to the table */
                    $('td:eq(1)', city_table.fnGetNodes()).editable('<?php echo site_url("dashboard/edit_cities"); ?>', {
                        "callback": function( sValue, y ) {
                            var aPos = oTable.fnGetPosition( this );
                            oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                        },
                        "submitdata": function ( value, settings ) {
                            return {
                                "row_id": this.parentNode.getAttribute('id'),
                                "column": oTable.fnGetPosition(this)[2],
                                "city_id": $(this).closest('tr').find('td:eq(0)').text(),
                            };
                        },

                        "width": "90%",
                        "height": "100%"
                    });
                });
            </script>
        <?php } 

        if($url == 'administrators'){ ?>
            <script>
                $(document).ready(function() {
                    var admin_table = $('.dataTable-admin').dataTable({
                        "responsive": true,
                        "dom": 'f<"clear_new">pitipr',
                        "aaSorting": [[ 0, "asc" ]],
                        "processing": true,
                        "serverSide": true,
                        "ajax": "<?php echo site_url('dashboard/admin_result_ajax'); ?>"
                    });

                });
            </script>
        <?php } 
     } 

    if($url == 'index'){ ?>

        <script>
        $(document).ready(function() {
            $('.chart').easyPieChart({
                barColor: '#f8ac59',
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            $('.chart2').easyPieChart({
                barColor: '#1c84c6',
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            var data2 = [
                [gd(2012, 1, 1), 7], [gd(2012, 1, 2), 6], [gd(2012, 1, 3), 4], [gd(2012, 1, 4), 8],
                [gd(2012, 1, 5), 9], [gd(2012, 1, 6), 7], [gd(2012, 1, 7), 5], [gd(2012, 1, 8), 4],
                [gd(2012, 1, 9), 7], [gd(2012, 1, 10), 8], [gd(2012, 1, 11), 9], [gd(2012, 1, 12), 6],
                [gd(2012, 1, 13), 4], [gd(2012, 1, 14), 5], [gd(2012, 1, 15), 11], [gd(2012, 1, 16), 8],
                [gd(2012, 1, 17), 8], [gd(2012, 1, 18), 11], [gd(2012, 1, 19), 11], [gd(2012, 1, 20), 6],
                [gd(2012, 1, 21), 6], [gd(2012, 1, 22), 8], [gd(2012, 1, 23), 11], [gd(2012, 1, 24), 13],
                [gd(2012, 1, 25), 7], [gd(2012, 1, 26), 9], [gd(2012, 1, 27), 9], [gd(2012, 1, 28), 8],
                [gd(2012, 1, 29), 5], [gd(2012, 1, 30), 8], [gd(2012, 1, 31), 25]
            ];

            var data3 = [
                [gd(2012, 1, 1), 800], [gd(2012, 1, 2), 500], [gd(2012, 1, 3), 600], [gd(2012, 1, 4), 700],
                [gd(2012, 1, 5), 500], [gd(2012, 1, 6), 456], [gd(2012, 1, 7), 800], [gd(2012, 1, 8), 589],
                [gd(2012, 1, 9), 467], [gd(2012, 1, 10), 876], [gd(2012, 1, 11), 689], [gd(2012, 1, 12), 700],
                [gd(2012, 1, 13), 500], [gd(2012, 1, 14), 600], [gd(2012, 1, 15), 700], [gd(2012, 1, 16), 786],
                [gd(2012, 1, 17), 345], [gd(2012, 1, 18), 888], [gd(2012, 1, 19), 888], [gd(2012, 1, 20), 888],
                [gd(2012, 1, 21), 987], [gd(2012, 1, 22), 444], [gd(2012, 1, 23), 999], [gd(2012, 1, 24), 567],
                [gd(2012, 1, 25), 786], [gd(2012, 1, 26), 666], [gd(2012, 1, 27), 888], [gd(2012, 1, 28), 900],
                [gd(2012, 1, 29), 178], [gd(2012, 1, 30), 555], [gd(2012, 1, 31), 993]
            ];


            var dataset = [
                {
                    label: "Number of orders",
                    data: data3,
                    color: "#1ab394",
                    bars: {
                        show: true,
                        align: "center",
                        barWidth: 24 * 60 * 60 * 600,
                        lineWidth:0
                    }

                }, {
                    label: "Payments",
                    data: data2,
                    yaxis: 2,
                    color: "#464f88",
                    lines: {
                        lineWidth:1,
                            show: true,
                            fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 0.2
                            }, {
                                opacity: 0.2
                            }]
                        }
                    },
                    splines: {
                        show: false,
                        tension: 0.6,
                        lineWidth: 1,
                        fill: 0.1
                    },
                }
            ];


            var options = {
                xaxis: {
                    mode: "time",
                    tickSize: [3, "day"],
                    tickLength: 0,
                    axisLabel: "Date",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 10,
                    color: "#d5d5d5"
                },
                yaxes: [{
                    position: "left",
                    max: 1070,
                    color: "#d5d5d5",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 3
                }, {
                    position: "right",
                    clolor: "#d5d5d5",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: ' Arial',
                    axisLabelPadding: 67
                }
                ],
                legend: {
                    noColumns: 1,
                    labelBoxBorderColor: "#000000",
                    position: "nw"
                },
                grid: {
                    hoverable: false,
                    borderWidth: 0
                }
            };

            function gd(year, month, day) {
                return new Date(year, month - 1, day).getTime();
            }

            var previousPoint = null, previousLabel = null;

            $.plot($("#flot-dashboard-chart"), dataset, options);

            var mapData = {
                "US": 298,
                "SA": 200,
                "DE": 220,
                "FR": 540,
                "CN": 120,
                "AU": 760,
                "BR": 550,
                "IN": 200,
                "GB": 120,
            };

            $('#world-map').vectorMap({
                map: 'world_mill_en',
                backgroundColor: "transparent",
                regionStyle: {
                    initial: {
                        fill: '#e4e4e4',
                        "fill-opacity": 0.9,
                        stroke: 'none',
                        "stroke-width": 0,
                        "stroke-opacity": 0
                    }
                },

                series: {
                    regions: [{
                        values: mapData,
                        scale: ["#1ab394", "#22d6b1"],
                        normalizeFunction: 'polynomial'
                    }]
                },
            });
        });
    </script>
    

    <?php } ?>
</body>
</html>