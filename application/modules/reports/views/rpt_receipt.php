<?php
echo main_header();
echo sidebar('rpt');
?>
<!--include this link for printing-->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/bower_components/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/embedded-boostrap-print.css">
<style>
    .small-text {
        font-size: 12px;
    }

    .meduim-text {
        font-size: 13px;
    }

    .large-text {
        font-size: 15px;
        font-weight: bold;
        font-family: Serif
    }

    .extra-large-text {
        font-size: 18px;
        font-weight: bold;
        font-family: Serif
    }

    .border {
        border: 1px solid black !important;
    }

    .lgu-logo {
        position: relative;
        top: 0px;
        width: 90px;
    }

    .phil-seal-logo {
        position: relative;
        top: 20px;
        width: 80px;
    }

    .remove-padding {
        padding: 0px;
    }

    .recieved-form {
        word-spacing: 2px;
    }

    .remove-list-dot {
        list-style: none;
    }

    label {
        font-weight: unset;
    }

    .add-lines:hover {
        background: #3c8dbc59;
    }
    #print_rpt {
        display:none;
    }
    .borderBottom{
        border-bottom: 1px solid black !important;
    }
    @media print {
        html,body {
        margin: 0;
        }
        #notForPrint { display : none!important;}
        #print_rpt { 
            visibility: visible !important;
            display : block !important;
            width:100%!important;
            padding:0!important;
            margin:0!important;
            
        }
        #footer { display : none;}
        table {
            /* border: 1px solid black; */
            table-layout: auto!important;
            max-width: 950px!important;
            border-spacing: 30px!important;
            border-style: hidden!important;
            /* margin-right:10px !important; */
           
        }
        td{
            /* border: 1px solid black; */ 
           padding:2.5px!important;
           border-style: hidden!important;
        }
        tr{
           border-style: hidden!important;
        }
        .borderBottom{
            border-style: hidden !important;
        } */

        /* #GFG{
            margin-left:11.5%;
            margin-top:-9%;
        }
        #upperTable{
            margin-left:9%; 
        }
        #secondRowUpperTable{
            margin-left:-8%!important; 
            width:900px!important;
        } */

        .extra-small-text{
            font-size: 10px;
        }
        .small-text{
            font-size: 12px;
        }
        .meduim-text{
            font-size: 13px;
        }
        .large-text{
            font-size: 15px;
            font-weight: bold;
            font-family: Serif
        }

        .extra-large-text{
            font-size: 18px;
            font-weight: bold;
            font-family: Serif
        }
        .border{
            border-style:hidden!important;
        }
        #lgu-logo{
            position: relative;
            top: 0px;
            width: 90px;   
        }
        .td-phil-seal-logo{
            width:50px;
        }
        .phil-seal-logo{
            position: relative;
            top: 20px;
            width: 90px !important;
        }
        .remove-padding{
            padding:-3px;
        }
        .recieved-form{
            word-spacing: 2px;
        }
        .remove-list-dot{
            list-style: none;
        }
        @page {size: landscape;margin:-10px;}
        label{
            font-weight:unset;
        }
        #set_top_padding{display:none;}
        .hiddenItem{
            visibility:hidden;
        }
    }
</style>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/report.css">

