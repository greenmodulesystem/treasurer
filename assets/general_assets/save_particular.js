$(document).ready(function() {
    $(document).on('change', '.category', function() {
        categories = $('.category option:selected').val();
    });
    $(document).on('change', '.col_type', function() {
        col_type = $('.col_type option:selected').val();
    });
    $(document).on('change', '.groups', function() {
        group = $('.groups option:selected').val();
        if(group == "other"){
            document.getElementById('other-disp').style.display = "block";
        }
    });

    $(document).on('change', '.col-type-edit', function() {
        col_type_edit = $('.col-type-edit option:selected').val();
    });
    $(document).on('change', '.edit-category', function(){
        edit_categories = $('.edit-category option:selected').val();
    });
    $(document).on('change', '.edit-groups', function(){
        edit_group = $('.edit-groups option:selected').val();
    });

    $('.edit-data').on('click', function() {        
        $('.a-input').each(function(index, value) {
            document.getElementsByClassName('a-input')[index].style.display = 'block';
            document.getElementsByClassName('non-edit')[index].style.display = 'none';
        });        
        document.getElementById('save-body').style.display = "block";
    });
});

/** click to enable search input */
$(document).on('click', '#click-to-search', function(){
    document.getElementById('search-row').style.display = "block";
    document.getElementById('search-click').style.display = "none";
});

$(document).on('click', '#save', function() {
    if (categories === '' || col_type === '') {
        alert("Check your Category or Collection Type");
    } else {
        var a = confirm('Are you sure to save?');
        if (a == false) {
            return false;
        } else {
            $.post({
                url: baseUrl + "general_collection/service/general_collection_service/save_particular",
                data: {
                    Particular: $('#particular').val(),
                    Amount: $('#amount').val(),
                    Category: categories,     
                    Group: group,                                                       
                    Type: col_type,
                    NewGroup: $('#new-group').val()
                },
                dataType: 'json',
                success: function(result) {
                    if (result.has_error == false) {
                        load_table();                        
                    } else {
                        alert(result.error_message);
                    }
                }
            });
        }
    }
});

$(document).on('click', '#save-data', function() {
    var Data = [];

    $('.a-input').each(function(index, value) {
        document.getElementsByClassName('a-input')[index].style.display = 'none';
        document.getElementsByClassName('non-edit')[index].style.display = 'block';
    });
    document.getElementById('save-body').style.display = "none";
    $('.a-part').each(function() {
        var holder = {
            ID: $(this).data('id'),
            Particular: $(this).val(),
            Amount: $('.a-amnt[data-id="' + $(this).data('id') + '"]').val()
        }
        Data.push(holder);
    });
    $.post({
        url: baseUrl + "general_collection/service/general_collection_service/update_fees",
        data: {
            Data: Data
        },
        dataType: 'json',
        success: function(result) {
            if (result.has_error == false) {
                load_table();
            }
        }
    });
});

$(document).on('click', '.delete-data', function() {
    var ID = $(this).data('id');
    var i = confirm("Are you sure you want to delete this item?");
    if (i == false) {
        return;
    } else {
        $.post({
            url: baseUrl + "general_collection/service/general_collection_service/delete_fees",
            data: {
                ID: ID
            },
            dataType: 'json',
            success: function(result) {
                if (result.has_error == false) {
                    load_table();
                } else {
                    alert(result.error_message);
                }
            }
        });
    }
});

/** click to edit particular */
$(document).on('click', '.edit-data', function(){
    var pID = $(this).data('id');
    var Type = $(this).data('type');
    $.get({
        url: baseUrl + "general_collection/service/general_collection_service/get_particular_info",
        data: {
            PartID: pID,
            Type: Type  
        },
        dataType: 'json',
        success: function(result) {                     
            $('#ID').val(result.ID);         
            $('#edit-part').val(result.Particular);
            $('#edit-amount').val(result.Amount);
            $('.col-type-edit').val(result.Amount);
            document.getElementById('edit-part-data').style.display = "block";
            document.getElementById('display-part').style.display = "none";
            document.getElementById('add-div').style.display = "none";
            document.getElementById('search-div').style.display = "none";
        }
    });
});

/** cancel edit of particular */
$(document).on('click', '#cancel-edit', function(){
    load_table();
    document.getElementById('edit-part-data').style.display = "none";
    document.getElementById('display-part').style.display = "block";
});

/** save update paricular data */
$(document).on('click', '#update-parti', function(){
    var a = confirm('Are you sure to update?');
    if (a == false) {
        return false;
    } else {
        $.post({
            url: baseUrl + "general_collection/service/general_collection_service/update_particular",
            data: {
                ID: $('#ID').val(),
                Particular: $('#edit-part').val(),               
                Amount: $('#edit-amount').val(),
                Category: edit_categories,
                Group: edit_group,
                ColType: col_type_edit                
            },
            dataType: 'json',
            success: function(result) {
                if (result.has_error == false) {
                    alert(result.message);
                    load_table();
                    document.getElementById('edit-part-data').style.display = "none";
                    document.getElementById('display-part').style.display = "block";
                    document.getElementById('add-div').style.display = "block";
                    document.getElementById('search-div').style.display = "block";
                } else {
                    alert(result.error_message);
                }
            }
        });
    }
});

/** search particulars */
$(document).on('click', '#search-particular', function(){
    $(document).gmSearch({
        url     :   baseUrl + "general_collection/load_fees",
        data: {search: $('#search').val()},
        search  :   "#search",
        load_on :   "#load-body"
    });
});

$('#search').keyup(function (e) {                      
    if (e.keyCode  === 13) {                                                          
        $(document).gmSearch({
            url     :   baseUrl + "general_collection/load_fees",
            data: {search: $('#search').val()},
            search  :   "#search",
            load_on :   "#load-body"
        });
    }
});
