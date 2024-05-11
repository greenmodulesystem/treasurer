<?php
main_header();
sidebar('void');
?>
<style>.table tbody tr:hover td, .table tbody tr:hover th {
    background-color: #cceeff;
}</style>

<div class="content-wrapper">
    <section class="content-header">
        <h1>&nbsp;</h1>
        <ol class="breadcrumb">           
            <li class="active" style="color: black"><i class="fa fa-search"></i> Search </li>
        </ol>
    </section>

    <section class="content">        
        <div class="box box-primary">
            <div class="box-body">
                <div class="box-body">
                    <div class="row">
                        <input type="text" class="form-control input-md" id="cheque" value="<?=@$result->Cheque?>" style="display:none;">
                        <input type="text" class="form-control input-md" id="bank" value="<?=@$result->Bank_name?>" style="display:none;">
                        <input type="text" class="form-control input-md" id="check_no" value="<?=@$result->Check_no?>" style="display:none;">
                        <input type="text" class="form-control input-md" id="c-amount" value="<?=@$result->Check_amount?>" style="display:none;">
                        <input type="text" class="form-control input-md" id="c-date" value="<?=@$result->Check_date?>" style="display:none;">
                        <!-- <input type="text" class="form-control input-md" id="" value="<?=$account->OR_for?>" style="display:none;"> -->
                        <input type="text" class="form-control input-md" id="status" value="<?=@$result->Cancelled?>" style="display:none;">
                    
                        <div class="col-md-3">
                             <h3 style="color:<?php echo @$result->Cancelled == 1 ? 'red' : (@$result->Remitance == 1 ? 'green' : ''); ?>"> <?php  if(@$result->Cancelled == 1){
                                    echo "Voided";
                                }
                                if(@$result->Cancelled != 1 && @$result->Remitance == 1){
                                    echo "Remitted";
                                } 
                                if(@$result->Cancelled != 1 && @$result->Remitance != 1){
                                    echo "Unremitted";
                                }  ?>
                            </h3>
                            <label for="or-number">Date:</label>      
                            <div class="input-group" style="width:100%">
                            <span class="input-group-addon"> <i class="fa fa-calendar-plus-o" ></i></span>
                            <input type="text" class="form-control input-md c-date" id="date_paid" style="" data-field="date" placeholder="m/d/Y"   value="<?= $result->Date_paid?> "readonly>
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-md-3">
                            <input type="text" class="form-control input-md" id="address" value="<?=@$result->Address?>" style="display:none;">
                            <label> OR Number </label>
                            <input type="text" class="form-control input-md" id="or-number" value="<?=@$result->Accountable_form_number?>" readonly>
                        </div>
                        <div class="col-md-5">
                            <label> Payor Name </label>
                            <input type="text" class="form-control input-md" id="readonly-payer"value="<?=@$result->Payor?>" readonly>
                            <input type="text" class="form-control input-md" id="editable-payer" value="<?=@$result->Payor?>" style="display:none;">
                        </div>
                        <div class="col-md-4">
                            <label> Paid By </label>
                            <input type="text" class="form-control input-md" id="readonly-paidby" value="<?=@$result->Paid_by?>" readonly>
                            <input type="text" class="form-control input-md" id="editable-paidby" value="<?=@$result->Paid_by?>" style="display:none;">
                        </div>
                    </div>     
                    
                    <div class="row">
                        <div class="box-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <th width="500"> Particular </th>
                                    <th width="100"> Amount </th>
                                    <th> Remarks </th>
                                </thead>
                                <tbody id="load-particular-or"></tbody>
                            </table>
                        </div>
                    </div>
                  
                    <!-- <div class="row">
                        <div class="box-body" style="margin-left: 0.8%;">                    
                            <button class="btn  btn-warning btn-sm" id="edit-or-number"> EDIT OR <i class="fa fa-edit"></i></button>
                            <button class="btn  btn-primary btn-sm" id="reprint"> REPRINT <i class="fa fa-print"></i></button>
                            <button class="btn  btn-success btn-sm" id="update-or-details" style="display:none"> SAVE & PRINT <i class="fa fa-save"></i></button>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="box-body" style="margin-left: 0.8%;">
                        <?php if($result->Cancelled != 1 && $result->Remitance != 1){ ?>           
                            <!-- <button class="btn  btn-warning btn-sm" id="edit-or-number"> EDIT OR <i class="fa fa-edit"></i></button> --> <!--Morancil 7/5/23-->

                            <!-- ADDED YOBHEL 3-27-23 -->
                            <button class="btn  btn-success btn-sm" id="update-or-details" style="display:none"> SAVE & PRINT <i class="fa fa-save"></i></button>
                            
                        <?php } else { ?>

                            <!-- <button class="btn  btn-warning btn-sm" id="edit-or-number" disabled> EDIT OR <i class="fa fa-edit"></i></button>  --> <!--Morancil 7/5/23-->
                            
                      <?php  } ?>
                      
                      <button class="btn  btn-primary btn-sm" id="reprint"> REPRINT <i class="fa fa-print"></i></button> <!--De la Cruz 3/24/2023 -->
                        </div>
                    </div>
                </div>
                     
            </div> 
                       
        </div>
    </section>
    <!-- <div class="row">
        <div class="col-md-8"> 
        </div>
        <div class="col-md-4" > 
            <label for="total" class="control-label col-md-2"> Total </label>
            <div class="col-md-10">
                <input id="total_payable_gen" class="form-control" value="" readonly></input>
            </div>                           
        </div>
    </div>  -->
</div>

<?=main_footer();?>
<script language="javascript" src="<?php echo base_url() ?>assets/general_assets/idle_signout.js"></script> <!-- KARL ALOB 3/24 -->
<script language="javascript" src="<?php echo base_url()?>assets/general_assets/voiding_receipt.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="<?php echo base_url() ?>assets/theme/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>
       $('.c-date').datepicker({
        autoclose: true,
        format: "yyyy-m-d",
    });
</script>