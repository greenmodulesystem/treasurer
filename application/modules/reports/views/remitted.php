<?php
if (!empty($remitted)) {
    foreach ($remitted as $key => $value) {
        if (!empty(@$value->ParticularPaid)) {
?><tr>
                <td><?= @$value->Accountable_form_number ?></td>
                <td><?= date('m-d-Y', strtotime(@$value->Date_paid)) ?></td>
                <td><?= strtoupper(@$value->Payor) ?></td>
            </tr><?php
                    foreach (@$value->ParticularPaid as $key => $particular) {
                    ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><?= @$particular->Particular ?></td>                   
                </tr>
    <?php
                    }
                }
            }
        } else {
    ?>
    <tr>
        <td colspan="2"> No Data Found </td>
    </tr>
<?php
        }
?>