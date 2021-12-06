<?php
if(!empty($remitted)){
    foreach ($remitted as $key => $value) {
        ?><tr>
            <td><?=$value->Accountable_form_number?></td>
            <td><?=$value->Particular?></td>
            <td><?=date('m-d-Y', strtotime($value->Date_paid))?></td>
            <td><?=$value->Payor?></td>  
            <td><?=$value->Address?></td>           
        </tr><?php
    }
}
?>