$(document).on('keyup', '.trust_search_payer', function(e) {
    if (e.keyCode === 13) {
        $('#load-search-payer-trust').modal({ backdrop: 'static' });
        $('#load-search-payer-trust').modal('show');
        $.post({
            url: baseUrl + 'general_collection/service/general_collection_service/get_payer_name',
            data: {
                payer_name: $('#trust_payor_name').val()
            },
            dataType: 'json',
            success: function(e) {
                if (e.has_error == false) {
                    Values = e.error_message;
                    $.each(e.error_message, function(key, value) {
                        $('#load-searched-trust').append(
                            '<tr> <td><button class="btn btn-flat btn-sm btn-primary add-part-trust" data-id="' + value.ID + '"><i class="fa fa-plus-square"></i></button></td> <td>' + value.Payer + '</td> <td>' + value.Address + '</td> </tr>'
                        );
                    })
                } else {
                    alert(e.error_message);
                }
            }
        });
    }
});

$(document).on('click', '.add-part-trust', function() {
    var ID = $(this).data('id');
    $('#load-search-payer-trust').modal('hide');
    $.each(Values, function(idx, val) {
        if (ID == val.ID) {
            $('.trust_search_payer').val(val.Payer);
            $('.trust_search_paid_by').val(val.Payer);
            $('.trust_search_address').val(val.Address);
        }
    });
});

$(document).on('click', '#trust-add-particu-inpt', function() {
    create_trust_particular();
    update_data_key();
});

var create_trust_particular = () => {
    $('#trust-load-del-btn').append('<button class="btn btn-flat btn-md btn-danger trust-delete_row" data-key="" style="margin-bottom: 5px;"><i class="fa fa-trash"></i></button>');
    $('#trust-load-input-particu').append('<input type="text" class="form-control input-md inpt-partic-trust" data-part_ID="" data-key="" style="margin-bottom: 5px;">');
    $('#trust-load-amount').append('<input disabled class="form-control input-md trust-amount-partic" data-key="" style="margin-bottom: 5px;">');
}

function update_data_key() {
    $.each(['.inpt-partic-trust',
        '.trust-delete_row',
        '.trust-amount-partic'
    ], function(idx, val) {

        $(val).each(function(key) {
            $(this).attr('data-key', key);
        });
    });
}

/** delete row of particulars */
$(document).on('click', '.trust-delete_row', function() {
    $('.inpt-partic-trust[data-key="' + $(this).data('key') + '"]').remove();
    $('.trust-delete_row[data-key="' + $(this).data('key') + '"]').remove();
    $('.trust-amount-partic[data-key="' + $(this).data('key') + '"]').remove();
});

$(document).on('click', '#mix-payment-trust', function() {
    $('#load-mix-payment-trust').modal({ backdrop: 'static' });
    $('#load-mix-payment-trust').modal('show');
    calculate_payable();
});

var Part_value;
var Data_key;

$(document).on('keyup', '.inpt-partic-trust', function(e) {
    if (e.keyCode === 13) {
        Data_key = $(this).data('key');

        $.post({
            url: baseUrl + 'trust_collection/service/trust_collection_service/search_particular',
            data: {
                particular: $('.inpt-partic-trust[data-key="' + Data_key + '"]').val()
            },
            dataType: 'json',
            success: function(e) {
                $('#load-search-particular-trust').modal({ backdrop: 'static' });
                $('#load-search-particular-trust').modal('show');

                $('#load-particular-trust').html('');

                $.each(e.error_message, function(idx, value) {
                    $('#load-particular-trust').append(
                        '<tr> <td><button class="btn btn-flat btn-sm btn-primary click_to_add" data-id="' + value.Particular + '" data-amnt="' + value.Amount + '" data-part_id="' + value.ID + '"><i class="fa fa-plus-square"></i></button></td> <td> <button class="btn btn-sm btn-flat add_by_parent" data-parent="' + value.Parent + '"><b>' + value.Parent + '</b></button> </td> <td>' + value.Particular + '</td> </tr>'
                    );
                });
            }
        });
    }
});

/** add particulars by parents */
$(document).on('click', '.add_by_parent', function() {
    var parent = $(this).data('parent');
    $.post({
        url: baseUrl + 'trust_collection/service/trust_collection_service/search_particular_parent',
        data: {
            Parent: parent
        },
        dataType: 'json',
        success: function(e) {
            if (e.has_error == false) {

                $.each(e.error_message, function(idx, val) {
                    $('#load-search-particular-trust').modal('hide');
                    $('.inpt-partic-trust[data-key="' + idx + '"]').val(val.Particular);
                    $('.trust-amount-partic[data-key="' + idx + '"]').val(val.Amount);
                    $('.inpt-partic-trust[data-key="' + idx + '"]').attr('data-part_ID', val.ID);
                    create_trust_particular();
                    update_data_key();
                });

            } else {
                alert(e.error_message);
            }
        }
    });
});

