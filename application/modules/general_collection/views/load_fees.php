<?php foreach($result as $data){
    ?><tr>
        <td class="non-edit"><?=$data->Particular?></td>
        <td> <?=@$data->Parent?></td>
        <td style="display: none" class="a-input"><input class="form-control a-part" data-id="<?=$data->ID?>" type="text" value="<?=$data->Particular?>"></td>                                  
        <td class="non-edit"><?=number_format($data->Amount, 2)?></td>
        <td style="display: none" class="a-input"><input class="form-control a-amnt" data-id="<?=$data->ID?>" type="text" value="<?=$data->Amount?>"></td>
        <td><?=$data->Collection_type?></td>
        <td>                      
            <button class="btn btn-sm btn-flat btn-warning edit-data" data-id="<?=$data->ID?>" data-type="<?=$data->Collection_type?>"><i class="fa fa-edit"></i></button>                  
            <button class="btn btn-sm btn-flat btn-danger delete-data" data-id="<?=$data->ID?>"><i class="fa fa-trash"></i></button>
        </td>
    </tr><?php
}?>