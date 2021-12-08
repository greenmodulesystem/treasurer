<link rel="stylesheet" href="<?=base_url()?>assets/css/forms/52.css">
<?php

$details->total = 0;
$details->description = '';
foreach ($details->particulars as $key => $value) {
    $details->total += $value->Amount;
    $details->description .= $value->Particular.' '.$value->Description;
}
?>

<div id="form-print" style="background-image: url('<?php echo base_url()?>assets/img/accountable_forms/52.jpg')">
    <?php if($details->Cancelled === '0'):?>
    <input type="text" class="form-input" id="province-1" value="Negros Occidental">
    
    <input type="text" class="form-input" id="date-m-d" value="<?=date('F d',strtotime($details->Date_paid));?>">
    <input type="text" class="form-input" id="date-y" value="<?=date('y',strtotime($details->Date_paid));?>">
    <input type="text" class="form-input" id="payor" value="<?=$details->Payor?>"> 
    <input type="text" class="form-input" id="address" value="<?=$details->Address?>"> 
    <input type="text" class="form-input" id="city" value="<?=$details->City_municipality?>"> 
    <input type="text" class="form-input" id="province-2" value="<?=$details->Province?>">
    <input type="text" class="form-input" id="conveyor" value="<?=$details->Conveyor?>">
    <input type="text" class="form-input" id="conveyor-city" value="<?=$details->Conveyor_Address?>">
    <input type="text" class="form-input" id="conveyor-province" value="<?=$details->Conveyor_City_Municipality?>">
    <!-- <input type="text" id="amount-words" value="amount"> -->
    <input type="text" class="form-input" id="amount-words-1" value="">
    <input type="text" class="form-input" id="amount" value="<?=$details->total?>">
    <input type="text" class="form-input" id="description" value="<?=$details->description?>">
    <input type="text" class="form-input" id="sex" value="<?=$details->Sex?>">
    <input type="text" class="form-input" id="age" value="<?=$details->Age?>">
    <input type="text" class="form-input" id="ownership" value="<?=$details->Ownership_no?>">
    <input type="text" class="form-input" id="city-1" value="Cadiz">
    <input type="text" class="form-input" id="province-3" value="Negros Occidental">
    <input type="text" class="form-input" id="date-m-d-1" value="<?=date('F d',strtotime($details->Date_paid));?>">
    <input type="text" class="form-input" id="date-y-1" value="<?=date('y',strtotime($details->Date_paid));?>">
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
    // $('#print').click();
});

</script>
