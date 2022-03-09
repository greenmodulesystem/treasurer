<?php
if (!empty($voided)) {
    foreach ($voided as $key => $value) {
?><tr>
            <td><?= $value->Accountable_form_number ?></td>
            <td><?= $value->Particular ?></td>
            <td><?= date('m-d-Y', strtotime($value->Date_paid)) ?></td>
            <td><?= $value->Payor ?></td>
            <td><?= $value->Address ?></td>
            <td><a href="<?php echo base_url() ?>reports/re_print_receipt/<?= $value->ID ?>" type="button" class="btn btn-flat btn-sm btn-warning"><i class="fa fa-print"></i> <b>Print</b> </a></td>
        </tr><?php
            }
        }
                ?>