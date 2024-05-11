<?php
main_header();
sidebar('applicant');
$Bldg = ($profiles->Building_name != '') ? trim($profiles->Building_name) . ", " : '';
$Strt = ($profiles->Street != '') ? trim($profiles->Street) . ", " : '';
$Prk = ($profiles->Purok != '') ? trim($profiles->Purok) . ", " : '';
$Address1 = ucwords($Bldg) . ucwords($Strt) . ucwords($Prk);
$Address2 = ucwords(trim($profiles->Barangay)) . ", Municipality of Murcia";
$Payor = ucwords($profiles->Tax_payer);
$Number = $profiles->Mob_num != '' ? $profiles->Mob_num : $profiles->Tel_num;
?>

<div class="content-wrapper">
    <section class="content-header">
        </br>
        <ol class="breadcrumb">
            <li><i class="fa fa-money"></i> City Treasurer's Office</li>
            <li>Businesses</li>
            <li class="active">Business Payment</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-body box-profile">
                        <h3 class="profile-username text-center"><?= strtoupper($profiles->Business_name) ?></h3>
                        <p class="text-muted text-center"><?= $profiles->Status . " (" . $profiles->Cycle_date . ")" ?></p>
                        <div class="list-group list-group-unbordered text-center">
                            <div class="list-group-item col-md-3 col-sm-12 col-xs-12">
                                <strong><i class="fa fa-user margin-r-5"></i>Proprietor</strong>
                                <p class="text-muted"><?= $Payor ?></p>
                            </div>
                            <div class="list-group-item col-md-6 col-sm-12 col-xs-12">
                                <strong><i class="fa fa-map-marker margin-r-5"></i>Address</strong>
                                <p class="text-muted"><?= $Address1 . $Address2 ?></p>
                            </div>
                            <div class="list-group-item col-md-3 col-sm-12 col-xs-12">
                                <strong><i class="fa fa-phone margin-r-5"></i>Contact No.</strong>
                                <p class="text-muted">&thinsp;<?= $Number ?></p>
                            </div>
                            <div class="pull-left"></br>
                                <a href="<?php echo base_url() ?>treasurers/applicant_search" class="btn btn-sm flat btn-default">
                                    <i class="fa fa-caret-left"></i>&ensp;Back
                                </a>
                            </div>
                            <div class="pull-right"></br>
                                <button id="applicant_history" class="btn btn-sm flat btn-default">
                                    View Payment History&ensp;<i class="fa fa-caret-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Payment Details</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table id="bills" class="table table-striped table-bordered
                                    table-condensed" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th colspan="2" class="text-center" style="width:31%;
                                            border-left:2px solid gray;
                                            border-top:2px solid gray;">TAX/FEES
                                            </th>
                                            <th class="text-center" style="width:13%;
                                            border-top:2px solid gray;">STATUS
                                            </th>
                                            <th class="text-center" style="width:13%;
                                            border-top:2px solid gray;">BALANCE DUE</th>
                                            <th class="text-center" style="width:10%;
                                            border-top:2px solid gray;">DISCOUNT</th>
                                            <th class="text-center" style="width:10%;
                                            border-top:2px solid gray;">SURCHARGE</th>
                                            <th class="text-center" style="width:10%;
                                            border-top:2px solid gray;">INTEREST</th>
                                            <th class="text-center" style="width:13%;
                                            border-top:2px solid gray;
                                            border-right:2px solid gray;">TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody id="bills_body">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php main_footer(); ?>
<script language="javascript" src="<?php echo base_url() ?>assets/general_assets/idle_signout.js"></script> <!-- KARL ALOB 3/24 -->
<script language="javascript" src="<?php echo base_url() ?>assets/scripts/noPostBack.js"></script>
<script>
    var baseUrl = '<?php echo base_url() ?>';
    var ID = '<?php echo $profiles->ID ?>';
    var or_number;
    var payorName = "<?php echo $profiles->Business_name ?>";
    var address = "<?php echo $Address1 = ucwords($Bldg) . ucwords($Strt) . ucwords($Prk) ?>";
    var address2 = "<?php echo $Address2 = ucwords(trim($profiles->Barangay)) . ", Municipality of Murcia"; ?>";
    var finalAddress = address + address2;

    $(document).ready(function() {
        loadGrid();
        updatecapp(ID);
    });

    var loadGrid = function() {
        $(document).gmLoadPage({
            url: baseUrl + "treasurers/applicant_payables/" + ID,
            load_on: "#bills_body"
        });
    }

    $("#applicant_history").on("click", function() {
        window.location.href = baseUrl + "treasurers/applicant_history/" + ID;
    });
</script>