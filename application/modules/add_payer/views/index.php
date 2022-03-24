<?php
main_header();
sidebar('add-payer');
?>
<div class="content-wrapper">
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h4 class="title-header"><i class="fa fa-user"></i> PAYOR </h4>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <label> Name: </label>
                        <input type="text" class="form-control input-md" id="name" placeholder="Name" autofocus>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-6">
                        <label> Address: </label>
                        <input type="text" class="form-control input-md" id="address" placeholder="Address" value="Cadiz City">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-2">
                        <button class="btn btn-flat btn-md btn-success" id="save-data"><i class="fa fa-file-o"></i> Save </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php main_footer(); ?>
<script language="javascript" src="<?php echo base_url() ?>assets/general_assets/add_payer.js"></script>
<script>
    var baseUrl = '<?php echo base_url(); ?>';
</script>