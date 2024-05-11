<style>
    .table-hover tbody tr:hover td {
        background: #cceeff;
    }

    .myCheckbox {
        width: 16px;
        height: 16px;
    }
</style>
<?php
if (!empty($Result)) {
?>
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
                    <td><?= @$value->Accountable_form_number ?></td>
                </tr><?php
                        foreach ($value->ParticularPaid as $key => $particular) {
                        ?><tr>
                        <td></td>
                        <?php if ($value->Cancelled === '0') {
                        ?>
                            <td><?= date('Y-m-d', strtotime($value->Date_paid)) ?></td>
                            <td><?= $value->Payor ?></td>
                            <td><?= $particular->Particular ?></td>
                            <td><?= $value->Status_remitance ?></td>
                            <td><?= number_format($particular->Amount, 2) ?></td>
                        <?php
                                $total_deposit += $particular->Amount;
                            } else {
                        ?>
                            <td>***VOIDED***</td>
                            <td>***VOIDED***</td>
                            <td>***VOIDED***</td>
                            <td>***VOIDED***</td>
                            <td>0.00</td>
                        <?php
                            } ?>
                    </tr><?php
                        }
                    }
                            ?>
            <tr class="default">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="color: red; font-size: 18px;"><label>TOTAL:</label></td>
                <td style="color: red; font-size: 18px;"><label><?= number_format($total_deposit, 2) ?></label></td>
            </tr>
        </tbody>
    </table>
<?php
} else {
?>
    <div class="box-body">
        <h5 style="color: red;"> No Data </h5>
    </div>
<?php
}
?>