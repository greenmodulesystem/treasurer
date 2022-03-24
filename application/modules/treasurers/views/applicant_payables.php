<?php
$tax = 0;
$reg_fee = 0;
$other = 0;
$total = 0;
$Q1 = 0;
$Q2 = 0;
$Q3 = 0;
$Q4 = 0;
$user =  $_SESSION['User_details'];

if ($assessment == null) { ?>
    <tr class="warning">
        <td colspan="8" style="border-left:2px solid gray;border-right:2px solid gray;">&emsp;
    </tr>
    <tr class="warning text-center">
        <td colspan="8" style="border-left:2px solid gray;border-right:2px solid gray;"><b>NO ACCOUNTS PAYABLE AVAILABLE</b></td>
    </tr>
    <tr class="warning">
        <td colspan="8" style="border-left:2px solid gray;border-right:2px solid gray;border-bottom:2px solid gray;">&emsp;
    </tr>
<?php } else if (date('Y-m-d', strtotime($assessment->Expiry)) < date('Y-m-d') && $bill_fees != null) { ?>
    <tr class="warning">
        <td colspan="8" style="border-left:2px solid gray;border-right:2px solid gray;">&emsp;
    </tr>
    <tr class="warning text-center">
        <td colspan="8" style="border-left:2px solid gray;border-right:2px solid gray;"><b>ASSESSMENT NOT APPROVED</b></td>
    </tr>
    <tr class="warning">
        <td colspan="8" style="border-left:2px solid gray;border-right:2px solid gray;border-bottom:2px solid gray;">&emsp;
    </tr>
    <?php } else {
    foreach ($fees as $key => $infos) {
        if ($infos != null) { ?>
            <tr class="success">
                <td colspan="3" style="border-left:2px solid gray;"><b><?= $key ?></b></td>
                <td colspan="5" style="border-right:2px solid gray;"></td>
            </tr>
            <?php foreach ($infos as $key1 => $info) { ?>
                <tr>
                    <td colspan="2" style="border-left:2px solid gray;"><?= $key1 ?></td>
                    <td class="text-center"><?= $info['Status'] ?></td>
                    <?php if ($key == 'Business Tax') {
                        $Balance[$key1] = 0;
                        $Discount[$key1] = 0;
                        $Surcharge[$key1] = 0;
                        $Interest[$key1] = 0;
                        foreach ($bill_fees as $bill) {
                            if ($bill['Line_of_business'] == $key1) {
                                $line_total = 0;
                                $Balance[$key1] += $bill['Balance'];
                                $Discount[$key1]  += $bill['Discount'];
                                $Surcharge[$key1]  += $bill['Surcharge'];
                                $Interest[$key1]  += $bill['Interest'];
                            }
                        }
                    ?>
                        <td class="text-right">
                            <?php echo number_format($Balance[$key1], 2);
                            ?>
                        </td>
                        <td class="text-right">
                            <?php echo number_format($Discount[$key1], 2);
                            ?>
                        </td>
                        <td class="text-right">
                            <?php echo number_format($Surcharge[$key1], 2);
                            ?>
                        </td>
                        <td class="text-right">
                            <?php echo number_format($Interest[$key1], 2);
                            ?>
                        </td>
                        <td class="text-right" style="border-right:2px solid gray;">
                            <?php $line_total = $Balance[$key1] + $Surcharge[$key1] + $Interest[$key1] - $Discount[$key1];
                            echo number_format($line_total, 2);
                            $total += $line_total;
                            $tax += $line_total ?>
                        </td>
                    <?php } else { ?>
                        <td class="text-right">
                            <?php echo number_format($info['Fee'], 2);
                            ?>
                        </td>
                        <td class="text-right">0</td>
                        <td class="text-right">0</td>
                        <td class="text-right">0</td>
                        <td class="text-right" style="border-right:2px solid gray;">
                            <?php echo number_format($info['Fee'], 2);
                            $total += $info['Fee'];
                            if ($key == 'Regulatory Fee') {
                                $reg_fee += $info['Fee'];
                            } else if ($key == 'Other Charge') {
                                $other += $info['Fee'];
                            }
                            ?>
                        </td>
                    <?php } ?>
                    <!-- <td colspan="5" style="border-left:2px solid gray;border-right:2px solid gray;"></td> -->
                </tr>
    <?php   }
        }
    }

    $Q1 = 0;
    $Q2 = 0;
    $Q3 = 0;
    $Q4 = 0;
    if ($profiles->Status == 'RENEWAL') {
        foreach ($bill_fees as $bill) {
            $line_total = $bill['Balance'] + $bill['Surcharge'] + $bill['Interest'];
            if ($bill['Qtr'] == 1) {
                $Q1 += $line_total;
            } else if ($bill['Qtr'] == 2) {
                $Q2 += $line_total;
            } else if ($bill['Qtr'] == 3) {
                $Q3 += $line_total;
            } else if ($bill['Qtr'] == 4) {
                $Q4 += $line_total;
            }
        }
        $Q1 = $Q1 + $reg_fee + $other;
    } else {
        $Q1 = $total;
    }
    ?>
    <tr style="border:2px solid gray;">
        <td style="width:12.5%;">&emsp;</td>
        <td style="width:12.5%;">&emsp;</td>
        <td style="width:12.5%;">&emsp;</td>
        <td style="width:12.5%;">&emsp;</td>
        <td style="width:12.5%;">&emsp;</td>
        <td style="width:12.5%;">&emsp;</td>
        <!-------------------------------------- 02-19-2020 -------------------------------------->
        <td style="width:12.5%;" colspan="2">
            <div class="pull-right">
                <button id="View" class="btn btn-sm flat btn-info" data-target="#Ass_modal" data-toggle="modal" data-keyboard="false" data-backdrop="static">
                    <i class="fa fa-print"></i><span>&ensp;Print Assessment</span>
                </button>
            </div>
            <div id="Ass_modal" class="modal fade">
                <div class="modal-dialog" style="width:850px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span></button>
                            <font size='4'><b>Assessment</b></font>
                        </div>
                        <div class="modal-body" id="assessment-body">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger btn-sm flat pull-left" data-dismiss="modal">
                                <i class="fa fa-close"></i>&ensp;Close
                            </button>
                            <button class="btn btn-primary btn-sm flat" id="Print_assessment" data-dismiss="modal"><i class="fa fa-print"></i>&ensp;Print
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </td>
        <!-------------------------------------- 02-19-2020 -------------------------------------->
    </tr>
    <tr>
        <td style="border-left:2px solid gray;"></td>
        <td></td>
        <td style="border-left:2px solid gray;" class="text-right q-1"><b>Q1 :</b></td>
        <td class="text-right q-1"><b><?= number_format($Q1, 2) ?></b></td>
        <td style="border-left:2px solid gray;vertical-align:middle" class="text-right" colspan="2"><b>Amount Due :</b>
        </td>
        <td style="border-right:2px solid gray;" class="text-right" colspan="2" id="Amount"></td>
    </tr>
    <tr>
        <td style="border-left:2px solid gray;" class="text-right"><b>Total Tax :</b></td>
        <td class="text-right"><b><?= number_format($tax, 2) ?></b></td>
        <td style="border-left:2px solid gray;" class="text-right q-2"><b>Q2 :</b></td>
        <td class="text-right q-2"><b><?= number_format($Q2, 2) ?></b></td>
        <td style="border-left:2px solid gray;vertical-align:middle" class="text-right" colspan="2"><b>Total Cash Payment :</b>
        </td>
        <td style="border-right:2px solid gray;" class="text-right" colspan="2" id="Cash_payment">
            <font face="arial black" size="4"><?= number_format(0, 2) ?></font>
        </td>
    </tr>
    <tr>
        <td style="border-left:2px solid gray;" class="text-right"><b>Reg Fees :</b></td>
        <td class="text-right"><b><?= number_format($reg_fee, 2) ?></b></td>
        <td style="border-left:2px solid gray;" class="text-right q-3"><b>Q3 :</b></td>
        <td class="text-right q-3"><b><?= number_format($Q3, 2) ?></b></td>
        <td style="border-left:2px solid gray;vertical-align:middle" class="text-right" colspan="2"><b>Total Non Cash Payment :</b>
        </td>
        <td style="border-right:2px solid gray;" class="text-right" colspan="2" id="Non_cash">
            <font face="arial black" size="4"><?= number_format(0, 2) ?></font>
        </td>
    </tr>
    <tr>
        <td style="border-left:2px solid gray;" class="text-right"><b>Other Charges :</b></td>
        <td class="text-right"><b><?= number_format($other, 2) ?></b></td>
        <td style="border-left:2px solid gray;" class="text-right q-4"><b>Q4 :</b></td>
        <td class="text-right q-4"><b><?= number_format($Q4, 2) ?></b></td>
        <td style="border-left:2px solid gray;vertical-align:middle" class="text-right" colspan="2"><b>
                <font color="red">Credits :</font>
            </b>
        </td>
        <td style="border-right:2px solid gray;" class="text-right" colspan="2" id="Credits">
            <font face="arial black" size="4"><?= number_format(0, 2) ?></font>
        </td>
    </tr>
    <tr>
        <td style="border-left:2px solid gray;border-top:2px solid gray;border-bottom:2px solid gray;
            vertical-align:middle" class="text-right success"><b>Total :</b>
        </td>
        <td style="border-right:2px solid gray;border-top:2px solid gray;border-bottom:2px solid gray;
            vertical-align:middle" class="text-right success">
            <font face="arial black" size="3"><?= number_format($total, 2) ?></font>
        </td>
        <td style="border:2px solid gray;vertical-align:middle" class="text-center success" colspan="2"><b>Pay For :</b>
            <input type="checkbox" id="Pay_Q1" disabled <?= $Q1 == 0 ? '' : 'checked'; ?> class="check_qtr"><b>Q1</b>&ensp;
            <input type="checkbox" id="Pay_Q2" <?= $Q2 == 0 ? 'disabled' : ($Q1 == 0 ?
                                                    'checked' : ''); ?> class="check_qtr"><b>Q2</b>&ensp;
            <input type="checkbox" id="Pay_Q3" <?= $Q3 == 0 ? 'disabled' : ($Q1 == 0 &&
                                                    $Q2 == 0 ? 'checked' : ''); ?> class="check_qtr"><b>Q3</b>&ensp;
            <input type="checkbox" id="Pay_Q4" <?= $Q4 == 0 ? 'disabled' : ($Q1 == 0 &&
                                                    $Q2 == 0 && $Q3 == 0 ? 'checked' : ''); ?> class="check_qtr"><b>Q4</b>
        </td>
        <td style="border-left:2px solid gray;vertical-align:middle" class="text-right" colspan="2"><b>
                <font color="red">Cash Change :</font>
            </b>
        </td>
        <td style="border-right:2px solid gray;" class="text-right" colspan="2" id="Change_amount">
            <font face="arial black" size="4"><?= number_format(0, 2) ?></font>
        </td>
    </tr>
    <tr>
        <td style="border-left:2px solid gray;" class="text-right"><b>Receipt Date :</b></td>
        <td class="text-left" colspan="3"><b><input id="Receipt_date" class="md text-center" value="<?= date('F d, Y') ?>" style="width:150px;border-style:none;"></b>
            <span class="pull-right"><b>Collector :&ensp;<?= $user->First_name . " " . $user->Middle_name[0] .
                                                                ". " . $user->Last_name . ", " . $user->Position ?></b>
            </span>
        </td>
        <td style="border-left:2px solid gray;vertical-align:middle" class="text-right" colspan="2"><b>
                <font color="red">Balance Unpaid :</font>
            </b>
        </td>
        <td style="border-right:2px solid gray;" class="text-right" colspan="2" id="Balance_unpaid"></td>
    </tr>
    <tr>
        <td style="border-left:2px solid gray;vertical-align:middle" class="text-right C_No"><b>C No. :</b></td>
        <td class="text-center C_No" style="vertical-align:middle" id="OR_td" data-target="#OR_modal" data-toggle="modal" data-keyboard="false" data-backdrop="static">
            <!-- 01-15-2020 -->
            <font face="arial black" size="4"><input style="width:150px;border:none;outline:none" class="input-md text-center" id="OR_number" value="0000000" disabled>
            </font>
        </td>
        <td class="text-left" style="border-right:2px solid gray;vertical-align:middle" colspan="2">
            <button style="border-style:none;background-color:transparent;outline:none;" id="Status_button">
                <i class="fa fa-circle text-success"></i>
            </button>
            <span class="text-left" id="Status">
                <font face="arial black" size="4" color="green">ONLINE</font>
            </span>
        </td>
        <td style="border-top:2px solid gray;">
            <button class="btn flat btn-default form-control" id="Cash_button" data-target="#Cash_modal" data-toggle="modal" data-keyboard="false" data-backdrop="static">F9 - CASH</button>
            <div id="Cash_modal" class="modal fade">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span></button>
                            <h4>Cash Payment</h4>
                        </div>
                        <div class="modal-body">
                            <label>Enter amount :</label>
                            <input id="Cash_amount" class="form-control input-sm text-right" placeholder="0.00" type="number" step="0.01" autofocus>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary btn-sm flat modal_submit" data-dismiss="modal"><i class="fa fa-arrow-right"></i>&ensp;Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-------------------------------------- 01-15-2020 -------------------------------------->
            <div id="OR_modal" class="modal fade">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span></button>
                            <h4>OR Number</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group has-feedback">
                                <label>Enter OR Number :</label>
                                <input id="OR_entry" class="form-control input-sm text-right" placeholder="0000000" type="text" autofocus>
                                <label id="Error" class="text-center" hidden></label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary btn-sm flat" id="OR_submit" data-id="">
                                <i class="fa fa-arrow-right"></i>&ensp;Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-------------------------------------- 01-15-2020 -------------------------------------->
        </td>
        <td style="border-top:2px solid gray;border-right:2px solid gray;">
            <button class="btn flat btn-default form-control" id="Check_button" data-target="#Check_modal" data-toggle="modal" data-keyboard="false" data-backdrop="static">F10 - CHECK</button>
            <div id="Check_modal" class="modal fade">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span></button>
                            <h4>Check Payment</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row form-inline">
                                <label class="text-right" style="width:38%;">Bank :</label>
                                <select id="Bank_name" class="form-control input-sm" autofocus style="width:56%;float:right;margin-right:15px;">
                                    <option disabled selected value="">Select from list</option>
                                    <?php foreach ($banks as $key => $bank) { ?>
                                        <option value="<?= $bank->Bank_name_short ?>">
                                            <?= $bank->Bank_name_short ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="row form-inline">
                                <label class="text-right" style="width:38%;">Check No. :</label>
                                <input id="Check_no" class="form-control input-sm" type="text" placeholder="Check No.">
                            </div>
                            <div class="row form-inline">
                                <label class="text-right" style="width:38%;">Check Date :</label>
                                <input id="Check_date" class="form-control input-sm" type="text" placeholder="Check Date">
                            </div>
                            <div class="row form-inline">
                                <label class="text-right" style="width:38%;">Enter amount :</label>
                                <input id="Check_amount" class="form-control input-sm text-right" placeholder="0.00" type="number" step="0.01">
                            </div>
                            <div class="row text-center" style="color:red">
                                </br>&thinsp;<label id="Invalid" hidden></label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary btn-sm flat modal_submit" data-dismiss="modal" id="Check_submit"><i class="fa fa-arrow-right"></i>&ensp;Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </td>
        <td style="border-top:2px solid gray;">
            <button class="btn flat btn-primary preview" id="Print" style="display:block;width:100%;">
                <i class="fa fa-print"></i>&ensp;Print Receipt
            </button>
        </td>
        <td style="border-top:2px solid gray;border-right:2px solid gray;">
            <button class="btn flat btn-success preview" id="Capture" style="display:block;width:100%;">
                <i class="fa fa-camera"></i>&ensp;Capture
            </button>
            <button id="Open_receipt" style="display:none" data-target="#Receipt_modal" data-toggle="modal" data-keyboard="false" data-backdrop="static"></button>
            <div id="Receipt_modal" class="modal fade">
                <div class="modal-dialog" style="width:425px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span></button>
                            <font size='4'><b>Official Receipt</b></font>
                        </div>
                        <div class="modal-body" id="Receipt-body">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger btn-sm flat pull-left" data-dismiss="modal">
                                <i class="fa fa-close"></i>&ensp;Close
                            </button>
                            <button class="btn btn-primary btn-sm flat" id="Print_receipt" name="Print" data-dismiss="modal"><i class="fa fa-print"></i>&ensp;Save Payment and Print
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </td>
    </tr>
    <tr style="border-top:2px solid gray;" class="success">
        <td style="border-left:2px solid gray;border-right:2px solid gray;" colspan="4"><b>Remarks :</b></td>
        <td style="border-right:2px solid gray;" colspan="4"><b>Check info :</b>
            <button class="btn btn-default btn-xs flat pull-right" id="Clear_check" style="border:1px solid #555555"><b>Clear</b>
            </button>
        </td>
    </tr>
    <tr style="border-top:2px solid gray;">
        <td style="border-left:2px solid gray;" colspan="4" rowspan="2">
            <textarea class="form-control input-sm" rows="2" style="resize:none;" id="Remarks"></textarea>
        </td>
        <td style="border-left:2px solid gray;border-right:2px solid gray;"><b>Bank</b></td>
        <td style="border-right:2px solid gray;"><b>Check No.</b></td>
        <td style="border-right:2px solid gray;"><b>Check Date</b></td>
        <td style="border-right:2px solid gray;" class="text-right"><b>Amount</b></td>
    </tr>
    <tr>
        <td style="border-left:2px solid gray;border-right:2px solid gray;" id="Bank_td"><b>&emsp;</b></td>
        <td style="border-right:2px solid gray;" id="Check_no_td"></td>
        <td style="border-right:2px solid gray;" id="Check_date_td"></td>
        <td style="border-right:2px solid gray;" id="Check_amount_td" class="text-right">0.00</td>
    </tr>
    <tr style="border-top:2px solid gray;">
        <td colspan="8"></td>
    </tr>

<?php } ?>

<script src="<?php echo base_url() ?>assets/theme/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script language="javascript" src="<?php echo base_url() ?>assets/scripts/noPostBack.js"></script>
<script language="javascript">
    var Application_ID = '<?php echo $profiles->ID ?>';
    var App_status = '<?php echo $profiles->Status ?>';
    var Assessment_ID = '<?php echo $assessment->ID ?>';
    or_number = <?php echo json_encode(@$Type->Accountable_form_number); ?>;
    var fees = <?php echo json_encode($fees) ?>;
    var total = <?php echo $total ?>;
    var reg_fee = <?php echo $reg_fee ?>;
    var other = <?php echo $other ?>;
    var Q1 = <?php echo $Q1 ?>;
    var Q2 = <?php echo $Q2 ?>;
    var Q3 = <?php echo $Q3 ?>;
    var Q4 = <?php echo $Q4 ?>;
    var Qtrs = [];
    var finaltotal = total;
    var accountable = '<?php echo @$Type->Accountable_form_number ?>';

    /** display or number */
    $('#OR_number').val(or_number);
    $('#OR_entry').val(or_number);

    $(document).ready(function() {
        check();
        disabler();
        $('#OR_number').val(accountable);
    });

    var disabler = function() {
        var cash = $('#Cash_amount').val() == '' || $('#Cash_amount').val() == 0;
        var non_cash = $('#Check_amount').val() == '' || $('#Check_amount').val() == 0;
        var empty = cash == true && non_cash == true;

        $('#Print').attr('disabled', true);
        $('#Capture').attr('disabled', true);

        if ($('#Status').text() == 'ONLINE') {
            $('#Print').prop('disabled', empty);
        } else if ($('#Status').text() == 'OFFLINE') {
            $('#Capture').prop('disabled', empty);
        }
    }

    var loadReceipt = function(items, data, app_ID) {
        $(document).gmLoadReceipt({
            url: baseUrl + "treasurers/print_receipt/",
            items: items,
            data: data,
            app_ID: app_ID,
            load_on: "#Receipt-body"
        });
    }

    $(window).on('keydown', function(e) {
        if ((e.which || e.keyCode) == 120) {
            $('#Cash_button').click();
        }
        if ((e.which || e.keyCode) == 121) {
            $('#Check_button').click();
            validate();
        }
    });

    /* ------------------------------------ 02-19-2020 ------------------------------------ */
    $("#View").on("click", function() {
        $(document).gmLoadPage({
            url: baseUrl + "treasurers/view_assessment/" + Application_ID + "/" + Assessment_ID,
            load_on: "#assessment-body"
        });
    });
    /* ------------------------------------ 02-19-2020 ------------------------------------ */

    /* ------------------------------------ 01-15-2020 ------------------------------------ */
    $('#OR_submit').on('click', function() {
        $.ajax({
            type: "POST",
            url: baseUrl + "treasurers/check_OR",
            data: {
                OR_entry: $('#OR_entry').val(),
            }
        }).always(function(e) {
            if (e != '') {
                var data = JSON.parse(e);
                if (data.has_error == true) {
                    $('#OR_entry').parent('div').addClass('has-error');
                    $('#Error').removeAttr('hidden');
                    $('#Error').html('</br>' + data.error_message);
                } else {
                    $('#OR_entry').parent('div').removeClass('has-error');
                    $('#OR_entry').parent('div').addClass('has-success');
                    $('#Error').removeAttr('hidden');
                    $('#Error').html('</br>OR number accepted. Please close this window.');
                    $('#OR_number').val(data.OR_number);
                }
            }
        });
    });

    $('#OR_td').on('click', function() {
        $('#OR_entry').parent('div').removeClass('has-error');
        $('#OR_entry').parent('div').removeClass('has-success');
        $('#Error').attr('hidden', true);
        $('#OR_number').val(accountable);
    });
    /* ------------------------------------ 01-15-2020 ------------------------------------ */

    $('#Status_button').on('click', function() {
        if ($('#Status').text() == 'ONLINE') {
            $('#Status').html('<font face="arial black" size="4" color="red">OFFLINE</font>');
            $(this).html('<i class="fa fa-circle text-danger"></i>');
            $('#Print_receipt').html('<i class="fa fa-save"></i>&ensp;Save Payment');
            $('#Print_receipt').attr('name', 'Capture');
        } else if ($('#Status').text() == 'OFFLINE') {
            $('#Status').html('<font face="arial black" size="4" color="green">ONLINE</font>');
            $(this).html('<i class="fa fa-circle text-success"></i>');
            $('#Print_receipt').html('<i class="fa fa-print"></i>&ensp;Save Payment and Print');
            $('#Print_receipt').attr('name', 'Print');
        }
        disabler();
    });

    // $('#Cash_button').on('click', function(){
    //     $('#Cash_modal').modal({
    //         backdrop: false,
    //         keyboard: false
    //     });
    // });

    $('#Check_button').on('click', function() {
        validate();
    });

    $('#Check_date').datepicker({
        autoclose: true,
        todayHighlight: true,
    })

    $('#Receipt_date').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'MM d, yyyy',
    })

    $('.modal_submit').on('click', function() {
        $('#Cash_payment').removeClass("danger");
        $('#Non_cash').removeClass("danger");
        calculate();
        disabler();
    });

    var validate = function() {
        $('#Invalid').text('');
        var empty_bank = $.trim($('#Bank_name').val()) == '';
        var empty_no = $('#Check_no').val() == '';
        var empty_amount = $('#Check_amount').val() == '' || $('#Check_amount').val() == 0;
        var empty_date = $('#Check_date').val() == '';
        var valid_amount = (!$('#Pay_Q4').is(':checked')) ? $('#Check_amount').val() <= total :
            $('#Check_amount').val() <= parseFloat($('#Amount').text().replace(/,/g, ''));
        var valid_date1 = new Date($('#Check_date').val()) <= new Date();
        var stale = new Date();
        stale.setMonth(stale.getMonth() - 3);
        stale.setDate(stale.getDate() - 1);
        var valid_date2 = new Date($('#Check_date').val()) >= stale;
        var valid = !empty_bank && !empty_no && !empty_amount && !empty_date &&
            valid_amount && valid_date1 && valid_date2;
        $('#Invalid').prop('hidden', valid);
        $('#Check_submit').prop('disabled', !valid);
        if (!valid_amount) {
            $('#Invalid').text('Please enter a valid amount.');
        } else if (!empty_date && !valid_date1) {
            $('#Invalid').text('Cannot accept post-dated check.');
        } else if (!empty_date && !valid_date2) {
            $('#Invalid').text('Cannot accept stale check.');
        }
    }

    $('#Bank_name,#Check_no,#Check_amount,#Check_date').on('keyup change', function() {
        validate();
    });

    $('#OR_number').on('keyup', function() {
        $('.C_No').removeClass("danger");
        $('#OR_number').css('background-color', 'transparent');
        var OR_num = parseInt($('#OR_number').val());
        if (OR_num == 0 || isNaN(OR_num)) {
            $('.C_No').addClass("danger");
            $('#OR_number').css('background-color', '#f2dede');
        }
    });

    $('#Clear_check').on('click', function() {
        $('#Bank_name').val('');
        $('#Check_no').val('');
        $('#Check_date').val('');
        $('#Check_amount').val('');
        $('#Cash_amount').val('');

        $('#Bank_td').html('&emsp;');
        $('#Check_no_td').text('');
        $('#Check_date_td').text('');
        $('#Check_amount_td').text('0.00');

        $('#Cash_payment').html("<font face='arial black' size='4'>0.00</font>");
        $('#Non_cash').html("<font face='arial black' size='4'>0.00</font>");

        $('#Cash_payment').removeClass("danger");
        $('#Non_cash').removeClass("danger");

        calculate();
    });

    var check_credits = function() {
        var id = '';
        $.each($('.check_qtr'), function() {
            id = $(this).attr('id');
            if (!$(this).is(':checked') && window[id.substring(4)] != 0) {
                return false;
            }
        });
        return id;
    }

    $('.preview').on('click', function() {
        var print = $(this).attr('name') == 'Print' ? true : false;
        var cash = $('#Cash_amount').val() == '' ? 0 : parseFloat($('#Cash_amount').val());
        var check = $('#Check_amount').val() == '' ? 0 : parseFloat($('#Check_amount').val());
        var due = parseFloat($('#Amount').text().replace(/,/g, ''));
        var OR_num = parseInt($('#OR_number').val());
        var id = check_credits();
        var qtr_amt = id == 'Pay_Q2' ? Q2 : id == 'Pay_Q3' ? Q3 : id == 'Pay_Q4' ? Q4 : 0;
        var qtr = id == 'Pay_Q2' ? $('.q-2') : id == 'Pay_Q3' ? $('.q-3') : $('.q-4');
        var credits = check - due;
        credits = credits < 0 ? 0 : credits;
        $('.C_No').removeClass("danger");
        $('.q-2').removeClass("danger");
        $('.q-3').removeClass("danger");
        $('.q-4').removeClass("danger");
        $('#OR_number').css('background-color', 'transparent');
        var Business_tax = $('#Pay_Q1').is(':checked') ? due - reg_fee - other : due;
        var Regulatory_fee = $('#Pay_Q1').is(':checked') ? reg_fee : 0;
        var Other_charges = $('#Pay_Q1').is(':checked') ? other : 0;
        // console.log("Business_tax : "+Business_tax+"\n"+
        //             "Regulatory_fee : "+Regulatory_fee+"\n"+
        //             "Other_charges : "+Other_charges+"\n");

        if (cash + check < due) {
            cash != 0 ? $('#Cash_payment').addClass("danger") : $('#Cash_payment').removeClass("danger");
            check != 0 ? $('#Non_cash').addClass("danger") : $('#Non_cash').removeClass("danger");
        } else if ($('#Pay_Q4').is(':checked') && check > due) {
            $('#Non_cash').addClass("danger");
        } else if (check >= due && cash != 0) {
            $('#Cash_payment').addClass("danger");
        } else if (check > total) {
            $('#Non_cash').addClass("danger");
        } else if (OR_num == 0 || isNaN(OR_num)) {
            $('.C_No').addClass("danger");
            $('#OR_number').css('background-color', '#f2dede');
        } else if (qtr_amt != 0 && credits >= qtr_amt) {
            qtr.addClass("danger");
        } else {
            $.ajax({
                type: "POST",
                url: baseUrl + "treasurers/print_preview",
                data: {
                    Application_ID: Application_ID,
                    Amount_paid: parseFloat($('#Amount').text().replace(/,/g, '')),
                    Date_paid: $('#Receipt_date').val(),
                    OR_number: $('#OR_number').val(),
                    Bank_name: $('#Bank_name').val(),
                    Check_number: $('#Check_no').val(),
                    Check_date: $('#Check_date').val(),
                    Check_amount: $('#Check_amount').val(),
                    Assessment_ID: Assessment_ID,
                    Qtrs: Qtrs,
                    Fees: fees,
                    Fully_paid: (finaltotal == due && $('#Pay_Q1').is(':checked')) ? 1 : 0
                }
            }).done(function(e) {
                var result = JSON.parse(e);
                var items = result.items;
                var data = result.data;
                var app_ID = result.app_ID;
                loadReceipt(items, data, app_ID);
                $('#Open_receipt').click();
            });
        }
    });

    $('#Print_receipt').on('click', function() {
        var print = $(this).attr('name') == 'Print' ? true : false;
        var due = parseFloat($('#Amount').text().replace(/,/g, ''));
        var Business_tax = $('#Pay_Q1').is(':checked') ? due - reg_fee - other : due;
        var Regulatory_fee = $('#Pay_Q1').is(':checked') ? reg_fee : 0;
        var Other_charges = $('#Pay_Q1').is(':checked') ? other : 0;

        $.ajax({
            type: "POST",
            url: baseUrl + "treasurers/receive_payment",
            data: {
                payorName: payorName,
                payorAddress: finalAddress,
                Application_ID: Application_ID,
                Business_tax: Business_tax,
                Regulatory_fee: Regulatory_fee,
                Other_charges: Other_charges,
                Amount_paid: parseFloat($('#Amount').text().replace(/,/g, '')),
                Date_paid: $('#Receipt_date').val(),
                OR_number: $('#OR_number').val(),
                Bank_name: $('#Bank_name').val(),
                Check_number: $('#Check_no').val(),
                Check_date: $('#Check_date').val(),
                Check_amount: $('#Check_amount').val(),
                Credits: parseFloat($('#Credits').text().replace(/,/g, '')),
                Remarks: $('#Remarks').val(),
                Assessment_ID: Assessment_ID,
                Qtrs: Qtrs,
                Fees: fees,
                Fully_paid: (finaltotal == due && $('#Pay_Q1').is(':checked')) ? 1 : 0
            }
        }).done(function() {
            // socket.emit('bplorealtime', {
            //     bplorealtime: 0,
            // });
            // socket.emit('qmonitoringbusiness', {
            //     qmonitoringbusiness: 0,
            // });
            $.ajax({
                type: "POST",
                url: baseUrl + "queueing/service/queueing_service/Update_applicant_payment_status",
                data: {
                    application: Application_ID
                }
            })
            if (print) {
                $("#Receipt-body").printThis();
                setTimeout(function() {
                    document.location.reload(true);
                }, 1000);
            } else {
                document.location.reload(true);
            }
        });
    });

    var calculate = function() {
        var cash = $('#Cash_amount').val() == '' ? 0 : parseFloat($('#Cash_amount').val());
        var check_amount = $('#Check_amount').val() == '' ? 0 : parseFloat($('#Check_amount').val());
        var due = parseFloat($('#Amount').text().replace(/,/g, ''));
        var change = cash == 0 ? 0 : cash - (due - check_amount);
        var balance = due - (cash + check_amount);
        var unpaid = balance <= 0 ? 0 : balance;
        var credits = check_amount - due;
        change = check_amount >= due ? 0 : (change < 0 ? 0 : change);
        credits = credits < 0 ? 0 : credits;

        cash = cash.toLocaleString(undefined, {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
        change = change.toLocaleString(undefined, {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });

        check_amount = check_amount.toLocaleString(undefined, {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });

        unpaid = unpaid.toLocaleString(undefined, {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });

        credits = credits.toLocaleString(undefined, {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });

        $('#Cash_payment').html("<font face='arial black' size='4'>" + cash + "</font>");
        $('#Change_amount').html("<font face='arial black' size='4'>" + change + "</font>");
        $('#Non_cash').html("<font face='arial black' size='4'>" + check_amount + "</font>");
        $('#Balance_unpaid').html("<font face='arial black' size='4'>" + unpaid + "</font>");
        $('#Credits').html("<font face='arial black' size='4'>" + credits + "</font>");

        $('#Bank_td').text($('#Bank_name').val());
        $('#Check_no_td').text($('#Check_no').val());
        $('#Check_date_td').text($('#Check_date').val());
        $('#Check_amount_td').text(check_amount);
    }

    var check = function() {
        var check_due = 0;
        Qtrs = [];
        $.each($('.check_qtr'), function() {
            var qtr = $(this).is(':checked') ? $(this).attr('id') : '';
            if (qtr == 'Pay_Q1') {
                Qtrs.push(1);
                check_due += Q1;
            } else if (qtr == 'Pay_Q2') {
                Qtrs.push(2);
                check_due += Q2;
            } else if (qtr == 'Pay_Q3') {
                Qtrs.push(3);
                check_due += Q3;
            } else if (qtr == 'Pay_Q4') {
                Qtrs.push(4);
                check_due += Q4;
            }
        });
        check_due = check_due.toLocaleString(undefined, {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
        $('#Amount').html("<font face='arial black' size='4'>" + check_due + "</font>");
        $('#Balance_unpaid').html("<font face='arial black' size='4'>" + check_due + "</font>");
    }

    $('.check_qtr').on('change', function() {
        $('#Cash_payment').removeClass("danger");
        $('#Non_cash').removeClass("danger");
        $('.q-2').removeClass("danger");
        $('.q-3').removeClass("danger");
        $('.q-4').removeClass("danger");
        check();
        calculate();
        check_credits();
    });
</script>