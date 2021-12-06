<!----------------------------------------------------- 01-16-2020 ----------------------------------------------------->
<?php if($result == null) { ?>
    <tr>
        <td colspan="4" class="warning"> OR Number has not been used yet. </td>
    </tr>
<?php } else {
    foreach($result as $key => $profile){ ?>
        <tr>
            <td><?=strtoupper($profile->Tax_payer) ?></td>
            <td><?=strtoupper($profile->Business_name) ?></td>
            <td><?=$profile->OR_number ?></td>
            <td>
                <a href="<?php echo base_url() ?>treasurers/view_history/<?=$profile->Cycle_ID;?>/<?=$profile->OR_number;?>" 
                    class="btn btn-default btn-sm flat"><i class="fa fa-search"></i>&ensp;View Receipt
                </a>
            </td>
        </tr>
<?php } 
} ?>
<!----------------------------------------------------- 01-16-2020 ----------------------------------------------------->