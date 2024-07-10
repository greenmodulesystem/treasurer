<?php
    echo main_header();
    echo sidebar('trust_collection');
?>
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
    .table-hover tbody tr:hover td {
        background: #d0f7e5;
    }</style>
<div class="content-wrapper" style="color: black">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><i class="fa fa-money"></i> City Treasurer's Office</li>
        </ol><br>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default" >

                    <div class="row" style="color: black">
                        <div class="box-body" style="color: black">              
                            <div class="box-header" style="margin-top: -2%">
                                <h4 class="title-header" style="margin-left: 0.9%"><i class="fa fa-info"></i> Trust Collection </h4>      
                                <div class="box-body" style="margin-left: -1.5%">
                                    <div class="col-md-8" style="color: black">
                                        <label>Payer/Company:</label>
                                        <input type="text" onkeydown="upperCaseF(this)" class="form-control input-md trust_search_payer" id="trust_payor_name" placeholder="Payer's Name" autofocus>
                                        <label>Paid By:</label>
                                        <input type="text" onkeydown="upperCaseF(this)" class="form-control input-md trust_search_paid_by" id="trust_paid_by" placeholder="Paid By">
                                        <label>Address:</label>
                                        <input type="text" onkeydown="upperCaseF(this)" class="form-control input-md trust_search_address" id="trust_address"  value="City of Sagay" placeholder="Adddress">                                  
                                        <input type="hidden" class="form-control input-md trust_date_paids" id="trust_date_paid" value="<?=date('Y-m-d')?>">
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
                                        <form action="">
                                            <input type="radio" class="options" value="single" name="options" checked> Single</input>
                                            <input type="radio" class="options" value="group" name="options"> Group</input>
                                        </form>
                                    <div class="box-body" style="margin-left: -1.5%">
                                        <div class="col-md-1">
                                            <label for=""> Option </label>
                                            <div id="trust-load-del-btn">
                                                </br>
                                            </div>
                                            </br><button class="btn btn-flat btn-md btn-primary" id="trust-add-particu-inpt"><i class="fa fa-plus-square"></i> ADD </button>                                                         
                                        </div>
                                        <div class="col-md-5"> 
                                            <label for=""> Particular/s </label>                                                                                        
                                            <div id="trust-load-input-particu">
                                                </br>                                                                                        
                                            </div>                                                     
                                        </div> 
                                        <div class="col-md-2">
                                            <label for=""> Amount </label>
                                            <div id="trust-load-amount">
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
                                <div class="col-md-12" style="color: black;">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label style="font: bold 25px Bookman Old Style;">SubTotal:</label>                                                        
                                            <label style="margin-top: 0%; color: red; font: bold 25px Bookman Old Style;" id="subtotal"></label> 
                                        </div>
                                        <div class="col-md-5">
                                            <div class="col-sm-4">
                                                <label style="font: bold 25px Bookman Old Style;">OR No: </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="number" id="t_or_numbers" class="form-control input-sm" style="color: red; font: bold 25px Bookman Old Style;" disabled>
                                            </div>
                                            <!-- <label id="t_or_numbers" style="margin-top: 0%; color: red; font: bold 25px Bookman Old Style;"></label> -->
                                        </div>
                                        <!-- 4-14-2023 LOUIS -->
                                        <div class="col-md-4">
                                            <div class="col-sm-4">
                                                <label style="font: bold 15px Bookman Old Style;"> Remaining Receipts: </label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="number" id="remaining_or" class="form-control input-sm" style="color: red; text-align: center; font: bold 15px Bookman Old Style;" disabled>
                                                <!-- <label style="color: Blue; font: bold 15px Bookman Old Style; margin-left:13px;"> General Collection </label> -->
                                            </div>
                                        </div>
                                    <!-- END -->
                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <button class="btn btn-primary btn-md btn-flat" style="width: 100%;" id="t-costumer_pay" data-backdrop="static"><i class="fa fa-money"></i> F9-Cash </button>
                                        </div>
                                        <div class="col-md-4">
                                            <button class="btn btn-primary btn-md- btn-flat" style="width: 100%;" id="f10-t-pay" data-backdrop="static"><i class="fa fa-money"></i> F10-Cheque</button>
                                        </div>
                                        <div class="col-md-4">
                                            <button class="btn btn-success btn-md btn-flat" style="width: 100%;" id="mix-payment-trust" data-backdrop="static"><i class="fa fa-money"></i> Cheque & Cash </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="display: none;">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="row" id="load_payment" style="display: block;">                                                                   
                                    <div class="body" id="load-data"></div>
                                </div>
                            </div>
                        </div>            
                    </div>                    
                </div>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="body" id="load_form"></div>
                </div>
            </div>            
        </div> -->
        <div class="row" style="display: none;">
            <div class="col-md-12">
                <div class="box box-primary" style="height: 300px; overflow-y: scroll;">
                    <div class="box-header">
                        <h4 class="title-header"><i class="fa fa-address-card"></i> Payment Summary</h4>
                    </div>
                    <div class="box-body" style="margin-top: -1.5%" id="load_summary"></div>
                </div>
            </div>
        </div>        
    </section>
