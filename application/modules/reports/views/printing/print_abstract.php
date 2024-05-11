<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/report.css">
<div class="content-wrapper">
    <section class="content">

        <body onload="window.print()">
            <div class="box-body">
                <div>
                    <div class="row">
                        <div class="box-body">
                            <div class="box-body">
                                <table width="100%" class="table table-borderless table-bord">
                                    <tr>
                                        <td width="25%" height="99"><img src="<?php echo base_url() ?>assets/img/Logo_2.png" class="city-logo" />
                                            <table>
                                                <tr>
                                                    <td>
                                                        <p class="a-col">A. COLLECTIONS</p>
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
                                                    <p align="center" class="header-city-of">MUNICIPALITY OF MURCIA</p>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <p align="center" class="office-of">OFFICE OF THE CITY TREASURER</p>
                                                </tr>
                                                <tr>
                                                    <p align="center" class="summary-of">SUMMARY OF COLLECTION BY FUND</p>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="30%" class="table-bord">
                                            <table>
                                                <tr>
                                                    <p align="left" class="remit_no">Remittance No: ASN-993-123</p>
                                                </tr>
                                                <tr>
                                                    <p align="left" class="remit_date">Remittance Date: <?php echo date('F d, Y') ?></p>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                                <div class="border-line"></div>
                                <table class="table table-bord" style="font-size: 12px;">
                                    <tr style="font-weight: bold">
                                        <td style="width: 15%;">Ticket Serial</td>
                                        <td style="width: 20%;">Date</td>
                                        <td style="width: 20%;">Payor</td>
                                        <td style="width: 35%;">Particular</td>
                                        <td>Amount</td>
                                    </tr>
                                </table>
                                <div class="border-line"></div>
                                <tr>
                                    <td>
                                        <p class="acct">Acct. Form 51</p>
                                    </td>
                                </tr>
                                <div class="border-line"></div>
                                <table width="100%" class="" style="font-size: 12px;">
                                    <?php
                                    $total = 0;
                                    foreach ($data as $key => $value) {
                                    ?><tr>
                                            <td><?= @$value->Accountable_form_number ?></td>
                                        </tr><?php
                                                foreach ($value->ParticularPaid as $key => $particular) {
                                                ?>
                                            <tr>
                                                <td style="width: 15%;"></td>
                                                <td style="width: 20%;"><?= date('m-d-Y', strtotime($value->Date_paid)) ?></td>
                                                <td style="width: 20%;"><?= $value->Payor ?></td>
                                                <td style="width: 35%;"><?= $particular->Particular ?></td>
                                                <td><?= $particular->Amount ?></td>
                                                <?php $total += $particular->Amount ?>
                                            </tr>
                                    <?php
                                                }
                                            }
                                    ?><tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td align="right"><label style="font-size: 18px;">Total:</label></td>
                                        <td><label style="font-size: 17px; color:red;"><?= number_format($total, 2) ?></label></td>
                                    </tr><?php
                                            ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="box-body">
                            <div class="box-body">
                                <h5 style="font-weight: bold"> Fund Summary: </h5>
                                <h5 style="font-weight: bold"> General Fund </h5>

                                <table>
                                    <?php
                                    $TotalAmount = 0;
                                    foreach ($summary as $key => $value) {
                                    ?><tr>
                                            <td style="width:40%;"><?= $value['Name'] ?></td>
                                            <td style="width:20%;"><?= number_format($value['Amount'], 2) ?></td>
                                        </tr><?php
                                                $TotalAmount += $value['Amount'];
                                            }
                                                ?><tr>
                                        <td style="width:20%;"></td>
                                        <td style="width:20%; font-weight:bold; font-size:17px; color:red;"><?= number_format($TotalAmount, 2) ?></td>
                                    </tr><?php
                                            ?>
                                </table>
                            </div>
                        </div>
                    </div>                   
                </div>
            </div>
        </body>
    </section>
</div>