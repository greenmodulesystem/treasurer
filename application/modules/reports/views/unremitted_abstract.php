<?php
echo main_header();
echo sidebar('reports');
?>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/report.css">
<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-solid">
            <div class="box-body">
                <div id="print-abstract">
                    <div class="row">
                        <div class="box-body">
                            <div class="box-body">
                                <table width="100%" class="table table-borderless table-bord" style="font-weight: bold;">
                                    <tr>
                                        <td width="25%" height="99"><img src="<?php echo base_url() ?>assets/img/Logo_2.png" class="city-logo" />
                                            <table>
                                                <tr>
                                                    <td>
                                                        <p class="a-col">A. COLLECTIONS</p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="50%">
                                            <table width="100%" class="table table-borderless table-bord">
                                                <tr>
                                                    <p align="center" class="header-report">REPORT OF COLLECTION AND DEPOSIT</p>
                                                </tr>
                                                <tr>
                                                    <p align="center" class="header-city-of">MUNICIPALITY OF MURCIA</p>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <p align="center" class="office-of">OFFICE OF THE CITY TREASURER</p>
                                                </tr>
                                                <tr>
                                                    <p align="center" class="summary-of">SUMMARY OF COLLECTION BY FUND</p>
                                                </tr>
                                                <tr>
                                                    <!-- angelo - 3/27/23 -->
                                                    <input type="text"  id="OR_for" hidden value="<?=strtoupper(@$ReportType)?>">
                                                    <p align="center" class="summary-of">( <?=strtoupper(@$ReportType)?> )</p>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="30%" class="table-bord" style="font-size: 12px;">
                                            <table>
                                                <tr>                                                    
                                                    <p align="left" class="remit_no">Remittance No: <?=$RemitNumber?></p>
                                                    <input type="hidden" id="remitNumber" value="<?=$RemitNumber?>">
                                                </tr>
                                                <tr>
                                                    <p align="left" >Remittance Date:<span id="remit_date"><?php echo date('F d, Y') ?></span></p>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                                <div class="border-line"></div>
                                <table class="table table-bord" style="font-size: 12px;">
                                    <tr style="font-weight: bold">
                                        <td style="width: 20%;">Ticket Serial</td>
                                        <td style="width: 15%;">Date</td>
                                        <td style="width: 20%;">Payor</td>
                                        <td style="width: 35%;">Particular</td>
                                        <td>Amount</td>
                                    </tr>
                                </table>
                                <div class="border-line"></div>
                                <tr>
                                    <td>
                                        <p class="acct"> Acct. Form ( <?=@$ColType?> ) </p>
                                    </td>
                                </tr>
                                <div class="border-line"></div>
                                <!-- <table width="100%" class="table table-borderless table-bord" style="font-size: 12px;"> -->
                                <table width="100%" class="" style="font-size: 12px;">
                                    <?php
                                    $total = 0;
                                    foreach ($data as $key => $value) {
                                    ?><?php
                                                $prevAN = '';
                                                $prevDate = '';
                                                foreach ($value->ParticularPaid as $key => $particular) {
                                                    if(@$value->Cancelled === '1'){
                                                        $particular->Amount = 0;
                                                    }   
                                                     
                                                ?>
                                            <tr>
                                                <td style="width: 15%;">
                                                    <?php
                                                         if($prevAN == $value->Accountable_form_number) {
                                                            $AN = '';
                                                        } else {
                                                            $AN = $prevAN = $value->Accountable_form_number;
                                                        }
                                                        //Added by KYLE 11-06-2023
                                                        // if($AN != $value->OR_hardcopy && $AN != ''){
                                                        //     echo $value->OR_hardcopy;
                                                        // }
                                                        // else{
                                                        //     echo $AN;
                                                        // }
                                                        echo $AN;

                                                    ?>
                                                </td>
                                                <td style="width: 20%;">
                                                    <?php
                                                         if($prevDate == $value->Date_paid) {
                                                            $Date = '';
                                                        } else {
                                                            $Date = $prevDate = $value->Date_paid;
                                                        }
                                                        echo substr($Date, 0, 10);  
                                                    ?>
                                                </td>
                                                  
                                                <td style="width: 20%;"><?= $value->Cancelled == 0 ? strtoupper($value->Payor) : "*VOIDED*"?></td>
                                                <td>
                                                    <?php if($particular->Particular_ID == 451){ ?>
                                                        <td style="width: 35%;"><?= $value->Cancelled == 0 ? strtoupper($particular->Bus_tax_particular) : "*VOIDED*"?> <!--(<span style="color: red;"><?=$particular->Particular_ID?></span>)--></td>
                                                    <?php } else{ ?>
                                                        <td style="width: 35%;"><?= $value->Cancelled == 0 ? strtoupper($particular->Particular) : "*VOIDED*"?> <!--(<span style="color: red;"><?=$particular->Particular_ID?></span>)--></td>
                                                   <?php }?>
                                                </td>
                                               
                                                <td align="right"><?= $value->Cancelled == 0 ? number_format($particular->Amount,2) : "0.00"?></td>
                                                <?php $total += $particular->Amount ?>
                                            </tr>
                                    <?php
                                                }
                                            }
                                    ?><tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td align="right"><label style="font-size: 18px;">Total:</label></td>
                                        <td style="float: right"><label style="font-size: 17px; color:red;"><?= number_format($total, 2) ?></label></td>
                                    </tr><?php
                                            ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="box-body" style="font-size: 12px;">
                            <div class="box-body">
                                <p style="font-weight: bold; text-transform: uppercase"> Fund Summary: </p>
                                <p style="font-weight: bold; text-transform: uppercase"> General Fund </p>

                                <table>
                                    <?php
                                    $TotalAmount = 0;
                                    foreach ($summary as $key => $value) {
                                      if(!empty($value['Name'])){ //added 2/28/23 angelo
                                    ?><tr>
                                            <td style="width:40%;"><?= strtoupper($value['Name']) ?></td>
                                            <td style="width:20%; text-align:right;"><?= number_format($value['Amount'], 2) ?></td>
                                            <td style="width:40%; text-align:right;"></td>
                                        </tr><?php
                                                $TotalAmount += $value['Amount'];
                                            }
                                        }   ?><tr>
                                        <td style="width:20%;"></td>
                                        <td style="width:20%; text-align:right; font-weight:bold; font-size:17px; color:red;"><?= number_format($TotalAmount, 2) ?></td>
                                    </tr><?php
                                            ?>
                                </table>
                                <hr>
                                <table  style="float:right;">
                                    <tr>
                                        <td><b>TOTAL COLLECTIONS:</b></td>
                                        <td style="text-indent: 200px;"><b><?=number_format($TotalAmount,2)?></b></td>
                                    </tr>
                                </table>
                                <br>
                                <br>
                                <table class="table" style="font-size: 12px">
                                    <tr>
                                        <td class="" style="border-bottom-style:hidden;">
                                            Collector
                                        </td>
                                        <td  class=""  style="border-bottom-style:hidden;">
                                            Liquidating Officer/Treasurer
                                        </td>
                                    </tr>
                                    <tr align="center">
                                        <td  class="">
                                            <table>
                                                <tr>
                                                    <td style="text-transform: uppercase"><center><b><?= $_SESSION['User_details']->First_name . ' ' . $_SESSION['User_details']->Middle_name[0] . '. ' . $_SESSION['User_details']->Last_name ?></b></center></td>
                                                </tr>
                                                <tr>
                                                    <td>________________________________________________________</td>
                                                </tr>
                                                <tr>
                                                    <td align="center"><?=$_SESSION['User_details']->Position?></td>
                                                </tr>
                                            </table>
                                        </td>

                                        <td class="">
                                            <table>
                                                <tr>
                                                    <td style="text-transform: uppercase"><center><b>Remelyn J. Marquez</b></center></td>
                                                </tr>
                                                <tr>
                                                    <td>________________________________________________________</td>
                                                </tr>
                                                <tr>
                                                    <td align="center">FISCAL EXAMINEER III</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="col-id" hidden><?=$_SESSION['User_details']->ID?></div>
                <div class="row" id="print-rcd-report" style="display: block;">
                    <div class="box-body">
                        <div class="box-body">
                            <button class="btn btn-primary btn-md" id="printing"><i class="fa fa-print"></i> PRINT </button>
                            <button class="btn btn-success " id="remit-collection"><i class="fa fa-money"></i> Save & Remit </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <a href="<?php echo base_url() ?>reports" role="button" class="btn  btn-default btn-md"><i class="fa fa-angle-double-left"></i> Back </a>
        </div>
    </section>
</div>
<?php echo main_footer(); ?>
<script language="javascript" src="<?php echo base_url() ?>assets/general_assets/reports/remit_reports.js"></script>
<script language="javascript" src="<?php echo base_url() ?>assets/general_assets/idle_signout.js"></script> <!-- KARL ALOB 3/24 -->
<script>
    var Data = <?php echo json_encode(@$data); ?>;
</script>