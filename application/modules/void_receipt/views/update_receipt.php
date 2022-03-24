<?php
main_header();
sidebar('void');
?>
<style>.table tbody tr:hover td, .table tbody tr:hover th {
    background-color: #cceeff;
}</style>

<div class="content-wrapper">
     

    <section class="content">        
        <div class="box box-primary">
            <div class="box-body">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-3">
                            <label> OR Number </label>
                            <input type="text" class="form-control input-md" id="or-number" value="<?=@$result->Accountable_form_number?>" readonly>
                        </div>
                        <div class="col-md-5">
                            <label> Payor Name </label>
                            <input type="text" class="form-control input-md" value="<?=@$result->Payor?>" readonly>
                        </div>
                        <div class="col-md-4">
                            <label> Paid By </label>
                            <input type="text" class="form-control input-md" value="<?=@$result->Paid_by?>" readonly>
                        </div>
                    </div>     
                    
                    <div class="row">
                        <div class="box-body">
                            <table class="table">
                                <thead>
                                    <th> Particular </th>
                                    <th> Amount </th>
                                    <th> Description </th>
                                </thead>
                                <tbody id="load-particular-or"></tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="box-body" style="margin-left: 0.8%;">
                            <button class="btn btn-flat btn-warning btn-sm" id="edit-or-number"> EDIT OR NUMBER <i class="fa fa-edit"></i></button>
                        </div>
                    </div>
                </div>       
            </div>            
        </div>
    </section>
</div>

<?=main_footer();?>
<script language="javascript" src="<?php echo base_url()?>assets/general_assets/voiding_receipt.js"></script>