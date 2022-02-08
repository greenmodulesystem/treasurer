<?php 
        echo main_header();
        echo sidebar('fees_charges');
?>
<div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><i class="fa fa-money"></i> City Treasurer's Office</li>      
        </ol><br>
    </section>
    <section class="content">
        <div class="body">
            <div class="box box-primary"><br>
                <div class="row" id="add-div" style="display:block">                    
                    <div class="box-body">
                        <div class="col-md-3">
                            <label>Particular</label>
                            <input type="text" class="form-control input-sm" id="particular" placeholder="Particular Name" autofocus>
                        </div>
                        <div class="col-md-2">
                            <label>Amount</label>
                            <input type="number" class="form-control input-sm" id="amount" placeholder="Amount">
                        </div>
                        <div class="col-md-2">
                            <label> Category </label>                            
                            <select class="form-control input-sm category select2" name="category" style="width:100%;">
                                <option selected disabled> Select </option>                                  
                                <option value="GENERAL"> GENERAL </option>
                                <option value="TRUST"> TRUST </option>      
                                <option value="FORM 52"> FORM 52</option>
                                <option value="FORM 52"> FORM 53</option>
                                <option value="FORM 52"> FORM 54</option>
                                <option value="FORM 52"> FORM 57</option>                          
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label> Group </label>
                            <select name="groups" id="groups" class="form-control input-sm groups select2" style="width:100%;">
                                <option selected disabled> Select </option>
                                <?php foreach ($parents as $key => $value) {
                                    ?><option value="<?=@$value->Group_name?>"> <?=@$value->Group_name?></option><?php
                                }?>    
                                <option value="other"> NEW GROUP </option>
                            </select>
                            <div class="row" id="other-disp" style="display: none;">
                                <div class="box-body">
                                    <input type="text" class="form-control input-sm" id="new-group" placeholder="New Group">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label> Collection Type </label>                            
                            <select class="form-control input-sm col_type select2" name="col_type" style="width:100%;">
                                <option selected disabled> Select </option>
                                <?php foreach ($col_type as $key => $value) {
                                    ?><option value="<?=@$value->Type?>"> <?=@$value->Type?> </option><?php
                                }?>
                            </select>
                        </div>
                        <div class="col-md-1" style="margin-left:-1%;">
                            <label> </label>
                            <button class="btn btn-md btn-success btn-flat" style="width: 110%;" id="save"><i class="fa fa-plus-square"></i> ADD </button>
                        </div>                                                                                        
                    </div>
                </div>
                
                <div class="box-body" id="search-div" style="display:block; margin-top: 0%;">                           
                    <div class="row">
                        <div class="col-xs-12 col-md-2" style="display: block" id="search-click">
                            <button class="btn btn-flat btn-md btn-success" id="click-to-search"> SEARCH <i class="fa fa-search"></i></button>
                        </div>
                        
                        <div class="col-xs-12 col-md-5">
                            <div class="box-tools" id="search-row" style="display: none;">
                                <div class="input-group input-group-md" style="width: 100%;">
                                    <input type="text" name="table_search" id="search" autofocus class="form-control pull-right input-md" placeholder="Search...">
                                    <div class="input-group-btn">
                                        <button type="button" style="width: 70px;" id="search-particular" class="btn btn-success btn-flat input-md"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>           
                </div>

                <div class="box-body" id="display-part" style="overflow:scroll; height:auto; display:block;">
                    <table class="table table-hover">
                        <th style="width:35%;"> Particular</th> 
                        <th> Group </th>                     
                        <th> Amount </th>
                        <th> Collection Type </th>
                        <th> Options </th>
                        <tbody id="load-body">                            
                        </tbody>
                    </table>                   
                </div>                                

                <div class="box-body" id="edit-part-data" style="display:none;">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4">
                            <label> Particular </label>
                            <input type="hidden" id="ID">
                            <input type="text" class="form-control input-md" id="edit-part">
                        </div>
                        <div class="col-xs-12 col-sm-2">
                            <label> Amount </label>
                            <input type="number" class="form-control input-md" id="edit-amount">
                        </div>
                        <div class="col-xs-12 col-sm-2">
                            <label> Category </label>
                            <select class="form-control input-sm edit-category select2" name="edit-category" style="width:100%">
                                <option selected disabled> Select </option>
                                <option value="GENERAL"> GENERAL </option>
                                <option value="TRUST FUND"> TRUST </option>                                
                            </select>
                        </div>                                                
                    </div><br>

                    <div class="row">
                        <div class="col-xs-12 col-sm-2">
                            <label> Group </label>
                            <select name="groups" id="edit-groups" class="form-control input-sm edit-groups select2" style="width:100%">
                                <option selected disabled> Select </option>
                                <?php foreach ($parents as $key => $value) {
                                    ?><option value="<?=@$value->Group_name?>"> <?=@$value->Group_name?></option><?php
                                }?>    
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-2">
                            <label> Collection Type </label>                          
                            <select class="form-control input-sm col-type-edit select2" name="col-type-edit" style="width:100%">
                                <option value="" selected disabled> Select </option>
                                <?php foreach ($col_type as $key => $value) {
                                    ?><option value="<?=@$value->Type?>"> <?=@$value->Type?> </option><?php
                                }?>
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <label> <br> </label><br>
                            <button class="btn btn-flat btn-warning btn-sm" id="cancel-edit"><i class="fa fa-times"></i> CANCEL </button>
                            <button class="btn btn-flat btn-success btn-sm" id="update-parti"><i class="fa fa-plus"></i> UPDATE </button>
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
    var group = '';
    var edit_categories = '';
    var col_type_edit = '';
    var edit_group = '';

    var load_table = function () {
        $('#load-body').load(baseUrl + "general_collection/load_fees");
    }
    $(document).ready(function() {
        load_table();
    });
    $(function(){
        $('.select2').select2();
    });
</script>