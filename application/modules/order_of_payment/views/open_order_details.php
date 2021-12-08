<?=main_header();?>
<?=sidebar('oop');?>  
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/report.css">
<div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><i class="fa fa-money"></i> City Treasurer's Office</li>            
        </ol><br>
    </section>
    <section class="content">
        <div class="body">
            <div class="box box-default">                              
                <div class="row">
                    <div class="box-body">              
                        <div class="box-header" style="margin-top: -1%">
                            <h4 class="title-header" style="margin-left: 0.9%"><i class="fa fa-info"></i> Order of Payment Details </h4>      
                            <div class="box-body" style="margin-left: -1.5%">    
                            <div class="alert alert-info alert-dismissible" style="height:40px; width: 31%; margin-left: 1.5%;">                                                           
                                <p style="font-size:15px; margin-top:-2%;"> Office Origin: <span style="font-size:17px; font-weight:bold; "> <?=@$result->Office?></span></p>
                            </div>                         
                        </div>

                        <div class="row">  
                            <div class="box-body">
                                <div class="col-xs-12 col-md-4">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12">
                                            <label> Lastname </label>
                                            <input type="hidden" id="token" value="<?=@$result->U_ID?>">               
                                            <input type="hidden" id="oopID" value="<?=@$result->ID?>">                             
                                            <input type="text" class="form-control input-md" id="last-name" value="<?=@$result->Lastname?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12">
                                            <label> Firstname </label>
                                            <input type="text" class="form-control input-md" id="first-name" value="<?=@$result->Firstname?>" readonly>
                                        </div>
                                    </div>  
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12">
                                            <label> Middlename </label>
                                            <input type="text" class="form-control input-md" id="middle-name" value="<?=@$result->Middlename?>" readonly>
                                        </div>
                                    </div>  
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12">
                                            <label> Address </label>
                                            <input type="text" class="form-control input-md" id="address" value="<?=@$result->Payor_address?>" readonly>
                                        </div>
                                    </div>      
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12">
                                            <label> Paid By </label>
                                            <input type="text" class="form-control input-md" id="paid-by" value="<?=@$result->Paid_by?>" readonly>
                                        </div>
                                    </div>                       
                                </div>
                                <div class="col-xs-12 col-md-4">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12">
                                            <label> Order Payment Ref. No. </label>                                     
                                            <input type="text" class="form-control input-md or-numbers" value="<?=@$result->Order_payment_number?>" readonly>
                                        </div>  
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12">
                                            <label> Company Name </label><br>
                                            <textarea name="comp-name" id="comp-name" cols="45" rows="4" readonly> <?=@$result->Company_name?></textarea>                                            
                                        </div>    
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12">
                                            <label> Remarks </label><br>
                                            <textarea name="remarks" id="remarks" cols="45" rows="4" readonly> <?=ucwords(@$result->Remarks)?></textarea>
                                            <input type="hidden" id="oop-ID" value="<?=@$result->ID?>">
                                        </div>    
                                    </div>                          
                                </div>
                                <div class="col-xs-12 col-md-4">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12" style="text-align: center">
                                            <label></label><br>
                                            <button class="btn btn-lg btn-flat btn-primary" data-toggle="modal" data-backdrop="static" data-target="#options-modal"><i class="fa fa-cog"></i> <b>PAYMENT OPTIONS</b> </button>
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="box-body">
                                            <div class="box-body" style="border: 1px solid black; margin-top: -4%;">
                                                <div class="col-xs-12 col-md-12" style="text-align: left">    
                                                    <p style="color:black; font-size:15px;"> FORM: <span class="or-numbers" id="form-type"></span> </p> 
                                                    <p style="color:black; font-size:15px;"> OR No. <input type="number" class="or-numbers form-control input-sm" id="or-number" value=""> </p>
                                                    <input type="hidden" id="o-r-number" value="">
                                                    <p style="color:black; font-size:15px;"> TOTAL: <span class="or-numbers" id="total-amount"></span></p>
                                                </div>
                                            </div>
                                        </div>                                        
                                    </div><br> 
                                    <div class="row" id="for-payment" style="margin-top: -4%;">
                                        <div class="col-xs-12 col-md-4">
                                            <button class="btn btn-md btn-flat btn-primary" id="incash-payment"><i class="fa fa-money"></i> CASH </button>
                                        </div>
                                        <div class="col-xs-12 col-md-4">
                                            <button class="btn btn-md btn-flat btn-primary"><i class="fa fa-money"></i> CHEQUE </button>
                                        </div>
                                        <div class="col-xs-12 col-md-4">
                                            <button class="btn btn-md btn-flat btn-success"><i class="fa fa-money"></i> MIXED </button>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div><br>    
                        <div class="row">
                            <div class="box-body">
                                <div class="col-xs-12 col-md-8">
                                    <table class="table">
                                        <thead>
                                            <th> Option </th>
                                            <th> Particular </th>
                                            <th> Amount </th>
                                        </thead>
                                        <tbody id="load-particular-details"></tbody>                                    
                                    </table>                                
                                    <div class="box-body">
                                        <button class='btn btn-primary btn-sm btn-flat' id="add-to-edit"><i class="fa fa-plus-square"></i></button>                                    
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-xs-12 col-md-8">
                                <div class="box-body">
                                    <button class="btn btn-sm btn-warning btn-flat" id="edit-button"><i class='fa fa-edit'></i> EDIT </button>
                                    <button class="btn btn-sm btn-danger btn-flat" id="cancel-button"><i class='fa fa-times'></i> CANCEL </button>
                                    <button class="btn btn-sm btn-success btn-flat" id="save-edit-button"><i class="fa fa-refresh"></i> UPDATE </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- load search particular and ADD to particular input -->
<div class="modal fade modal-wide-payer" id="load-search-particular" role="dialog">
    <div class="modal-dialog">       
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" style="color: red"> <i class="fa fa-times"></i> </button>                
            </div>
            <div class="modal-body">
                <table class="table table-hover table-bordered">
                    <thead>
                        <th> Option </th>
                        <th> Particular </th>                                             
                    </thead>
                    <tbody id="load-particulars">                                
                    </tbody>
                </table>          
            </div>            
        </div>        
    </div>
</div>
<!-- options modal for accountable forms -->
<div class="modal fade" id="options-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-cog"></i> Payment Accountable Options </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">     
                <div id="load-51-btn"></div>                              
                <div class="box-body"></div>
                <?php
                    foreach ($accountable as $key => $value) {
                        ?>                                                                                    
                            <div class="col-xs-12 col-md-6">
                                <button class="btn btn-lg btn-flat btn-primary btn-form-option" data-origin="<?=@$value->OR_origin?>" data-orfor="<?=@$value->OR_for?>" data-ortype="<?=@$value->OR_Type?>" style="width: 100%;"> <?=strtoupper(@$value->OR_Type)?></button></br></br>
                            </div>                            
                        <?php
                    }
                ?>                
            </div>
            <div class="modal-footer">        
            </div>
        </div>
    </div>
</div>
<?=main_footer();?>
<script src="<?php echo base_url()?>assets/general_assets/order_payment/oop.js"></script>
<script>
    var total_gross = 0;
    var particulars = '';    
    var OriginOR;
    $(document).ready(function(){
        document.getElementById('for-payment').style.display = "none";
    });
</script>