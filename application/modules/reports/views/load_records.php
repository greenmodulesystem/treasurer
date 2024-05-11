<?php
if(!empty($records)){
    foreach ($records as $key => $value) {
        ?><tr>
            <td><?=date('Y-m-d', strtotime(@$value->Remittance_date))?></td>
            <td><?=@$value->Remittance_no?></td>
            <td><?=@$value->Validated == "Validated" ? @$value->Validated : "On Process"?></td>  
            <td><a class="btn btn-sm" href="<?php echo base_url()?>reports/records/<?=@$value->Remittance_no?>" role="button"><span class="glyphicon glyphicon-folder-open"></span></a></td>       
        </tr><?php
    }
}
?>