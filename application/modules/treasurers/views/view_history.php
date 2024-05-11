<?php 
main_header();
sidebar('applicant'); 
?>

<div class="content-wrapper">
    <section class="content-header">
        </br>
        <ol class="breadcrumb">
            <li><i class="fa fa-money"></i> City Treasurer's Office</li>
            <li>Businesses</li>
            <li><a href="<?php echo base_url() ?>treasurers/applicant/<?=@$profiles->ID?>">Business Payment</a></li>
            <li><a href="<?php echo base_url() ?>treasurers/applicant_history/<?=@$profiles->ID?>">Payment History</a></li>
            <li class="active">Receipt</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-offset-1 col-md-5">
                <div class="row">
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <div class="box-title">
                                <h3 class="box-title"><i class="fa fa-file-text-o"></i> Check Info</h3>
                            </div>
                        </div>
                        <div class="box-body">
                            <table class="table table-striped table-bordered text-center" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Bank</th>
                                        <th>Check No.</th>
                                        <th>Check Date</th>
                                        <th class="text-right">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?=@$data->Bank_name?></td>
                                        <td><?=@$data->Check_number?></td>
                                        <td><?=@$data->Check_date?></td>
                                        <td class="text-right"><?=@$data->Check_amount?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="box-footer">
                            <div class="pull-left">
                                <a href="<?php echo base_url() ?>treasurers/applicant_history/<?=$profiles->ID?>" class="btn btn-sm flat btn-default" >
                                    <i class="fa fa-caret-left"></i>&ensp;Back
                                </a>        
                            </div>
                            <div class="pull-right">
                                <button class="btn btn-sm flat btn-primary" id="Reprint" data-target="#Receipt_modal" 
                                    data-toggle="modal" data-keyboard="false" data-backdrop="static">
                                    <i class="fa fa-print"></i>&ensp;Reprint Receipt
                                </button>
                                <!-------------------------------------- 01-15-2020 -------------------------------------->
                               <!-- COMMENTED BY ANGELO 7/20/23 -->
                                <!-- <button class="btn btn-sm flat btn-success" id="Edit_OR" data-target="#Edit_modal" 
                                    data-toggle="modal" data-keyboard="false" data-backdrop="static">
                                    <i class="fa fa-edit"></i>&ensp;Edit OR Number
                                </button> -->
                                <div id="Edit_modal" class="modal fade">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">
                                                <span aria-hidden="true">&times;</span></button>
                                                <h4>OR Number</h4>
                                            </div>
                                            <div class="modal-body">    
                                                <div class="form-group has-feedback">
                                                    <label>Enter OR Number :</label>
                                                    <input id="OR_entry" class="form-control input-sm text-right" 
                                                        placeholder="0000000" value="<?=@$OR_num?>" type="text" autofocus>
                                                    <label id="Error" class="text-center" hidden></label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-success btn-sm flat" id="Check_OR">
                                                    <i class="fa fa-eye"></i>&ensp;Check
                                                </button>
                                                <button class="btn btn-primary btn-sm flat" id="Submit_OR" disabled>
                                                    <i class="fa fa-arrow-right"></i>&ensp;Submit
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-------------------------------------- 01-15-2020 -------------------------------------->
                                <div id="Receipt_modal" class="modal fade">
                                    <div class="modal-dialog" style="width:425px;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">
                                                <span aria-hidden="true">&times;</span></button>
                                                <font size='4'><b>Official Receipt</b></font>
                                            </div>
                                            <div class="modal-body" id="Receipt-body">
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-danger btn-sm flat pull-left" id="close_modal" data-dismiss="modal">
                                                    <i class="fa fa-close"></i>&ensp;Close
                                                </button>
                                                <!--MODIFIED BY KYLE 12-25-2023--------Removed data-dismiss="modal", Toggles the confirmation modal instead--->
                                                <button class="btn btn-primary btn-sm flat" data-target="#confirm-OR-number" 
                                                    data-toggle="modal"><i class="fa fa-print"></i>&ensp;Print
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!------------------------------ADDED BY KYLE 12-25-2023------------------------------->
                                <!---------------Added Confirmation Modal for the Official Reciept Number----------------->
                                <div class="modal fade" id="confirm-OR-number">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" id="x_modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title" style="color:hsl(0 100% 60.78%);">Double Check Reciept Number!</h4>
                                                
                                            </div>
                                            <div style="margin-left: 2.5%">
                                                <h6 style="color: hsl(0 0% 0%); font-size: 120%;">Reciept number on hand should match with the system.</h6>
                                                <label style="color: hsl(0 0% 0%); font-size: 120%; font-weight:400;">System Reciept Number: <label style="color:hsl(0 100% 60.78%);"><?=$OR_num?></label></label>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" id="close_modal" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-success btn-confirm-obo" data-dismiss="modal" id="Print_receipt">Confirm</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <div class="box-title">
                                <h3 class="box-title"><i class="fa fa-file-o"></i> Remarks</h3>
                            </div>
                        </div>
                        <div class="box-body">
                            <?=$data->Remarks?>
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <button class="btn btn-lg flat btn-danger" id="Open_void" data-target="#Void_modal" 
                        data-toggle="modal" data-keyboard="false" data-backdrop="static">
                        <i class="fa fa-ban"></i>&ensp;Void Receipt
                    </button>
                    <div id="Void_modal" class="modal fade">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span></button>
                                    <font size='4'><b>Void Receipt</b></font>
                                </div>
                                <div class="modal-body">
                                    <div class="text-center"><b>User Permission Required</b></div></br>
                                    <div class="form-group has-feedback">
                                        <input id="Username" class="user-input form-control input-sm"
                                            placeholder="Username" type="text" autofocus>
                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <input id="Password" class="user-input form-control input-sm"
                                            placeholder="Password" type="password">
                                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                        <label id="Error" class="text-center" hidden></label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-danger btn-sm flat pull-left" data-dismiss="modal">
                                        <i class="fa fa-times"></i>&ensp;Cancel
                                    </button>
                                    <button class="btn btn-primary btn-sm flat" id="Submit">
                                        <i class="fa fa-arrow-right"></i>&ensp;Submit
                                    </button>
                                    <button class="btn btn-success btn-sm flat" id="Proceed" style="display:none" 
                                        data-dismiss="modal" data-target="#Proceed_modal" data-toggle="modal" 
                                        data-keyboard="false" data-backdrop="static">
                                        <i class="fa fa-arrow-right"></i>&ensp;Proceed
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="Proceed_modal" class="modal fade">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span></button>
                                    <font size='4'><b>Voiding Receipt</b></font>
                                </div>
                                <div class="modal-body">
                                    <input id="Action_by" type="hidden">
                                    <textarea class="form-control input-sm" rows="3" style="resize:none;"
                                        id="Remarks" placeholder="You may put remarks/reason for voiding..."></textarea></br>
                                    <b><font color = "red">! IMPORTANT :</font>
                                    Re-assessment is needed after void. </b>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-danger btn-sm flat pull-left" data-dismiss="modal">
                                        <i class="fa fa-times"></i>&ensp;Cancel
                                    </button>
                                    <button class="btn btn-primary btn-sm flat" id="Void_receipt">
                                        <i class="fa fa-ban"></i>&ensp;Void
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-default" style="width:425px;">
                    <div class="box-body" id="Receipt-view" style="padding:1.9vh;">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php main_footer(); ?>
