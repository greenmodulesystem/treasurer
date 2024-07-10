<?php
echo main_header();
echo sidebar('general_collection');
?>
<style>
    .myCheckbox {
        width: 20px;
        height: 20px;
    }

    .modal.modal-wide .modal-dialog {
        width: 35%;
    }

    .modal-wide .modal-body {
        overflow-y: auto;
    }

    .modal-wide-receipt .modal-dialog {
        width: 35%;
    }

    .modal-wide-payer .modal-dialog {
        width: 45%;
    }

    .table-hover tbody tr:hover td {
        background: #d0f7e5;
    }
</style>

<div class="content-wrapper" style="color: black">

    <section class="content">
        <div class="body">
            <div class="box box-primary">
                <div class="row" style="color: black">
                    <div class="box-body" style="color: black">
                        <div class="box-header" style="margin-top: -2%">
                            <h4 class="title-header" style="margin-left: 0.9%"><i class="fa fa-info"></i>GENERAL Collection</h4>
                            <div class="box-body" style="margin-left: -1.5%">
                                <div class="col-md-8" style="color: black">
                                    <label for="or-number">Date:</label>      
                                    <div class="input-group" style="width:100%">
                                    <span class="input-group-addon"> <i class="fa fa-calendar-plus-o" ></i></span>
                                    <input type="text" class="form-control input-md c-date" id="date_paid" style="" data-field="date" placeholder="m/d/Y"   value="<?= date('Y-m-d', time()) ?> "readonly>
                                    </div> 
                                    <label>Payor/Company:</label>
                                    <input type="text" onkeydown="upperCaseF(this)" class="form-control input-md search_payer" id="payor_name" placeholder="Payor's Name" autofocus>
                                    <label>Paid By:</label>
                                    <input type="text" onkeydown="upperCaseF(this)" class="form-control input-md search_paid_by" id="paid_by" placeholder="Paid By">
                                    <label>Address:</label>
                                    <input type="text" onkeydown="upperCaseF(this)" class="form-control input-md search_address" id="address" value="City of Sagay" placeholder="Address">
                                    <!-- <input type="hidden" disabled class="form-control input-md date_paids" id="date_paid"> -->
                                </div>
                                <div class="col-md-4" style="color: black">
                                    <label style="color: rgba(0, 0, 0, 0.2); font: bold 90px Bookman Old Style; margin-left:13px;"> General </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box box-primary">
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
                                        <div id="load-del-btn">
                                            </br>
                                        </div>
                                        </br><button class="btn  btn-md btn-primary" id="add-particu-inpt"><i class="fa fa-plus-square"></i> ADD </button>
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
                                    <div class="col-md-2">
                                        <label for=""> Remarks </label>
                                        <div id="part-remarks">
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
                            <div class="col-md-12" style="color: black">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label style="font: bold 25px Bookman Old Style;"> SubTotal:</label>
                                        <label style="margin-top: 0%; color: red; font: bold 25px Bookman Old Style;" id="subtotal"></label>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="col-sm-4">
                                            <label style="font: bold 25px Bookman Old Style;"> OR No: </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="number" id="or_numbers" class="form-control input-sm" style="color: red; font: bold 25px Bookman Old Style;" disabled>
                                            <!-- <label style="color: Blue; font: bold 15px Bookman Old Style; margin-left:13px;"> General Collection </label> -->
                                        </div>
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
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <button class="btn  btn-md btn-primary" id="costumer_pay" data-backdrop="static" style="width: 100%; margin-top: 12%;" data-toggle="modal"><i class="fa fa-money"></i> F9-Cash </button>
                                    </div>
                                    <div class="col-md-3">
                                        <button class="btn  btn-md btn-primary" id="f10-pay" data-backdrop="static" style="width: 100%; margin-top: 12%;" data-toggle="modal"><i class="fa fa-money"></i> F10-Cheque </button>
                                    </div>
                                    <div class="col-md-3">
                                        <button class="btn  btn-md btn-primary" id="mix_payment" data-backdrop="static" style="width: 100%; margin-top: 12%;"><i class="fa fa-money"></i> Cheque & Cash </button>
                                    </div>
                                    <div class="col-md-3">
                                        <button class="btn  btn-md btn-primary" id="other-payment" data-backdrop="static" style="width: 100%; margin-top: 12%;"><i class="fa fa-money"></i> Other Payment </button>
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
        <input type="hidden" id="collector_name" value="<?= $_SESSION['User_details']->Last_name . ', ' . $_SESSION['User_details']->First_name ?>">
    </section>
