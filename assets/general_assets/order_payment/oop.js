/** function to load all order of payments */
var load_order_payment = () => {
    $(document).gmLoadPage({
        url: baseUrl + 'order_of_payment/load_order_payments',
        load_on: '#load-order-of-payments'
    });
}

/** load paid order of payments */
var load_paid_oop = () => {
    $(document).gmLoadPage({
        url: baseUrl + 'order_of_payment/load_paid_oop',
        load_on: '#load-paid-oop'
    });
}

/** load all particulars of a client */
var load_particular_details = () => {
    $(document).gmLoadPage({
        url: baseUrl + 'order_of_payment/display_particulars_details/' + $('#oop-ID').val() ,
        load_on: '#load-particular-details'
    });
}

/** load all particulars of a client */
var load_paid_particulars = () => {
    $(document).gmLoadPage({
        url: baseUrl + 'order_of_payment/load_paid_particulars/' + $('#oop-ID').val(),
        load_on: '#load-paid-particular'
    });
}

$(document).ready(function() {
    load_paid_oop();
    load_order_payment();
    load_paid_particulars();
    load_particular_details();
});

/** open details of order of payment */
$(document).on('click', '.open-order', function() {
    window.location = baseUrl + "order_of_payment/open_order?token=" + $(this).data('token');
});

/** open details of paud order of payment */
$(document).on('click', '.open-paid-oop', function() {
    window.location = baseUrl + "order_of_payment/open_paid_details?token=" + $(this).data('token');
});

/** click to search */
$(document).on('click', '#btn-search', function() {
    $(document).gmSearch({
        url: baseUrl + 'order_of_payment/load_order_payments',
        search: "#search-val",
        load_on: "#load-order-of-payments"
    });
});

/** click to enable buttons ang inputs to edit data */
$(document).on('click', '#edit-button', function() {
    $(this).prop('disabled', true);
    $('#save-edit-button').prop('disabled', false);
    $('.btn-to-edit').prop('disabled', false);
    $('.inpt-partic').prop('disabled', false);
    $('.amount-partic').prop('disabled', false);
    $('#cancel-button').prop('disabled', false);
    $('#add-to-edit').prop('disabled', false);
});

/** click to cancel updating of data ang disabled buttons and inputs */
$(document).on('click', '#cancel-button', function() {
    $('#save-edit-button').prop('disabled', true);
    $('#edit-button').prop('disabled', false);
    $('.btn-to-edit').prop('disabled', true);
    $('.inpt-partic').prop('disabled', true);
    $('.amount-partic').prop('disabled', true);
    $('#cancel-button').prop('disabled', true);
    $('#add-to-edit').prop('disabled', true);
});
$(document).on('click', '#save-edit-button', function() {
    
});


/** click to add input fields in particular */
$(document).on('click', '#add-to-edit', function() {
    create_input_particular();
    update_data_key();
});

/** create input form for particular */
var create_input_particular = function() {
        $('#load-particular-details').append(
            '<tr><td><button class="btn  btn-sm btn-danger delete_row" data-key="" style="margin-bottom: 5px;"><i class="fa fa-trash"></i> </button></td> <td><input type="text" class="form-control input-sm inpt-partic" data-part_ID="" data-key="" style="margin-bottom: 5px;"></td><td><input disabled class="form-control input-sm amount-partic" data-key="" style="margin-bottom: 5px;"></td></tr>'
        );
    }
    /** delete input form particular */
$(document).on('click', '.delete_row', function() {
    $('.inpt-partic[data-key="' + $(this).data('key') + '"]').remove();
    $('.delete_row[data-key="' + $(this).data('key') + '"]').remove();
    $('.amount-partic[data-key="' + $(this).data('key') + '"]').remove();
});

function update_data_key() {
    $.each(['.inpt-partic',
        '.delete_row',
        '.amount-partic'
    ], function(idx, val) {

        $(val).each(function(key) {
            $(this).attr('data-key', key);
        });
    });
}

/** click to search particular */
$(document).on('keyup', '.inpt-partic', function(e) {
    if (e.keyCode === 13) {
        Data_key = $(this).data('key');

        $.post({
            url: baseUrl + 'order_of_payment/services/order_of_payment_services/search_particular',
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
                            '<tr> <td><button class="btn  btn-sm btn-primary click_to_add" data-id="' + value.Particular + '" data-amnt="' + value.Amount + '" data-part_id="' + value.ID + '"><i class="fa fa-plus-square"></i></button></td> <td> <button class="btn btn-sm  add_by_parent" data-parent="' + value.Parent + '"><b>' + value.Parent + '</b></button> </td> <td>' + value.Particular + '</td> </tr>'
                        );
                    });
                } else {
                    alert(e.error_message);
                }
            }
        });
    }
});

