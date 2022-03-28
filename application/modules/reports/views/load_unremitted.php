<?php
if (!empty($unremitted)) {
    foreach ($unremitted as $key => $value) {
        if (!empty(@$value['ParticularPaid'])) {
?>
            <tr>
                <td><?= date('m-d-Y', strtotime(@$value['Date_paid'])) ?></td>
                <td><?= @$value['Accountable_form_number'] ?></td>
            </tr>
            <?php
            foreach (@$value['ParticularPaid'] as $key => $particular) {
            ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td><?= strtoupper(@$value['Payor']) ?></td>
                    <td><?= @$particular['Particular'] ?></td>
                    <td><button class="btn btn-sm btn-danger set_void" data-id="<?= @$value['ID'] ?>"><i class="fa fa-cog"></i></button></td>
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
<script>
    var data = <?php echo json_encode($unremitted); ?>;
    remit_data = data;
    unremit_type = <?php echo json_encode(@$unremitted[0]['Accountable_form_origin']); ?>;
    var StartOr = <?php echo json_encode(@$unremitted[0]['Accountable_form_number']); ?>;
    var EndOr = <?php echo json_encode(@$unremitted[count(@$unremitted) - 1]['Accountable_form_number']); ?>;
    $(document).ready(function() {
        if (data != '') {
            document.getElementById("to_remit_div").style.display = "block";
        }
    });
</script>