</div>
<!-- Cash payment -->
<div class="modal fade modal-wide" id="payment_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa fa-money"></i> Payment </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6 text-right">
                        <label style="font-size: 16px;">Total: </label>
                    </div>
                    <div class="col-sm-6">
                        <label style="font-size: 20px;">Php <label style="font: bold 25px Bookman Old Style; color: red;" class="total_pay"></label></label>
                        <input type="hidden" id="total_payable_gen" value="">
                    </div>
                </div>
                <div style="border-top: 1px solid black"></div><br>
                <div class="row">
                    <div class="col-sm-6 text-right">
                        <label style="font-size: 16px;">Cash: </label>
                    </div>
                    <div class="col-sm-6">
                        <input type="number" class="form-control input-sm text-right cash-in" id="gen_cash_payment" style="width: 80%;">
                    </div>
                </div><br>
                <div style="border-top: 1px solid black"></div>
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
                <button type="button" class="btn  btn-md pull-left btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                <button type="button" class="btn  btn-success btn-md pull-right" id="costumer_payment"><i class="fa fa-print"></i> Pay & Print</button>
            </div>
        </div>

    </div>
</div>
<!-- Cheque payment -->
<div class="modal fade modal-wide" id="non-cash-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa fa-money"></i> Cheque Payment </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-5 text-right">
                        <label style="font-size: 20px;">Total: </label>
                    </div>
                    <div class="col-sm-6">
                        <label style="font-size: 20px;">Php <label style="font: bold 25px Bookman Old Style; color: red;" class="total_pay"></label></label>
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
                            ?>
                                <option value="<?= $value->Bank_name_short ?>"><?= $value->Bank_name_short ?></option>
                            <?php
                            }
                            ?>
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
                        <input type="number" class="form-control input-md" id="c-amount" placeholder="Cheque Amount">
                    </div>
                </div>
                <br>
                <div style="border-top: 1px solid black"></div><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn  btn-md pull-left btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                <button type="button" class="btn  btn-success btn-md pull-right" id="cheque_pmnt"><i class="fa fa-print"></i> Pay & Print</button>
            </div>
        </div>

    </div>
</div>
<!-- Mixed Payment Cash and Cheque -->
<div class="modal fade modal-wide-receipt" id="load-mix-payment" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa fa-money"></i> Cheque & Cash Payment </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-5 text-right">
                        <label style="font-size: 18px;"> Total: </label>
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
                            ?>
                                <option value="<?= $value->Bank_name ?>"><?= $value->Bank_name_short ?></option>
                            <?php
                            }
                            ?>
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
                        <input type="text" class="form-control input-md c-date" id="mix-cheque-date" placeholder="Cheque Date">
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
                        <input type="number" class="form-control input-md" id="mix-cash-amount" placeholder="Cash Amount">
                    </div>
                </div>
                <br>
                <div style="border-top: 1px solid black"></div><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn  btn-md pull-left btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                <button type="button" class="btn  btn-success btn-md pull-right" id="mix-pmnt"><i class="fa fa-print"></i> Pay & Print</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade modal-wide-receipt" id="load-receipt" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa fa-money"></i> Payment </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="box-body" id="load-receipt-details">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn  btn-sm pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                <button type="button" class="btn  btn-success btn-sm pull-right" id="costumer_payment"><i class="fa fa-print"></i> Pay & Print</button>
            </div>
        </div>
    </div>
