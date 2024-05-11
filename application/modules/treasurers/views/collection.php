<?php 
main_header();
sidebar('collection');
$user =  $_SESSION['User_details'];
$rcvr = $user->First_name." ".$user->Middle_name[0].". ".$user->Last_name;
?>

<div class="content-wrapper">
    <section class="content-header">
        </br>
        <ol class="breadcrumb">
            <li><i class="fa fa-money"></i> City Treasurer's Office</li>
            <li class="active">Collection</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <div class="box-title">
                    <h3 class="box-title"><i class="fa fa-inbox"></i> Collection by <?=$rcvr?></h3>
                </div>
                <div class="box-tools">
                    <div class="row form-inline" style="padding-right:10px">
                        <label>Date Range :&ensp;</label>
                        <input type="text" id="From" value='' class="form-control input-sm" placeholder="Min date">&ensp;
                        <input type="text" id="To" value='' class="form-control input-sm" placeholder="Max date">
                        <button id="btnSearch" class="btn btn-default btn-sm flat"><i class="fa fa-filter"></i>&ensp;Filter</button>
                        <!----------------------------------------------- 01-23-2020 ----------------------------------------------->
                        <form method="post" action="<?php echo base_url(); ?>treasurers/collection_export" style="display:inline">
                            <input type="hidden" value="" name="from_val" id="From_val"/>
                            <input type="hidden" value="" name="to_val" id="To_val"/>
                            <input type="submit" value="Export" class="btn btn-success btn-sm btn-flat" id="Export"/>
                        </form>
                        <!----------------------------------------------- 01-23-2020 ----------------------------------------------->
                    </div>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped table-bordered text-center" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Business Name</th>
                            <th>OR Number</th>
                            <th>Date Paid</th>
                            <th style="text-align:right">Cash Amount</th>
                            <th style="text-align:right">Check Amount</th>
                            <th style="text-align:right">Amount Paid</th>
                        </tr>
                    </thead>
                    <tbody id="results">
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<?php main_footer();?>
<script language="javascript" src="<?php echo base_url() ?>assets/general_assets/idle_signout.js"></script> <!-- KARL ALOB 3/24 -->
<script language="javascript" src="<?php echo base_url()?>assets/scripts/noPostBack.js"></script>
<script src="<?php echo base_url() ?>assets/theme/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script language="javascript">
    $(document).gmLoadPage({
        url     :   baseUrl+"treasurers/collection_default/",
        load_on :   "#results"
    });

    $('#btnSearch').gmFilter({
        url     :   baseUrl+"treasurers/collection_filter",
        from    :   "#From",
        to      :   "#To",
        load_on :   "#results"
    });
    
    /* -------------------- 01-23-2020 -------------------- */
    $('#Export').on('click', function(){
        $('#From_val').val($('#From').val());
        $('#To_val').val($('#To').val());
    });
    /* -------------------- 01-23-2020 -------------------- */
    
    $('#From').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'MM d, yyyy',
    })
    
    $('#To').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'MM d, yyyy',
    })
</script> 