/** click to add particular in tne lists */
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


/** check if accountable form 51 is divided into two (general fund ang trust fund) */
$(document).on('click', '.btn-form-option', function() {
    let Origin = $(this).data('origin');
    OriginOR = Origin;
    let OR_for = $(this).data('orfor');
    let OR_type = $(this).data('ortype');
    var Particulars = [];
    var total_gross = 0;

    $('.inpt-partic').each(function() {
        var obj = {
            Particulars: $(this).val(),
            amount: $('.amount-partic[data-key="' + $(this).data('key') + '"]').val(),
            Part_ID: $(this).data('part_id')
        };
        // Particulars.push(obj);
        total_gross = total_gross += parseInt($('.amount-partic[data-key="' + $(this).data('key') + '"]').val());
    });

   

    if (OR_type == 'Accountable Form #51') {
        $('#load-51-btn').append(
            '<div class="col-xs-12 col-md-6"> <button class="btn  btn-lg btn-success btn-form-option" style="width:100%" data-origin="51" data-orfor="General"> GENERAL COLLECTION </button> </div>' +
            '<div class="col-xs-12 col-md-6"> <button class="btn  btn-lg btn-success btn-form-option" style="width:100%" data-origin="51" data-orfor="Trust"> TRUST COLLECTION </button> </div>' +
            '<div class="col-xs-12 col-md-6"> <button class="btn  btn-lg btn-success btn-form-option" style="width:100%" data-origin="51" data-orfor="Port"> PORT COLLECTION </button> </div>' +
            '<div class="col-xs-12 col-md-6"> <button class="btn  btn-lg btn-success btn-form-option" style="width:100%" data-origin="51" data-orfor="ECO"> ECO/ENT COLLECTION </button> </div>'
        );
    } else {
        $.post({

            url: baseUrl + 'order_of_payment/services/order_of_payment_services/get_form_number',
            data: {
                Origin: Origin,
                OR_for: OR_for,
                Particulars: Particulars,
                totalGross: total_gross
            },
            dataType: 'json',
            success: function(e) {
                if (e.has_error == false) {
                    // alert("SUCCESS");
                    $('#options-modal').modal('hide');
                    $('#form-type').html(e.message.OR_Type);
                    $('#or-for').html(OR_for);
                    document.getElementById('or-number').value = e.message.Accountable_form_number;
                    document.getElementById('o-r-number').value = e.message.Accountable_form_number;
                    $('#total-amount').html(total_gross);
                    document.getElementById('for-payment').style.display = "block";
                } else {
                    // alert("FAIL");
                    alert(e.error_message);
                }
            }
        });
    }
});

/** save payment in cash */
$(document).on('click', '#incash-payment', function() {
    var particulars = [];
    var total_gross = 0;
    var payor = $('#first-name').val() + ' ' + $('#last-name').val();
    var orfor = $('#or-for').text(); 

    $('.inpt-partic').each(function() {
        var obj = {
            particular: $(this).val(),
            amount: $('.amount-partic[data-key="' + $(this).data('key') + '"]').val(),
            Part_ID: $(this).data('part_id')
        };
        particulars.push(obj);
        total_gross = total_gross += parseInt($('.amount-partic[data-key="' + $(this).data('key') + '"]').val());
    });
    console.log(particulars);
    var i = confirm("Confirm payment for a total of Php. " + total_gross);
    if (i == false) {
        return;
    } else {
        $.post({
            url: baseUrl + "order_of_payment/services/order_of_payment_services/save_payment_cash",
            data: {
                oopID: $('#oopID').val(),
                token: $('#token').val(),
                OriginOR: OriginOR,
                orNumber: $('#or-number').val(),
                Lastname: $('#last-name').val(),
                Firstname: $('#first-name').val(),
                Middlename: $('#middle-name').val(),
                Address: $('#address').val(),
                Paidby: $('#paid-by').val(),
                compName: $('#comp-name').val(),
                Particular: JSON.stringify(particulars),
                date_paid: $('#date_paid').val(),
                total: total_gross,
                type: "Cash"
            },
            dataType: 'json',
            success: function(result) {
                if (result.has_error == false) {
                    if (result.has_error == false) {
                        var data_print = [];
                        var store = {
                            or_number: $('#or-number').val(),
                            payor: payor,
                            address: $('#address').val(),
                            particulars: particulars,
                            date_paid: $('#date_paid').val(),
                            // total: $('#total_payable_gen').val(),
                            bank: null,
                            type: "Cash",

                            

                        }
                        data_print.push(store);
                        var object = JSON.stringify(data_print);

                        // loadGrid();
                        // document.getElementById("payor_name").value = "";
                        // $('#payment_modal').modal("hide");
                        if(orfor == 'General'){
                            window.location = baseUrl + "general_collection/print_receipt?get=" + object;
                        } else if(orfor == 'Trust')
                        {
                            window.location = baseUrl + "trust_collection/print_receipt?get=" + object;
                        } else if(orfor == 'Port')
                        {
                            window.location = baseUrl + "port_collection/print_receipt?get=" + object;
                        } else if(orfor == 'ECO')
                        {
                            window.location = baseUrl + "eco_collection/print_receipt?get=" + object;
                        }
                       
                    } else {
                        alert(result.error_message);
                    }
                } else {
                    alert(result.error_message);
                }
            }
        });
    }
});


