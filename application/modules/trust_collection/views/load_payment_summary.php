<style>
table {
    border: 1px solid black;   
}
th, td {
    padding: 10px;      
}
</style>
<div class="body"> 
    <table class="table talbe-hover">       
        <thead>      
            <th colspan="1"></th>                        
            <th width="30%" colspan="1">Particular</th>
            <th width="15%" colspan="1">Amount</th>
            <th width="15%">Qty</th>
            <th width="10%">Total</th>
            <th width="25%">Remarks</th>
        </thead>
        <?php $subtotal = 0;?>
        <?php foreach ($Result as $key => $value) {           
            ?><tr>               
                <td><button class="btn btn-flat btn-sm btn-danger part-delete" data-id="<?=$value->ID?>"><i class="fa fa-trash"></i></button></td>                          
                <td><?=$value->Particular?></td>   
                <td><?=$value->Amount?></td>   
                <td><input type="number" class="qnty form-control input-sm" data-num="<?=$key?>" data-amnt="<?=$value->Amount?>" value="" style="width: 50%"></td>
                <td><label class="totals" data-key="<?=$key?>" value=""> 0.0 </label></td>
                <td><input type="text" class="remarks form-control input-sm" value=""></td>  
        </tr><?php
        $subtotal += $value->Amount;
        }?>                
    </table>
</div>
<script>
    subtotal = <?php echo json_encode($subtotal);?>;
    var costumer_particular = <?php echo json_encode($Result);?>;
    or_number = <?php echo json_encode($Type->Accountable_form_number);?>;
    check_validity = <?php echo json_encode($check_validity);?>;    
    var Checker = <?php echo json_encode($Checker);?>;
    var Checkers = Checker;
    var Total = 0;   
    var quantity = [];   
    var amnt = 0;
        
    $('.qnty').on('keyup', function (){             
        var value = $(this).val();
        amnt = $(this).data('amnt'); 
        $('.totals[data-key="'+$(this).data('num')+'"]').html(amnt*value); 
        calculate();       
    }); 

    function calculate() {
        var subtotals = 0;
        $('.totals').each(function(){               
            subtotals = subtotals + parseFloat($(this).html());
        });             
        $('#subtotal').html(subtotals);
        $('.total_pay').html(subtotals);
        subtotal = subtotals;
    }       

    // $('#t_or_numbers').html(or_number);     
    document.getElementById('t_or_numbers').value = or_number;
    $('#subtotal').html(subtotal);  
    $('.total_pay').html(subtotal);     
    if(check_validity == 1){        
        $('#costumer_pay').attr('disabled', true);
        document.getElementById("t_or_numbers").disabled = true;
        document.getElementById("t_or_numbers").value = "No OR number available"; 
        // document.getElementById("t_or_numbers").innerHTML = "No OR number available";       
    }    
</script>