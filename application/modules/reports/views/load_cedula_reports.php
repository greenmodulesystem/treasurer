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
        <th>Status</th> 
        <th>Amount</th>
    </thead>
    <tbody>
        <?php
            $total_deposit = 0;
            foreach ($Result as $key => $value) {
                ?><tr>                   
                    <td><?=$value->OR_number?></td>                                                              
                    <td><?=date('Y-m-d', strtotime($value->Date_issued))?></td>
                    <td><?=$value->Last_name.', '.$value->First_name?></td>                    
                    <td><?=$value->Status_remitance?></td>
                    <td><?=number_format($value->Total, 2)?></td>                      
                    <?php
                        $total_deposit += $value->Total;
                    ?>                                
                </tr><?php                
            }            
        ?>
        <tr class="danger">
            <td></td><td></td><td></td>
            <td style="color: red; font-size: 20px;"><label>TOTAL:</label></td>
            <td style="color: red; font-size: 20px;"><label><?=number_format($total_deposit, 2)?></label></td>
        </tr>
    </tbody>
</table>
<hr>
<div class="row bodys">   
    <div class="box-footer">          
        <form action="<?php echo base_url()?>reports/service/reports_service/export_cedula_reports" method="post">
            <?php                                                          
                foreach ($Result as $key => $detail) {                      
                    foreach ($detail as $dtl => $value) {                                                                
                        ?><input type="hidden" name="data[<?=$key?>][<?=$dtl?>]" value="<?=$value?>"><?php                                               
                    }                                                    
                }                 
            ?>
            <button type="submit" style="margin-left: 0.5%" class="btn btn-flat btn-success"><i class="fa fa-download"></i> Download </button>
        </form>
    </div>    
</div>
<button class="btn btn-flat btn-primary" id="cedula_remittance"><i class="fa fa-money"></i> Remittance </button>