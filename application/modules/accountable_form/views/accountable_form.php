<?php
    echo main_header();
    echo sidebar('accountable_form');
?>
<div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><i class="fa fa-money"></i> City Treasurer's Office</li>
            <li>Collection</li>
            <li class="active">Accountable Form</li>
        </ol><br>
    </section>
    <section class="content">
        <div class="body">
            <div class="box box-primary">
                <div class="row">
                    <div class="box-body">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>OR Type:</label>
                                <select class="form-control input-sm select2 or_type" name="or_type" data-placeholder="Select...">
                                    <option value="" disabled selected>Select...</option>
                                    <?php foreach ($Result as $key => $value) {
                                        ?><option value="<?=$value->Type?>"><?=$value->Type?></option><?php
                                    }?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Date Release:</label>
                            <input type="text" id="date_release" disabled class="form-control input-sm date_released">
                        </div>
                        <div class="col-md-4">
                            <label>Collector:</label><br>
                            <select name="collector" class="form-control input-sm select2 collector">
                                <option disabled selected> Select... </option>
                                <?php foreach ($Collectors as $key => $value) {
                                    ?><option value="<?=$value->ID?>"> <?=$value->First_name.' '.$value->Last_name?> </option><?php
                                }?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="box-body">
                        <div class="col-md-4">
                            <label>Start OR Number</label>
                            <input type="number" class="form-control input-sm" id="start_or" autofocus>
                        </div>
                        <div class="col-md-4">
                            <label>End OR Number</label>
                            <input type="number" class="form-control input-sm" id="end_or">
                        </div>
                        <div class="col-md-4">
                            <label>Release By:</label>
                            <input readonly type="text" id="release_by" style="width: 104%" class="form-control input-sm" value="<?=$_SESSION['User_details']->First_name.' '.$_SESSION['User_details']->Last_name?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="box-body">
                        <div class="col-md-1" style="margin-top: 2%">
                            <button class="btn  btn-primary btn-sm" id="generate-stub"><i class="fa fa-forward"></i> Generate</button>
                        </div>
                        <div class="col-md-1" style="margin-top: 2%">
                            <button class="btn  btn-success btn-sm" id="submit-stub"><i class="fa fa-paper-plane"></i> Submit</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="box-body">
                        <div class="col-md-3" id="starts">
                        </div>
                        <div class="col-md-3" id="ends">
                        </div>
                        <div class="col-md-3" id="stub-no">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php echo main_footer();?>
<script language="javascript" src="<?php echo base_url()?>assets/general_assets/accountable_form.js"></script>
<script language="javascript" src="<?php echo base_url() ?>assets/general_assets/idle_signout.js"></script> <!-- KARL ALOB 3/24 -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="<?php echo base_url() ?>assets/theme/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>
    var baseUrl = '<?php echo base_url()?>';
    var or_type;
    var or_for;
    var collector_id;
    var user_detail = <?php echo json_encode($_SESSION['User_details']->ID);?>;

    $(function(){
        $('.select2').select2();
    });
    $('.date_released').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
    });
    $(".date_released").datepicker().datepicker("setDate", new Date());
</script>
