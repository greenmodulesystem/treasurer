<!----------------------------------------------- 02-18-2020 ----------------------------------------------->
<?php 
main_header();
sidebar('abstract');
$user =  $_SESSION['User_details'];
$rcvr = $user->First_name." ".$user->Middle_name[0].". ".$user->Last_name;
?>

<div class="content-wrapper">
    <section class="content-header">
        </br>
        <ol class="breadcrumb">
            <li><i class="fa fa-money"></i> City Treasurer's Office</li>
            <li class="active">Abstract</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <div class="box-title">
                    <h3 class="box-title"><i class="fa fa-inbox"></i> Collector: <?=$rcvr?></h3>
                </div>
                <div class="box-tools">
                    <div class="row form-inline" style="padding-right:10px">
                        <label>Date:&ensp;</label>
                        <input type="text" id="Date" value="" class="form-control input-sm" placeholder="<?=date('F d, Y')?>">
                        <button id="btnSearch" class="btn btn-default btn-sm flat"><i class="fa fa-filter"></i>&ensp;Filter</button>
                        <form method="post" action="<?php echo base_url(); ?>treasurers/abstract_export" style="display:inline">
                            <input type="hidden" value="" name="date_val" id="Date_val"/>
                            <input type="submit" value="Export" class="btn btn-success btn-sm btn-flat" id="Export"/>
                        </form>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th style="width:9%">OR Number</th>
                            <th style="width:9%">Date</th>
                            <th>Payor</th>
                            <th>Particular</th>
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

<script language="javascript" src="<?php echo base_url()?>assets/scripts/noPostBack.js"></script>
<script src="<?php echo base_url() ?>assets/theme/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script language="javascript">
    $(document).gmLoadPage({
        url     :   baseUrl+"treasurers/abstract_default/",
        load_on :   "#results"
    });

    $('#btnSearch').gmSearch({
        url     :   baseUrl+"treasurers/abstract_filter",
        search  :   "#Date",
        load_on :   "#results"
    });

    $('#Export').on('click', function(){
        $('#Date_val').val($('#Date').val());
    });
    
    $('#Date').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'MM d, yyyy',
    })
</script> 
<!----------------------------------------------- 02-18-2020 ----------------------------------------------->