<?php
    if(!empty($result)){
        foreach ($result as $key => $value) {
            ?><tr class="inpt-partic" data-pname="<?=$value->part_name?>" data-amt="<?=$value->amt?>" data-remarks="<?=$value->OR_remarks?>">
                <td style="display:none"><span class="pPaid_ID" data-id="" ><?=$value->pp_ID?></span>
                <td>
                    <!-- 3/3/23 Angelo -->
                    <!-- <?= $value->Particular_ID == 451 ? $value->Bus_tax_particular : $value->part_name?> -->
                    <span class="pname" data-id="<?=$value->ID?>"  ><?= $value->Particular_ID == 451 ? $value->Bus_tax_particular : $value->part_name?></span>                
                    <input class="form-control pname_2"  value="<?= $value->Particular_ID == 451 ? $value->Bus_tax_particular : $value->part_name?>" style="display:none">
                    <!-- end -->
                    <a class="btn edit-part" style="display:none"><i class="fa fa-edit" ></i></a>
                </td>
                <td>
                    <span class="readonly-amount" ><?=@$value->amt?></span>
                    <input class="form-control editable-amount"  value="<?=@$value->amt?>" style="display:none">
                </td>
                <td>
                    <span class="readonly-remarks"><?=@$value->OR_remarks?></span>
                    <input class="form-control editable-remarks" value="<?=@$value->OR_remarks?>" style="display:none">
                </td>
            </tr><?php 
               @$Total += @$value->amt;
        }
        ?>
      
        <tr style="font-weight:bold;background-color:rgb(240, 235, 235)">
            <td>Total</td>
            <td><span id="total-amt"><?=@$Total?></span></td>
            <td>
        </tr>
        <?php
        
    }else{
        ?><tr>
            <td colspan="2"> No data </td>
        </tr><?php
    }
?>