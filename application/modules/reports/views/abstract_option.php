<?php
echo main_header();
echo sidebar('reports');
?>
<div class="content-wrapper">

    <section class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-12 col-xs-3">
                        <div class="box-body">
                            <select name="typeOfReport" id="typeOfReport" class="form-control input-md select2" data-field="typeOfReport">
                                <option selected disabled> Select </option>
                                <option value="General"> GENERAL ABSTRACT </option>
                                <option value="Trust"> TRUST ABSTRACT </option>
                                <option value="Port"> PORT ABSTRACT </option>
                                <option value="ECO/ENT"> ECO/ENT ABSTRACT </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12 col-xs-2" style="margin-left: -2%;">
                        <div class="box-body">
                            <input type="hidden" id="colType" value="<?=@$Type?>">
                            <button class="btn btn-flat btn-primary btn-md" id="generateTypeOfReport"><i class="fa fa-forward"></i> GENERATE </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= main_footer(); ?>
<script language="javascript" src="<?php echo base_url() ?>assets/general_assets/reports/typeOfReport.js"></script>
<script>
    $(function() {
        $('.select2').select2()
    });
</script>