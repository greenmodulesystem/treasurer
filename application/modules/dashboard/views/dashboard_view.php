<?php
echo main_header();
echo sidebar('dashboard');
?>
<style>
    .table-hover tbody tr:hover td {
        background: #cceeff;
    }
</style>
<div class="content-wrapper">

    <section class="content">
        <div class="row">
            <div class="box-body">
                <div class="box box-primary"><br>
                    <table class="table table-hover">
                        <thead>
                            <th style="width:15%"> ACCOUNTABLE NO. </th>
                            <th style="text-align: center; width:10%;"> STUB NO. </th>
                            <th style="width:10%"> START </th>
                            <th style="width:10%"> ENDING </th>
                            <th style="width:17%"> DESIGNATION </th>
                            <th style="width:10%"> STATUS </th>
                            <th style="width:20%"></th>
                        </thead>
                        <tbody>
                            <?php foreach ($Forms as $key => $value) {
                            ?>
                                <tr>
                                    <td><?= $value->OR_Type ?></td>
                                    <td align="center"><?= $value->Stub_no ?></td>
                                    <td><?= $value->Start_OR ?></td>
                                    <td><?= $value->End_OR ?></td>
                                    <?php foreach ($Taken as $index => $take) {
                                        if ($take->ID == $value->ID) {
                                    ?>
                                            <td>
                                                <select data-key="<?= $value->ID ?>" name="<?= $value->ID ?>" class="form-control input-md or_for select2" style="width: 80%; color: black;">
                                                    <option value="" disabled selected> Select </option>
                                                    <?php
                                                    foreach ($col_type as $key => $col) {
                                                    ?>
                                                        <option value="<?= @$col->Type ?>"> <?= @$col->Type ?> </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td><button class="btn btn-sm  btn-success save" data-id="<?= $value->ID ?>"><i class="fa fa-plus-square pull-left"></i> Save </button></td>
                                    <?php
                                        }
                                    } ?>
                                    <?php
                                    if ($value->OR_for != null) {
                                        if ($value->OR_origin == 51) {
                                    ?>
                                            <td style="color:green;"> <?= strtoupper($value->OR_for) ?> </td>
                                            <?php
                                            if ($value->Active != 0) {
                                            ?>
                                                <td style="color: red;"> Activated </td>
                                            <?php
                                            } else {
                                            ?>
                                                <td style="color: red;"> </td>
                                            <?php
                                            }
                                            ?>
                                            <td>
                                                <button data-origin="<?= @$value->OR_origin ?>" data-id="<?= $value->ID ?>" class="btn  btn-sm btn-danger cancel_form"><i class="fa fa-times"></i> Cancel </button>
                                                <button class="btn btn-sm  btn-success activate-or" data-id="<?= $value->ID ?>" data-designate="<?= @$value->OR_for ?>"><i class="fa fa-check-square pull-left"></i> Activate </button>
                                            </td>
                                        <?php
                                        } else {
                                        ?>
                                            <td style="color:green;"> <?= strtoupper($value->OR_for) ?> </td>
                                            <?php
                                            if ($value->Active != 0) {
                                            ?>
                                                <td style="color: red;"> Activated </td>
                                            <?php
                                            } else {
                                            ?>
                                                <td style="color: red;"> </td>
                                            <?php
                                            }
                                            ?>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
<?php echo main_footer(); ?>
<script language="javascript" src="<?php echo base_url() ?>assets/general_assets/dashboard.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="<?php echo base_url() ?>assets/theme/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>
    var baseUrl = '<?php echo base_url(); ?>';
    $(function() {
        $('.select2').select2();
    });
    $('.other-form').prop('disabled', true);
</script>