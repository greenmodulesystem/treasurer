<?php
    if(!empty($result)){
        foreach ($result as $key => $value) {
            ?><tr>
                <td> <?=strtoupper(@$value->Order_payment_number)?></td>
                <td> <?=@$value->Lastname.', '.@$value->Firstname?></td>
                <td> <?=@$value->Status?></td>
                <td> <?=date('M. d, Y', strtotime(@$value->Date_created))?></td>
                <td> 
                    <button class="btn  btn-sm btn-primary open-paid-oop" data-token="<?=@$value->U_ID?>"><i class="fa fa-folder-open"></i> OPEN </button>
                </td>
            </tr><?php
        }
    }else{
        ?><tr><td colspan="2"> No data </td></tr><?php
    }
?>