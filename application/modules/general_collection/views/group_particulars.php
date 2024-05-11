<?php
echo main_header();
echo sidebar('fees_charges');
?>
<div class="content-wrapper">

    <section class="content">
        <div class="body">
            <div class="box box-primary"><br>
                <div class="row" id="add-div" style="display:block">
                    <div class="box-body">
                        
                        <div class="col-md-4">
                            <label> Select Group </label>
                            <!-- Modified by KYLE 11-07-2023 -->
                            <select name="groups" id="groups" class="form-control input-sm groups select2" style="width:100%;">
                                <option selected disabled> Select </option>
                                <option value="other"> ADD NEW GROUP </option> 
                                <?php foreach ($parents as $key => $value) {
                                ?>
                                    <option value="<?= @$value->Group_name ?>"> <?= @$value->Group_name ?></option>
                                <?php
                                }
                                ?>
                               
                            </select>
                            <div class="row" id="other-disp" style="display: none;">
                                <div class="box-body">
                                    <input type="text" style="margin-left: 5px;" class="form-control input-sm" id="new-group" placeholder="New Group">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2" style="margin-left:-1%;">
                            <label> </label>
                            <button class="btn btn-sm btn-success " style="width: 100%; margin-top: 6px;" id="save_grp"><i class="fa fa-plus-square"></i> SAVE </button>
                        </div>
                    </div>
                </div>
                
                <div class="box-body" style="overflow:scroll; height:auto;">
                    <table class="table table-hover">
                        <th><span class="glyphicon glyphicon-trash" style="margin-right: 2.5%;" aria-hidden="true"></span></th>
                        <th> Particulars</th>
                        <th> Amount</th>
                        <tbody id="load-parts-selected-group">
                        </tbody>
                    </table>
                </div>

                <div class="box-body" id="display-part" style="overflow:scroll; height:auto; display:block;">
                    <table class="table table-hover">
                        
                        <th><span class="glyphicon glyphicon-ok" style="margin-right: 3.4%;" aria-hidden="true"></span> Particulars Selected</th>
                        <th>Amount</th>
                        <th>&nbsp;</th>
                        <tbody id="load-particulars-checked">
                        </tbody>
                    </table>
                </div>

                <div class="box-body" id="display-part" style="overflow:scroll; height:auto; display:block;">
                    <table class="table table-hover">
                        <th><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></th>
                        <th>Particulars</th>
                        <th>Search <input id="search_particulars" type="text" style="font-weight:200;" ></th>
                        <tbody id="load-body-group">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
<?php echo main_footer(); ?>
<script language="javascript" src="<?php echo base_url() ?>assets/general_assets/save_particular.js"></script>
<script language="javascript" src="<?php echo base_url() ?>assets/general_assets/idle_signout.js"></script> <!-- KARL ALOB 3/24 -->
<script>
    var baseUrl = '<?php echo base_url(); ?>';
    var categories = '';
    var col_type = '';
    var group = '';
    var edit_categories = '';
    var col_type_edit = '';
    var edit_group = '';

    var load_table = function() {
        $('#load-body-group').load(baseUrl + "general_collection/load_fees_group");
    }
    $(document).ready(function() {
        load_table();
    });
    $(function() {
        $('.select2').select2();
    });

    $(document).on('click', '#save_grp', function() {
        var parts = [];
        var amounts = [];

        $.each($("input[name='checkbox']:checked"), function(){            
            parts.push($(this).val());
        });

        $.each($(".part_amount"), function(){            
            amounts.push($(this).val());
        });

        $.post({
            url: baseUrl + "general_collection/service/general_collection_service/save_new_group_particulars",
            data: {
                Group: $('#groups').val(),
                N_group: $('#new-group').val(),
                Particulars: parts,
                Amounts: amounts,
            },
            dataType: 'json',
            success: function(result) {
                if (result.has_error == false) {
                    alert(result.error_message);
                    reload_particulars();
                } else{
                    alert(result.error_message);
                }
            }
        });
    });

//MODIFIED BY KYLE 11-09-2023
$(document).on('change', '#groups', function() {
    $(document).gmLoadPage({
        url: baseUrl + "general_collection/get_particulars_for_selected_group?Parent=" + encodeURIComponent($(this).val()),
        load_on :   "#load-parts-selected-group"
    });
});

//Added by KYLE 11-20-2023
function reload_particulars(){
    $(document).gmLoadPage({
        url: baseUrl + "general_collection/get_particulars_for_selected_group?Parent=" + encodeURIComponent($('#groups').val()),
        load_on :   "#load-parts-selected-group"
    });
}

//ADDED BY KYLE 11-09-2023
$(document).on('input', '#search_particulars', function() {
    $(document).gmLoadPage({
        url: baseUrl + "general_collection/search_particulars?value=" + encodeURIComponent($(this).val()),
        load_on :   "#load-body-group"
    });
});

//Added by KYLE 11-09-2023
function unselectCheckbox(element){
    // alert($('#'+element.id).val());
    document.getElementById(element.name).checked = false;
    reload_selected_particulars();
}

function reload_selected_particulars(){
    var particulars = [];

    $.each($("input[name='checkbox']:checked"), function(){            
        particulars.push($(this).val());
    });

    $(document).gmLoadPage({
        url: baseUrl + "general_collection/particulars_checked?Particulars="+particulars,
        load_on :   "#load-particulars-checked"
    });
}

//Added by KYLE 11-07-2023
function checkbox_selected(element){
    // alert(element.getAttribute('data-particular'));
    var particulars = [];

    $.post({
        url: baseUrl + 'general_collection/General_collection/check_particular',
        data: {
            
            selected_group:  $('#groups').val(),

        },
        success: function(response) {
            var data = JSON.parse(response);

            if (data.hasOwnProperty('part_selected_group')) {
                var partSelectedGroup = data.part_selected_group;
            
                partSelectedGroup.forEach(function(selected) {
                    let particular_name = selected.Particular_name;
                    if(particular_name == element.id){
                        alert("Particular " + element.id + " is already in the selected particular group");
                    }
                });
            } 
        }

    })

    $.each($("input[name='checkbox']:checked"), function(){            
        particulars.push($(this).val());
    });

    $(document).gmLoadPage({
        url: baseUrl + "general_collection/particulars_checked?Particulars="+particulars,
        load_on :   "#load-particulars-checked"
    });

}

//Added by KYLE 11-20-2023
function delete_particular(element){
    // alert(element.id);
    $.post({
        url: baseUrl + 'general_collection/service/General_collection_service/delete_particulars',
        data: {
            
            particular_ID:  element.id,

        },
        success: function(e) {
            var e = JSON.parse(e);
            if (e.has_error == false) {
                reload_particulars();
            } 
        },
    })
}

//Added by KYLE 11-21-2023
function edit_particular_amount(element){
    $.post({
        url: baseUrl + 'general_collection/service/General_collection_service/update_particulars',
        data: {
            
            particular_ID: element.getAttribute('data-ParticularID'),
            particular_amount: $('#amount'+element.getAttribute('data-ParticularID')).val(),

        },
        success: function(e) {
            var e = JSON.parse(e);
            if (e.has_error == false) {
                alert("Amount Updated");
                reload_particulars();
            } 
        },
    })
}

</script>