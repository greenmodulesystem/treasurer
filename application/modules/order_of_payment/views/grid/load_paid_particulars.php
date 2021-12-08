<?php
    if(empty(@$result)){
        ?><tr>
            <td colspan="2"> No data </td>
        </tr><?php
    }else{
        $total_amount = 0;
        foreach ($result as $key => $value) {
            ?><tr>              
                <td><?=@$value->Particular?></td>
                <td><?=@$value->Amount?></td>                
            </tr><?php
            $total_amount += @$value->Amount;
        }       
        ?><tr>
            <td style="text-align:right; font-weight:bold;"  colspan="3"> TOTAL: <?=$total_amount?> </td>
        </tr><?php        
    }
?>
<script>
    var form = <?php echo json_encode($forms);?>;
    $('#form-type').html(form.origin);
    $('#or-number').html(form.orNumber);
    $('#status').html(form.Status.toUpperCase());
</script>