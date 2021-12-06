<?php 
main_header();
sidebar('individual'); 
?>

<div class="content-wrapper">
    <section class="content-header">
        </br>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url() ?>treasurers">
                    <i class="fa fa-money"></i> City Treasurer's Office
                </a>
            </li>
            <li class="active">Check Payment History</li>
        </ol>
    </section>
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Payment History</h3>
                <button id="To_payments" class="btn btn-sm btn-default pull-right">
                    <i class="fa fa-caret-left"></i>&ensp;Back to Payments
                </button>
            </div>
            <div class="box-body">
                <table id="bills" class="table table-striped table-bordered text-center" 
                    cellspacing="0" width="100%">
                    <thead><tr>
                        <th>AR Number</th>
                        <th>Payee</th>
                        <th>Total</th>
                        <th>Amound Paid</th>
                        <th>Change</th>
                        <th>Received By</th>
                        <th>Date Paid</th>
                        <th>Option</th>
                    </tr></thead>
                    <tbody>
                        <?php $show_history = (!empty($history[0]->ID)) ? true : false;
                            if($show_history){
                                foreach($history as $key => $item){ ?>
                                <tr>
                                    <td><?=$item->AR_Number?></td>
                                    <td><?=$item->Payee?></td>
                                    <td><?="₱ ".$item->Total_amount?></td>
                                    <td><?="₱ ".$item->Paid_amount?></td>
                                    <td><?="₱ ".$item->Change_amount?></td>
                                    <td><?=$item->Received_by?></td>
                                    <td><?=$item->Date_paid?></td>
                                    <td>
                                        <button id="receipt" data-field="<?=$item->AR_Number?>" 
                                            class="btn btn-default btn-sm">
                                            <i class="fa fa-search"></i>&ensp;View
                                        </button>
                                    </td>
                                </tr>
                        <?php   } 
                            } else {
                        ?>
                            <tr class="warning"><td colspan="8"><b>NO PAYMENTS YET</b></td></tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<?php main_footer(); ?>

<script language="javascript" src="<?php echo base_url()?>assets/cto_assets/js/handlers/items_handler.js"></script>
<script>
    var baseUrl = '<?php echo base_url()?>';
</script>