<!-------------------------------------------------------------------------hidden~for~print------------------------------------------------------------------>
<div id="notForPrint">
    <div class="content-wrapper">
        <section class="content">
            <!-- <div class="box box-body"> -->
                <div class="box-body">
                    <div class="row" id="set_top_padding">
                        <div class="box-body" style="margin-right: 0.5%; margin-top: -1%;">
                            <a class="btn btn-sm btn-default " onclick="history.go(-1);" target="_blank"><i class="fa fa-arrow-left"> back</i></a>
                            <a class="btn btn-success " style="float:right"  onclick="window.print();" target="_blank"><i class="fa fa-print"> PRINT</i></a>
                            <!-- <a class="btn btn-success " style="float:right" id="print" href=" //@base_url() . 'rpt_collection/print' ?>" target="_blank"><i class="fa fa-print"></i> Save & Print</a> -->
                            <!-- <button class="btn btn-primary " style="float:right" id="print"> <i class="fa fa-print"></i> </button>    -->
                        </div>
                    </div>
                    <div class="row" id="GFG">
                        <div class="col-md-12">
                            <div class="row hiddenItem" style="margin-left:1%;">
                                <span class="col-md-2" style="">
                                    <span class="small-text">Accountable Form No. 56</span>
                                    <span class="small-text">(Revised 1992)</span>
                                    <br>
                                    <br>
                                    <br>

                                    <span class="large-text"> &nbsp;&nbsp;ORIGINAL</span>
                                </span>
                                <span class="col-md-1 remove-padding">
                                    <img class="lgu-logo" id="lgu-logo" src="<?php echo base_url() ?>assets/img/Logo_2.png" alt="">
                                </span>
                                <span class="col-md-7 text-center">
                                    <span class="small-text">Previous Tax No.______________ dated____________________________________________ for the year 20_____</span><br>
                                    <span class="extra-large-text">OFFICIAL RECEIPT OF THE REPUBLIC OF THE PHILIPPINES</span><br>
                                    <span class="small-text">Provincial or City Treasurer's Real Property Tax Receipt</span>

                                </span>
                                <div class="col-md-2">
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <span class="large-text">
                                        <span >C NO:</span>
                                        <span id=p-controlno><?= $data[0]->Control_no?></span>
                                    </span>
                                </div>
                            </div>
                            <table class="table border" style="margin-bottom:3px;" id="upperTable">
                                <thead class="border">
                                    <!-- <tr class="border">
                                    <th class="border">Table heading</th>
                                    <th class="border">Table heading</th>
                                    <th class="border">Table heading</th>
                                </tr> -->
                                </thead>
                                <tbody class="border">
                                    <tr class="border" style="height:55px;">
                                        <td class="border hiddenItem" rowspan="2" width="80">
                                            <img class="phil-seal-logo" style="width:100px;" src="<?php echo base_url() ?>assets/img/phil-seal.png" alt="">
                                        </td>
                                        <td class="border" width="350">
                                            <div class="small-text hiddenItem">CITY/ PROVINCE</div>
                                            <span id=p-province>Negros Occidental</span>
                                            <!-- <input type="text" class="form-control single-entry input-sm " data-field="province" placeholder="Enter municipality/province" value="Negros Occidental" readonly> -->
                                        </td>
                                        <td class="border">
                                            <div class="small-text hiddenItem">CITY</div>
                                            <span id=p-city>City of Sagay</span>
                                            <!-- <input type="text" class="form-control single-entry input-sm " data-field="city" placeholder="Enter city" value="City of Sagay" readonly> -->
                                        </td>
                                        <td class="border">
                                            <div class="small-text hiddenItem">DATE</div>
                                            <span id=p-date><?= $data[0]->Date_receipt?></span>
                                            <!-- <input type="date" class="form-control single-entry input-sm " data-field="date_receipt" placeholder="Enter date" value="<?= @date('Y-m-d') ?>"> -->
                                        </td>
                                    </tr>
                                    <tr class="border">
                                        <td class="border" colspan="3">
                                            <div class="" style="width:920px; margin: 0px auto;" id="secondRowUpperTable">
                                                <span class="small-text recieved-form">  &nbsp; &nbsp; &nbsp; <span class="hiddenItem">Received from </span>
                                                <input class="small-text borderBottom" id="p-taxpayer" style="border:none; width:35%;text-align:center"  value="<?= @$data[0]->pname?>" readonly></input>
                                                <!-- <button class="btn btn-primary btn-sm " id="taxpayer" value="1">Add Taxpayer</button>    -->
                                                <span class="hiddenItem">the sum of</span>
                                                <input class="small-text borderBottom" id="p-total_amount_words" style="border: none;width:30%;text-align:center"value="<?= @$data[0]->Amount_to_words?>" readonly></input>
                                                <span class="hiddenItem">pesos (P </span>
                                                <input class="medium-text borderBottom" id="p-total_amount_num" style="border: none;width:7%;text-align:center" value="<?= @$data[0]->Total_amount?>" readonly></input>

                                                <span class="hiddenItem"> ) <br>
                                                Philippine Currency, in full or as installment payment of REAL PROPERTY TAX for the Year 20_____ upon property described in the Assessment</span> <br>
                                                <span class="hiddenItem">Rolls as follows.</span>
                                                </span>

                                                <label style="margin-left:290px;" class="hiddenItem">
                                                    <input type="checkbox" value="" disabled>
                                                    Basic Tax
                                                </label>
                                                <label style="margin-left:90px;" class="hiddenItem">
                                                    <input type="checkbox" value="" disabled>
                                                    Special Education Fund
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table " style="margin-bottom:3px;">
                                <thead class="border">
                                    <!-- <tr class="border">
                                    <th class="border">Table heading</th>
                                    <th class="border">Table heading</th>
                                    <th class="border">Table heading</th>
                                </tr> -->
                                </thead>
                                <tbody class="">
                                    <tr class="border text-center" style="display:none">
                                        <td class="border" rowspan="2" width="200">
                                            <span class="small-text">NAME OF DECLARED OWNER</span>
                                        </td>
                                        <td class="border" rowspan="2" width="150">
                                            <span class="small-text">LOCATION NUMBER AND STREET OR BARANGAY</span>
                                        </td>
                                        <td class="border" rowspan="2" width="150">
                                            <span class="small-text">LOT AND BLOCK NUMBER</span>
                                        </td>
                                        <td class="border" rowspan="2" width="150">
                                            <span class="small-text"> TAX DECLARATION NUMBER</span>
                                        </td>
                                        <td class="border" colspan="3">
                                            <span class="small-text"> ASSESSED VALUE</span>
                                        </td>
                                        <td class="border" rowspan="2">
                                            <span class="small-text"> TAX DUE</span>
                                        </td>
                                        <td class="border" colspan="2">
                                            <span class="small-text"> INSTALLMENT</span>
                                        </td>
                                        <td class="border" rowspan="2">
                                            <span class="small-text"> FULL PAYMENT</span>
                                        </td>
                                        <td class="border" rowspan="2">
                                            <span class="small-text"> PENALTY PERCENT</span>
                                        </td>
                                        <td class="border" rowspan="2" width="150">
                                            <span class="small-text"> TOTAL</span>
                                        </td>

                                    </tr>
                                    <tr class="border" style="display:none">
                                        <td class="border">
                                            <span class="small-text"> Land</span>
                                        </td>
                                        <td class="border">
                                            <span class="small-text"> Improvements</span>
                                        </td>
                                        <td class="border">
                                            <span class="small-text"> Total</span>
                                        </td>
                                        <td class="border">
                                            <span class="small-text"> No.</span>
                                        </td>
                                        <td class="border">
                                            <span class="small-text"> Payment</span>
                                        </td>
                                    </tr>
                                    <?php
                                        $max_row = 6;
                                        $receipt_data = $data;
                             

                                    ?>
                                    <?php for ($i = 0; $i < $max_row; $i++) { ?>
                                        <tr class="border" style="height: 30px;">
                                            <td class="border">
                                                <span class="small-text" ><?= @$receipt_data[$i]->Name_of_owner?></span>
                                            </td>
                                            <td class="border">
                                                <span class="small-text " ><?= @$receipt_data[$i]->Lot_location?></span>
                                            </td>
                                            <td class="border">
                                                <span class="small-text " ><?= @$receipt_data[$i]->Lot_block_no?></span>
                                            </td>
                                            <td class="border">
                                                <span class="small-text"  ><?= @$receipt_data[$i]->Tax_dec_no?></span>
                                            </td>
                                            <td class="border">
                                                <span class="small-text" ><?= @$receipt_data[$i]->Assessed_val_land?></span>
                                            </td>
                                            <td class="border">
                                                <span class="small-text" ><?= @$receipt_data[$i]->Assessed_val_improvements?></span>
                                            </td>
                                            <td class="border">
                                                <span class="small-text"><?= @$receipt_data[$i]->Assessed_val_total?></span>
                                            </td>
                                            <td class="border">
                                                <span class="small-text" ><?= @$receipt_data[$i]->Tax_due?></span>
                                            </td>
                                            <td class="border">
                                                <span class="small-text" ><?= @$receipt_data[$i]->Installment_no?></span>
                                            </td>
                                            <td class="border">
                                                <span class="small-text" ><?= @$receipt_data[$i]->Installment_payment?></span>
                                            </td>
                                            <td class="border">
                                                <span class="small-text"><?= @$receipt_data[$i]->Full_payment?></span>
                                            </td>
                                            <td class="border">
                                                <span class="small-text" ><?= @$receipt_data[$i]->Penalty_percent?></span>
                                            </td>
                                            <td class="border">
                                                <span class="small-text"><?= @$receipt_data[$i]->Total?></span>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <tr class="">
                                        <td class="" colspan="13" style="padding:1.5px">

                                        </td>
                                    </tr>
                                    <tr class="border hiddenItem">
                                        <td class="border" colspan="8">
                                            <span class="small-text">Total taxes paid by Money Order, Treasury Warrant or Check No.________________________ dated________, 20_____</span>
                                        </td>
                                        <td class="border">

                                        </td>
                                        <td class="border">
                                            <span class="small-text" data-field="installment_payment_total" id="p-installment_payment_total"></span>
                                        </td>
                                        <td class="border">
                                        
                                        </td>
                                        <td class="border">
                                            <span class="small-text" data-field="penalty_percent_total" id="p-penalty_percent_total"></span>
                                        </td>
                                        <td class="border">
                                            <span class="small-text" data-field="grand_total" id="p-grand_total" ><?= @$data[0]->Total_amount?></span>
                                        </td>
                                    </tr>
                                    <tr class="border">
                                        <td class="border" colspan="13">
                                            <div class="row">
                                                <div class="col-md-1">

                                                </div>
                                                <div class="col-md-6 hiddenItem">
                                                    Payment without penalty may be made within the periods stated below if by installment
                                                    <ul class="remove-list-dot">
                                                        <li>1st Installment - January 1 to March 31, of the year</li>
                                                        <li>2nd Installment - April 1 to June 31, of the year</li>
                                                        <li>3rd Installment - July 1 to Sept. 31, of the year</li>
                                                        <li>4th Installment - October 1 to Dec. 31, of the year</li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-4 hiddenItem">
                                                    <br>
                                                    <ul class="remove-list-dot">
                                                        <li class="text-center" style="border-bottom:1px solid black;">MA. CRISTINA G. FUENTES</li>
                                                        <li class="text-center">Provincial or City Treasurer</li>
                                                        <li></li>
                                                        <br>
                                                        <li class="text-center" style="border-bottom:1px solid black;">DELA P. JAVIER</li>
                                                        <li class="text-center">Deputy</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>        
</div>
<div>
    <div id="print_rpt" class="content-wrapper">
        <section class="content">
            <!-- <div class="box box-body box-primary">
                <div class="box-body"> -->
                    <!-- <div class="row" id="set_top_padding">
                        <div class="box-body" style="height:10px;">
                        </div>
                    </div> -->
                    <div class="row" id="GFG" style="margin-left:7%;">
                        <div class="col-md-12">
                            <div class="row" style="margin-left:%;margin-top:-6%">
                                <span class="col-md-2" style="visibility:hidden">
                                    <span class="small-text">Accountable Form No. 56</span>
                                    <span class="small-text">(Revised 1992)</span>
                                    <br>
                                    <br>
                                    <br>

                                    <span class="large-text"> &nbsp;&nbsp;ORIGINAL</span>
                                </span>
                                <span class="col-md-1 remove-padding" style="visibility:hidden">
                                    <img class="lgu-logo" id="lgu-logo" src="<?php echo base_url() ?>assets/img/Logo_2.png" alt="">
                                </span>
                                <span class="col-md-7 text-center" style="visibility:hidden">
                                    <span class="small-text">Previous Tax No.______________ dated____________________________________________ for the year 20_____</span><br>
                                    <span class="extra-large-text">OFFICIAL RECEIPT OF THE REPUBLIC OF THE PHILIPPINES</span><br>
                                    <span class="small-text">Provincial or City Treasurer's Real Property Tax Receipt</span>

                                </span>
                                <div class="col-md-2">
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <span class="large-text">
                                        <span style="visibility:hidden">C NO:</span>
                                        <span id=p-controlno></span>
                                    </span>
                                </div>
                            </div>
                            <table class="" style="margin-left:12%;margin-bottom:3px;border-style:hidden">
                                <thead class="">
                                    <!-- <tr class="border">
                                    <th class="border">Table heading</th>
                                    <th class="border">Table heading</th>
                                    <th class="border">Table heading</th>
                                </tr> -->
                                </thead>
                                <tbody class="" style="border-style:hidden">
                                    <tr class="" style="height:40px;">
                                        <td class="small-text" rowspan="2" width="80" style="visibility:hidden">
                                            <img class="phil-seal-logo" style="width:100px;" src="<?php echo base_url() ?>assets/img/phil-seal.png" alt="">
                                        </td>
                                        <td class="" width="400">
                                            <div class="small-text" style="visibility:hidden">MUNICIPALITY/ PROVINCE</div>
                                            <span id=p-province>&nbsp;&nbsp;&nbsp;&nbsp;Negros Occidental</span>
                                            <!-- <input type="text" class="form-control single-entry input-sm " data-field="province" placeholder="Enter municipality/province" value="Negros Occidental" readonly> -->
                                        </td>
                                        <td class="">
                                            <div class="small-text" style="visibility:hidden">CITY</div>
                                            <span id=p-city>City of Sagay</span>
                                            <!-- <input type="text" class="form-control single-entry input-sm " data-field="city" placeholder="Enter city" value="City of Sagay" readonly> -->
                                        </td>
                                        <td class="">
                                            <div class="small-text" style="visibility:hidden">DATE</div>
                                            <span id=p-date><?= $data[0]->Date_receipt?></span>
                                            <!-- <input type="date" class="form-control single-entry input-sm " data-field="date_receipt" placeholder="Enter date" value="<?= @date('Y-m-d') ?>"> -->
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td class="" colspan="3">
                                            <div class="medium-text" style="width:920px; margin-top:2%;">
                                                <span class="small-text recieved-form ">  <span style="visibility:hidden">Received from</span> 
                                                <input class="medium-text" id="p-taxpayer" style="border: none; margin-left: -2px;width:35%;background-color:transparent;" value="<?= @$data[0]->pname?>" readonly></input>
                                                <!-- <button class="btn btn-primary btn-sm " id="taxpayer" value="1">Add Taxpayer</button>    -->
                                                <span style="visibility:hidden"> the sum of</span> 
                                                <input class="medium-text" id="p-total_amount_words" style="border: none;width:30%;background-color:transparent;margin-left:-5%"value="<?= @$data[0]->Amount_to_words?>"  readonly></input>
                                                <span style="visibility:hidden">pesos (P</span> 
                                                <input class="medium-text" id="p-total_amount_num" style="border: none;width:7%;background-color:transparent;text-align:center" value="<?= @$data[0]->Total_amount?>"readonly></input>

                                                <span style="visibility:hidden">
                                                Philippine Currency, in full or as installment payment of REAL PROPERTY TAX for the Year 20_____ upon property described in the Assessment
                                                </span> <br>
                                                <span style="visibility:hidden">Rolls as follows.</span>
                                                </span>

                                                <label style="margin-left:290px;visibility:hidden">
                                                    <input type="checkbox" value="" disabled>
                                                    Basic Tax
                                                </label>
                                                <label style="margin-left:90px;visibility:hidden">
                                                    <input type="checkbox" value="" disabled>
                                                    Special Education Fund
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-condensed" style="margin:4% auto;margin-left:5%;border-style:hidden;">
                                <thead>
                                    
                                </thead>
                                <tbody>
                                    <?php
                                        $max_row = 6;
                                        $receipt_data = $data;
                                    ?>
                                    <?php for ($i = 0; $i < $max_row; $i++) { ?>
                                    <tr class="" style="border-style:hidden;" >
                                        <td class="" style="width:16%;" >
                                            <span class="small-text"  ><?= @$receipt_data[$i]->Name_of_owner?></span>
                                        </td>
                                        <td class="" style="width:11%;">
                                            <span class="small-text " ><?= @$receipt_data[$i]->Lot_location?></span>
                                        </td>
                                        <td class="" style="width:6%;">
                                            <span class="small-text" ><?= @$receipt_data[$i]->Lot_block_no?></span>
                                        </td>
                                        <td class="" style="width:9%;">
                                            <span class="small-text"  ><?= @$receipt_data[$i]->Tax_dec_no?></span>
                                        </td>
                                        <td class="" style="width:5%;">
                                            <span class="small-text"    ><?= @$receipt_data[$i]->Assessed_val_land?></span>
                                        </td>
                                        <td class="" style="width:8%;">
                                            <span class="small-text"  ><?= @$receipt_data[$i]->Assessed_val_improvements?></span>
                                        </td>
                                        <td class=""  style="width:5%;">
                                            <span class="small-text" ><?= @$receipt_data[$i]->Assessed_val_total?></span>
                                        </td>
                                        <td class=""  style="width:6%;">
                                            <span class="small-text" ><?= @$receipt_data[$i]->Tax_due?></span>
                                        </td>
                                        <td class="" style="width:2%;">
                                            <span class="small-text"   ><?= @$receipt_data[$i]->Installment_no?></span>
                                        </td>
                                        <td class="" style="width:6%;">
                                            <span class="small-text"  ><?= @$receipt_data[$i]->Installment_payment?></span>
                                        </td>
                                        <td class="" style="width:7%;">
                                            <span class="small-text" ><?= @$receipt_data[$i]->Full_payment?></span>
                                        </td>
                                        <td class="" style="width:7%;">
                                            <span class="small-text"  ><?= @$receipt_data[$i]->Penalty_percent?></span>
                                        </td>
                                        <td class="" style="width:13%;">
                                            <span class="small-text"> <?= @$receipt_data[$i]->Total?></span>
                                        </td>
                                    </tr>
                                <?php } ?>
                                    <tr class="">
                                        <td class="" colspan="13" style="padding:1.5px">

                                        </td>
                                    </tr>
                                    <tr class="" style="border-style:hidden">
                                        <td class="" colspan="8">
                                            <span class="small-text" style="visibility:hidden;">Total taxes paid by Money Order, Treasury Warrant or Check No.________________________ dated________, 20_____</span>
                                        </td>
                                        <td class="">

                                        </td>
                                        <td class="">
                                            <span class="small-text" data-field="installment_payment_total" id="p-installment_payment_total"></span>
                                        </td>
                                        <td class="">
                                        
                                        </td>
                                        <td class="">
                                            <span class="small-text" data-field="penalty_percent_total" id="p-penalty_percent_total"></span>
                                        </td>
                                        <td class="">
                                            <span class="small-text" data-field="grand_total" id="p-grand_total"><?= @$data[0]->Total_amount?></span>
                                        </td>
                                    </tr>
            
                                    <tr class="">
                                        <td class="" colspan="13">
                                            <div class="row">
                                                <div class="col-md-1">

                                                </div>
                                                <div class="col-md-6" style="visibility:hidden;">
                                                    Payment without penalty may be made within the periods stated below if by installment
                                                    <ul class="remove-list-dot">
                                                        <li>1st Installment - January 1 to March 31, of the year</li>
                                                        <li>2nd Installment - April 1 to June 31, of the year</li>
                                                        <li>3rd Installment - July 1 to Sept. 31, of the year</li>
                                                        <li>4th Installment - October 1 to Dec. 31, of the year</li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-4" style="visibility:hidden;">
                                                    <br>
                                                    <ul class="remove-list-dot">
                                                        <li class="text-center" style="border-bottom:1px solid black;">MA. CRISTINA G. FUENTES</li>
                                                        <li class="text-center">Provincial or City Treasurer</li>
                                                        <li></li>
                                                        <br>
                                                        <li class="text-center" style="border-bottom:1px solid black;">DELA P. JAVIER</li>
                                                        <li class="text-center">Deputy</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>        
</div>
<div id="footer" style="display:none;"><?php echo main_footer(); ?></div>
<script language="javascript" src="<?php echo base_url() ?>assets/general_assets/real_property.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script language="javascript" src="<?php echo base_url() ?>assets/general_assets/idle_signout.js"></script> <!-- KARL ALOB 3/24 -->
<script>
    
    $(document).ready(function() {
         var col_ID = <?php echo json_encode($_SESSION['User_details']->ID); ?>;

        // $('#editline_1').hide();
        $('.select2').select2();
        $('.add-lines').each(function(index, value) {
            $(this).append("<div class='div' data-div='" + index + "' style='position:absolute; left:50%;'><button class='btn btn-success line' data-value=" + (index + 1) + ">Add/Edit line</button></div>");
            // console.log(index);
        });

        $('.div').hide();
        var counter = 0;
        $('.add-lines').hover(function() {
            $($(this).find('.div')).show();
        }, function() {
            $($(this).find('.div')).hide();
        });

        $(document).on('click', '.line', function() {
            var id = $(this).data('value');
            $('#modal-default').modal('show');
            $('#saveline').val($(this).data('value'));
            $('#editline').val($(this).data('value'));
        });


        $(document).on('click', '#taxpayer', function() {
            // alert();

            $(this).text('Search taxpayer');

            if ($(this).val() == 1) {
                $(this).text('Add taxpayer');
                $(this).val(0);
                $('#add_taxpayer').css({
                    'display': 'unset'
                });
                $('.select2').css({
                    'display': 'none'
                });
            } else {
                $(this).val(1);
                $('#add_taxpayer').css({
                    'display': 'none'
                });
                $('.select2').css({
                    'display': 'unset'
                });
            }
            
           
        })
        $(document).on('click','.saveline', function() {
            
            var declared_owner = $('#declared_owner').val();
            var location_number = $('#location_number').val();
            var lot_block = $('#lot_block').val();
            var tax_declaration = $('#tax_declaration').val();
            var land = $('#land').val();
            var improvements = $('#improvements').val();
            var assessed_total_value = $('#assessed_total_value').val();
            var tax_due = $('#tax_due').val();
            var installment_no = $('#installment_no').val();
            var installment_payment = $('#installment_payment').val();
            var full_payment = $('#full_payment').val();
            var penalty_percent = $('#penalty_percent').val();
            var subtotal = $('#subtotal').val();

            var id = $(this).val();

            $('#p-declared_owner_' + id).text(declared_owner);
            $('#p-location_number_' + id).text(location_number);
            $('#p-lot_block_' + id).text(lot_block);
            $('#p-tax_declaration_' + id).text(tax_declaration);
            $('#p-land_' + id).text(land);
            $('#p-improvements_' + id).text(improvements);
            $('#p-assessed_total_value_' + id).text(assessed_total_value);
            $('#p-tax_due_' + id).text(tax_due);
            $('#p-installment_no_' + id).text(installment_no);
            $('#p-installment_payment_' + id).text(installment_payment);
            $('#p-full_payment_' + id).text(full_payment);
            $('#p-penalty_percent_' + id).text(penalty_percent);
            $('#p-total_' + id).text(subtotal);
            
            //array
            
           
           

            var declared_owner = $('#declared_owner_' + id).text(declared_owner);
            var location_number = $('#location_number_' + id).text(location_number);
            var lot_block = $('#lot_block_' + id).text(lot_block);
            var tax_declaration = $('#tax_declaration_' + id).text(tax_declaration);
            var land = $('#land_' + id).text(land);
            var improvements = $('#improvements_' + id).text(improvements);
            var assessed_total_value = $('#assessed_total_value_' + id).text(assessed_total_value);
            var tax_due = $('#tax_due_' + id).text(tax_due);
            var installment_no = $('#installment_no_' + id).text(installment_no);
            var installment_payment = $('#installment_payment_' + id).text(installment_payment);
            var full_payment = $('#full_payment_' + id).text(full_payment);
            var penalty_percent = $('#penalty_percent_' + id).text(penalty_percent);
            var subtotal = $('#subtotal_' + id).text(subtotal);

            $('#modal-default').modal('hide');

        });
        /*-----------------COMPUTE TOTAL----------------------*/
        $(document).on('click','.saveline',function(){
    
            let x = 1;
            var installment_payment_arr = [];
            var penalty_percent_arr = [];
            var grand_total_arr = [];

            while(x < 7){
                if($('#installment_payment_' + [x]).text() != 0){
                    installment_payment_arr.push(parseFloat($('#installment_payment_' + [x]).text()));
                }
                if($('#penalty_percent_' + [x]).text() != 0){
                    penalty_percent_arr.push(parseFloat($('#penalty_percent_' + [x]).text()));
                }
                if($('#subtotal_' + [x]).text() != 0){
                    grand_total_arr.push(parseFloat($('#subtotal_' + [x]).text()));
                }
                x++;
            }

            var installment_payment_total =  $('#installment_payment_total').text((Math.round(sum(installment_payment_arr) * 100) / 100).toFixed(2));
            var penalty_percent_total = $('#penalty_percent_total').text((Math.round(sum(penalty_percent_arr) * 100) / 100).toFixed(2));
            var grand_total = $('#grand_total').text((Math.round(sum(grand_total_arr) * 100) / 100).toFixed(2));

            //PRINTING
            $('#p-installment_payment_total').text($('#installment_payment_total').text());
            $('#p-penalty_percent_total').text($('#penalty_percent_total').text());
            $('#p-grand_total').text($('#grand_total').text());

            
            //function to sum all elements in array
            function sum(arr){
                var sum = 0;
                for (let i = 0; i < arr.length; i++) {
                    sum += arr[i];
                }
                return sum;
            }

            /*-------------amount to words-------------*/
            // total_amount_words =inWords(parseFloat($('#grand_total').text()));
            // $('#total_amount_words').val(total_amount_words);

            /*----------------total amount-------------*/
            grandTotal_pesoFormat = (Math.round($('#grand_total').text() * 100) / 100).toFixed(2);
            $('#total_amount_num').val(grandTotal_pesoFormat);
            $('#p-total_amount_num').val(grandTotal_pesoFormat); //PRINTING

        })

        //PRINTING
        $(document).on('change','#control_no',function(){
                $('#p-controlno').text($(this).val());
        })
            
        $(document).on('change','#search_taxpayer',function(){
            var selected = $(this).find('option:selected').text();
            $('#p-taxpayer').val(selected);
            $('#declared_owner').val(selected);//auto input of declared owner in modal
        })
        $(document).on('change','#date_receipt',function(){
            $('#p-date').text($(this).val());
        })

       
       
        //print btn
       
    })
    
</script>

