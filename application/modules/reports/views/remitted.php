<?php
if(!empty($remitted)){
    foreach ($remitted as $key => $value) {
        ?><tr>
            <td><?=$value->Accountable_form_number?></td>
            <td><?=$value->Payor?></td>  
            <td><?=$value->Particular?></td>
            <td width="100"><?=date('Y-m-d', strtotime($value->Date_paid))?></td>
            <!-- <td><?=$value->Address?></td>     -->
            <!-- <td><button></button></td>        -->
        </tr><?php
    }
}
?>