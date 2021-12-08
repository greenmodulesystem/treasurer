
<div class="row">
  
    <div class="form-horizontal">
        <div class="form-group">
            <label for="address" class="col-sm-2 control-label">From</label>
            <div class="col-sm-3">
                <input type="text" class="form-control date" data-field="from" placeholder="MM/DD/YYYY" value="<?=date('m/d/Y',time())?>">
            </div>
            <label for="address" class="col-sm-1 control-label">To</label>
            <div class="col-sm-3">
                <input type="text" class="form-control date" data-field="to" placeholder="MM/DD/YYYY" value="<?=date('m/d/Y',time())?>">
            </div>
            <div class="col-sm-2">
                <button class="btn btn-md btn-flat btn-primary" id="generate"> <i class="fa fa-location-arrow"></i> GENEREATE</button>
            </div>
        </div>
    </div>
     
    <div class="col-md-6">
        <caption>A REPORT</caption>
        <button class="btn btn-flat btn-success btn-export-a pull-right"> <i class="fa fa-file-excel-o"></i> EXPORT</button>
        <table class="table" style="font-size:12px;">
            <thead >
                <tr>
                    <th>FROM</th>
                    <th>TO</th>
                    <th>QUANTITY</th>
                    <th style="text-align:center;">SUBTOTAL</th>
                </tr>
            </thead>
            <tbody id="table-1">
            
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" style="text-align:right;">TOTAL: </td>
                    <td style="text-align:right;" id="total-tbl-1">0</td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="col-md-6">
        <caption>B REPORT</caption>
        <button class="btn btn-flat btn-success btn-export-a pull-right"> <i class="fa fa-file-excel-o"></i> EXPORT</button>
        <table class="table" style="font-size:12px;">
            <thead >
                <tr>
                    <th>OR #</th>
                    <th>DATE</th>
                    <th>PAYOR</th>
                    <th>PATICULAR</th>
                    <th style="text-align:center;">Amount</th>
                </tr>
            </thead>
            <tbody id="table-2">
            
            </tbody>
             <tfoot>
                <tr>
                    <td colspan="4" style="text-align:right;">TOTAL: </td>
                    <td style="text-align:right;" id="total-tbl-2">0</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>