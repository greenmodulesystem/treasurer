<?php $total = 0;$check = 0;$cash = 0;
    if($amounts == null){ ?>
    <tr class="warning text-center"><td colspan="6"><b>NO RECORD</b></td></tr>
<?php } else {
    foreach($amounts as $key => $amount){ ?>
        <tr>
            <td><?=strtoupper($amount->Business_name)?></td>
            <td><?=$amount->OR_number?></td>
            <td><?=date('F d, Y',strtotime($amount->Date_paid))?></td>
            <td style="text-align:right"><?php $cash_amount = $amount->Amount_paid - $amount->Check_amount >= 0 ? 
                $amount->Amount_paid - $amount->Check_amount : 0;
                echo number_format($cash_amount,2);
                $cash += $cash_amount;?></td>
            <td style="text-align:right"><?php echo number_format($amount->Check_amount,2);
                $check += $amount->Check_amount;?></td>
            <td style="text-align:right"><?php echo number_format($amount->Amount_paid,2);
                $total += $amount->Amount_paid;?></td>
        </tr>
<?php } ?>
        <tr style="border-top:2px solid gray;vertical-align:middle">
            <td colspan="2"></td>
            <td style="text-align:right"><b>Subtotal :</b></td>
            <td style="text-align:right"><b><?=number_format($cash,2)?></b></td>
            <td style="text-align:right"><b><?=number_format($check,2)?></b></td>
            <td style="text-align:right"><b><?=number_format($total,2)?></b></td>
        </tr>
        <tr>
            <td colspan="4"></td>
            <td style="text-align:right"><font face="arial black" size="4">TOTAL :</font></td>
            <td style="text-align:right"><font size="4" class="pull-left">₱</font>
                <font face="arial black" size="4"><?=number_format($total,2)?></font>
            </td>
        </tr>
<?php
} ?>