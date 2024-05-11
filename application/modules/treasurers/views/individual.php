<?php 
main_header();
sidebar('individual'); 
?>

<div class="content-wrapper">
    <section class="content-header">
        </br>
        <ol class="breadcrumb">
            <li><i class="fa fa-money"></i> City Treasurer's Office</a></li>
            <li class="active">Individual Payment</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Add Items</h3>
                <button id="individual_history" class="btn btn-sm btn-default pull-right">
                    View Payments History&ensp;<i class="fa fa-caret-right"></i>
                </button>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Add ons :</label>
                            <label for="Pay_for" hidden>
                                <i class="fa fa-times-circle-o"></i> Required
                            </label>
                            <select id="Pay_for" class="input-field form-control input-sm">
                                <option disabled selected value="">Select from list</option>
                                <option value="Cedula">Cedula</option>
                                <optgroup label="Health Cards">
                                    <option value="Green">Green Card</option>
                                    <option value="Yellow">Yellow Card</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Quantity :</label>
                            <label for="Quantity" hidden>
                                <i class="fa fa-times-circle-o"></i> Required
                            </label>
                            <input type="number" id="Quantity" class="input-field form-control input-sm" 
                                min="1" value="" disabled>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div style="height:25px;">&nbsp;</div>
                            <button id="Add_item" class="btn btn-sm btn-default">
                                <i class="fa fa-plus-square"></i><span>&ensp;Add item</span>
                            </button> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table id="bills" class="table table-striped table-bordered text-center" 
                            cellspacing="0" width="100%">
                            <thead><tr>
                                <th colspan="2" style="width:40%;">PAY FOR</th>
                                <th style="width:18%;">PRICE</th>
                                <th style="width:10%;">QUANTITY</th>
                                <th style="width:18%;">AMOUNT</th>
                                <th style="width:14%;">REMOVE</th>
                            </tr></thead>
                            <tbody id="items_body">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php main_footer();?>
<script language="javascript" src="<?php echo base_url() ?>assets/general_assets/idle_signout.js"></script> <!-- KARL ALOB 3/24 -->
<script language="javascript" src="<?php echo base_url()?>assets/cto_assets/js/handlers/treasurer_handler.js"></script>
<script src="<?php echo base_url() ?>assets/theme/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script language="javascript" src="<?php echo base_url()?>assets/scripts/noPostBack.js"></script>
<script>
    var baseUrl = '<?php echo base_url()?>';
    var ID = null;
    $(document).ready(function(){
        loadGrid();
    });
    
    var loadGrid = function(){
        $(document).gmLoadPage({
            url     :   baseUrl+"treasurers/individual_payables/",
            load_on :   "#items_body"
        });
    }
</script>