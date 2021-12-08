<div class="row">
    <div class="col-md-7">
        <div class="input-group margin">
            <input style="text-align:center; color:red; font: bold 30px Bookman Old Style; " type="text" class="form-control void" data-field="search-or" placeholder="OR NUMBER">
                <span class="input-group-btn">
                <button type="button" class="btn btn-info btn-flat" id="search-or"> <i class="fa fa-search"></i> SEARCH</button>
                </span>
        </div>  
        <table class="table table-responsive table-hover">
            <thead>
                <tr>
                    <th>OR Number</th>
                    <th>Payer's Name</th>
                    <th>Date Paid</th>
                    <td></td>
                </tr>
            </thead>    
            <tbody id="receipts">

            </tbody>         
        </table>           
    </div>
    <div class="col-md-5">
        <div class="box box-danger box-flat">
            <div class="box-header with-border">
            <h3 class="box-title">VOIDED RECEIPTS</h3>

            <div class="box-tools pull-right">
                    
            </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="">
            <div class="table-responsive">
                <table class="table table-responsive table-hover">
                    <thead>
                        <tr>
                            <th>OR Number</th>
                            <th>Payer's Name</th>
                            <th>Date Paid</th>
                            <td></td>
                        </tr>
                    </thead>    
                    <tbody id="void-receipts">

                    </tbody>         
                </table>          
            </div>
            <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
                            
            <!-- /.box-footer -->
        </div>                  
    </div>
</div>