<script language="javascript" src="<?php echo base_url() ?>assets/general_assets/idle_signout.js"></script> <!-- KARL ALOB 3/24 -->
<!-- <script src="<?php echo base_url() ?>assets/theme/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
<script language="javascript" src="<?php echo base_url()?>assets/scripts/noPostBack.js"></script>
<script>
    var ID = '<?php echo $profiles->ID?>';
    var OR_num = '<?php echo $OR_num?>';
    var Cycle_ID = '<?php echo $Cycle_ID?>'; // 01-15-2020
    var Received_by = '<?php echo $Received_by?>';

    $(document).ready(function(){
        var load = "#Receipt-view";
        loadReceipt(load);
    });
    
    /* ------------------------------------ 01-15-2020 ------------------------------------ */ 
    $('#Check_OR').on('click', function() {
        $.ajax({
            type: "POST",
            url: baseUrl + "treasurers/check_OR",
            data: {
                OR_entry: $('#OR_entry').val(),
            }
        }).always(function(e) {
            if (e != '') {
                var data = JSON.parse(e);
                if (data.has_error == true) {
                    $('#OR_entry').parent('div').addClass('has-error');
                    $('#Error').removeAttr('hidden');
                    $('#Error').html('</br>' + data.error_message);
                } else {
                    $('#OR_entry').parent('div').removeClass('has-error');
                    $('#OR_entry').parent('div').addClass('has-success');
                    $('#Error').removeAttr('hidden');
                    $('#Error').html('</br>OR number accepted. Please click SUBMIT.');
                    $('#Submit_OR').removeAttr('disabled');
                }
            }
        });
    });

    $('#Edit_OR').on('click', function() {
        $('#OR_entry').parent('div').removeClass('has-error');
        $('#OR_entry').parent('div').removeClass('has-success');
        $('#Error').attr('hidden', true);
        $('#OR_entry').val(OR_num);
        $('#Submit_OR').attr('disabled', true);
        $('#OR_entry').focus();
    });

    $('#Submit_OR').on('click', function(){
        var OR_entry = $('#OR_entry').val();
        $.ajax({
            type: "POST",
            url: baseUrl + "treasurers/edit_OR",
            data: {
                OR_number: OR_num,
                OR_entry: OR_entry,
                Cycle_ID: Cycle_ID
            }
        }).done(function(e) {
            window.location.href = baseUrl + "treasurers/view_history/" + Cycle_ID + "/" + OR_entry;
        });
    });
    /* ------------------------------------ 01-15-2020 ------------------------------------ */ 

    var loadReceipt = function(load){
        console.log(baseUrl+"treasurers/print_receipt/");
        $(document).gmLoadReceipt({
            url     :   baseUrl+"Treasurers/print_receipt",
            items   :   <?php echo json_encode($items)?>,
            data    :   <?php echo json_encode($data)?>,
            app_ID  :   <?php echo json_encode($app_ID)?>,
            load_on :   load
        });
    }

    $('#Reprint').on('click', function(){
        var load = "#Receipt-body";
        loadReceipt(load);
    });

    $('#Print_receipt').on('click', function(){ 
    
        $("#Receipt-body").printThis();

        //Added by KYLE 10-25-2023
        document.getElementById('close_modal').click();
    });

    //Added by KYLE 10-25-2023
    $('#close_modal, #x_modal').on('click', function(){ 
        document.getElementById('close_modal').click();
    });

    $('#Open_void').on('click', function(){
        $('#Error').attr('hidden', true);
        $.each($('.user-input'), function() {
            $(this).parent('div').removeClass('has-error');
            $(this).parent('div').removeClass('has-success');
            $(this).val('');
        });
        $('#Proceed').css('display', 'none');
        $('#Submit').css('display', '');
        $('#Remarks').val('');
    });

    $('#Submit').on('click', function() {
        $.ajax({
            type: "POST",
            url: baseUrl + "treasurers/authenticate",
            data: {
                Username: $('#Username').val(),
                Password: $('#Password').val(),
                Received_by: Received_by
            }
        }).always(function(e) {
            if (e != '') {
                var data = JSON.parse(e);
                if (data.has_error == true) {
                    $.each($('.user-input'), function() {
                        $(this).parent('div').addClass('has-error');
                    });
                    $('#Error').removeAttr('hidden');
                    $('#Error').html('</br>' + data.error_message);
                } else {
                    $.each($('.user-input'), function() {
                        $(this).parent('div').removeClass('has-error');
                        $(this).parent('div').addClass('has-success');
                    });
                    $('#Error').removeAttr('hidden');
                    $('#Error').html('</br>Access granted. Action successfully executed.');

                    $('#Proceed').css('display', '');
                    $('#Submit').css('display', 'none');
                }
            }
        });
    });
    
    $('#Void_receipt').on('click', function(){
        $.ajax({
            type: "POST",
            url: baseUrl + "treasurers/void_receipt",
            data: {
                OR_number: OR_num,
                Voided_by: Received_by,
                data: <?php echo json_encode($data)?>,
                items:   <?php echo json_encode($items)?>,
                Remarks: $('#Remarks').val()
            }
        }).done(function(e) {
            window.location.href = baseUrl + "treasurers/applicant_history/" + ID;
        });
    });
</script>