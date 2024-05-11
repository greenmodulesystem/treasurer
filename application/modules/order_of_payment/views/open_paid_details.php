<?=main_header();?>
<?=sidebar('oop');?>  
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/report.css">
<div class="content-wrapper">
    
    <section class="content">
        <div class="body">
            <div class="box box-primary">                              
                <div class="row">
                    <div class="box-body">              
                        <div class="box-header" style="margin-top: -1%">
                            <h4 class="title-header" style="margin-left: 0.9%"><i class="fa fa-info"></i> Order of Payment Details </h4>      
                            <div class="box-body" style="margin-left: -1.5%"> 
                        </div>

                        <div class="row">  
                            <div class="box-body">
                                <div class="alert alert-info alert-dismissible" style="display:block; height:40px; margin-left:1%;">                                                           
                                    <p style="font-size:15px; margin-top:-0.7%;"> STATUS: <span style="font-size:17px; font-weight:bold;" id="status"></span></p>
                                </div>
                                <div class="col-xs-12 col-md-4">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12">
                                            <label> Lastname </label>
                                            <input type="hidden" id="token" value="<?=@$result->U_ID?>">                                            
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
                                        <div class="col-xs-12 col-md-12" style="text-align: left">    
                                            <p style="color:black; font-size:15px;"> FORM: <span class="or-numbers" id="form-type"></span> </p> 
                                            <p style="color:black; font-size:15px;"> OR No. <span class="or-numbers" id="or-number"></span> </p>
                                            <input type="hidden" id="o-r-number" value="">                                            
                                        </div>                                      
                                    </div>   
                                    <div class="row">
                                        <div class="box-body">
                                            <table class="table">
                                                <thead>                                                        
                                                    <th> Particular </th>
                                                    <th> Amount </th>
                                                </thead>
                                                <tbody id="load-paid-particular"></tbody>                                    
                                            </table>
                                        </div>
                                    </div>                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?=main_footer();?>
<script src="<?php echo base_url()?>assets/general_assets/order_payment/oop.js"></script>
<script language="javascript" src="<?php echo base_url() ?>assets/general_assets/idle_signout.js"></script> <!-- KARL ALOB 3/24 -->
