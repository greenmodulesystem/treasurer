<?php 
        echo main_header();
        echo sidebar('fees_charges');
?>
<div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><i class="fa fa-money"></i> City Treasurer's Office</li>
            <li>Collection</li>
            <li class="active">Fees and Charges</li>
        </ol><br>
    </section>
    <section class="content">
        <div class="body">
            <div class="box box-primary"><br>
                <div class="row">
                    <div class="box-body">
                        <div class="col-md-3">
                            <label>Particular</label>
                            <input type="text" class="form-control input-sm" id="particular" autofocus>
                        </div>
                        <div class="col-md-3">
                            <label>Category</label>
                            <!-- <input type="text" class="form-control input-sm" id="category"> -->
                            <select class="form-control input-sm category" name="category" style="color: black">
                                <option value="" selected disabled>Select Type...</option>
                                <option value="General"> General</option>
                                <option value="Trust Fund">Trust Fund</option>
                                <option value="Marriage">Marriage</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Amount</label>
                            <input type="text" class="form-control input-sm" id="amount">
                        </div>
                        <div class="col-md-3">
                            <label>Collection Type</label>
                            <!-- <input type="text" class="form-control input-sm" id="type"> -->
                            <select class="form-control input-sm col_type" name="col_type" style="color: black">
                                <option value="" selected disabled>Select Type...</option>
                                <option value="General"> General</option>
                                <option value="Trust Fund">Trust Fund</option>                               
                            </select>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                        <button class="btn btn-sm btn-success btn-flat" id="save"><i class="fa fa-plus-square"></i> Add</button>
                </div>                
                <div class="box-body" style="overflow:scroll; height:auto;">
                    <table class="table table-hover">
                        <th>Particular</th>
                        <th>Category</th>
                        <th>Amount</th>
                        <th>Collection Type</th>
                        <th>Delete</th>
                        <tbody id="load-body">                            
                        </tbody>
                    </table>
                    <hr>
                    <div class="row">
                        <div class="col-md-1">                        
                            <div class="box-body">                            
                                <button class="btn btn-sm btn-flat btn-primary edit-data"><i class="fa fa-edit"></i> Edit</button>
                            </div>
                        </div>
                        <div class="col-md-1" id="save-body" style="display: none">                        
                            <div class="box-body">                            
                                <button class="btn btn-sm btn-flat btn-success" id="save-data"><i class="fa fa-file-o"></i> Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php echo main_footer();?>
<script language="javascript" src="<?php echo base_url()?>assets/general_assets/save_particular.js"></script>
<script>
    var baseUrl = '<?php echo base_url();?>';
    var categories = '';
    var col_type = '';
    var load_table = function () {
        $('#load-body').load(baseUrl + "general_collection/load_fees");
    }
    $(document).ready(function() {
        load_table();
    })
</script>