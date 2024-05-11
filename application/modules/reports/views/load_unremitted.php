<?php
if (!empty($unremitted)) {
    var_dump($unremitted);

    foreach ($unremitted as $key => $value) {
    $total_per_OR = 0;
?><tr>
            <td style="color: rgb(0 176 79);"><b><?=@$value['Accountable_form_number'] ?></b></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <?php if(@$value['Cancelled'] === '0'){ ?>
                <td><button class="btn btn-sm  btn-danger set_void" data-id="<?= @$value['ID'] ?>"><i class="fa fa-cog"></i></button></td>
            <?php }?>
        </tr><?php
                foreach ($value['ParticularPaid'] as $key => $particular) {
                ?>
            <tr>
                <?php if(@$value['Cancelled'] === '0') { ?>

                    <td></td>
                    <td><?= @$particular['Particular_ID'] == 451 ? @$particular['Bus_tax_particular'] : @$particular['Particular'] ?></td>
                    <td><?= date('m-d-Y', strtotime(@$value['Date_paid'])) ?></td>
                    <td><?= @$value['Payor'] ?></td>
                    <td><?= @$value['Address'] ?></td>
                    <!-- Amount of Particular Louis 4-11-2023 -->
                    <td><?= number_format(@$particular['Amount'], 2) ?></td>
                    <?php $total_per_OR += @$particular['Amount']?>
                    <?php $overall_total +=  @$particular['Amount']?>
                    <!-- END -->
                   
                <?php } else { ?>
                    <td></td>
                    <td>***VOIDED***</td>
                    <td>***VOIDED***</td>
                    <td>***VOIDED***</td>
                    <td>***VOIDED***</td>
                <?php }?>
            </tr>
    <?php
                } ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><b><?= number_format($total_per_OR, 2) ?></b></td>
                </tr>
            <?php } ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="color: red; font-size: 18px;"><label>TOTAL: </label></td>
                <td style="color: red; font-size: 18px;"><label><?= number_format($overall_total, 2) ?></label></td>
            </tr>
       <?php } else {
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