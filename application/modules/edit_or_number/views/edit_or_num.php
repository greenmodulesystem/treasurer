<?php
main_header();
sidebar('edit_or');
?>
<style>
    .table tbody tr:hover td,
    .table tbody tr:hover th {
        background-color: #cceeff;
    }
</style>
<div class="content-wrapper">
    <section class="content">
        <div class="box box-primary">
            <br>
            <div class="box-header">
                <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="box-title"><i class="fa fa-search"></i> O.R. # SEARCH RANGE: </h4>
                    </div>
                    <div class="col-md-12 pull-left" style="margin-left: 20%; margin-top: 2%;">
                        <label style="display: inline-block;">FROM : </label>
                        <input type="number" oninput="fromValue(this)" id="range_from" style="height: 32px;" >
                        
                        <label style="display: inline-block; margin-left: 5%;">TO : </label>
                        <input type="number" id="range_to" style="height: 32px;" disabled>

                        <button type="button" style="width: 70px; margin-left: 5rem;" id="searchBTN" class="btn btn-success">Search</button>
                        <button type="button" style="width: 100px; margin-left: 1rem;" id="replicateBTN" class="btn btn-info">Replicate</button>
                    </div>
                </div>
                </div>
                <!-- <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 350px;">
                        <input type="text" name="table_search" id="search" autofocus class="form-control pull-right input-md" placeholder="Search...">
                        <div class="input-group-btn">
                            <button type="button" style="width: 70px;" id="btnSearch" class="btn btn-success input-md"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="box-body"></br>
                <table class="table table-hover">
                    <thead>
                        <th> # </th>
                        <th> SYSTEM O.R. NUMBER </th>
                        <th> HARDCOPY O.R. NUMBER </th>
                        <th> ACTIONS </th>
                        <th> BUSINESS NAME / PAYOR NAME </th>
                        <th> STATUS </th>
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
                <button type="button" class="btn  btn-danger btn-sm pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                <button type="button" class="btn  btn-success btn-sm pull-right" id="void_payor"><i class="fa fa-forward"></i> Proceed</button>
            </div>
        </div>

    </div>
</div>
<?php main_footer(); ?>
<script language="javascript" src="<?php echo base_url() ?>assets/general_assets/voiding_receipt.js"></script>
<script language="javascript" src="<?php echo base_url() ?>assets/general_assets/idle_signout.js"></script> <!-- KARL ALOB 3/24 -->
<script language="javascript" src="<?php echo base_url() ?>assets/general_assets/or_search_range.js"></script> <!-- ADDED BY KYLE 10-26-2023 -->
<script langauge="javascript">
    
    var ID = 0;
    var baseUrl = '<?php echo base_url() ?>';

    //Added by KYLE 10-26-2023
    function fromValue(){
        document.querySelector('#range_to').value = (parseInt(document.querySelector('#range_from').value) + 49);
    }

</script>