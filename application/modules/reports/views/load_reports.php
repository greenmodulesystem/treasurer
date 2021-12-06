<style>.table-hover tbody tr:hover td {
    background: #cceeff;
}.myCheckbox {
    width: 16px;
    height: 16px;
}</style>
<table class="table table-hover">
    <thead>       
        <th>Ticket Serial</th>
        <th>Date</th>
        <th>Payor</th>
        <th>Particular</th>
        <th>Status</th>
        <th>Amount</th>
    </thead>
    <tbody>
        <?php
            $total_deposit = 0;
            foreach ($Result as $key => $value) {
                ?><tr>                   
                    <td><?=$value->Accountable_form_number?></td>                    
                    <?php if($value->Cancelled === '0'){
                        ?>
                            <td><?=date('Y-m-d', strtotime($value->Date_paid))?></td>
                            <td><?=$value->Payor?></td>
                            <td><?=$value->Particular?></td>
                            <td><?=$value->Status_remitance?></td>
                            <td><?=number_format($value->Amount, 2)?></td>
                        <?php   
                        $total_deposit += $value->Amount;
                    }else{
                        ?>
                            <td>***VOIDED***</td>
                            <td>***VOIDED***</td>
                            <td>***VOIDED***</td>
                            <td>0.00</td>
                        <?php
                    }?>                    
                </tr><?php                
            }            
        ?>
        <tr class="danger">
            <td></td><td></td><td></td><td></td>
            <td style="color: red; font-size: 20px;"><label>TOTAL:</label></td>
            <td style="color: red; font-size: 20px;"><label><?=number_format($total_deposit, 2)?></label></td>
        </tr>
    </tbody>
</table>
<hr>
<div class="row">   
    <div class="body">          
        <form action="<?php echo base_url()?>reports/service/reports_service/export_reports" method="post">
            <?php                                                          
                foreach ($Result as $key => $detail) {                      
                    foreach ($detail as $dtl => $value) {                                                                
                        ?><input type="hidden" name="data[<?=$key?>][<?=$dtl?>]" value="<?=$value?>"><?php                                               
                    }                                                    
                }                 
            ?>
            <div class="col-md-3">            
                <button type="submit" style="margin-left: 0.5%" class="btn btn-flat btn-success"><i class="fa fa-download"></i> Download </button>
            </div>            
        </form>
    </div>    
</div>
<!-- <div class="body" style="margin-left: 0.1%; margin-top: 2%;">
    <button class="btn btn-primary btn-flat" id="remitted"><i class="fa fa-money"></i> Remitted Reports</button>
</div> -->