</div>
<!-- payment  for others -->
<div class="modal fade modal-wide" id="other-payment-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa fa-money"></i> Payment </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4 text-right">
                        <label style="font-size: 16px;">Total: </label>
                    </div>
                    <div class="col-sm-6">
                        <label style="font-size: 20px;">Php <label style="font: bold 25px Bookman Old Style; color: red;" class="total_pay"></label></label>
                        <input type="hidden" id="total_payable_gen" value="">
                    </div>
                </div>
                <div style="border-top: 1px solid black"></div><br>
                <div class="row">
                    <div class="col-sm-4 text-right">
                        <label style="font-size: 16px;">Amount:</label>
                    </div>
                    <div class="col-sm-6">
                        <input type="number" class="form-control input-sm text-right cash-in" id="other-payment-amount" style="width: 80%;">
                    </div>
                </div><br>
                <div style="border-top: 1px solid black"></div>
                <div class="row" style="margin-top: 5px;">
                    <div class="col-sm-4 text-right">
                        <label> Remarks: </label>
                    </div>
                    <div class="col-sm-8">
                        <textarea name="remarks" class="form-control" id="other-remarks" cols="30" rows="2"></textarea>
                    </div>
                </div><br>
                <div style="border-top: 1px solid black"></div>
                <!-- <div class="row" style="margin-top: 5px;">
                    <div class="col-sm-4 text-right">
                        <label style="font-size: 16px;">Change:</label>
                    </div>
                    <div class="col-sm-6">
                        <label style="font: bold 25px Bookman Old Style; color: red;" id="change"></label>
                    </div>
                </div> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn  btn-md pull-left btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                <button type="button" class="btn  btn-success btn-md pull-right" id="other-payment-pay"><i class="fa fa-print"></i> Pay & Print</button>
            </div>
        </div>

    </div>
</div>
<!-- load searched payer and add to payer input -->
<div class="modal fade modal-wide-payer" id="load-search-payer" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" style="color: red"> <i class="fa fa-times"></i> </button>
            </div>
            <div class="modal-body">
                <table class="table table-hover">
                    <thead>
                        <th> Option </th>
                        <th> Payer </th>
                        <th> Address </th>
                    </thead>
                    <tbody id="load-searched">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
                        <th> Group </th>
                        <th> Particular </th>
                    </thead>
                    <tbody id="load-particulars">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php echo main_footer(); ?>
<script language="javascript" src="<?php echo base_url() ?>assets/general_assets/general_collection_save.js"></script>
<script language="javascript" src="<?php echo base_url() ?>assets/general_assets/idle_signout.js"></script> <!-- KARL ALOB 3/24 -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="<?php echo base_url() ?>assets/theme/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>
    var baseUrl = '<?php echo base_url(); ?>';
    var Particulars = <?php echo json_encode($Result); ?>;
    var col_ID = <?php echo json_encode($_SESSION['User_details']->ID); ?>;
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

    $(document).on('keyup', '#payor_name', function() {
        x = $(this).val()
        $('#paid_by').val(x);
    });

    $('.c-date').datepicker({
        autoclose: true,
        format: "yyyy-m-d",
    });

    var loadGrid = function() {
        $('#load_summary').load(baseUrl + "general_collection/load_payment_summry");
    }

    var load_form = function() {
        $('#load-data').load(baseUrl + "general_collection/load_form_data");
    }

    var load_receipt = function() {
        $('#load-receipt-details').load(baseUrl + "general_collection/print_receipt");
    }

    $(document).ready(function() {
        loadGrid();
        load_form();
        load_receipt();
    });

    $(document).on('change', '.particular', function() {
        particular = $('.particular option:selected').val();
        particular_name = $('.particular option:selected').data('name');
        $.each(Particulars, function(index, value) {
            if (particular == value.ID) {
                document.getElementById("amount").value = value.Amount;
            }
        });
    });
</script>