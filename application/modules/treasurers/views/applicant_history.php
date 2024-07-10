<?php 
main_header();
sidebar('applicant'); 
$Bldg = ($profiles->Building_name != '') ? trim($profiles->Building_name).", " : '';
$Strt = ($profiles->Street != '') ? trim($profiles->Street).", " : '';
$Prk = ($profiles->Purok != '') ? trim($profiles->Purok).", " : '';
$Address1 = ucwords($Bldg).ucwords($Strt).ucwords($Prk);
$Address2 = ucwords(trim($profiles->Barangay)).", City of Sagay";
$Payor = ucwords($profiles->Tax_payer);
$Number = $profiles->Mob_num != '' ? $profiles->Mob_num : $profiles->Tel_num;
?>

<div class="content-wrapper">
    <section class="content-header">
        </br>
        <ol class="breadcrumb">
            <li><i class="fa fa-money"></i> City Treasurer's Office</li>
            <li>Businesses</li>
            <li><a href="<?php echo base_url() ?>treasurers/applicant/<?=$profiles->ID?>">Business Payment</a></li>
            <li class="active">Payment History</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-body box-profile">
                        <h3 class="profile-username text-center"><?=strtoupper($profiles->Business_name)?></h3>
                        <p class="text-muted text-center"><?=$profiles->Status." (".$profiles->Cycle_date.")"?></p>
                        <div class="list-group list-group-unbordered text-center">
                            <div class="list-group-item col-md-3 col-sm-12 col-xs-12">
                                <strong><i class="fa fa-user margin-r-5"></i>Proprietor</strong>
                                <p class="text-muted"><?=$Payor?></p>
                            </div>
                            <div class="list-group-item col-md-6 col-sm-12 col-xs-12">
                                <strong><i class="fa fa-map-marker margin-r-5"></i>Address</strong>
                                <p class="text-muted"><?=$Address1.$Address2?></p>
                            </div>
                            <div class="list-group-item col-md-3 col-sm-12 col-xs-12">
                                <strong><i class="fa fa-phone margin-r-5"></i>Contact No.</strong>
                                <p class="text-muted">&thinsp;<?=$Number?></p>
                            </div>
                            <div class="pull-left"></br>
                                <a href="<?php echo base_url() ?>treasurers/applicant/<?=$profiles->ID?>" class="btn btn-sm flat btn-default" >
                                    <i class="fa fa-caret-left"></i>&ensp;Back
                                </a>        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default <?=$history == null ? 'collapsed-box' : ''?>">
                    <div class="box-header with-border" data-widget="collapse" style="cursor:pointer">
                        <div class="box-title">
                            <h3 class="box-title"><i class="fa fa-history"></i> Payment History</h3>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-striped table-bordered text-center" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>OR Number</th>
                                    <th>Date Paid</th>
                                    <th style="text-align:right">Cash Amount</th>
                                    <th style="text-align:right">Check Amount</th>
                                    <th style="text-align:right">Amount Paid</th>
                                    <th style="width:15%;">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($history == null){ ?>
                                    <tr class="warning text-center"><td colspan="6"><b>NO RECORD</b></td></tr>
                                <?php } else {
                                    foreach($history as $key => $his){ ?>
                                    <tr>
                                        <td><?=$his->OR_number?></td>
                                        <td><?=date('F d, Y - h:i A',strtotime($his->Date_paid))?></td>
                                        <td style="text-align:right">
                                            <?php $cash_amount = $his->Amount_paid - $his->Check_amount >= 0 ? 
                                                $his->Amount_paid - $his->Check_amount : 0;
                                                echo number_format($cash_amount,2);
                                            ?>
                                        </td>
                                        <td style="text-align:right"><?=number_format($his->Check_amount,2)?></td>
                                        <td style="text-align:right"><?=number_format($his->Amount_paid,2)?></td>
                                        <td>
                                            <a href="<?php echo base_url() ?>treasurers/view_history/<?=$his->Cycle_ID;?>/<?=$his->OR_number;?>" 
                                                class="btn btn-default btn-sm flat"><i class="fa fa-search"></i>&ensp;View Receipt
                                            </a>
                                        </td>
                                    </tr>
                                <?php } 
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default <?=$voided == null ? 'collapsed-box' : ''?>">
                    <div class="box-header with-border" data-widget="collapse" style="cursor:pointer">
                        <div class="box-title">
                            <h3 class="box-title"><i class="fa fa-ban"></i> Void Receipts</h3>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-striped table-bordered text-center" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>OR Number</th>
                                    <th>Date Voided</th>
                                    <th>Voided By</th>
                                    <th>Remarks</th>
                                    <th style="width:15%;">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($voided == null){ ?>
                                    <tr class="warning text-center"><td colspan="6"><b>NO RECORD</b></td></tr>
                                <?php } else {
                                    foreach($voided as $key => $void){ ?>
                                    <tr>
                                        <td><?=$void->OR_number?></td>
                                        <td><?=date('F d, Y - h:i A',strtotime($void->Void_date))?></td>
                                        <td><?=$void->Voided_by?></td>
                                        <td><?=$void->Void_remarks?></td>
                                        <td>
                                            <a href="<?php echo base_url() ?>treasurers/void_history/<?=$void->Cycle_ID;?>/<?=$void->OR_number;?>" 
                                                class="btn btn-default btn-sm flat"><i class="fa fa-search"></i>&ensp;View Receipt
                                            </a>
                                        </td>
                                    </tr>
                                <?php } 
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php main_footer(); ?>
<script language="javascript" src="<?php echo base_url() ?>assets/general_assets/idle_signout.js"></script> <!-- KARL ALOB 3/24 -->