</div>
<!-- load payment cash modal -->
<div class="modal fade modal-wide" id="payment_modal" role="dialog">
    <div class="modal-dialog">       
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa fa-money"></i> Summary </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6 text-right">
                        <label style="font-size: 16px;">Total: </label>             
                    </div>
                    <div class="col-sm-6">
                        <label style="font-size: 16px;">Php <label style="font: bold 25px Bookman Old Style; color: red;" class="total_pay"></label></label>      
                        <input type="hidden" id="total_payable_trust" value="">             
                    </div>
                </div><div style="border-top: 1px solid black"></div><br>
                <div class="row">
                    <div class="col-sm-6 text-right">                   
                        <label style="font-size: 16px;" >Cash: </label>
                    </div>
                    <div class="col-sm-6">                  
                        <input type="number" class="form-control input-md text-right cash-in" id="trust-cash" style="width: 80%;">
                    </div>
                </div><br><div style="border-top: 1px solid black"></div>
                <div class="row">
                    <div class="col-sm-6 text-right">                  
                        <label style="font-size: 16px;">Change:</label>
                    </div>
                    <div class="col-sm-6">                   
                        <label style="font: bold 25px Bookman Old Style; color: red;" id="change"></label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-flat btn-md pull-left btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                <button type="button" class="btn btn-flat btn-success btn-md pull-right" id="costumer_payment">Save & Print</button>
            </div>
        </div>
        
    </div>
</div>
<!-- load payment non-cash modal -->
<div class="modal fade modal-wide" id="trust-non-cash-modal" role="dialog">
    <div class="modal-dialog">       
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa fa-money"></i> Cheque Payment </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-5 text-right">
                        <label style="font-size: 16px;">Total: </label>             
                    </div>
                    <div class="col-sm-6">
                        <label style="font-size: 16px;">Php <label style="font: bold 25px Bookman Old Style; color: red;" class="total_pay"></label></label>                   
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5 text-right">
                        <label style="font-size: 16px;" for="">Bank:</label>
                    </div>
                    <div class="col-sm-6">
                        <select name="bank-optn" id="" class="form-control input-md bank-optn">
                            <option value="" disabled selected>Select...</option>
                            <?php foreach ($banks as $key => $value) {
                                ?><option value="<?=$value->Bank_name_short?>"><?=$value->Bank_name_short?></option><?php
                            }?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5 text-right">                   
                        <label style="font-size: 16px;" for="">Cheque No:</label>
                    </div>
                    <div class="col-sm-6">                  
                        <input type="text" class="form-control input-md" id="check_no" placeholder="Cheque Number">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5 text-right">
                        <label style="font-size: 16px;">Cheque Date:</label>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control input-md c-date" placeholder="Cheque Date">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5 text-right">
                        <label style="font-size: 16px;">Amount:</label>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control input-md" id="c-amount" placeholder="Cheque Amount">
                    </div>
                </div>
                <br><div style="border-top: 1px solid black"></div><br>               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-flat btn-md pull-left btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                <button type="button" class="btn btn-flat btn-success btn-md pull-right" id="t-cheque_pmnt"><i class="fa fa-print"></i> Save & Print</button>
            </div>
        </div>
        
    </div>
