$(document).on('keyup', '.eco_search_payer', function(e) {
    if (e.keyCode === 13) {
        $('#load-search-payer-eco').modal({ backdrop: 'static' });
        $('#load-search-payer-eco').modal('show');
        $.post({
            url: baseUrl + 'general_collection/service/general_collection_service/get_payer_name',
            data: {
                payer_name: $('#eco_payor_name').val()
            },
            dataType: 'json',
            success: function(e) {
                if (e.has_error == false) {
                    Values = e.error_message;
                    $.each(e.error_message, function(key, value) {
                        $('#load-searched-eco').append(
                            '<tr> <td><button class="btn  btn-sm btn-primary add-part-eco" data-id="' + value.ID + '"><i class="fa fa-plus-square"></i></button></td> <td>' + value.Payer + '</td> <td>' + value.Address + '</td> </tr>'
                        );
                    })
                } else {
                    alert(e.error_message);
                }
            }
        });
    }
});

$(document).on('click', '.add-part-eco', function() {
    var ID = $(this).data('id');
    $('#load-search-payer-eco').modal('hide');
    $.each(Values, function(idx, val) {
        if (ID == val.ID) {
            $('.eco_search_payer').val(val.Payer);
            $('.eco_search_paid_by').val(val.Payer);
            $('.eco_search_address').val(val.Address);
        }
    });
});

$(document).on('click', '#eco-add-particu-inpt', function() {
    create_eco_particular();
    update_data_key();
});

var create_eco_particular = () => {
    $('#eco-load-del-btn').append('<button class="btn  btn-md btn-danger eco-delete_row" data-key="" style="margin-bottom: 5px;"><i class="fa fa-trash"></i></button>');
    $('#eco-load-input-particu').append('<input type="text" class="form-control input-md inpt-partic-eco" data-part_ID="" data-key="" style="margin-bottom: 5px;">');
    $('#eco-load-amount').append('<input class="form-control input-md eco-amount-partic" data-key="" style="margin-bottom: 5px;">');
    $('#part-remarks').append('<input class="form-control inpt-remarks input-md " data-key="" style="margin-bottom: 5px;">');
}

function update_data_key() {
    $.each(['.inpt-partic-eco',
        '.eco-delete_row',
        '.eco-amount-partic',
        '.inpt-remarks'
    ], function(idx, val) {

        $(val).each(function(key) {
            $(this).attr('data-key', key);
        });
    });
}

/** delete row of particulars */
$(document).on('click', '.eco-delete_row', function() {
    $('.inpt-partic-eco[data-key="' + $(this).data('key') + '"]').remove();
    $('.eco-delete_row[data-key="' + $(this).data('key') + '"]').remove();
    $('.eco-amount-partic[data-key="' + $(this).data('key') + '"]').remove();
    $('.inpt-remarks[data-key="' + $(this).data('key') + '"]').remove();
});

$(document).on('click', '#mix-payment-eco', function() {
    $('.inpt-partic-eco').each(function() {
        var part =  $(this).data('part_id');
        
       if(part == ""){
          alert("Please do not fillup the field manually. If this is a new particular, please add it first on the FEES AND CHARGES tab.");
          window.reload();
       }
      });
      
    $('#load-mix-payment-eco').modal({ backdrop: 'static' });
    $('#load-mix-payment-eco').modal('show');
    calculate_payable();
});

var Part_value;
var Data_key;