$(document).on('click', '.click_to_add', function() {
    var Particular_ID = $(this).data('id');
    var Data_amnt = $(this).data('amnt');
    var part_ID = $(this).data('part_id');

    $('#load-search-particular-trust').modal('hide');
    $('.inpt-partic-trust[data-key="' + Data_key + '"]').val(Particular_ID);
    $('.trust-amount-partic[data-key="' + Data_key + '"]').val(Data_amnt);
    $('.inpt-partic-trust[data-key="' + Data_key + '"]').attr('data-part_id', part_ID);
});

$(document).on('click', '#add_form', function() {
    if (particular == null || $('#quantity').val() == '') {
        alert("Please input data");
        document.getElementById('quantity').focus();
        document.getElementById('quantity').style.color = "red";
    } else {
        $.post({
            url: baseUrl + "trust_collection/service/trust_collection_service/save_form_data",
            data: {
                Particular: particular,
                Quantity: $('#quantity').val(),
                Amount: $('#amount').val(),
                Collector: $('#collector_name').val(),
                Collector_ID: col_ID,
                Void: voided,
                Remarks: $('#void_remarks').val()
            },
            dataType: 'json',
            success: function(result) {
                if (result.has_error == false) {
                    load_form();
                    load_summary();
                }
            }
        });
    }
});
$(document).on('click', '.part-delete', function() {
    var i = confirm("Are you sure want to delete?");
    if (i == false) {
        return;
    } else {
        var ID = $(this).data('id');
        $.post({
            url: baseUrl + "trust_collection/service/trust_collection_service/delete_particular",
            data: {
                ID: ID
            },
            dataType: 'json',
            success: function(result) {
                if (result.has_error == false) {
                    load_summary();
                }
            }
        });
    }
});

$(document).on('click', '#t-costumer_pay', function() {
    $('#payment_modal').modal({ backdrop: 'static' });
    $('#payment_modal').modal('show');
    calculate_payable();
});

$(document).on('click', '#f10-t-pay', function() {
    $('#trust-non-cash-modal').modal({ backdrop: 'static' });
    $('#trust-non-cash-modal').modal('show');
    calculate_payable();
});

$(document).on('keyup', function(e) {
    if (e.keyCode == 120) {
        $('#payment_modal').modal({ backdrop: 'static' });
        $('#payment_modal').modal('show');
        calculate_payable();
    }
    /** Non Cash Input */
    if (e.keyCode == 121) {
        $('#trust-non-cash-modal').modal({ backdrop: 'static' });
        $('#trust-non-cash-modal').modal('show');
        calculate_payable();
    }
});

/** costumer payment cash only */
$(document).on('click', '#costumer_payment', function() {

    var particulars = [];
    var gross_amount = 0; 

    $('.inpt-partic-trust').each(function() {
        var obj = {
            particular: $(this).val(),
            amount: $('.trust-amount-partic[data-key="' + $(this).data('key') + '"]').val(),
            Part_ID: $(this).data('part_id')
        };
        particulars.push(obj);
        gross_amount = gross_amount += parseInt($('.trust-amount-partic[data-key="' + $(this).data('key') + '"]').val());
    });

    if ($('#trust_payor_name').val() == '' || particulars == null || $('#trust-cash').val() == '') {
        alert("Please verify the data before proceeding ");
    } else {
        var i = confirm("Payment Confirm?");
        if (i == false) {
            return;
        } else {
            if (gross_amount <= parseInt($('#trust-cash').val())) {
                $.post({
                    url: baseUrl + "trust_collection/service/trust_collection_service/save_all_data",
                    data: {
                        Accountable_form_number: $('#t_or_numbers').val(),
                        Payor: $('#trust_payor_name').val(),
                        Paid_by: $('#trust_paid_by').val(),
                        Address: $('#trust_address').val(),
                        Date_paid: $('#trust_date_paid').val(),
                        Particulars: JSON.stringify(particulars),
                        Amounts: $('#trust-cash').val()
                    },
                    dataType: 'json',
                    success: function(result) {
                        if (result.has_error == false) {
                            var data_print = [];
                            var store = {
                                or_number: or_number,
                                payor: $('#trust_payor_name').val(),
                                address: $('#trust_address').val(),
                                particulars: particulars,
                                date_paid: $('#trust_date_paid').val(),
                                total: $('#trust-cash').val(),
                                bank: null,
                                type: "Cash"
                            }
                            data_print.push(store);
                            var object = JSON.stringify(data_print);

                            load_summary();
                            document.getElementById("trust_payor_name").value = "";
                            $('#trust-non-cash-modal').modal("hide");
                            window.location = baseUrl + "trust_collection/print_receipt?get=" + object;
                        }else{
                            alert(result.error_message);
                        }
                    }
                });
            } else {
                alert("Please input amount greater than total");
            }
        }
    }
});

