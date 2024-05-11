<?php
if (!empty($voided)) {
    foreach ($voided as $key => $value) {
?>
        <tr>
            <td><?= $value->Accountable_form_number ?></td>
             <?php if($value->Particular == ""){
                ?><td>Real Property Tax</td>    <?php
             }else{?>
                <td><?= $value->Particular ?></td> <?php
             } ?>
            <td><?= date('Y-m-d', strtotime($value->Date_paid)) ?></td>
            <td><?= $value->Payor ?></td>
            <td><?= $value->Address ?></td>
            <td><a href="<?php echo base_url() ?>reports/re_print_receipt/<?= $value->ID ?>" type="button" class="btn  btn-sm btn-warning"><i class="fa fa-print"></i> <b>Print</b> </a></td>
        </tr>
<?php
    }
}
?>