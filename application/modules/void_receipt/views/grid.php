<?php 
    if(!empty($Result)){
        foreach ($Result as $key => $value) {
            ?>
                <tr>
                    <td><?=$value->Accountable_form_number?></td>
                    <td><?=$value->Payor?></td>
                    <td><?=date('F-d-Y', strtotime($value->Date_paid))?></td>
                    <td><button class="btn btn-flat btn-m btn-danger voiding" data-id="<?=$value->ID?>"><i class="fa fa-ban"></i> void</button></td>
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