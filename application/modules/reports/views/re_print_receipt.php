<?php main_header();?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template.css">
<style>
    div.a {
        width: 350px;
        height: 80px;        
        -ms-transform: rotate(-45deg); 
        transform: rotate(-45deg);        
        margin-left: 40px;
        margin-top: 250px;
        font-size: 50px;
    }

</style>
<?php
    $Total = 0;     
?>
<div class="content-wrapper">
    <section class="content" style="font-weight: bold;">
        <body onload="window.print()">
            <div class="a" style="margin-left: -10px;">
                <p><b> VOIDED *** </b></p>
            </div>
            <div class="doc" style="background-image: url('<?php echo base_url()?>assets/img/OR2.png')">
                <div id="date" style="margin-left: 100px;"><?=date('F d, Y', strtotime($Data->Date_created))?></div>
                <div id="Agency">CITY TREASURER'S OFFICE</div>
                <div id="OR_num"><?=''?></div>
                <div id="Payor" style="margin-left: -10px;"><?=(empty($Data->Payor) ? strtoupper($Data->Paid_by) : strtoupper($Data->Payor))?></div>
                <div id="Address1" style="margin-left: -10px;"><?=strtoupper($Data->Address)?></div>                
                <div id="Items" style="margin-left: 0px;">
                    <?php foreach($Data->Particulars as $item) { ?>
                        <div style="display:flex; align-items:top;">
                            <div style="width: 300px; height: 20px;"><?=strtoupper($item->Particular)?></div>
                            <div style="margin-left: -50px;"><?=number_format($item->Amount,2)?></div>
                        </div>
                    <?php $Total += $item->Amount;}?>
                </div>
                <!-- <div id="Type"><?=$Data->type?></div> -->
                <div id="Total" style="margin-left: -45px; margin-top: -35px;"><?=number_format($Total,2)?></div>
                <div id="Words">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<span id="Numwords"></span>
                </div>
                <div id="Bank" style="margin-left: -25px; margin-top: -35px;"><?=strtoupper($Data->Bank_name)?></div>
                <div id="Check_num" style="margin-left: -20px; margin-top: -35px;"><?=strtoupper($Data->Check_no)?></div>
                <div id="Date_of_check" style="margin-left: -20px; margin-top: -35px;"><?=date('m-d-Y', strtotime($Data->Check_date))?></div>
                <div id="Amount_text" style="margin-left: -15px; margin-top: -30px;"><?=(empty($Data->bank)) ? '' : 'CHECK AMOUNT:'?></div>
                <div id="Amount_value" style="margin-left: -20px; margin-top: -30px;"><?=($Total == null) ? '' : number_format($Total,2)?></div>
                <div id="Collector" style="margin-top: -25px; margin-left: -5px;"><?=strtoupper($_SESSION['User_details']->First_name.' '.$_SESSION['User_details']->Last_name)?></div>
                <div id="Position" style="margin-top: -15px;"><?=strtoupper($_SESSION['User_details']->Position)?></div>
            </div>
        </body>
    </section>
</div>
<script>
    window.onafterprint = function(){
        window.location = '../../reports';
    }
</script>