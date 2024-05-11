<?php
echo main_header();
echo sidebar('reports');
?>
<style>
    .myCheckbox {
        width: 16px;
        height: 16px;
    }

    .table-hover tbody tr:hover td {
        background: #cceeff;
    }
</style>
<div class="content-wrapper">

    <section class="content">
        <div class="row">
            <div class="box-body">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#general" data-toggle="tab"> General </a></li>
                        <li><a href="#unremitted" data-toggle="tab"> Unremitted </a></li>
                        <li><a href="#remit" data-toggle="tab"> On Process </a></li>
                        <li><a href="#records" data-toggle="tab"> Records </a></li>
                        <!-- <li><a href="#rpt_collection" data-toggle="tab">Real Property Tax</a></li> -->
                        <li><a href="#voided" data-toggle="tab"> Voided </a></li>                      
                    </ul>
                    <div class="tab-content">
                        <!-- GENERAL REPORTS -->
                        <div class="tab-pane active" id="general">
                            <div>
                                <div class="row">
                                    <div class="box-body">
                                        <div class="col-md-2">
                                            <input type="radio" class="myCheckbox change_type" name="typeOF" value="single"> <label>Single Date</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" class="myCheckbox change_type" name="typeOF" value="range"> <label>Date Range</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="box-body">
                                        <div class="col-md-3">
                                            <select name="type_of" class="type_reports form-control select2" style="color: black; width: 100%;">
                                                <option disabled selected value="null"> Select Type of Report </option>
                                                <?php foreach ($col_type as $key => $value) {
                                                ?><option value="<?= @$value->Type ?>"> <?= @$value->Type ?> </option>
                                                <?php
                                                } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-1">
                                            <p style="font-size: 25px; margin-top: 5%; margin-left: 40%;">Date: </p>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input placeholder="Select Date" type="text" value="<?= date('Y-m-d') ?>" class="input-field form-control pull-right date_report" id="reports_date" />
                                            </div>
                                        </div>
                                        <div class="col-md-3" style="display: none" id="end_date_range">
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input placeholder="Select Date" type="text" value="<?= date('Y-m-d') ?>" class="input-field form-control pull-right end_date" id="end_date" />
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <button class="btn btn-m  btn-primary" id="generate"><i class="fa fa-forward"></i> Generate </button>
                                        </div>
                                        <hr><br>
                                        <hr>
                                        <div class="box-body" id="load-reports"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- UNREMITTED REPORTS -->
                        <div class="tab-pane" id="unremitted">
                            <div class="box-body">
                                <div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <select class="form-control input-sm select2 select-or-type" name="ot-type" style="width:100%">
                                                <?php
                                                foreach ($or_type as $key => $value) {
                                                ?>
                                                    <option value="<?= @$value->Abbreviation ?>"> <?= @$value->Type ?> </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn-sm  btn-primary" style="width:80%" id="generate_unremit"><i class="fa fa-arrow-right"></i> Generate </button>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control input-sm" id="search_input" placeholder="Search...">
                                        </div>
                                        <div class="col-md-2" style="margin-left: -2%;">
                                            <button class="btn btn-sm  btn-primary" id="btn-search" style="width: 50%;"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                    <hr>
                                    <table class="table table-border table-hover" id="unremitted_rep">
                                        <thead>
                                            <th> Serial</th>
                                            <th> Particular</th>
                                            <th> Date</th>
                                            <th> Payor</th>
                                            <th> Address</th>
                                            <th> Amount</th>
                                        </thead>
                                        <tbody id="load-unremitted">
                                        </tbody>
                                    </table>
                                     
                                    <div class="box-body" style="display:none" id="to_remit_div">
                                        <button class="btn  btn-md btn-success btn-view-unremitted"><i class="fa fa-money"></i>&nbsp; REMIT </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- REMITTED REPORTS -->
                        <div class="tab-pane" id="remit">                            
                            <div class="box-body">                               
                                
                            <div class="row">
                                    <!-- 4-11-2023 LOUIS -->
                                    <div class="box-body">
                                        <div class="col-md-2">
                                            <input type="radio" class="myCheckbox change_type_remitted" name="typeOF_remitted" value="single"> <label>Single Date</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" class="myCheckbox change_type_remitted" name="typeOF_remitted" value="range"> <label>Date Range</label>
                                        </div>
                                    </div>
                                    <!-- END -->
                                    <div class="col-md-3" >                                                     
                                        <div class="input-group">
                                            <input type="text" class="form-control " id="search_rmtinput" placeholder="Search Payor or OR number">
                                            <span class="input-group-btn">
                                            <button class="btn btn-primary btn-flat " id="btn-rmtsearch"><span class="glyphicon glyphicon-search"></span></button>
                                        </span>
                                        </div>
                                    </div>
                                    <!-- 4-11-2023 LOUIS -->
                                    <div class="col-md-1">
                                            <p style="font-size: 25px; margin-top: 5%; margin-left: 40%;">Date: </p>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input placeholder="Select Date" type="text" value="<?= date('Y-m-d') ?>" class="input-field form-control pull-right date_report" id="reports_date_remitted" />
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="display: none" id="end_date_range_remitted">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input placeholder="Select Date" type="text" value="<?= date('Y-m-d') ?>" class="input-field form-control pull-right end_date" id="end_date_remitted" />
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <button class="btn btn-m  btn-primary" id="generate_remitted"><i class="fa fa-forward"></i> Generate </button>
                                    </div>

                                    <!-- <div class="col-md-2">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input placeholder="Select Date" type="text" value="<?= date('Y-m-d') ?>" class="input-field form-control pull-right date_report" id="rmtreports_date" />
                                        </div>
                                    </div> -->

                                     <!-- END -->
                                </div>
                                <br>
                                <table class="table table-bordered table-hover" id="tbl_rmt" >
                                    <thead>
                                        <th> Serial </th>
                                        <th> Payor </th>
                                        <th> Particular </th>
                                        <th> Date </th>
                                        <!-- <th> Address </th> -->
                                        <!-- <th> Option </th> -->
                                    </thead>
                                    <tbody id="load-remitted"></tbody>
                                </table> 
                                </div>
                          
                        </div>
                        <!-- RCD & ABSTRACT RECORDS -->
                        <div class="tab-pane" id="records">                            
                            <div class="box-body">                               
                                
                                <div class="row">
                                    <div class="col-md-4" >                                                     
                                        <div class="input-group">
                                            <input type="text" class="form-control " id="search_rmtinput" placeholder="Search Remittance No.">
                                            <span class="input-group-btn">
                                            <button class="btn btn-primary btn-flat " id="btn-rmtsearch"><span class="glyphicon glyphicon-search"></span></button>
                                        </span>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input placeholder="Select Date" type="text" value="<?= date('Y-m-d') ?>" class="input-field form-control pull-right date_report" id="rmtreports_date" />
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <table class="table table-bordered table-hover" id="tbl_records" >
                                    <thead>
                                        <th> Date of Remittance </th>
                                        <th> Remittance No. </th>
                                        <th> Remittance Status </th> 
                                        <th> Option </th>
                                    </thead>
                                    <tbody id="load-records"></tbody>
                                </table> 
                                </div>
                          
                        </div>
                        <!-- RPT_COLLECTION -->
                        <div class="tab-pane" id="rpt_collection">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-4" >                                                     
                                    <div class="input-group">
                                        <input type="text" class="form-control search_rptinput" id="search_rptinput" placeholder="Search...">
                                        <span class="input-group-btn">
                                        <button class="btn btn-primary btn-flat btn-rptsearch" id="btn-rptsearch"><span class="glyphicon glyphicon-search"></span></button>
                                    </span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input placeholder="Select Date" type="text" value="<?= date('Y-m-d') ?>" class="input-field form-control pull-right date_report rptreports_date" id="rptreports_date" />
                                    </div>
                                </div>
                            </div>
                            <div id="load-rpt"></div>
                            <!-- <table class="table table-bordered table-hover" id="tbl_rpt">
                                <thead>
                                    <th>Control No</th>
                                    <th>Payor</th>
                                    <th>Date Receipt</th>
                                    <th style="width:10px">Open</th>
                                    <th>Void</th>
                                    
                                </thead> -->
                                <!-- <tbody id="load-rpt">
                                </tbody>
                            </table> -->
                        </div>
                        </div>
                        <!-- VOIDED RECIEPTS -->
                        <div class="tab-pane" id="voided">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-4">                                                     
                                        <div class="input-group" style="left:-2%;">
                                            <input type="text" class="form-control " id="search_voidinput" placeholder="Search Payor or OR number" >
                                            <span class="input-group-btn">
                                            <button class="btn btn-primary btn-flat" id="btn-voidsearch"><span class="glyphicon glyphicon-search"></span></button>
                                        </span>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input-group date" >
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input placeholder="Select Date" type="text" value="<?= date('Y-m-d') ?>" class="input-field form-control pull-right date_report" id="voidreports_date" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top:2%;">
                                    <table class="table table-bordered table-hover" id="tbl_void">
                                        <thead>
                                            <th>Ticket Serial</th>
                                            <th>Particular</th>
                                            <th>Date</th>
                                            <th>Payor</th>
                                            <th>Address</th>
                                            <th>Re-print</th>
                                        </thead>
                                        <tbody id="load-voided">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                        <textarea rows="2" cols="77" id="void_remark"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn  btn-danger btn-sm pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                <button type="button" class="btn  btn-success btn-sm pull-right" id="void_reciept"><i class="fa fa-forward"></i> Proceed</button>
            </div>
        </div>

    </div>
</div>
<?php echo main_footer(); ?>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/theme/bower_components/select2/dist/css/select2.min.css">
<script src="<?php echo base_url() ?>assets/theme/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script language="javascript" src="<?php echo base_url() ?>assets/general_assets/generate_reports.js"></script>
<script language="javascript" src="<?php echo base_url() ?>assets/general_assets/idle_signout.js"></script> <!-- KARL ALOB 3/24 -->
<script>
    var baseUrl = '<?php echo base_url(); ?>';
    var type_of;
    var values = '';

    $(document).ready(function() {
        remitted();
        voided();
        rpt();
        records();
    });

    $(function() {
        $('.select2').select2()
    });

    var remitted = function() {
        $('#load-remitted').load(baseUrl + "reports/service/reports_service/remitted");
    }

    var voided = function() {
        $('#load-voided').load(baseUrl + "reports/service/reports_service/voided");
    }
    var rpt = function() {
        $('#load-rpt').load(baseUrl + "reports/service/reports_service/rpt");
    }
    var records = function() {
        $('#load-records').load(baseUrl + "reports/service/reports_service/records");
    }

    $('.date_report').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        orientation: "bottom left"
    });

    $('.end_date').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        orientation: "bottom left"
    });

    $('#btn-search').on('click', function() {
        var input, filter, table, tr, td, i;

        input = document.getElementById("search_input");
        filter = input.value.toUpperCase();
        table = document.getElementById("unremitted_rep");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[3];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    });
     $('#btn-rptsearch').on('click', function() {
        var input, filter, table, tr, control_no, i,name;

        input = document.getElementByID("search_rptinput");
        filter = input.value.toUpperCase();
        table = document.getElementByID("tbl_rpt");
        tr = table.getElementsByTagName("tr");
    

        for (i = 0; i < tr.length; i++) {
            name = tr[i].getElementsByTagName("td")[1];
            
            if (name) {
                if (name.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    console.log(tr[i]);
                } else {
                    tr[i].style.display = "none";
                }
            }
            control_no = tr[i].getElementsByTagName("td")[0];
            if (control_no) {
                if (control_no.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                }
            }
        }
    });
    $('#btn-rmtsearch').on('click', function() {
        var input, filter, table, tr, control_no, i,name;

        input = document.getElementById("search_rmtinput");
        filter = input.value.toUpperCase();
        table = document.getElementById("tbl_rmt");
        tr = table.getElementsByTagName("tr");
    

        for (i = 0; i < tr.length; i++) {
            name = tr[i].getElementsByTagName("td")[1];
            
            if (name) {
                if (name.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    console.log(tr[i]);
                } else {
                    tr[i].style.display = "none";
                }
            }
            control_no = tr[i].getElementsByTagName("td")[0];
            if (control_no) {
                if (control_no.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                }
            }
        }
    });
    $('#btn-voidsearch').on('click', function() {
        var input, filter, table, tr, control_no, i,name;

        input = document.getElementById("search_voidinput");
        filter = input.value.toUpperCase();
        table = document.getElementById("tbl_void");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            name = tr[i].getElementsByTagName("td")[3];
            
            if (name) {
                if (name.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    console.log(tr[i]);
                } else {
                    tr[i].style.display = "none";
                }
            }
            control_no = tr[i].getElementsByTagName("td")[0];
            if (control_no) {
                if (control_no.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                }
            }
        }
    });
    $('#voidreports_date').on('change', function() {
        var input, filter, table, tr, date, i;

        input = document.getElementById('voidreports_date').value;
        table = document.getElementById("tbl_void");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
           date = tr[i].getElementsByTagName("td")[2];
           console.log(input);
            if (date) {
                if (date.innerHTML.indexOf(input) > -1) {
                    tr[i].style.display = "";
                    
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    });
    $('#rptreports_date').on('change', function() {
        var input, filter, table, tr, date, i;

        input = document.getElementById('rptreports_date').value;
        table = document.getElementById("tbl_rpt");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
           date = tr[i].getElementsByTagName("td")[2];
           console.log(input);
            if (date) {
                if (date.innerHTML.indexOf(input) > -1) {
                    tr[i].style.display = "";
                    
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    });
    $('#rmtreports_date').on('change', function() {
        var input, filter, table, tr, date, i;

        input = document.getElementById('rmtreports_date').value;
        table = document.getElementById("tbl_rmt");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
           date = tr[i].getElementsByTagName("td")[3];
           console.log(input);
            if (date) {
                if (date.innerHTML.indexOf(input) > -1) {
                    tr[i].style.display = "";
                    
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    });
</script>