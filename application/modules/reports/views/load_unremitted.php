<?php
if(!empty($unremitted)){
    foreach ($unremitted as $key => $value) {
        ?><tr>
            <td><?=@$value['Accountable_form_number']?></td>
            <td><?=@$value['Particular']?></td>
            <td><?=date('m-d-Y', strtotime(@$value['Date_paid']))?></td>
            <td><?=@$value['Payor']?></td> 
            <td><?=@$value['Address']?></td>
            <td><button class="btn btn-sm btn-flat btn-danger set_void" data-id="<?=@$value['ID']?>"><i class="fa fa-cog"></i></button></td>
        </tr><?php
    }
}
?>
<script>
    var data = <?php echo json_encode($unremitted);?>;
    remit_data = data;
    $(document).ready(function(){        
        if(data != ''){            
            document.getElementById("to_remit_div").style.display = "block";
        }        
    });
</script>
