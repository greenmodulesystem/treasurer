<link rel="stylesheet" href="<?=base_url()?>assets/css/forms/53.css">
<?php

$details->total = 0;
$details->description = '';
foreach ($details->particulars as $key => $value) {
    $details->total += $value->Amount;
    $details->description .= $value->Particular.' '.$value->Description;
}
?>

<div id="form-print" style="background-image: url('<?php echo base_url()?>assets/img/accountable_forms/53.jpg')">
    <?php if($details->Cancelled === '0'):?>
    <input type="text" class="form-input" id="province-1" value="Negros Occidental">
    <input type="text" class="form-input" id="city" value="Murcia">
    <input type="text" class="form-input" id="date-m-d" value="<?=date('F d',strtotime($details->Date_paid));?>">
    <input type="text" class="form-input" id="date-y" value="<?=date('y',strtotime($details->Date_paid));?>">
    <input type="text" class="form-input" id="payor" value="<?=$details->Payor?>"> 
    <input type="text" class="form-input" id="city-1" value="<?=$details->Address.', '.$details->City_municipality?>"> 
    <input type="text" class="form-input" id="province-2" value="<?=$details->Province?>">
    <input type="text" class="form-input" id="description" value="<?=$details->description?>">
    <input type="text" class="form-input" id="sex" value="<?=$details->Sex?>">
    <input type="text" class="form-input" id="age" value="<?=$details->Age?>">
    <input type="text" class="form-input" id="city-2" value="<?=$details->City_municipality_brand?>">
    <input type="text" class="form-input" id="owner-1" value="<?=$details->Owner_brand?>">
    <?php else:?>
    VOIDED
    <?php endif;?>
</div>
<script>
var details = <?php echo json_encode($details)?>;
$(function(){
    $('#amount-words-1').val((convert_number(details.total)));
    //  $('#print').click();
});

</script>
