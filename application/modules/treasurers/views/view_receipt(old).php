<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/template.css">
<?php
    $Bldg = ($profiles->Building_name != '') ? trim($profiles->Building_name).", " : '';
    $Strt = ($profiles->Street != '') ? trim($profiles->Street).", " : '';
    $Prk = ($profiles->Purok != '') ? trim($profiles->Purok).", " : '';
    $Address1 = $Bldg.$Strt.$Prk;
    $Address2 = trim($profiles->Barangay).", City of Sagay";
    $Payor = ucwords($profiles->Tax_payer);
    $Payor = $profiles->Tax_payer." (".$profiles->Business_name.")";
    $Total = 0;
    // $Paymode = $receipt['Check_amount'] == '' ? 'CASH' : $receipt['Check_amount'] >= $receipt['Amount_paid'] ? 'CHECK' : 'CASH/CHECK';

    $Paymode = $receipt['Check_amount'] == '' ? 'CASH' : ($receipt['Check_amount'] >= $receipt['Amount_paid'] ? 'CHECK' : 'CASH/CHECK');
    @$count = count($items);
?>

<div class="doc" style="background-image: url('<?php echo base_url()?>assets/img/OR2.png')">
    <!------------------------------------------------- 01-18-2020 ------------------------------------------------->
    <div id="<?=$count <= 11 ? 'date' : 'date2'?>"><?=date('F d, Y', strtotime($receipt['Date_paid']))?></div>
    <div id="Agency" <?=$count <= 11 ? '' : 'hidden'?>>CITY TREASURER'S OFFICE</div>
    <div id="<?=$count <= 11 ? 'OR_num' : 'OR_num2'?>"><?=$receipt['OR_number']?></div>
    <div style="word-wrap: break-word; white-space: normal;" id="<?=$count <= 11 ? 'Payor' : 'Payor2'?>"><?=strtoupper($Payor)?></div>
    <div id="<?=$count <= 11 ? 'Address1' : 'Address12'?>"><?=strtoupper($Address1)?></div>
    <div id="<?=$count <= 11 ? 'Address2' : 'Address22'?>"><?=strtoupper($Address2)?></div>
    <div id="<?=$count <= 11 ? 'Items' : 'Items2'?>">
    <!------------------------------------------------- 01-18-2020 ------------------------------------------------->
    <!-- <div id="date"><?=date('F d, Y', strtotime($receipt['Date_paid']))?></div>
    <div id="Agency">CITY TREASURER'S OFFICE</div>
    <div id="OR_num"><?=$receipt['OR_number']?></div>
    <div id="Payor"><?=strtoupper($Payor)?></div>
    <div id="Address1"><?=strtoupper($Address1)?></div>
    <div id="Address2"><?=strtoupper($Address2)?></div>
    <div id="Items"> -->
        <?php foreach($items as $item) { ?>
            <div style="display:flex; align-items:top;">
                <div style="width: 225px;"><?=strtoupper($item['Fee'])?></div>
                <div style="margin-left: auto;"><?=number_format($item['Amount'],2)?></div>
            </div>
        <?php $Total += $item['Amount'];}?>
    </div>
    <div id="Type"><?=$Paymode?></div>
    <div id="Total"><?=number_format($receipt['Amount_paid'],2)?></div>
    <div id="Words">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<span id="Numwords"></span>
    </div>
    <div id="Bank"><?=strtoupper($receipt['Bank_name'])?></div>
    <div id="Check_num"><?=strtoupper($receipt['Check_number'])?></div>
    <div id="Date_of_check"><?=strtoupper($receipt['Check_date'])?></div>
    <div id="Amount_text"><?=($receipt['Bank_name'] == null) ? '' : 'CHECK AMOUNT:'?></div>
    <div id="Amount_value"><?=($receipt['Bank_name'] == null) ? '' : number_format($receipt['Check_amount'],2)?></div>
    <div id="Collector"><?=strtoupper($receipt['Received_by'])?></div>
    <div id="Position"><?=strtoupper($receipt['Position'])?></div>
</div>

<script type="text/javascript">
    var total = <?php echo $Total?>;

    $(document).ready(function(){
        $('#Numwords').text(number2text(total));
    });

    function number2text(value) {
        var fraction = Math.round(frac(value)*100);
        var f_text  = "";

        if(fraction > 0) {
            f_text = " AND "+convert_number(fraction)+" CENTAVOS";
        }

        return convert_number(value) == "0" ? '' :
            convert_number(value)+" PESOS"+f_text+" ONLY";
    }

    function frac(f) {
        return f % 1;
    }

    function convert_number(number)
    {
        if ((number < 0) || (number > 999999999)) 
        { 
            return "NUMBER OUT OF RANGE!";
        }
        var Gn = Math.floor(number / 1000000000);  /* Billions */ 
        number -= Gn * 1000000000; 
        var kn = Math.floor(number / 1000000);     /* Millions */ 
        number -= kn * 1000000; 
        var Hn = Math.floor(number / 1000);        /* Thousands */ 
        number -= Hn * 1000; 
        var Dn = Math.floor(number / 100);         /* Tens (deca) */ 
        number = number % 100;                     /* Ones */ 
        var tn= Math.floor(number / 10); 
        var one=Math.floor(number % 10); 
        var res = ""; 

        if (Gn>0) 
        { 
            res += (((res=="") ? "" : " ") + 
                convert_number(Gn) + " BILLION"); 
        } 
        if (kn>0) 
        { 
            res += (((res=="") ? "" : " ") + 
                convert_number(kn) + " MILLION"); 
        } 
        if (Hn>0) 
        { 
            res += (((res=="") ? "" : " ") +
                convert_number(Hn) + " THOUSAND"); 
        } 

        if (Dn) 
        { 
            res += (((res=="") ? "" : " ") + 
                convert_number(Dn) + " HUNDRED"); 
        } 

        var ones = Array("", "ONE", "TWO", "THREE", "FOUR", "FIVE", "SIX","SEVEN", "EIGHT", "NINE", "TEN", "ELEVEN", "TWELVE", "THIRTEEN","FOURTEEN", "FIFTEEN", "SIXTEEN", "SEVENTEEN", "EIGHTEEN","NINETEEN"); 
        var tens = Array("", "", "TWENTY", "THIRTY", "FOURTY", "FIFTY", "SIXTY","SEVENTY", "EIGHTY", "NINETY"); 

        if (tn>0 || one>0) 
        { 
            if (!(res=="")) 
            { 
                res += " AND "; 
            } 
            if (tn < 2) 
            { 
                res += ones[tn * 10 + one]; 
            } 
            else 
            { 
                res += tens[tn];
                if (one>0) 
                { 
                    res += ("-" + ones[one]); 
                } 
            } 
        }

        if (res=="")
        { 
            res = "0"; 
        } 
        return res;
    }

</script>