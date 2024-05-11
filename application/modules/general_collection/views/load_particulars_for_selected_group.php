<?php
if(!empty($result)){
    foreach($result as $data){
        ?><tr>
            <td>
                <span 
                    style="color: red; transition: color 0.15s;" 
                    onmouseover="this.style.color='tomato'" 
                    onmouseout="this.style.color='red'" 
                    onmousedown="this.style.color='lightpink'"
                    onmouseup="this.style.color='tomato'"
                    class="glyphicon glyphicon-remove" 
                    aria-hidden="true"
                    id="<?=$data->ID?>"
                    onclick="delete_particular(this)"
                >
                </span>
            </td>
            <td><?=$data->Particular_name?></td>
            <td style="width: 20%"><input type="number" class="form-control form-control-sm" id="amount<?=$data->ID?>" value="<?=@$data->Amount?>"></td>
            <td><button class="btn btn-sm btn-success " data-ParticularID="<?=$data->ID?>" onclick="edit_particular_amount(this)"> <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> </button></td>
    
        </tr>
    <?php
    }
} else {
    echo 'No Data Found.';
} 

?>