<?php
error_reporting(0); 
echo main_header();
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template.css">
<?php
$Bldg = ('a' != '') ? trim('aaaaa') . ", " : '';
$Strt = ('a' != '') ? trim('aaaaa') . ", " : '';
$Prk = ('a' != '') ? trim('aaaaa') . ", " : '';
$Address1 = 'aaaaa';
$Address2 = trim('aaaaa') . ", Municipality of Murcia";
$Total = 0;
$Paymode = 'aaaaa' == '' ? 'CASH' : ('aaaaa' >= 'aaaaa' ? 'CHECK' : 'CASH/CHECK');
?>
<div class="content-wrapper">
    <section class="content" style="font-weight: bold;">

        <body onload="window.print()">
            <div class="doc" style="background-image: url('<?php echo base_url() ?>assets/img/OR2.png')"> 
                <div id="date" ><?= date('F d, Y', strtotime(@$Data->date_paid)) ?></div>
                <div id="Agency">CITY TREASURER'S OFFICE <label style="margin-left: 45px;"> </label></div>
                <div id="OR_num" style="margin-left: 20px;"><?= @$Data->or_number?></div>
                <div id="Payor" style="margin-left: -10px;"><?= (empty(@$Data->payor) ? strtoupper(@$Data->paid_by) : strtoupper(@$Data->payor)) ?></div>
                <div id="Address1" style="margin-left: -10px;"><?= strtoupper(@$Data->address) ?></div>
                <div id="Items" style="margin-left: 0px;">
                    <?php foreach (@$Data->particulars as $item) { ?>
                        <div style="display:flex; align-items:top;padding:2px">
                            <!-- <div style="width: 300px; height: 20px;"><?= strtoupper(@$item->particular) ?> <?= strtoupper(@$item->remarks) ?></div> -->
                            <div style="width: 300px; height: 20px;"><?= strtoupper(@$item->particular) ?> <?php if(@$item->remarks == NULL){ echo "";}else{ echo '('.strtoupper(@$item->remarks).')';}?></div>
                            <div style="margin-left: -50px;"><?= number_format(@$item->amount, 2) ?></div>
                        </div>
                    <?php @$Total += @$item->amount;}?>
                </div>
                <div id="Type"><?= @$Data->type ?></div>                
                <div id="Total" style="margin-left: -45px; margin-top: -35px;"><?= number_format(@$Total, 2) ?></div>
                <div id="Words">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<span id="Numwords"><?= NumberToWords(@$Total) ?></span>
                </div>
                <div id="Bank" style="margin-left: -25px; margin-top: -35px;"><?= strtoupper(@$Data->bank) ?></div>
                <div id="Check_num" style="margin-left: -20px; margin-top: -35px;"><?= strtoupper(@$Data->check_no) ?></div>
                <div id="Date_of_check" style="margin-left: -20px; margin-top: -35px;"><?= strtoupper(@$Data->check_date) ?></div>
                <div id="Amount_text" style="margin-left: -15px; margin-top: -30px;"><?= (empty(@$Data->bank)) ? '' : 'CHECK AMOUNT:' ?></div>
                <div id="Amount_value" style="margin-left: -20px; margin-top: -30px;"><?= (@$Data->check_amount == null) ? '' : number_format(@$Data->check_amount, 2) ?></div>
                <div id="Collector" style="margin-top: -25px; margin-left: -5px;"><?= strtoupper(@$_SESSION['User_details']->First_name . ' ' . @$_SESSION['User_details']->Last_name) ?></div>
                <div id="Position" style="margin-top: -15px;"><?= strtoupper(@$_SESSION['User_details']->Position) ?></div>
            </div>
        </body>
    </section>
</div>
<script language="javascript" src="<?php echo base_url() ?>assets/general_assets/idle_signout.js"></script> <!-- KARL ALOB 3/24 -->
<script>
    window.onafterprint = function() {
        // window.location = 'general_collection';
        window.location.reload(history.go(-1));
        
    }
</script>