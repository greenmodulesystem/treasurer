var Part_value;
var Data_key;
var total_payable = 0;

$(document).on('keyup', '.search_payer', function(e) {
    if (e.keyCode === 13) {
        $('#load-search-payer').modal({ backdrop: 'static' });
        $('#load-search-payer').modal('show');
        $.post({
            url: baseUrl + 'port_collection/services/port_collection_services/get_payer_name',
            data: {
                payer_name: $('#payor-name').val()
            },
            dataType: 'json',
            success: function(e) {
                if (e.has_error == false) {
                    Values = e.error_message;
                    $.each(e.error_message, function(key, value) {
                        $('#load-searched').append(
                            '<tr> <td><button class="btn  btn-sm btn-primary add-part" data-id="' + value.ID + '"><i class="fa fa-plus-square"></i></button></td> <td>' + value.Payer + '</td> <td>' + value.Address + '</td> </tr>'
                        );
                    })
                } else {
                    alert(e.error_message);
                }
            }
        });
    }
});

$(document).on('click', '.add-part', function() {
    var ID = $(this).data('id');
    $('#load-search-payer').modal('hide');
    $.each(Values, function(idx, val) {
        if (ID == val.ID) {
            $('.search_payer').val(val.Payer);
            $('.search_paid_by').val(val.Payer);
            $('.search_address').val(val.Address);
        }
    });
});

$(document).on('click', '#add-particu-inpt', function() {
    create_input_particular();
    update_data_key();
});

var create_input_particular = function() {
    $('#load-del-btn').append('<button class="btn  btn-md btn-danger delete_row" data-key="" style="margin-bottom: 5px; width: 100%;"><i class="fa fa-trash"></i></button>');
    $('#load-input-particu').append('<input type="text" class="form-control input-md inpt-partic" data-part_ID="" data-key="" style="margin-bottom: 5px;">');
    $('#load-amount').append('<input class="form-control input-md amount-partic" data-key="" style="margin-bottom: 5px;">');
    $('#part-remarks').append('<input class="form-control inpt-remarks input-md " data-key="" style="margin-bottom: 5px;">');
}

$(document).on('click', '.delete_row', function() {
    $('.inpt-partic[data-key="' + $(this).data('key') + '"]').remove();
    $('.delete_row[data-key="' + $(this).data('key') + '"]').remove();
    $('.amount-partic[data-key="' + $(this).data('key') + '"]').remove();
    $('.inpt-remarks[data-key="' + $(this).data('key') + '"]').remove();
});

function update_data_key() {
    $.each(['.inpt-partic',
        '.delete_row',
        '.amount-partic',
        '.inpt-remarks'
    ], function(idx, val) {

        $(val).each(function(key) {
            $(this).attr('data-key', key);
        });
    });
}


$(document).on('keyup', '.inpt-partic', function(e) {
    if (e.keyCode === 13) {
        Data_key = $(this).data('key');

        $.post({
            url: baseUrl + 'port_collection/search_particular',
            data: {
                particular: $('.inpt-partic[data-key="' + Data_key + '"]').val()
            },
            dataType: 'json',
            success: function(e) {
                if (e.has_error == false) {
                    $('#load-search-particular').modal({ backdrop: 'static' });
                    $('#load-search-particular').modal('show');

                    Part_value = e.error_message;
                    $('#load-particulars').html('');
                    $.each(e.error_message, function(idx, value) {
                        $('#load-particulars').append(
                            '<tr> <td><button class="btn  btn-sm btn-primary click_to_add" data-id="' + value.Particular + '" data-amnt="' + value.Amount + '" data-part_id="' + value.ID + '"><i class="fa fa-plus-square"></i></button></td> <td> <button class="btn btn-sm  add_by_parent" data-parent="' + value.Parent + '"><b>' + value.Parent + '</b></button> </td> <td>' + value.Particular + '</td> <td>' + value.Amount + '</td> </tr>'
                        );
                    });
                } else {
                    alert(e.error_message);
                }
            }
        });
    }
});

$(document).on('click', '.click_to_add', function() {
    var Particular_ID = $(this).data('id');
    var Data_amnt = $(this).data('amnt');
    var part_ID = $(this).data('part_id');

    $('#load-search-particular').modal('hide');
    $('.inpt-partic[data-key="' + Data_key + '"]').val(Particular_ID);
    $('.amount-partic[data-key="' + Data_key + '"]').val(Data_amnt);
    $('.inpt-partic[data-key="' + Data_key + '"]').attr('data-part_ID', part_ID);
    calculate_payable();
});

$(document).on('click', '.add_by_parent', function() {
    var parent = $(this).data('parent');
    $.post({
        url: baseUrl + 'general_collection/service/general_collection_service/search_particular_parent',
        data: {
            Parent: parent
        },
        dataType: 'json',
        success: function(e) {
            if (e.has_error == false) {

                $.each(e.error_message, function(idx, val) {
                    $('#load-search-particular').modal('hide');
                    $('.inpt-partic[data-key="' + idx + '"]').val(val.Particular);
                    $('.amount-partic[data-key="' + idx + '"]').val(val.Amount);
                    $('.inpt-partic[data-key="' + idx + '"]').attr('data-part_ID', val.ID);
                    create_input_particular();
                    update_data_key();
                });

            } else {
                alert(e.error_message);
            }
        }
    });
});

