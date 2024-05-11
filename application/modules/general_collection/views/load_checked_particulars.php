<?php foreach($particulars as $data){
    ?><tr>
        <!-- <td></td> -->
        <td class="non-edit" ><input checked type="checkbox" onchange="unselectCheckbox(this)" name="<?=$data->Particular?>" class="checkbox" style="display: inline-block; margin-right: 4%;" ><?=$data->Particular?></td>
        <td style="width: 20%"><input type="number" class="form-control form-control-sm part_amount"></td>
     
    </tr><?php
}?>