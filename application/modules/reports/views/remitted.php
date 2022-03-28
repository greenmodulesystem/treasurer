<?php
if (!empty($remitted)) {
    foreach ($remitted as $key => $value) {
?>        
        <tr>
            <td><?= date('m-d-Y', strtotime(@$value->Date_paid)) ?></td>
            <td><?= @$value->Accountable_form_number ?></td>
            <td><?= strtoupper(@$value->Payor) ?></td>
        </tr>
    <?php
    }
} else {
    ?>
    <tr>
        <td colspan="2"> No Data Found </td>
    </tr>
<?php
}
?>