// non-cash payment of trust collection (Cheque)
$(document).on('click', '#t-cheque_pmnt', function() {
    var bank = $('.bank-optn option:selected').val();
    var particulars = [];
    var gross_amount = 0;
    $('.inpt-partic-trust').each(function() {
        var obj = {
            particular: $(this).val(),
            amount: $('.trust-amount-partic[data-key="' + $(this).data('key') + '"]').val(),
            Part_ID: $(this).data('part_id')
        };
        particulars.push(obj);
        gross_amount = gross_amount += parseInt($('.trust-amount-partic[data-key="' + $(this).data('key') + '"]').val());
    });

    if ($('#trust_payor_name').val() == '' || particulars == null || $('#c-amount').val() == '') {
        alert("Please verify the data before proceeding ");
    } else {
        var i = confirm("Payment Confirm?");
        if (i == false) {
            return;
        } else {
            if (gross_amount <= parseInt($('#c-amount').val())) {
                $.post({
                    url: baseUrl + "general_collection/service/general_collection_service/save_data_with_bank",
                    data: {
                        Accountable_form_number: or_number,
                        Payor: $('#trust_payor_name').val(),
                        Paid_by: $('#trust_paid_by').val(),
                        Address: $('#trust_address').val(),
                        Date_paid: $('#trust_date_paid').val(),
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
                                payor: $('#trust_payor_name').val(),
                                address: $('#trust_address').val(),
                                particulars: particulars,
                                date_paid: $('#trust_date_paid').val(),
                                bank: bank,
                                check_no: $('#check_no').val(),
                                check_date: $('.c-date').val(),
                                check_amount: $('#c-amount').val(),
                                type: "Cheque"
                            }
                            data_print.push(store);
                            var object = JSON.stringify(data_print);

                            load_summary();
                            document.getElementById("trust_payor_name").value = "";
                            $('#payment_modal').modal("hide");
                            window.location = baseUrl + "trust_collection/print_receipt?get=" + object;
                        }
                    }
                });
            } else {
                alert("Please input amount greater than total");
            }
        }
    }
});

// non-cash and cash payment MIXED PAYMENT
$(document).on('click', '#trust-mix-pmnt', function() {
    var bank = $('.mix-bank-optn option:selected').val();
    var particulars = [];
    var gross_amount = 0;

    $('.inpt-partic-trust').each(function() {
        var obj = {
            particular: $(this).val(),
            amount: $('.trust-amount-partic[data-key="' + $(this).data('key') + '"]').val(),
            Part_ID: $(this).data('part_id')
        };
        particulars.push(obj);
        gross_amount = gross_amount += parseInt($('.trust-amount-partic[data-key="' + $(this).data('key') + '"]').val());
    });

    if ($('#trust_payor_name').val() == '' || particulars == null || $('#mix-cash-amount').val() == '') {
        alert("Please verify the data before proceeding ");
    } else {
        var a = confirm("Payment Comfirm?");
        if (a == false) {
            return false;
        } else {
            $.post({
                url: baseUrl + 'trust_collection/service/trust_collection_service/save_data_mix_payment',
                data: {
                    Accountable_form_number: or_number,
                    Payor: $('#trust_payor_name').val(),
                    Paid_by: $('#trust_paid_by').val(),
                    Address: $('#trust_address').val(),
                    Date_paid: $('#trust_date_paid').val(),
                    Particulars: JSON.stringify(particulars),
                    Bank: bank,
                    Che_no: $('#mix-check-no').val(),
                    Che_date: $('#mix-cheque-date').val(),
                    C_amount: $('#mix-cheque-amount').val(),
                    C_cash_amount: $('#mix-cash-amount').val()
                },
                dataType: 'json',
                success: function(e) {
                    if (e.has_error == false) {
                        var data_print = [];
                        var store = {
                            or_number: or_number,
                            payor: $('#trust_payor_name').val(),
                            address: $('#trust_address').val(),
                            particulars: particulars,
                            date_paid: $('#trust_date_paid').val(),
                            bank: bank,
                            check_no: $('#mix-check-no').val(),
                            check_date: $('#mix-cheque-date').val(),
                            check_amount: $('#mix-cheque-amount').val(),
                            type: "Cheque"
                        }
                        data_print.push(store);
                        var object = JSON.stringify(data_print);

                        load_summary();
                        document.getElementById("trust_payor_name").value = "";
                        $('#payment_modal').modal("hide");
                        window.location = baseUrl + "trust_collection/print_receipt?get=" + object;
                    } else {
                        alert(e.error_message);
                    }
                }
            });
        }
    }
});
var total_payable = 0;

function calculate_payable() {
    $('.trust-amount-partic').each(function() {
        total_payable = total_payable + parseFloat($(this).val());
    });

    $('#subtotal').html(total_payable);
    $('.total_pay').html(total_payable);
    $('#total_payable_trust').val(total_payable);
    total_payable = 0;
}

$('.cash-in').on('keyup', function() {
    cash = $('.cash-in').val();
    subtotal = parseInt($('#total_payable_trust').val());
    change = (parseInt(cash) - subtotal);    
    $('#change').html(change);
});