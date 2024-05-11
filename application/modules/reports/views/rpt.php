<?php
if (!empty($rpt)) {?>
 <table class="table table-bordered table-hover tbl_rpt" id="tbl_rpt">
        <thead>
            <th>Control No</th>
            <th>Payor</th>
            <th>Date Receipt</th>
            <th style="width:10px">Open</th>
            <th>Void</th>
            
        </thead>
<?php
    foreach ($rpt as $key => $value) {
?> 
   
        <tr>
            <td><a href="<?php echo base_url() ?>reports/view_rpt/<?= @$value->Control_no ?>"><?= @$value->Control_no ?></td>
            <td><?= @$value->pname ?></td>
            <td><?= date('Y-m-d', strtotime(@$value->Date_receipt)) ?></td>
            <td><a href="<?php echo base_url() ?>reports/view_rpt/<?= @$value->Control_no ?>" type="button" class="btn  btn-sm btn-default"><span class="glyphicon glyphicon-folder-open"></span><b></b> </a>
            </td>
            <td><a type="button" class="btn  btn-sm btn-danger set_void_rpt" data-or="<?= @$value->Control_no ?>"><i class="fa fa-cog"></i></a></td>
            
        </tr>
<?php
    }
?>
        </tbody>
    </table>
<?php
}
?>
<!-- <hr>
<div class="row body">
    <div class="box-footer">
        <form action="<?php echo base_url() ?>report/services/report_service/export_report_rpt" method="post">
            <?php
            foreach ($Result as $idx => $val) {
                foreach ($val as $scnd => $scndVal) {
            ?>
                    <input type="hidden" name="data[<?= $idx ?>][<?= $scnd ?>]" value="<?= $scndVal ?>">
            <?php
                }
            }
            ?>
            <button type="submit" class="btn  btn-md btn-success" style="margin-left: 1%;"><i class="fa fa-download"></i> Download </button>
        </form>
    </div>
</div> -->