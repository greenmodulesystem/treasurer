<?php if($result == null) { ?>
    <tr>
        <td colspan="4" class="warning"> No accounts payable found. </td>
    </tr>
<?php } else {
    foreach($result as $key => $profile){ ?>
        <tr>
            <td><?=strtoupper($profile->Tax_payer) ?></td>
            <td><?=strtoupper($profile->Business_name) ?></td>
            <td><?=date('F d, Y',strtotime($profile->Date_application)) ?></td>
            <td>
                <a href="<?php echo base_url() ?>treasurers/applicant/<?php echo $profile->ID ?>" 
                    class="btn btn-default btn-sm flat"><i class="fa fa-search"></i>&ensp;Check Payables
                </a>
            </td>
        </tr>
<?php } 
} ?>