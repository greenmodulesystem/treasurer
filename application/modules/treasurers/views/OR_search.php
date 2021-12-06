<!----------------------------------------------------- 01-16-2020 ----------------------------------------------------->
<?php 
main_header();
sidebar('receipts'); 
?>

<div class="content-wrapper">
    <section class="content-header">
        </br>
        <ol class="breadcrumb">
            <li><i class="fa fa-money"></i> City Treasurer's Office</li>
            <li class="active">Receipts</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <div class="box-title">
                    <h3 class="box-title"><i class="fa fa-search"></i> Search Receipt</h3>
                </div>
                <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 350px;">
                        <input type="text" name="table_search" id="search" class="form-control pull-right" 
                        placeholder="Search OR Number...">
                        <div class="input-group-btn">
                            <button type="button" id="btnSearch" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped table-bordered text-center" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Business Owner</th>
                            <th>Business Name</th>
                            <th>OR Number</th>
                            <th style="width:15%;">Option</th>
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

<script language="javascript">
    var baseUrl = '<?php echo base_url()?>';

    $(document).on('keypress',function(e) {
        if(e.which == 13) {
            $('#btnSearch').click();
        }
    });
	
    $('#btnSearch').gmSearch({
        url     :   baseUrl+"treasurers/OR_search_results",
        search  :   "#search",
        load_on :   "#results"
    });
</script> 
<!----------------------------------------------------- 01-16-2020 ----------------------------------------------------->