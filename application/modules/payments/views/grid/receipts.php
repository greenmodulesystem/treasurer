<?=empty($receipts) ? 'No receipts found.':''?>
<?php foreach ($receipts as $key => $receipt):?>
    <tr>
        <td><?=$receipt->Accountable_form_number?></td>
        <td><?=$receipt->Payor.', '.$receipt->Paid_by?></td>
        <td><?=date('M d, Y',strtotime($receipt->Date_paid))?></td>
        <td>
            <button class="btn btn-primary btn-sm btn-flat receipt-open" data-value="<?=$receipt->Accountable_form_number?>"><i class="fa fa-file" ></i> OPEN</button>
            <?php if($receipt->Cancelled === '0'):?>
                <button class="btn btn-danger btn-sm btn-flat receipt-void" data-id="<?=$receipt->ID?>" data-value="<?=$receipt->Accountable_form_number?>"> <i class="fa fa-times"></i> VOID</button>
            <?php endif;?>
        </td>
    </tr>
<?php endforeach;?>
