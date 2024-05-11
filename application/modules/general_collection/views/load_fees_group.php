<?php foreach($result as $data){
    ?><tr>
        <td><input value="<?=$data->ID?>" data-particular="<?=$data->Particular?>" id="<?=$data->Particular?>" type="checkbox" class="checkbox" onchange="checkbox_selected(this)" name="checkbox" class="form-control"></td>
        <td class="non-edit" ><?=$data->Particular?></td>
     
    </tr><?php
}?>