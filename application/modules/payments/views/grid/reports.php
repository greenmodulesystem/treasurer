<?php if($type==='1'):?>
    <?=count($data) > 0 ? '':'<td colspan="4" style="text-align:center;">No Data found.</td>'?>
    <?php foreach ($data as $key => $value):?>
        <tr class="bg-gray">
            <td><?=@$value['particulars'][0]->Accountable_form_number?></td>      
            <td><?=@$value['particulars'][count($value['particulars'])-1]->Accountable_form_number?></td>  
            <td><?=count(@$value['particulars'])?></td>
            <td style="text-align:right;"><?=@$value['amount']?></td>      
        </tr>
    <?php endforeach;?>
    <script>
        var data = <?php echo json_encode($data);?>;
        var total = {
            amount : 0
        };
        $.each(data,function(key,value){
            total.amount += value.amount;    
        });
        $('#total-tbl-1').html(total.amount.toLocaleString());
    </script>
<?php endif;?>
<?php if($type==='2'):?>
    <?=count($data['particulars']) > 0 ? '':'<td colspan="5" style="text-align:center;">No Data found.</td>'?>
    <?php foreach ($data['particulars'] as $key => $value):?>
        <tr class="bg-gray">
            <td><?=$value->Accountable_form_number?></td>      
            <td><?=date('m/d/Y',strtotime($value->Date_Paid))?></td>  
            <td><?=$value->Payor.' ,'.$value->Paid_by?></td>
            <td><?=$value->Particular.' '.$value->Description?></td>
            <td style="text-align:right;"><?=$value->Amount?></td>      
        </tr>
    <?php endforeach;?>
    <script>
        var data_b = <?php echo json_encode($data);?>;
        var total_b = {
            amount : 0
        };
        $.each(data_b['particulars'],function(key,value){
            total_b.amount += parseFloat(value.Amount);    
        });
        $('#total-tbl-2').html(total_b.amount.toLocaleString());
    </script>
<?php endif;?>
