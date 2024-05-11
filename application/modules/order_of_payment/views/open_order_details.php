<?= main_header(); ?>
<?= sidebar('oop'); ?>
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
                                <div class="alert alert-info alert-dismissible" style="height:40px; width: 31%; margin-left: 1.5%;">
                                    <p style="font-size:15px; margin-top:-2%;"> Office Origin: <span style="font-size:17px; font-weight:bold; "> <?= @$result->Office ?></span></p>
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="box-body">
                                    <div class="col-xs-12 col-md-4">
                                        
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12">
                                                <label> Lastname </label>
                                                <input type="hidden" id="token" value="<?= @$result->U_ID ?>">
                                                <input type="hidden" id="oopID" value="<?= @$result->ID ?>">
                                                <input type="text" class="form-control input-md" id="last-name" value="<?= @$result->Lastname ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12">
                                                <label> Firstname </label>
                                                <input type="text" class="form-control input-md" id="first-name" value="<?= @$result->Firstname ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12">
                                                <label> Middlename </label>
                                                <input type="text" class="form-control input-md" id="middle-name" value="<?= @$result->Middlename ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12">
                                                <label> Address </label>
                                                <input type="text" class="form-control input-md" id="address" value="<?= @$result->Payor_address ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12">
                                                <label> Paid By </label>
                                                <input type="text" class="form-control input-md" id="paid-by" value="<?= @$result->Paid_by ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-4">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12">
                                                <label> Order Payment Ref. No. </label>
                                                <input type="text" class="form-control input-md or-numbers" value="<?= @$result->Order_payment_number ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12">
                                                <label> Company Name </label><br>
                                                <textarea name="comp-name" id="comp-name" cols="45" rows="4" readonly> <?= @$result->Company_name ?></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12">
                                                <label> Remarks </label><br>
                                                <textarea name="remarks" id="remarks" cols="45" rows="4" readonly> <?= ucwords(@$result->Remarks) ?></textarea>
                                                <input type="hidden" id="oop-ID" value="<?= @$result->ID ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-4">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12" style="text-align: center">
                                                <label></label><br>
                                                <?php if(@$result->Status == "Verified"){
                                                    ?><button class="btn btn-lg  btn-success" style="display:block; width:100%" disabled><b>Status:<?=$result->Status?></b></button>
                                                <?php }elseif(@$result->Status == "Pending"){
                                                    ?><button class="btn btn-lg  btn-primary" data-toggle="modal" data-backdrop="static" data-target="#options-modal"><i class="fa fa-cog"></i> <b>PAYMENT OPTIONS</b> </button>
                                                <?php } ?>
                                               
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="box-body">
                                                <div class="box-body" style="border: 1px solid black; margin-top: -4%;">
                                                    <div class="col-xs-12 col-md-12" style="text-align: left">
                                                                   
                                                        <p style="color:black; font-size:15px;"> FORM: <span class="or-numbers" id="form-type"> </span>(<span class="or-numbers" id="or-for"></span>)</p>
                                                        <div class="input-group" style="width:100%">
                                                            <span class="input-group-addon"> <i class="fa fa-calendar-plus-o" ></i></span><input type="text" class="form-control input-sm c-date" id="date_paid" style="" data-field="date" placeholder="m/d/Y"   value="<?= date('Y-m-d', time()) ?> ">   
                                                        </div>
                                                        <p style="color:black; font-size:15px;"> OR No. <input type="number" class="or-numbers form-control input-sm" id="or-number" value="" disabled> </p>
                                                        <input type="hidden" id="o-r-number" value="">
                                                        <p style="color:black; font-size:15px;"> TOTAL: <span class="or-numbers" id="total-amount"></span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><br>
                                        <div class="row" id="for-payment" style="margin-top: -4%;">
                                            <div class="col-xs-12 col-md-4">
                                                <button class="btn btn-md  btn-primary" id="incash-payment"><i class="fa fa-money"></i> CASH </button>
                                            </div>
                                            <div class="col-xs-12 col-md-4">
                                                <button class="btn btn-md  btn-primary" id="cheque-payment"><i class="fa fa-money"></i> CHEQUE </button>
                                            </div>
                                            <div style="display:none;" class="col-xs-12 col-md-4">
                                                <button class="btn btn-md  btn-success"><i class="fa fa-money"></i> MIXED </button>
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
                                            <button class='btn btn-primary btn-sm ' id="add-to-edit"><i class="fa fa-plus-square"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-xs-12 col-md-8">
                                    <div class="box-body">
                                        <?php if(@$result->Status == "Pending"){?>
                                            <button class="btn btn-sm btn-warning " id="edit-button"><i class='fa fa-edit'></i> EDIT </button>
                                            <button class="btn btn-sm btn-danger " id="cancel-button"><i class='fa fa-times'></i> CANCEL </button>
                                            <!-- <button class="btn btn-sm btn-success " id="save-edit-button"><i class="fa fa-refresh"></i> UPDATE </button> -->
                                        <?php }else{?>
                                            <button class="btn btn-sm btn-warning " id="edit-button" disabled><i class='fa fa-edit'></i> EDIT </button>
                                            <button class="btn btn-sm btn-danger " id="cancel-button" disabled><i class='fa fa-times'></i> CANCEL </button>
                                            <!-- <button class="btn btn-sm btn-success " id="save-edit-button" disabled><i class="fa fa-refresh"></i> UPDATE </button> -->
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <button class="btn btn-flat" onclick="window.history.back()"><i class="fa fa-long-arrow-left"></i> back</button>
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
                        <button class="btn btn-lg  btn-primary btn-form-option" data-origin="<?= @$value->OR_origin ?>" data-orfor="<?= @$value->OR_for ?>" data-ortype="<?= @$value->OR_Type ?>" style="width: 100%;"> <?= strtoupper(@$value->OR_Type) ?></button></br></br>
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
<!-- Cheque payment -->
<div class="modal fade" id="non-cash-modal" role="dialog" >
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
                                <option value="<?= $value->Bank_name ?>"><?= $value->Bank_name_short ?></option>
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
                <button type="button" class="btn  btn-success btn-md pull-right" id="incheque-payment"><i class="fa fa-print"></i> Pay & Print</button>
            </div>
        </div>

    </div>
</div>
<?= main_footer(); ?>
<script src="<?php echo base_url() ?>assets/general_assets/order_payment/oop.js"></script>
<script language="javascript" src="<?php echo base_url() ?>assets/general_assets/idle_signout.js"></script> <!-- KARL ALOB 3/24 -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<script src="<?php echo base_url() ?>assets/theme/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>
    var total_gross = 0;
    var particulars = '';
    var OriginOR;
    $('.c-date').datepicker({
        autoclose: true,
        format: "yyyy-m-d",
    });
    $(document).ready(function() {
        document.getElementById('for-payment').style.display = "none";
    });
   
</script>