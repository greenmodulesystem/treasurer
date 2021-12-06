<!----------------------------------------------- 02-18-2020 ----------------------------------------------->
<?php $total = 0;$sum_total = 0;
    if($amounts == null){ ?>
    <tr class="warning text-center"><td colspan="6"><b>NO RECORD</b></td></tr>
<?php } else {
    foreach($amounts as $key => $amount){ ?>
        <tr>
            <!-- <td><?=$amount->OR_number?></td> -->
            <td><?php if ($key == 0) {
                        echo $amount->OR_number;
                    } else {
                        if($amounts[$key]->OR_number == $amounts[$key-1]->OR_number) {
                            echo '';
                        } else {
                            echo $amount->OR_number;
                        }
                    }
                ?>
            </td>
            <!-- <td><?=date('Y-m-d',strtotime($amount->Date_paid))?></td> -->
            <td><?=$key == 0 ? date('Y-m-d',strtotime($amount->Date_paid)) : ''?></td>
            <td><?=strtoupper($amount->Business_name)?></td>
            <td><?=strtoupper($amount->Fee)?></td>
            <td style="text-align:right"><?php echo number_format($amount->Amount,2);
                $total += $amount->Amount;?></td>
        </tr>
<?php } ?>
        <tr>
            <td colspan="3"></td>
            <td style="text-align:right"><b>TOTAL :</b></td>
            <td style="text-align:right;border-top:3px solid black;"><b><?=number_format($total,2)?></b></td>
        </tr>
        <tr>
            <td colspan="5">&emsp;</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:right"><b>FUND SUMMARY :</b></td>
            <td colspan="3"></td>
        </tr>
<?php foreach($summary as $key => $sum){ ?>
        <tr>
            <td></td>
            <td colspan="2"><?=strtoupper($sum->Fee)?><span class="pull-right"><?php echo number_format($sum->Amount,2);
                $sum_total += $sum->Amount;?></span>
            </td>
            <td colspan="2"></td>
        </tr>
<?php } ?>
        <tr>
            <td></td>
            <td colspan="2" style="text-align:right;border-top:3px solid black;">
                <b><?=number_format($sum_total,2)?></b>
            </td>
            <td colspan="2"></td>
        </tr>
<?php
} ?>
<!----------------------------------------------- 02-18-2020 ----------------------------------------------->