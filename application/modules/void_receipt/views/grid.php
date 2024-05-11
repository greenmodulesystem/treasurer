<?php 
    if(!empty($Result)){
        foreach ($Result as $key => $value) {
            ?>
                <tr>
                    <td><?=$value->Accountable_form_number?></td>
                    <td><?=$value->Payor?></td>
                    <td><?=date('F-d-Y', strtotime($value->Date_paid))?></td>
                    <td><?php
                    if(@$value->Cancelled == 1){
                        echo "Voided";
                    }
                    if(@$value->Cancelled != 1 && @$value->Remitance == 1){ //De la Cruz 3/24/2023
                        echo "Remitted";
                    } 
                    if(@$value->Cancelled != 1 && @$value->Remitance != 1){
                        echo "Unremitted";
                    } 

                    ?></td>
                    <td>
                        <!-- YOBHEL 3-24-23 -->
                        <?php if(@$value->Remitance != 1 && $value->Cancelled != 1){ ?> 
                            <button class="btn  btn-m btn-danger voiding" data-id="<?=$value->ID?>"><i class="fa fa-ban"></i> void</button>
                            <button class="btn  btn-m btn-success update-or" data-id="<?=$value->ID?>" data-or="<?=$value->Accountable_form_number?>" data-date="<?=date('Y-m-d', strtotime($value->Date_paid))?>"> <i class="fa fa-eye"></i> view </button>
                       <?php } else { ?>
                            <button class="btn  btn-m btn-success update-or" data-id="<?=$value->ID?>" data-or="<?=$value->Accountable_form_number?>" data-date="<?=date('Y-m-d', strtotime($value->Date_paid))?>"> <i class="fa fa-eye"></i> view </button>
                       <?php } ?>
                       
                    </td>
                </tr>
            <?php
        }
    }else{
        ?><h4 style="color: red; margin-left: 2%;">No Data Found...</h4><?php
    }
?>
<script>
    $('.voiding').on('click', function(){
        ID = $(this).data('id');
        $('#void_modal').modal("show");
    });  
</script>