function calculate_payable() {
    $('.amount-partic').each(function() {
        total_payable = total_payable + parseFloat($(this).val());
    });

    $('#subtotal').html(total_payable.toLocaleString("en-US"));
    $('.total_pay').html(total_payable.toFixed(2));
    $('#total_payable_gen').val(total_payable.toFixed(2));
    total_payable = 0;
}

$('#costumer_pay').on('click', function() {

    $('.inpt-partic').each(function() {
      var part =  $(this).data('part_id');
      
     if(part == ""){
        alert("Please do not fillup the field manually. If this is a new particular, please add it first on the FEES AND CHARGES tab.");
        return;
     }
    });
    
    calculate_payable();
    $('#payment_modal').modal({ backdrop: 'static' });
    $('#payment_modal').modal('show');
});


/** Cash Payment Save */
$(document).on('click', '#costumer_payment', function() {
    var particulars = [];
    var total_gross = 0;
 
    $('.inpt-partic').each(function() {
        var obj = {
            particular: $(this).val(),
            amount: $('.amount-partic[data-key="' + $(this).data('key') + '"]').val(),
            remarks: $('.inpt-remarks[data-key="' + $(this).data('key') + '"]').val(),
            Part_ID: $(this).data('part_id')
        };
        particulars.push(obj);
        total_gross = total_gross += parseInt($('.amount-partic[data-key="' + $(this).data('key') + '"]').val());
    });
    
    if ($('#payor_name').val() == '' || particulars == null || $('#total_payable_gen').val() == '0') {
        alert("Please verify the data before proceeding :)");
    } else {
        var i = confirm("Payment Confirm?");
        if (i == false) {
            return;
        } else {
            if (total_gross <= parseInt($('#gen_cash_payment').val())) {
                $.post({
                    url: baseUrl + "port_collection/services/port_collection_services/save_all_data",
                    data: {
                        Accountable_form_number: $('#or_numbers').val(),
                        Payor: $('#payor-name').val(),
                        Paid_by: $('#paid-by').val(),
                        Address: $('#address').val(),
                        Date_paid: $('#date-paid').val(),
                        Particulars: JSON.stringify(particulars),
                        Amounts: $('#total_payable_gen').val()
                    },
                    dataType: 'json',
                    success: function(result) {
                        if (result.has_error == false) {
                            if (result.has_error == false) {
                                var data_print = [];
                                var store = {
                                    or_number: or_number,
                                    payor: $('#payor-name').val(),
                                    address: $('#address').val(),
                                    particulars: particulars,
                                    date_paid: $('#date-paid').val(),
                                    total: $('#total_payable_gen').val(),
                                    bank: null,
                                    type: "Cash"
                                }
                                data_print.push(store);
                                var object = JSON.stringify(data_print);
                                loadGrid();
                                document.getElementById("payor-name").value = "";
                                $('#payment_modal').modal("hide");
                                window.location = baseUrl + "port_collection/print_receipt?get=" + object;
                            } else {
                                alert(result.error_message);
                            }
                        } else {
                            alert(result.error_message);
                        }
                    }
                });
            } else {
                alert('Please input amount greater than total');
            }
        }
    }
});
/** Non-Cash Payment Save */
$(document).on('click', '#cheque_pmnt', function() {
    var bank = $('.bank-optn option:selected').val();
    var particulars = [];
    var gross_total = 0;

    $('.inpt-partic').each(function() {
        var obj = {
            particular: $(this).val(),
            amount: $('.amount-partic[data-key="' + $(this).data('key') + '"]').val(),
            remarks: $('.inpt-remarks[data-key="' + $(this).data('key') + '"]').val(),
            Part_ID: $(this).data('part_id')
        };
        particulars.push(obj);
        gross_total = gross_total += parseInt($('.amount-partic[data-key="' + $(this).data('key') + '"]').val());
    });

    if ($('#payor_name').val() == '') {
        alert("Please input payor's name");
        document.getElementById("payor_name").focus();
        document.getElementById('payor_name').style.color = "red";
    } else {
        var i = confirm("Payment Confirm?");
        if (i == false) {
            return;
        } else {
            if (gross_total <= parseInt($('#c-amount').val())) {
                $.post({
                    url: baseUrl + "general_collection/service/general_collection_service/save_data_with_bank",
                    data: {
                        Accountable_form_number: or_number,
                        Payor: $('#payor_name').val(),
                        Paid_by: $('#paid_by').val(),
                        Address: $('#address').val(),
                        Date_paid: $('#date-paid').val(),
                        Particulars: JSON.stringify(particulars),
                        Bank: bank,
                        Che_no: $('#check_no').val(),
                        Che_date: $('.c-date').val(),
                        C_amount: $('#c-amount').val()
                    },
                    dataType: 'json',
                    success: function(result) {
                        if (result.has_error == false) {
                            var data_print = [];
                            var store = {
                                or_number: or_number,
                                payor: $('#payor_name').val(),
                                address: $('#address').val(),
                                particulars: particulars,
                                date_paid: $('#date-paid').val(),
                                bank: bank,
                                check_no: $('#check_no').val(),
                                check_date: $('.c-date').val(),
                                check_amount: $('#c-amount').val(),
                                type: "Cheque"
                            }
                            data_print.push(store);
                            var object = JSON.stringify(data_print);

                            loadGrid();
                            document.getElementById("payor_name").value = "";
                            $('#non-cash-modal').modal("hide");
                            window.location = baseUrl + "general_collection/print_receipt?get=" + object;
                        }
                    }
                });
            } else {
                alert('Please input amount greater than total');
            }
        }
    }
});