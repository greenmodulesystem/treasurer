<?=main_header();?>
<?=sidebar('port_col')?>

<style>
    .myCheckbox {
        width: 20px;
        height: 20px;        
    }.modal.modal-wide .modal-dialog {
    width: 35%;  
    }
    .modal-wide .modal-body {
    overflow-y: auto;
    }
    .modal-wide-receipt .modal-dialog{
        width: 35%;    
    }
    .modal-wide-payer .modal-dialog{
        width: 45%;    
    }
    .table-hover tbody tr:hover td {
        background: #d0f7e5;
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><i class="fa fa-money"></i> City Treasurer's Office</li>           
        </ol><br>
    </section>
    <section class="content">
        <div class="body">
            <div class="box box-default">                              
                <div class="row" style="color: black">
                    <div class="box-body" style="color: black">              
                        <div class="box-header" style="margin-top: -2%">
                            <h4 class="title-header" style="margin-left: 0.9%"><i class="fa fa-info"></i> Port Collection </h4>      
                            <div class="box-body" style="margin-left: -1.5%">
                                <div class="col-md-8" style="color: black">
                                    <label>Payer:</label>
                                    <input type="text" class="form-control input-md search_payer" id="payor-name" placeholder="Payer's Name" autofocus>
                                    <label>Paid By:</label>
                                    <input type="text" class="form-control input-md search_paid_by" id="paid-by" placeholder="Paid By">
                                    <label>Address:</label>
                                    <input type="text" class="form-control input-md search_address" id="address" placeholder="Adddress">                                  
                                    <input type="hidden" disabled class="form-control input-md date_paids" id="date-paid">
                                </div>                                                                                         
                            </div>                  
                        </div>       
                    </div>
                </div>    
                                
                <div class="box box-default">
                    <div class="row">
                        <div class="box-body">              
                            <div class="box-header" style="margin-top: -2%">
                                <h4 class="title-header" style="margin-left: 0.9%"><i class="fa fa-edit"></i> Particular </h4>      
                                <div class="box-body" style="margin-left: -1.5%">
                                    <div class="col-md-1">
                                        <label for=""> Option </label>
                                        <div id="load-del-btn">
                                            </br>
                                        </div>
                                        </br><button class="btn btn-flat btn-md btn-primary" id="add-particu-inpt"><i class="fa fa-plus-square"></i> ADD </button>                                                         
                                    </div>
                                    <div class="col-md-5"> 
                                        <label for=""> Particular/s </label>                                                                                        
                                        <div id="load-input-particu">
                                            </br>                                                                                        
                                        </div>                                                     
                                    </div> 
                                    <div class="col-md-2">
                                        <label for=""> Amount </label>
                                        <div id="load-amount">
                                            <br>
                                        </div>
                                    </div>                                                                                        
                                </div>                  
                            </div>       
                        </div>
                    </div>  
                </div>
               
                <div class="row">
                    <div class="box-body" style="color: black;">
                        <div class="box-body">
                            <div class="col-md-8" style="color: black">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label style="font: bold 25px Bookman Old Style;"> SubTotal:</label>
                                        <label style="margin-top: 0%; color: red; font: bold 25px Bookman Old Style;" id="subtotal"></label> 
                                    </div>
                                    <div class="col-md-7">
                                        <div class="col-sm-4">
                                            <label style="font: bold 25px Bookman Old Style;"> OR No: </label>
                                        </div>                                        
                                        <div class="col-sm-8">
                                            <input type="number" id="or_numbers" class="form-control input-sm" style="color: red; font: bold 25px Bookman Old Style;"> 
                                        </div>                                        
                                        <!-- <label id="or_numbers" style="margin-top: 0%; color: red; font: bold 25px Bookman Old Style;"></label>  -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <button class="btn btn-flat btn-md btn-primary" id="costumer_pay" data-backdrop="static" style="width: 100%; margin-top: 12%;" data-toggle="modal"><i class="fa fa-money"></i> F9-Cash </button>
                                    </div>                                            
                                    <div class="col-md-4">                                                                                        
                                        <button class="btn btn-flat btn-md btn-primary" id="f10-pay" data-backdrop="static" style="width: 100%; margin-top: 12%;" data-toggle="modal"><i class="fa fa-money"></i> F10-Cheque </button>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-flat btn-md btn-success" id="mix_payment" data-backdrop="static" style="width: 100%; margin-top: 12%;"><i class="fa fa-money"></i> Cheque & Cash </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                                                                                                         
            </div>
        </div> 

        <div class="row" style="display: none">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="row" id="load_payment" style="display: block">                                                                   
                        <div class="body" id="load-data"></div>
                    </div>
                </div>
            </div>            
        </div>    
        <div class="row" style="display: none">
            <div class="col-md-12">
                <div class="box box-primary" style="height: 300px; overflow-y: scroll;">
                    <div class="box-body">                  
                        <h4 class="modal-title"><i class="fa fa-address-card"></i> Payment Summary </h4>                  
                    <div id="load_summary" style="margin-top: 1%"></div> 
                    </div>
                </div>                
            </div>
        </div>
        <input type="hidden" id="collector_name" value="<?=$_SESSION['User_details']->Last_name.', '.$_SESSION['User_details']->First_name?>">
    </section>
</div>
<?=main_footer();?>
<script language="javascript" src="<?php echo base_url() ?>assets/general_assets/idle_signout.js"></script> <!-- KARL ALOB 3/24 -->