<?php
echo main_header();
echo sidebar('reports');
?>
<?php
$total_gencollection = 0;
$total_trustcollection = 0;
$total_allcollection = 0;
$total_cash_col = 0;
$total_non_cash_col = 0;
$TotalCollection = 0;
?>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/report.css">
<div class="content-wrapper">

    <section class="content">
        <div class="box box-solid">
            <div id="print-rcd">
                <div class="box-body">
                    <table width="100%" class="table table-border">
                        <tr>
                            <td width="25%" height="99"><img src="<?php echo base_url() ?>assets/img/Logo_2.png" class="city-logo" />
                                <table>
                                    <tr>
                                        <td>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td width="50%">
                                <table width="100%" class="table table-borderless table-bord">
                                    <tr>
                                        <p align="center" class="header-report">REPORT OF COLLECTION AND DEPOSIT</p>
                                    </tr>
                                    <tr>
                                        <p align="center" class="header-city-of">CITY OF CADIZ</p>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <p align="center" class="office-of">OFFICE OF THE CITY TREASURER</p>
                                    </tr>
                                    <tr>
                                        <u class="date-of">Date: <?php echo date('M d, Y') ?></u>
                                    </tr>
                                </table>
                            </td>
                            <td width="30%" class="table-bord">
                                <table>
                                    <tr></tr>
                                    <tr></tr>
                                </table>
                            </td>
                        </tr>
                        <hr>
                        <tr>
                            <table style="margin-top: -8%" class="table table-border">
                                <tr>
                                    <td><label class="a-col">A. COLLECTIONS</label></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr class="official-font">
                                    <td align="center" class="account-table"><label>TYPE (FORM no.)</label></td>
                                    <td class="account-table">
                                        <table>
                                            <tr>
                                                <td align="center"><label>Official Receipt/Cash Ticket No.</label></td>
                                            </tr>
                                            <tr>
                                                <td>FROM:</td>
                                                <td>TO:</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="account-table"><label>Amount</label></td>
                                </tr>
                                <?php

                                $firstArray = (count($allCollection) - 1);
                                $secondArray = (count($allCollection[count($allCollection) - 1]) - 1);

                                foreach ($allCollection as $key => $value) {
                                    if (!empty($value[0])) {
                                ?>
                                        <tr class="official-font">
                                            <td align="center" class="account-table"> <?= @$value[0]->FormNumber ?></td>
                                            <td class="account-table">
                                                <table>
                                                    <tr>
                                                        <td><?= @$value[0]->Accountable_form_number ?></td>
                                                        <td style="width: 58%;"></td>
                                                        <td><?= @$value[count($value) - 1]->Accountable_form_number ?></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <?php
                                            foreach ($value as $idx => $val) {
                                                $total_gencollection += $val->Amount;
                                            }

                                            $Total = 0;
                                            $GeneralTotal = 0;
                                            if (@$value[0]->AccountableType) {
                                                foreach ($value as $idx => $val) {
                                                    $Total = ($Total + $val->Amount);
                                                    $GeneralTotal = ($GeneralTotal + $Total);
                                                }
                                            }
                                            ?>
                                            <td class="account-table"><b><?= number_format($Total, 2) ?></b></td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                                <?php $total_allcollection = ($total_gencollection + $total_trustcollection) ?>
                                <tr class="official-font">
                                    <td class="account-table"></td>
                                    <td align="right" class="account-table">Php</td>
                                    <td class="account-table" style="color: red"><b><?= number_format($total_allcollection, 2) ?></b></td>
                                </tr>
                            </table>
                        </tr><br>
                        <tr>
                            <table class="table official-font">
                                <tr class="head-tr">
                                    <td class="account-table">Official Receipts /</br> Cash Ticket No.</td>
                                    <td class="account-table">Payor</td>
                                    <td class="account-table">Particular</td>
                                    <td class="account-table">Amount</td>
                                </tr>
                                <?php
                                foreach ($allCollection as $key => $value) {
                                    foreach ($value as $idx => $val) {
                                        $TotalCollection += $val->Amount;
                                    }

                                    $Total = 0;
                                    $GeneralTotal = 0;
                                    if (@$value[0]->AccountableType) {
                                        foreach ($value as $idx => $val) {
                                            $Total = ($Total + $val->Amount);
                                            $GeneralTotal = ($GeneralTotal + $Total);
                                        }
                                    }

                                    if (!empty(@$value[0])) {
                                ?>
                                        <tr>
                                            <td class="account-table"></td>
                                            <td class="account-table"></td>
                                            <td class="account-table"><?= @$value[0]->AccountableType ?></td>
                                            <td class="account-table"><b><?= number_format($Total, 2) ?></b></td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                                <tr>
                                    <td class="account-table"></td>
                                    <td class="account-table"></td>
                                    <td class="account-table" align="right"><label>Total:</label></td>
                                    <td class="account-table" style="color: red"><b><?= number_format($total_allcollection, 2) ?></b></td>
                                </tr>
                            </table>
                        </tr><br>
                        <tr>
                            <table class="table official-font">
                                <tr>
                                    <td><label>B. REMITTANCES / DEPOSITS</label></td>
                                </tr>
                                <tr align="center">
                                    <td class="account-table">Accountable Office / Bank</td>
                                    <td class="account-table">References</td>
                                    <td class="account-table">Amount</td>
                                </tr>
                                <tr align="center">
                                    <td class="account-table"><b><?= $_SESSION['User_details']->First_name . ' ' . $_SESSION['User_details']->Middle_name[0] . '. ' . $_SESSION['User_details']->Last_name ?></b></td>
                                    <td class="account-table"><b><?= $_SESSION['User_details']->Position ?></b></td>
                                    <td class="account-table"><b><?= number_format($total_allcollection, 2) ?></b></td>
                                </tr>
                            </table>
                        </tr>
                        <hr>
                        <tr>
                            <table class="table" style="font-size: 11px;">
                                <tr>
                                    <label style="margin-left: 8px;">C. ACCOUNTABILITY FOR ACCOUNTABLE FORMS</label>
                                </tr>
                                <tr>
                                    <td style="width: 5px;">Name </br> of Form </br> & No</td>
                                    <td>
                                        <table>
                                            <tr>Beginning Balance</tr>
                                            <tr>
                                                <td>Qnty</td>
                                                <td>
                                                    <table class="table">
                                                        <tr>Inclusive Serial No</tr>
                                                        <tr>
                                                            <td>From</td>
                                                            <td>To</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td>Receive Since</td>
                                            </tr>
                                            <tr>
                                                <td>Qnty</td>
                                                <td>
                                                    <table class="table">
                                                        <tr>Inclusive Serial No</tr>
                                                        <tr>
                                                            <td>From</td>
                                                            <td>To</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td>Issued</td>
                                            </tr>
                                            <tr>
                                                <td>Qnty</td>
                                                <td>
                                                    <table class="table">
                                                        <tr>Inclusive Serial No</tr>
                                                        <tr>
                                                            <td>From</td>
                                                            <td>To</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td>Ending Balance</td>
                                            </tr>
                                            <tr>
                                                <td>Qnty</td>
                                                <td>
                                                    <table class="table">
                                                        <tr>Inclusive Serial No</tr>
                                                        <tr>
                                                            <td>From</td>
                                                            <td>To</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <table class="table" style="font-size: 11px; margin-top: -30px;">
                                        <?php
                                        foreach ($office_form as $key => $value) {
                                        ?>
                                            <tr>
                                                <td class="account-table" style="width: 50px"><?= @$value->BeginForm ?></td>
                                                <td class="account-table" style="width: 20px"><?= @$value->BeginQty ?></td>
                                                <td class="account-table" style="width: 20px"><?= $value->Start_OR ?></td>
                                                <td class="account-table" style="width: 120px"><?= $value->End_OR ?></td>

                                                <td class="account-table" style="width: 50px"></td>
                                                <td class="account-table" style="width: 80px"></td>
                                                <td class="account-table" style="width: 155px"></td>
                                                <?php if (!empty($value->Inclusive)) {
                                                ?>
                                                    <td class="account-table" style="width: 36px"><?= $value->IncQty ?></td>
                                                    <td class="account-table" style="width: 20px"><?= $value->IncFrom ?></td>
                                                    <td class="account-table" style="width: 130px"><?= $value->IncTo ?></td>

                                                    <td class="account-table" style="width: 77px"><?= $value->EndingQty ?></td>
                                                    <td class="account-table" style="width: 20px"><?= $value->EndingFrom ?></td>
                                                    <td class="account-table"><?= $value->EndingTo ?></td>
                                                <?php
                                                } else {
                                                ?>
                                                    <td class="account-table" style="width: 36px"></td>
                                                    <td class="account-table" style="width: 20px"></td>
                                                    <td class="account-table" style="width: 130px"></td>
                                                    <td class="account-table" style="width: 77px"><?= $value->EndingQty ?></td>
                                                    <td class="account-table" style="width: 20px"><?= $value->EndingFrom ?></td>
                                                    <td class="account-table"><?= $value->EndingTo ?></td>
                                                <?php
                                                } ?>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </table>
                                </tr>
                                <hr>
                                <tr>
                                    <td><label style="margin-left: 8px;">D. SUMMARY OF COLLECTION AND REMITTANCES / DEPOSITS</label></td>
                                </tr>
                                <tr>
                                    <table class="table">
                                        <tr>
                                            <td class="account-table">Non-Cash Payment</td>
                                        </tr>
                                    </table>
                                </tr>
                                <tr>
                                    <table class="table" style="font-size: 11px">
                                        <tr align="center">
                                            <td class="account-table">Particular</td>
                                            <td class="account-table">Amount</td>
                                        </tr>
                                        <?php
                                        if (!empty($cheque)) {
                                            foreach ($cheque as $key => $value) {
                                        ?>
                                                <tr align="center">
                                                    <td class="account-table"><?= $value->Check_no . ' dated ' . date('Y-m-d', strtotime($value->Check_date)) ?></td>
                                                    <td class="account-table"><?= number_format($value->Amount, 2) ?></td>
                                                </tr>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <tr align="center">
                                                <td class="account-table"></td>
                                                <td class="account-table"></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </table>
                                </tr>
                                <tr>
                                    <table class="table" style="font-size: 11px">
                                        <tr class="account-table">
                                            <td><b>Beginning Collections</b></td>
                                            <td><b>CASH DENOMINATION</b></td>
                                            <input type="hidden" id="total-in-cash" value="<?= $total_allcollection ?>">
                                        </tr>
                                        <tr>
                                            <table class="table" style="font-size: 12px">
                                                <tr class="account-table">
                                                    <td width="28%">
                                                        <table class="table">
                                                            <tr>
                                                                <td>Add Collections</td>
                                                            </tr>
                                                            <tr align="center">
                                                                <td><b>Total Cash</b></td>
                                                            </tr>
                                                            <tr align="center">
                                                                <td><b>Total Non-Cash</b></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Less Remittances/Deposit to <br> Cashier/Treasurer/Depository Bank</td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td width="25%">
                                                        <table class="table" style="font-size: 12px">
                                                            <tr>
                                                                <td align="center"><b><?= number_format($total_allcollection, 2) ?></b></td>
                                                            </tr>
                                                            <tr>
                                                                <td><?= number_format($total_allcollection - $non_cash, 2) ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><?= number_format(($non_cash), 2) ?></td>
                                                            </tr>
                                                            <tr style="font-size: 14px">
                                                                <td><b><u><?= number_format($total_allcollection, 2) ?></u></b></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td>
                                                        <table style="font-size: 14px">
                                                            <tr>
                                                                <td>1,000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>200</td>
                                                            </tr>
                                                            <tr>
                                                                <td>100</td>
                                                            </tr>
                                                            <tr>
                                                                <td>50</td>
                                                            </tr>
                                                            <tr>
                                                                <td>20</td>
                                                            </tr>
                                                            <tr>
                                                                <td>10</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Coins</td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td>
                                                        <table>
                                                            <tr>
                                                                <td><input class="sm permit-info onethou inputs" id="onethou-input" data-id="1000" style="width: 50%"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><input class="sm permit-info fivehun inputs" id="fivehun-input" data-id="500" style="width: 50%"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><input class="sm permit-info twohund inputs" id="twohun-input" data-id="200" style="width: 50%"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><input class="sm permit-info onehund inputs" id="onehund-input" data-id="100" style="width: 50%"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><input class="sm permit-info fifth inputs" id="fifty-input" data-id="50" style="width: 50%"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><input class="sm permit-info twenty inputs" id="twen-input" data-id="20" style="width: 50%"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><input class="sm permit-info tens inputs" id="ten-input" data-id="10" style="width: 50%"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><input class="sm permit-info coins inputs" id="coin-input" data-id="1" style="width: 50%"></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td>
                                                        <table style="font-size: 12px">
                                                            <tr>
                                                                <td><label class="thou display" data-id="1000">0.00</label></td>
                                                            </tr>
                                                            <tr>
                                                                <td><label class="fivehud display" data-id="500">0.00</label></td>
                                                            </tr>
                                                            <tr>
                                                                <td><label class="twohud display" data-id="200">0.00</label></td>
                                                            </tr>
                                                            <tr>
                                                                <td><label class="onehud display" data-id="100">0.00</label></td>
                                                            </tr>
                                                            <tr>
                                                                <td><label class="fifty display" data-id="50">0.00</label></td>
                                                            </tr>
                                                            <tr>
                                                                <td><label class="twen display" data-id="20">0.00</label></td>
                                                            </tr>
                                                            <tr>
                                                                <td><label class="ten display" data-id="10">0.00</label></td>
                                                            </tr>
                                                            <tr>
                                                                <td><label class="coin display" data-id="1">0.00</label></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="font-size: 14px">Total: <label style="color: red" id="total_deno">0.00</label></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="font-size: 14px">Remaining: <label id="remaining">0.00</label></td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </tr>
                                    </table>
                                </tr>
                            </table>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="box-body">
                <button class="btn btn-primary btn-md" id="print-rcd-report"><i class="fa fa-print"></i> PRINT </button>
                <a href="<?php echo base_url() ?>reports/display_abstract?get=<?= @$ColType ?>" class="btn btn-md btn-success" role="button"><i class="fa fa-file"></i>&nbsp; Abstract </a>
            </div>
        </div>
        <div>
            <a href="<?php echo base_url() ?>reports" class="btn btn-default  btn-md" role="button"><i class="fa fa-angle-double-left"></i> Back </a>
        </div>
    </section>
</div>
<?php echo main_footer(); ?>
<script language="javascript" src="<?php echo base_url() ?>assets/general_assets/unremitted.js"></script>
<script>
    var total_deno = 0;
    var gen_data = <?php echo json_encode(@$AllPayments); ?>;

    $('.onethou').on('keyup', function() {
        calculate();
    });

    $('.fivehun').on('keyup', function() {
        calculate();
    });

    $('.twohund').on('keyup', function() {
        calculate();
    });

    $('.onehund').on('keyup', function() {
        calculate();
    });

    $('.fifth').on('keyup', function() {
        calculate();
    });

    $('.twenty').on('keyup', function() {
        calculate();
    });

    $('.tens').on('keyup', function() {
        calculate();
    });

    $('.coins').on('keyup', function() {
        calculate();
    });

    function calculate_to_input() {

    }

    function calculate() {
        var total = 0;
        var subtotal = 0;
        var total_in_cash = $('#total-in-cash').val();
        $('.inputs').each(function() {
            subtotal = parseFloat($(this).data('id') * $(this).val());
            total += subtotal;
            if (total_in_cash >= total) {
                $('.display[data-id="' + $(this).data('id') + '"]').html(subtotal);
            } else {
                $('.display[data-id="' + $(this).data('id') + '"]').html(0.00);
            }
        });

        var a = (total_in_cash - total);
        if (total_in_cash >= total) {
            $('#total_deno').html(total);
            $('#remaining').html(a.toFixed(2));

            if (total_in_cash == total) {
                document.getElementById("onethou-input").disabled = true;
                document.getElementById("fivehun-input").disabled = true;
                document.getElementById("twohun-input").disabled = true;
                document.getElementById("onehund-input").disabled = true;
                document.getElementById("fifty-input").disabled = true;
                document.getElementById("coin-input").disabled = true;
                document.getElementById("twen-input").disabled = true;
                document.getElementById("ten-input").disabled = true;

            }
        }

    }
</script>