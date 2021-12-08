<!-- <link rel="stylesheet" href="<?=base_url()?>assets/css/forms/52.css"> -->
<?php

$details->total = 0;
$details->description = '';
foreach ($details->particulars as $key => $value) {
    $details->total += $value->Amount;
    $details->description .= $value->Particular.' '.$value->Description;
}
?>

<div id="form-print">
    <?php if($details->Cancelled === '0'):?>
    RECEIPT 54
    <?php else:?>
    VOIDED
    <?php endif;?>
    
</div>

<script>
var details = <?php echo json_encode($details)?>;
$(function(){
    $('#amount-words-1').val((convert_number(details.total)));
});
</script>
