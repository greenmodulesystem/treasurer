<?php 
    $show_items = (!empty($items[0]->Pay_for)) ? true : false;
    $amount = [];
    $total = 0;
    if($show_items){   
        foreach($items as $key => $item){ ?>
            <tr>
                <td colspan="2"><?php 
                        if($item->Pay_for === 'Green' || $item->Pay_for === 'Yellow') {
                            echo $item->Pay_for." Card";
                        } else {
                            echo $item->Pay_for;
                        }
                    ?>
                </td>
                <td><?php if($item->Pay_for === 'Green' || $item->Pay_for === 'Yellow') {
                            echo $item->Fee;
                            $amount[$key] = $item->Fee*$item->Quantity;
                        } else {
                            echo "500";
                            $amount[$key] = 500;
                        }
                    ?>
                </td>
                <td><?=$item->Quantity?></td>
                <td><?php echo $amount[$key];
                        $total += $amount[$key];
                    ?>
                </td>
                <td><button class="btn btn-danger btn-sm" data-toggle="modal" data-keyboard="false"
                        data-target="#confirm-remove<?=$key?>" data-backdrop="static">
                        <i class="fa fa-trash"></i>
                    </button>
                    <div id="confirm-remove<?=$key?>" class="modal fade text-left">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header"><h4 class="modal-title">Remove this item?</h4></div>
                                <div class="modal-footer">
                                    <button class="btn btn-default pull-left btn-sm" 
                                        data-dismiss="modal">Cancel
                                    </button>
                                    <input type="hidden" id="Pay_for" value="<?=$item->Pay_for?>">
                                    <button class="btn btn-primary btn-sm remove"
                                        data-dismiss="modal" data-id="<?=$item->ID?>">
                                        <i class="fa fa-arrow-right"></i>&ensp;Proceed
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
    <?php } ?>
        <tr style="border-top: 2px solid gray;">
            <td class="cus-group" style="border:0;text-align:right;"><b>Customer :</b></td>
            <td class="cus-group" style="border:0;border-right:2px solid gray;text-align:left">
                <input type="text" id="Payee" value="" class="form-control input-sm" style="width:85%">
            </td>
            <td class="info" colspan="2" style="text-align:right;border:0;"><b>TOTAL :</b></td>
            <td class="info" style="border:0;"><b><?=$total?></b></td>
            <td style="border:0;border-left:2px solid gray;"></td>
        </tr>
        <tr>
            <td class="rcv-group" style="border:0;text-align:right;"><b>Received By : </b></td>
            <td class="rcv-group" style="border:0;border-right:2px solid gray;">
                    <select id="Received_by" class="form-control input-sm" style="width:85%">
                        <option disabled selected value="">Received by</option>
                        <option>Glaidel Guinabo</option>
                        <option>Joseph Huelgas</option>
                        <option>Julian Mapa</option>
                        <option>Mel Vagallon</option>
                        <option>Paul Faburada</option>
                    </select>
            </td>
            <td class="pay-group" style="text-align:right;border:0;"><b>AMOUNT PAID :</b></td>
            <td class="pay-group" style="border:0;">
                <input type="number" id="Amount_paid" min="1" value="" class="form-control input-sm"
                onkeydown="javascript: return event.keyCode == 69 || event.keyCode == 107 ? false : true">
            </td>
            <td class="pay-group" style="border:0;" id="Show_paid"></td>
            <td id="OR_number" style="border:0;border-left:2px solid gray;"><b>View Receipt</b></td>
        </tr>
        <tr>
            <td style="border:0;text-align:right;"><b>Date Today :</b></td>
            <td id="Date" style="border:0;border-right:2px solid gray;text-align:left"></td>
            <td colspan="2" style="text-align:right;border:0;"><b>CHANGE :</b></td>
            <td style="border:0;" id="Change_amount"></td>
            <td style="border:0;border-left:2px solid gray;">
                <button id="View_receipt" class="btn btn-sm btn-default">
                    <i class="fa fa-file-text-o"></i><span>&ensp;View</span>
                </button>
            </td>
        </tr>
<?php
    } else {
?>
        <tr class="warning"><td colspan="6"><b>NO BILLS FOUND</b></td></tr>
<?php
    }
?>
<script language="javascript" src="<?php echo base_url() ?>assets/general_assets/idle_signout.js"></script> <!-- KARL ALOB 3/24 -->
<script language="javascript" src="<?php echo base_url()?>assets/cto_assets/js/handlers/items_handler.js"></script>
<script language="javascript"> 
    var amount = <?php echo json_encode($amount)?>;
    var Total_amount = <?php echo $total?>;
    var show_items = '<?php echo $show_items?>';
    if(show_items==='1'){var items = <?php echo json_encode($items)?>;}
    
    $(window).on('beforeunload', function(){
        $.ajax({
            url: baseUrl+"treasurers/delete_payables",
        }).done(function(result){});
    });
</script>