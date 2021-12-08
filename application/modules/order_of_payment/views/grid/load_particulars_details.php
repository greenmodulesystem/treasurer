<?php
    if(empty(@$result)){
        ?><tr>
            <td colspan="2"> No data </td>
        </tr><?php
    }else{
        $total_amount = 0;
        foreach ($result as $key => $value) {
            ?><tr>
                <td><button class="btn btn-sm btn-flat btn-danger btn-to-edit delete_row" data-key="<?=@$key?>" data-id="<?=@$value->ID?>" data-oopid="<?=@$value->Order_payment_ID?>" data-amount="<?=@$value->Amount?>"><i class="fa fa-trash"></i></button></td>
                <td><input type="text" class="form-control input-sm inpt-partic" data-key="<?=@$key?>" data-oopid="<?=@$value->Order_payment_ID?>" data-verid="<?=@$value->ID?>" data-part_id="<?=@$value->Particular_ID?>" value="<?=@$value->Particular?>"></td>
                <td><input type="text" class="form-control input-sm amount-partic" data-key="<?=@$key?>" value="<?=@$value->Amount?>"></td>                
            </tr><?php
            $total_amount += @$value->Amount;
        }       
        ?><tr>
            <td style="text-align:right;" class="or-numbers" colspan="3">TOTAL: <?=$total_amount?> </td>
        </tr><?php        
    }
?>
<script>
    $(document).ready(function(){    
        $('#save-edit-button').prop('disabled', true);
        $('.btn-to-edit').prop('disabled', true);    
        $('.inpt-partic').prop('disabled', true);    
        $('#cancel-button').prop('disabled', true);
        $('#add-to-edit').prop('disabled', true);
        $('.amount-partic').prop('disabled', true);         
    });
</script>