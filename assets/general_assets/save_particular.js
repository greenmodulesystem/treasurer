$(document).ready(function() {
    $(document).on('change', '.category', function() {
        categories = $('.category option:selected').val();
    });
    $(document).on('change', '.col_type', function() {
        col_type = $('.col_type option:selected').val();
    });

    $('.edit-data').on('click', function() {
        $('.a-input').each(function(index, value) {
            document.getElementsByClassName('a-input')[index].style.display = 'block';
            document.getElementsByClassName('non-edit')[index].style.display = 'none';
        });
        document.getElementById('save-body').style.display = "block";
    });
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
                    Parent: $('#parent').val(),
                    Category: categories,
                    Amount: $('#amount').val(),
                    Type: col_type
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