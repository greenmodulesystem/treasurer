<?php
main_header();
sidebar('void');
?>
<style>.table tbody tr:hover td, .table tbody tr:hover th {
    background-color: #cceeff;
}</style>
<div class="content-wrapper">
   
    <section class="content">        
        <div class="box box-primary"><br>
            <div class="box-header">
                <h4 class="box-title"><i class="fa fa-search"></i> Search OR Number </h4>
                <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 350px;">
                        <input type="text" name="table_search" id="search" autofocus class="form-control pull-right input-md" placeholder="Search...">
                        <div class="input-group-btn">
                            <button type="button" style="width: 70px;" id="btnSearch" class="btn btn-success input-md"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>            
            </div>
            <div class="box-body"></br>
                <table class="table table-hover">
                    <thead>
                        <th>OR Number</th>
                        <th>Payer's Name</th>
                        <th>Date Paid</th>
                        <th>Option</th>
                    </thead>
                    <tbody id="grid"></tbody>
                </table>               
            </div>
        </div>
    </section>
</div>
<div class="modal fade modal-wide" id="void_modal" data-backdrop="static" role="dialog">
    <div class="modal-dialog">       
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa fa-ban"></i> Void Remarks </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <label>Remarks:</label>
                        <textarea rows="2" cols="77" id="void_data"></textarea>          
                    </div>                   
                </div>               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-flat btn-danger btn-sm pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-flat btn-success btn-sm pull-right" id="void_payor"><i class="fa fa-forward"></i> Proceed</button>
            </div>
        </div>
        
    </div>
</div>
<?php main_footer();?>
<script language="javascript" src="<?php echo base_url()?>assets/general_assets/voiding_receipt.js"></script>
<script langauge="javascript">
    var ID = 0;
    var baseUrl = '<?php echo base_url()?>';

    $('#btnSearch').gmSearch({
        url     :   "<?php echo base_url() ?>void_receipt/grid",
        search  :   "#search",
        load_on :   "#grid"
    });
    $(document).ready(function(){
        $('#search').keyup(function (e) {                      
            if (e.keyCode  === 13) {                                                          
                $(document).gmSearch({
                    url     :   "<?php echo base_url() ?>void_receipt/grid",
                    search  :   "#search",
                    load_on :   "#grid"
                });
            }
        });
    });        
</script>