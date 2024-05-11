<?php 
    $counter = 0;
    $last_OR_number = null;
    //Target collection database -> tbl_payment
    if(!empty($Result)){
        foreach ($Result as $key => $value) {
            $counter =  $counter + 1;

            //Filter for repeading OR numbers of cancelled OR's
            // if($last_OR_number != $value->Accountable_form_number){
            ?>
                <tr style="background-color: <?= $value->Cancelled == '1' ? 'coral' : ($value->OR_hardcopy != $value->Accountable_form_number ? 'mediumspringgreen' : 'none') ?>">
                    <td style="padding-top: 15px;"><?=$counter?></td>
                    <td><input disabled style="width: 120px; height: 30px;" class="text-center" id="system_OR<?=$counter?>" value="<?=$value->Accountable_form_number?>" ></td>
                    <td><input <?=$value->Cancelled == "1" ? 'disabled' : '' ?> style="width: 120px; height: 30px; display: inline;" oninput="autoInput(this)" class="text-center" id="new_OR<?=$counter?>" value="<?=$value->OR_hardcopy?>"></td>
                    <td>
                        <button class="btn btn-danger text-center Edit_OR" onclick="clickFunction(this)" <?=$value->Cancelled == "1" ? 'disabled' : '' ?> id="editBTN<?=$counter?>" style="height: 30px; width: 10rem; font-size: 95%; margin-left: 0rem;">Edit O.R.</button>
                        <button class="btn btn-info text-center" id="<?=$value->Accountable_form_number?>"  onclick="revive_OR(this)" style="height: 30px; width: 10rem; font-size: 95%; margin-top: 5px; display: <?=$value->Cancelled == "1" ? '' : 'none' ?> ;">Revive O.R.</button>
                    </td>
                    <td style="padding-top: 15px;"><?=$value->Payor?></td>
                    <td style="padding-top: 15px;"><?=$value->Cancelled == "1" ? 'Voided' : 'Active'?></td>
                </td>
                </tr>
            <?php
            // $last_OR_number = $value->Accountable_form_number;
            // }
        }
        
    }else{
        ?><h4 style="color: red; margin-left: 2%;">No Data Found...</h4><?php
    }
/*
    //Target cadiz_licensing_testing -> tbl_collection
    if(!empty($Result)){
        foreach ($Result as $key => $value) {
            ?>
                <tr style="background-color: <?= $value->revived == '1' ? 'coral' :  'none' ?>">

                    <td><input disabled style="width: 120px; height: 30px;" class="text-center" value="<?=$value->OR_number?>" ></td>
                    <td><input style="width: 120px; height: 30px;" class="text-center" value="<?=$value->OR_hardcopy?>" > <button class="btn btn-danger text-center" style="height: 30px; font-size: 95%; margin-left: 1rem;">Edit OR</button> </td>
                    <td style="padding-top: 15px;"><?=$value->Received_by?></td>
                    <td style="padding-top: 15px;"><?=$value->revived == "1" ? 'Revived' : 'Active'?></td>
                </td>
                </tr>
            <?php
        }
    }else{
        ?><h4 style="color: red; margin-left: 2%;">No Data Found...</h4><?php
    }
        */
?>

<!-- ADDED BY KYLE 10-31-2023 -->
<script>

// //Auto Input
var counter = parseInt('<?php echo $counter ?>');
// // alert($('#new_OR1').val());
// // alert(counter);
// function autoInput(element){
//     for (let x = (element.id).match(/\d+/)[0]; x <= counter ; x++){
//         // alert(parseInt(x)+1);
//         document.querySelector('#new_OR'+ (parseInt(x)+1)).value = parseInt(document.querySelector('#new_OR'+ parseInt(x)).value) + 1;
//     }
// }

</script>
<script language="javascript" src="<?php echo base_url() ?>assets/general_assets/or_search_range.js"></script><!-- ADDED BY KYLE 10-27-2023 -->
<!-- <script language="javascript" src="<?php echo base_url()?>assets/general_assets/revive_receipt.js"></script>  -->

