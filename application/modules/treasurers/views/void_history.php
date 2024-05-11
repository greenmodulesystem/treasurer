<?php 
main_header();
sidebar('applicant');

$OR_number = $this->uri->segment(4);
?>

<div class="content-wrapper">
    <section class="content-header">
        </br>
        <ol class="breadcrumb">
            <li><i class="fa fa-money"></i> City Treasurer's Office</li>
            <li>Businesses</li>
            <li><a href="<?php echo base_url() ?>treasurers/applicant/<?=$profiles->ID?>">Business Payment</a></li>
            <li><a href="<?php echo base_url() ?>treasurers/applicant_history/<?=$profiles->ID?>">Payment History</a></li>
            <li class="active">Receipt</li>
        </ol>
    </section>

    <!-- ===========================ADDED BY KYLE 10-27-2023=============================== -->

    <!-- var_dump here for Testing Purposes only -->
    <?php
        // var_dump($this->uri->segment(4));
    ?>

    <!-- hidden Inputs for JS variable data transfer -->
    <div class="container" hidden>
        <input id="OR_num" value="<?=$OR_number?>">
    </div>

    <!-- ================================================================================== -->

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
                                        <td><?=$data->Bank_name?></td>
                                        <td><?=$data->Check_number?></td>
                                        <td><?=$data->Check_date?></td>
                                        <td class="text-right"><?=$data->Check_amount?></td>
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
            <?php   if(@$check_status->revived != "1"){      ?>
                    <font color="red" size="7"><b>RECEIPT VOIDED</b></font></br></br>
            <?php   } else {                                ?>
                    <font color="limegreen" size="7"><b>RECEIPT REVIVED</b></font></br></br>
            <?php   }                                       ?>
                    <button class="btn btn-primary" id="btn_revive" style="margin-bottom: 2rem;">Revive Receipt</button> <!--Added by KYLE 10-27-2023-->
                    <div class="box box-default text-left">
                        <div class="box-header with-border">
                            <div class="box-title">
                                <h3 class="box-title"><i class="fa fa-file"></i> Void Remarks</h3>
                            </div>
                        </div>
                        <div class="box-body">
                            <?=$data->Void_remarks?>
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

<!-- <script src="<?php echo base_url() ?>assets/theme/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
<script language="javascript" src="<?php echo base_url()?>assets/scripts/noPostBack.js"></script>
<script language="javascript" src="<?php echo base_url() ?>assets/general_assets/idle_signout.js"></script> <!-- KARL ALOB 3/24 -->
<script language="javascript" src="<?php echo base_url()?>assets/general_assets/revive_receipt.js"></script> <!-- ADDED BY KYLE 10-27-2023 -->

<script>

    $(document).ready(function(){
        var load = "#Receipt-view";
        loadReceipt(load);
    });

    var loadReceipt = function(load){
        $(document).gmLoadReceipt({
            url     :   baseUrl+"treasurers/print_receipt/",
            items   :   <?php echo json_encode($items)?>,
            data    :   <?php echo json_encode($data)?>,
            app_ID  :   <?php echo json_encode($app_ID)?>,
            load_on :   load
        });
    }
</script>