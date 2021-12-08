<?php
main_header();
sidebar('payments',$form);
?>
<style>
.m_padding{
    padding-bottom : .1em;
}
</style>
<div class="content-wrapper">
    <section class="content-header">
        </br>
        <ol class="breadcrumb">
            <li><i class="fa fa-money"></i> City Treasurer's Office</li>            
            <li class="active"> Payments</li>
        </ol>
    </section>

    <section class="content">  
        <div class="row">
            <div class="col-md-12 col-xs-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#form" data-toggle="tab" aria-expanded="false">FORM</a></li>
                    <li class=""><a href="#stabs" data-toggle="tab" aria-expanded="true">STABS</a></li>
                    <li class=""><a href="#reports" data-toggle="tab" aria-expanded="true">REPORTS</a></li>
                    <li class=""><a href="#void" data-toggle="tab" aria-expanded="true">VOID RECEIPT</a></li>
                </ul>
                <div class="tab-content">
                    <table class="table">
                            <tr>
                                <td> <h4>Accountable Form No. <span style="font: bold 30px Bookman Old Style;"><?=$form?></span> </h4></td>
                                <td> <h3 class="text-green"><?=OFFICE_R[OFFICE]['LONG']?></h3></td>
                            </tr>
                    </table>
                    <div class="tab-pane active" id="form">
                        <?php $this->load->view('form_content/form');?>
                    </div>
                    <div class="tab-pane" id="stabs">
                        <?php $this->load->view('form_content/stabs');?>
                    </div>
                    <div class="tab-pane " id="reports">
                        <?php $this->load->view('form_content/reports');?>
                    </div>
                    <div class="tab-pane" id="void">
                        <?php $this->load->view('form_content/void');?> 
                    </div>
                </div>
          </div>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="modal-receipt" style="display: none;">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">RECEIPT</h4>
        </div>
        <div class="modal-body">
            <div id="receipt">
                <h2 style="text-align:center;">
                    <i class="fa fa-spin fa-refresh"></i>  Loading receipt.                              
                </h2>
                
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">CLOSE</button>
            <button type="button" class="btn btn-primary btn-flat" id="print"> <i class="fa fa-print"></i> PRINT</button>
        </div>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-certificate" style="display: none;">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">CERTIFICATE</h4>
        </div>
        <div class="modal-body">
            <div id="temp-certificate">
                <h2 style="text-align:center;">
                    <i class="fa fa-spin fa-refresh"></i>  Loading certificate.                              
                </h2>
                
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">CLOSE</button>
            <button type="button" class="btn btn-primary btn-flat" id="print-certificate"> <i class="fa fa-print"></i> SAVE AND PRINT</button>
        </div>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-void-receipt" style="display: none;">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">RECEIPT</h4>
        </div>
        <div class="modal-body">
            <input type="text" class="form-control input-lg" data-field="remarks" placeholder="Remarks (Optional)">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">CLOSE</button>
            <button type="button" class="btn btn-success btn-flat" id="proceed-void"> <i class="fa fa-arrow-circle-right"></i> PROCEED VOIDING</button>
        </div>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php main_footer();?>
<script language="javascript" src="<?php echo base_url()?>assets/scripts/payments/formatter.js"></script>
<script language="javascript" src="<?php echo base_url()?>assets/scripts/payments/payments.js"></script>
<script language="javascript" src="<?php echo base_url()?>assets/scripts/payments/stabs.js"></script>
<script language="javascript" src="<?php echo base_url()?>assets/scripts/payments/receipts.js"></script>
<script language="javascript" src="<?php echo base_url()?>assets/scripts/payments/reports.js"></script>
<script language="javascript" src="<?php echo base_url()?>assets/scripts/payments/certificate.js"></script>
<script src="<?php echo base_url() ?>assets/theme/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>
    $('.date').datepicker({
        autoclose: true,
        format: "mm/dd/yyyy",
        orientation: "bottom left"
    });  
    var baseUrl = '<?php echo base_url();?>';
    var form = '<?=$form?>';
</script>