$(document).on('keyup', '.inpt-partic-eco', function(e) {
    if (e.keyCode === 13) {
        Data_key = $(this).data('key');

        $.post({
            url: baseUrl + 'eco_collection/service/eco_collection_service/search_particular',
            data: {
                particular: $('.inpt-partic-eco[data-key="' + Data_key + '"]').val()
            },
            dataType: 'json',
            success: function(e) {
                $('#load-search-particular-eco').modal({ backdrop: 'static' });
                $('#load-search-particular-eco').modal('show');

                $('#load-particular-eco').html('');

                $.each(e.error_message, function(idx, value) {
                    $('#load-particular-eco').append(
                        '<tr> <td><button class="btn  btn-sm btn-primary click_to_add" data-id="' + value.Particular + '" data-amnt="' + value.Amount + '" data-part_id="' + value.ID + '"><i class="fa fa-plus-square"></i></button></td> <td> <button class="btn btn-sm  add_by_parent" data-parent="' + value.Parent + '"><b>' + value.Parent + '</b></button> </td> <td>' + value.Particular + '</td> <td>' + (new Intl.NumberFormat('en-US').format(value.Amount)) + '</td> </tr>'
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
        url: baseUrl + 'eco_collection/service/eco_collection_service/search_particular_parent',
        data: {
            Parent: parent
        },
        dataType: 'json',
        success: function(e) {
            if (e.has_error == false) {

                $.each(e.error_message, function(idx, val) {
                    $('#load-search-particular-eco').modal('hide');
                    $('.inpt-partic-eco[data-key="' + idx + '"]').val(val.Particular);
                    $('.eco-amount-partic[data-key="' + idx + '"]').val(val.Amount);
                    $('.inpt-partic-eco[data-key="' + idx + '"]').attr('data-part_ID', val.ID);
                    create_eco_particular();
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

    $('#load-search-particular-eco').modal('hide');
    $('.inpt-partic-eco[data-key="' + Data_key + '"]').val(Particular_ID);
    $('.eco-amount-partic[data-key="' + Data_key + '"]').val(Data_amnt);
    $('.inpt-partic-eco[data-key="' + Data_key + '"]').attr('data-part_id', part_ID);
});

$(document).on('click', '#add_form', function() {
    if (particular == null || $('#quantity').val() == '') {
        alert("Please input data");
        document.getElementById('quantity').focus();
        document.getElementById('quantity').style.color = "red";
    } else {
        $.post({
            url: baseUrl + "eco_collection/service/eco_collection_service/save_form_data",
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
            url: baseUrl + "eco_collection/service/eco_collection_service/delete_particular",
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
    $('.inpt-partic-eco').each(function() {
        var part =  $(this).data('part_id');
        
       if(part == ""){
          alert("Please do not fillup the field manually. If this is a new particular, please add it first on the FEES AND CHARGES tab.");
          window.reload();
       }
      });

    $('#payment_modal').modal({ backdrop: 'static' });
    $('#payment_modal').modal('show');
    calculate_payable();
});

$(document).on('click', '#f10-t-pay', function() {
    $('.inpt-partic-eco').each(function() {
        var part =  $(this).data('part_id');
        
       if(part == ""){
          alert("Please do not fillup the field manually. If this is a new particular, please add it first on the FEES AND CHARGES tab.");
          window.reload();
       }
      });

    $('#eco-non-cash-modal').modal({ backdrop: 'static' });
    $('#eco-non-cash-modal').modal('show');
    calculate_payable();
});
$('#other-payment').on('click', function() {
    $('.inpt-partic-eco').each(function() {
        var part =  $(this).data('part_id');
        
       if(part == ""){
          alert("Please do not fillup the field manually. If this is a new particular, please add it first on the FEES AND CHARGES tab.");
          window.reload();
       }
      });

    calculate_payable();
    $('#other-payment-modal').modal({ backdrop: 'static' });
    $('#other-payment-modal').modal('show');
});


$(document).on('keyup', function(e) {
    if (e.keyCode == 120) {
        $('#payment_modal').modal({ backdrop: 'static' });
        $('#payment_modal').modal('show');
        calculate_payable();
    }
    /** Non Cash Input */
    if (e.keyCode == 121) {
        $('#eco-non-cash-modal').modal({ backdrop: 'static' });
        $('#eco-non-cash-modal').modal('show');
        calculate_payable();
    }
});

/** costumer payment cash only */
$(document).on('click', '#costumer_payment', function() {

    var particulars = [];
    var gross_amount = 0;

    $('.inpt-partic-eco').each(function() {
        var obj = {
            particular: $(this).val(),
            amount: $('.eco-amount-partic[data-key="' + $(this).data('key') + '"]').val(),
            remarks: $('.inpt-remarks[data-key="' + $(this).data('key') + '"]').val(),
            Part_ID: $(this).data('part_id')
        };
        particulars.push(obj);
        gross_amount = gross_amount += parseInt($('.eco-amount-partic[data-key="' + $(this).data('key') + '"]').val());
    });

    if ($('#eco_payor_name').val() == '' || particulars == null || $('#eco-cash').val() == '') {
        alert("Please verify the data before proceeding ");
    } else {
        var i = confirm("Payment Confirm?");
        if (i == false) {
            return;
        } else {
            if (gross_amount <= parseInt($('#eco-cash').val())) {
                $('#costumer_payment').attr('disabled', true); //YOBHEL ADDED 3-24-23
                $.post({
                    url: baseUrl + "eco_collection/service/eco_collection_service/save_all_data",
                    data: {
                        Accountable_form_number: $('#t_or_numbers').val(),
                        Payor: $('#eco_payor_name').val(),
                        Paid_by: $('#eco_paid_by').val(),
                        Address: $('#eco_address').val(),
                        Date_paid: $('#eco_date_paid').val(),
                        Particulars: JSON.stringify(particulars),
                        Amounts: $('#eco-cash').val()
                    },
                    dataType: 'json',
                    success: function(result) {
                        if (result.has_error == false) {
                            var data_print = [];
                            var store = {
                                or_number: or_number,
                                payor: $('#eco_payor_name').val(),
                                address: $('#eco_address').val(),
                                particulars: particulars,
                                date_paid: $('#eco_date_paid').val(),
                                total: $('#eco-cash').val(),
                                bank: null,
                                type: "Cash"
                            }
                            data_print.push(store);
                            var object = JSON.stringify(data_print);

                            load_summary();
                            document.getElementById("eco_payor_name").value = "";
                            $('#eco-non-cash-modal').modal("hide");
                            window.location = baseUrl + "eco_collection/print_receipt?get=" + object;
                        } else {
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

// non-cash payment of eco collection (Cheque)
$(document).on('click', '#t-cheque_pmnt', function() {
    var bank = $('.bank-optn option:selected').val();
    var particulars = [];
    var gross_amount = 0;
    $('.inpt-partic-eco').each(function() {
        var obj = {
            particular: $(this).val(),
            amount: $('.eco-amount-partic[data-key="' + $(this).data('key') + '"]').val(),
            remarks: $('.inpt-remarks[data-key="' + $(this).data('key') + '"]').val(),
            Part_ID: $(this).data('part_id')
        };
        particulars.push(obj);
        gross_amount = gross_amount += parseInt($('.eco-amount-partic[data-key="' + $(this).data('key') + '"]').val());
    });

    if ($('#eco_payor_name').val() == '' || particulars == null || $('#c-amount').val() == '') {
        alert("Please verify the data before proceeding ");
    } else {
        var i = confirm("Payment Confirm?");
        if (i == false) {
            return;
        } else {
            if (gross_amount <= parseInt($('#c-amount').val())) {
                $('#t-cheque_pmnt').attr('disabled', true); //YOBHEL ADDED 3-24-23
                $.post({
                    url: baseUrl + "general_collection/service/general_collection_service/save_data_with_bank",
                    data: {
                        Accountable_form_number: or_number,
                        Payor: $('#eco_payor_name').val(),
                        Paid_by: $('#eco_paid_by').val(),
                        Address: $('#eco_address').val(),
                        Date_paid: $('#eco_date_paid').val(),
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
                                payor: $('#eco_payor_name').val(),
                                address: $('#eco_address').val(),
                                particulars: particulars,
                                date_paid: $('#eco_date_paid').val(),
                                bank: bank,
                                check_no: $('#check_no').val(),
                                check_date: $('.c-date').val(),
                                check_amount: $('#c-amount').val(),
                                type: "Cheque"
                            }
                            data_print.push(store);
                            var object = JSON.stringify(data_print);

                            load_summary();
                            document.getElementById("eco_payor_name").value = "";
                            $('#payment_modal').modal("hide");
                            window.location = baseUrl + "eco_collection/print_receipt?get=" + object;
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
$(document).on('click', '#eco-mix-pmnt', function() {
    var bank = $('.mix-bank-optn option:selected').val();
    var particulars = [];
    var gross_amount = 0;
    var total_two = 0; //YOBHEL ADDED 3-24-23

    $('.inpt-partic-eco').each(function() {
        var obj = {
            particular: $(this).val(),
            amount: $('.eco-amount-partic[data-key="' + $(this).data('key') + '"]').val(),
            remarks: $('.inpt-remarks[data-key="' + $(this).data('key') + '"]').val(),
            Part_ID: $(this).data('part_id')
        };
        particulars.push(obj);
        gross_amount = gross_amount += parseInt($('.eco-amount-partic[data-key="' + $(this).data('key') + '"]').val());
    });

    total_two = (parseInt($('#mix-cheque-amount').val()) + parseInt($('#mix-cash-amount').val())); //YOBHEL ADDED 3-24-23
    
    if ($('#eco_payor_name').val() == '' || particulars == null || $('#mix-cash-amount').val() == '') {
        alert("Please verify the data before proceeding ");
    } else {
        var a = confirm("Payment Comfirm?");
        if (a == false) {
            return false;
        } else {
            $.post({
                url: baseUrl + 'eco_collection/service/eco_collection_service/save_data_mix_payment',
                data: {
                    Accountable_form_number: or_number,
                    Payor: $('#eco_payor_name').val(),
                    Paid_by: $('#eco_paid_by').val(),
                    Address: $('#eco_address').val(),
                    Date_paid: $('#eco_date_paid').val(),
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
                            payor: $('#eco_payor_name').val(),
                            address: $('#eco_address').val(),
                            particulars: particulars,
                            date_paid: $('#eco_date_paid').val(),
                            bank: bank,
                            check_no: $('#mix-check-no').val(),
                            check_date: $('#mix-cheque-date').val(),
                            check_amount: $('#mix-cheque-amount').val(),
                            type: "Cheque"
                        }
                        data_print.push(store);
                        var object = JSON.stringify(data_print);

                        load_summary();
                        document.getElementById("eco_payor_name").value = "";
                        $('#payment_modal').modal("hide");
                        window.location = baseUrl + "eco_collection/print_receipt?get=" + object;
                    } else {
                        alert(e.error_message);
                    }
                }
            });
        }
    }
});
/** for other payment method */
$(document).on('click', '#other-payment-pay', function() {
    var particulars = [];
    var total_gross = 0;

    $('.inpt-partic-eco').each(function() {
        var obj = {
            particular: $(this).val(),
            amount: $('.eco-amount-partic[data-key="' + $(this).data('key') + '"]').val(),
            remarks: $('.inpt-remarks[data-key="' + $(this).data('key') + '"]').val(),
            Part_ID: $(this).data('part_id')
        };
        particulars.push(obj);
        total_gross = total_gross += parseInt($('.eco-amount-partic[data-key="' + $(this).data('key') + '"]').val());
    });
    
    if ($('#eco_payor_name').val() == '' || particulars == null || $('#total_payable_gen').val() == '0') {
        alert("Please verify the data before proceeding :)");
    } else {
        var i = confirm("Payment Confirm?");
        if (i == false) {
            return;
        } else {
            if (total_gross <= parseInt($('#other-payment-amount').val())) {
                $.post({
                    url: baseUrl + "eco_collection/service/eco_collection_service/save_all_data",
                    data: {
                        Accountable_form_number: $('#t_or_numbers').val(),
                        Payor: $('#eco_payor_name').val(),
                        Paid_by: $('#eco_paid_by').val(),
                        Address: $('#eco_address').val(),
                        Date_paid: $('#eco_date_paid').val(),
                        Particulars: JSON.stringify(particulars),
                        Amounts: $('#total_payable_gen').val(),
                        Cash: $('#other-payment-amount').val(),
                        Other_remarks: $('#other-remarks').val()
                    },
                    dataType: 'json',
                    success: function(result) {
                        if (result.has_error == false) {
                            if (result.has_error == false) {
                                var data_print = [];
                                var store = {
                                    or_number: or_number,
                                    payor: $('#eco_payor_name').val(),
                                    address: $('#eco_address').val(),
                                    particulars: particulars,
                                    date_paid: $('#eco_date_paid').val(),
                                    total: $('#total_payable_gen').val(),
                                    bank: null,
                                }
                                data_print.push(store);
                                var object = JSON.stringify(data_print);

                                load_summary();
                                document.getElementById("eco_payor_name").value = "";
                                $('#payment_modal').modal("hide");
                                window.location = baseUrl + "eco_collection/print_receipt?get=" + object;
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
var total_payable = 0;

function calculate_payable() {
    $('.eco-amount-partic').each(function() {
        total_payable = total_payable + parseFloat($(this).val());
    });

    $('#subtotal').html(total_payable.toLocaleString("en-US"));
    $('.total_pay').html(total_payable.toFixed(2));
    $('#total_payable_eco').val(total_payable.toFixed(2));
    total_payable = 0;
}

$('.cash-in').on('keyup', function() {
    cash = $('.cash-in').val();
    subtotal = parseInt($('#total_payable_eco').val());
    change = (parseInt(cash) - subtotal);
    $('#change').html(change);
});