</div>
<!-- load mix payment for non-cash and cash -->
<div class="modal fade modal-wide-receipt" id="load-mix-payment-trust" role="dialog">
    <div class="modal-dialog">       
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa fa-money"></i> Cheque & Cash Payment </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-5 text-right">
                        <label style="font-size: 16px;"> Total: </label>             
                    </div>
                    <div class="col-sm-6">
                        <label style="font-size: 16px;"> Php <label style="font: bold 25px Bookman Old Style; color: red;" class="total_pay"></label></label>                   
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5 text-right">
                        <label style="font-size: 16px;" for=""> Bank:</label>
                    </div>
                    <div class="col-sm-6">
                        <select name="mix-bank-optn" id="" class="form-control input-md mix-bank-optn">
                            <option value="" disabled selected>Select...</option>
                            <?php foreach ($banks as $key => $value) {
                                ?><option value="<?=$value->Bank_name?>"><?=$value->Bank_name_short?></option><?php
                            }?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5 text-right">                   
                        <label style="font-size: 16px;" for=""> Cheque No:</label>
                    </div>
                    <div class="col-sm-6">                  
                        <input type="text" class="form-control input-md" id="mix-check-no" placeholder="Cheque Number">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5 text-right">
                        <label style="font-size: 16px;"> Cheque Date:</label>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control input-md c-date" id="mix-cheque-date" value="" placeholder="Cheque Date">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5 text-right">
                        <label style="font-size: 16px;"> Cheque Amount: </label>
                    </div>
                    <div class="col-sm-6">
                        <input type="number" class="form-control input-md" id="mix-cheque-amount" placeholder="Cheque Amount">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5 text-right">
                        <label style="font-size: 16px;"> Cash Amount: </label>
                    </div>
                    <div class="col-sm-6">
                        <input type="number" class="form-control input-md" id="mix-cash-amount" Value="" placeholder="Cash Amount">
                    </div>
                </div>
                <br><div style="border-top: 1px solid black"></div><br>               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-flat btn-md pull-left btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                <button type="button" class="btn btn-flat btn-success btn-md pull-right" id="trust-mix-pmnt"><i class="fa fa-print"></i> Pay & Print</button>
            </div>
        </div>        
    </div>
</div>
<!-- load search particular and ADD to particular input -->
<div class="modal fade modal-wide-payer" id="load-search-particular-trust" role="dialog">
    <div class="modal-dialog">       
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" style="color: red"> <i class="fa fa-times"></i> </button>                
            </div>
            <div class="modal-body">
                <table class="table table-hover table-bordered">
                    <thead>
                        <th> Option </th>
                        <th> Group </th>
                        <th> Particular </th>                                             
                    </thead>
                    <tbody id="load-particular-trust">                                
                    </tbody>
                </table>          
            </div>            
        </div>        
    </div>
</div>
<!-- load searched payer and add to payer input -->
<div class="modal fade modal-wide-payer" id="load-search-payer-trust" role="dialog">
    <div class="modal-dialog">       
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" style="color: red"> <i class="fa fa-times"></i> </button>                
            </div>
            <div class="modal-body">
                <table class="table table-hover table-bordered">
                    <thead>
                        <th> Option </th>
                        <th> Payer </th>
                        <th> Address </th>                        
                    </thead>
                    <tbody id="load-searched-trust">                                
                    </tbody>
                </table>          
            </div>            
        </div>        
    </div>
</div>

<?php main_footer();?>
<script language="javascript" src="<?php echo base_url()?>assets/general_assets/trust_collection.js"></script>
<script language="javascript" src="<?php echo base_url() ?>assets/general_assets/idle_signout.js"></script> <!-- KARL ALOB 3/24 -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="<?php echo base_url() ?>assets/theme/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>
    var baseUrl = '<?php echo base_url();?>';
    var Particulars = <?php echo json_encode($Result);?>;    
    var col_ID = <?php echo json_encode($_SESSION['User_details']->ID);?>;
    var voided; 
    var particular;
    var particular_name;
    var total;
    var subtotal = 0;
    var or_number;
    var cash = 0;
    var change = 0; 
    
    function upperCaseF(a){
            setTimeout(function(){
                a.value = a.value.toUpperCase();
                
            }, 1);
        }


    $(document).on('keyup', '#trust_payor_name', function() {
        x = $(this).val()
        $('#trust_paid_by').val(x);
    });

    $('.c-date').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
    });

    var load_form = function(){
        $('#load_form').load(baseUrl + "trust_collection/load_form_data");
    }
    var load_summary = function(){
        $('#load_summary').load(baseUrl + "trust_collection/load_payment_summary");
    }
    $(document).ready(function(){
        load_form();
        load_summary();
    });
    $(document).on('change', '.particular', function() {        
        particular = $('.particular option:selected').val();         
        particular_name = $('.particular option:selected').data('name');         
        $.each(Particulars, function(index, value){            
            if (particular == value.ID) {                
                document.getElementById("amount").value = value.Amount; 
            }
        })                
    }); 
    
</script>