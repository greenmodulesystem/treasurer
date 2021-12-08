<?php
    if(!empty($result)){
        foreach ($result as $key => $value) {
            ?><tr>
                <td><?=@$value->Accountable_form_number?></td>
                <td><?=@$value->Amount?></td>
                <td><?=@$value->Description?></td>
            </tr><?php
        }
    }else{
        ?><tr>
            <td colspan="2"> No data </td>
        </tr><?php
    }
?>