$('#cheque-payment').on('click', function() {
    calculate_payable();
    $('#non-cash-modal').modal({ backdrop: 'static' });
    $('#non-cash-modal').modal('show');
});

/** save payment in cheque */
$(document).on('click', '#incheque-payment', function() {
    var bank = $('.bank-optn option:selected').val();
    var particulars = [];
    var total_gross = 0;
    var payor = $('#first-name').val() + ' ' + $('#last-name').val();
    var orfor = $('#or-for').text(); 

    $('.inpt-partic').each(function() {
        var obj = {
            particular: $(this).val(),
            amount: $('.amount-partic[data-key="' + $(this).data('key') + '"]').val(),
            Part_ID: $(this).data('part_id')
        };
        particulars.push(obj);
        total_gross = total_gross += parseInt($('.amount-partic[data-key="' + $(this).data('key') + '"]').val());
    });

    var i = confirm("Confirm payment for a total of Php. " + total_gross);
    if (i == false) {
        return;
    } else {
        $.post({
            url: baseUrl + "order_of_payment/services/order_of_payment_services/save_payment_cash",
            data: {
                oopID: $('#oopID').val(),
                token: $('#token').val(),
                OriginOR: OriginOR,
                orNumber: $('#or-number').val(),
                Lastname: $('#last-name').val(),
                Firstname: $('#first-name').val(),
                Middlename: $('#middle-name').val(),
                Address: $('#address').val(),
                Paidby: $('#paid-by').val(),
                compName: $('#comp-name').val(),
                Particular: JSON.stringify(particulars),
                date_paid: $('#date_paid').val(),
                total: total_gross,
                Bank: bank,
                Che_no: $('#check_no').val(),
                Che_date: $('.c-date').val(),
                C_amount: $('#c-amount').val()
            },
            dataType: 'json',
            success: function(result) {
                if (result.has_error == false) {
                    if (result.has_error == false) {
                        var data_print = [];
                        var store = {
                            or_number: $('#or-number').val(),
                            payor: payor,
                            address: $('#address').val(),
                            particulars: particulars,
                            date_paid: $('#date_paid').val(),
                            bank: bank,
                            check_no: $('#check_no').val(),
                            check_date: $('.c-date').val(),
                            check_amount: $('#c-amount').val(),
                            type: "Cheque"
                        }
                        data_print.push(store);
                        var object = JSON.stringify(data_print);

                        // loadGrid();
                        // document.getElementById("payor_name").value = "";
                        // $('#payment_modal').modal("hide");
                        if(orfor == 'General'){
                            window.location = baseUrl + "general_collection/print_receipt?get=" + object;
                        } else if(orfor == 'Trust')
                        {
                            window.location = baseUrl + "trust_collection/print_receipt?get=" + object;
                        } else if(orfor == 'Port')
                        {
                            window.location = baseUrl + "port_collection/print_receipt?get=" + object;
                        } else if(orfor == 'ECO')
                        {
                            window.location = baseUrl + "eco_collection/print_receipt?get=" + object;
                        }
                       
                    } else {
                        alert(result.error_message);
                    }
                } else {
                    alert(result.error_message);
                }
            }
        });
    }
});

var total_payable = 0;
function calculate_payable() {
    $('.amount-partic').each(function() {
        total_payable = total_payable + parseFloat($(this).val());
    });

    $('#subtotal').html(total_payable.toLocaleString("en-US"));
    $('.total_pay').html(total_payable.toFixed(2));
    $('#total_payable_gen').val(total_payable.toFixed(2));
    total_payable = 0;
}