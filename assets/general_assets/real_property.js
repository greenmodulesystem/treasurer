$(document).on('click', '#open', function() {
    $('#myModal').modal({ backdrop: 'static' });
    $.post({
        url: baseUrl + "rpt_collection/service/rpt_collection_services/get_payer_data",
        data: {
            Tax_Payer_ID: $(this).data('id')
        },
        datatype: 'json',
        success: function(result) {
            var obj = JSON.parse(result);
            $.post({
                url: baseUrl + "rpt_collection/load_modal_data",
                data: {
                    Data: obj
                },
                success: function(response) {
                    $('#myModal').modal('show');
                    $('#toDisplay').html(response);
                }
            });
        }
    });
});

$('#search').keyup(function(e) {
    if (e.keyCode == 13) {
        $(document).gmSearch({
            url: baseUrl + "rpt_collection/service/rpt_collection_services/search_data",
            search: "#search",
            load_on: "#display"
        });
    }
});

$('#btn-search').gmSearch({
    url: baseUrl + "rpt_collection/service/rpt_collection_services/search_data",
    search: "#search",
    load_on: "#display"
});

var Subtotal = 0;
var Subtotal_sef = 0;
var check_payable = 0;
$(document).on('click', '.check_year', function() {
    Subtotal = 0;
    Subtotal_sef = 0;
    var Total = 0;
    $('.check_year').each(function() {
        if ($(this).is(":checked")) {
            Subtotal += $(this).data('id');
        }
    });
    $('.check_year').each(function() {
        if ($(this).is(":checked")) {
            Subtotal_sef += $(this).data('sef');
        }
    });
    Total = (Subtotal + Subtotal_sef);
    $('#subtotal').html(Total.toLocaleString());
    check_payable = Total;

});

$(document).on('click', '.pay_rpt', function() {
    var subtotal_pay = 0;
    var Subtotal_sef = 0;
    var total_pay = 0;
    $('.check_year').each(function() {
        if ($(this).is(":checked")) {
            subtotal_pay += $(this).data('id');
        }
    });
    $('.check_year').each(function() {
        if ($(this).is(":checked")) {
            Subtotal_sef += $(this).data('sef');
        }
    });
    total_pay = (subtotal_pay + Subtotal_sef);
    var Lot_IDS = [];
    $('.check_year').each(function() {
        if ($(this).is(":checked")) {
            Lot_IDS.push($(this).data('lot_id'));
        }
    });
    var i = confirm("Confirm Payment?");
    if (i == false) {
        return;
    } else {
        $.post({
            url: baseUrl + "rpt_collection/service/rpt_collection_services/save_payment",
            data: {
                Data: $('#amount_payable').val(),
                Tax_Payer_ID: $('#tax_id').val(),
                Lot_ID: $('#lot_id').val(),
                Tax_dec_nos: Lot_IDS,
                OR_number: $('#or_number_rpt').val()
            },
            dataType: 'json',
            success: function(result) {
                if (result.has_error == false) {
                    window.location = baseUrl + "rpt_collection/receipt_print?get=" + Lot_IDS[0];
                }
            }
        });
    }
});

$(document).on('click', '#rpt-cheque-pmnt', function() {
    var subtotal_pay = 0;
    var Subtotal_sef = 0;
    var total_pay = 0;

    var bank = $('.bank-optn option:selected').val();
    $('.check_year').each(function() {
        if ($(this).is(":checked")) {
            subtotal_pay += $(this).data('id');
        }
    });
    $('.check_year').each(function() {
        if ($(this).is(":checked")) {
            Subtotal_sef += $(this).data('sef');
        }
    });
    total_pay = (subtotal_pay + Subtotal_sef);
    var Lot_IDS = [];
    $('.check_year').each(function() {
        if ($(this).is(":checked")) {
            Lot_IDS.push($(this).data('lot_id'));
        }
    });

    var i = confirm("Confirm Payment?");
    if (i == false) {
        return;
    } else {
        $.post({
            url: baseUrl + "rpt_collection/service/rpt_collection_services/save_with_cheque",
            data: {
                Amount: $('#c-amount').val(),
                Tax_Payer_ID: $('#tax_id').val(),
                Lot_ID: $('#lot_id').val(),
                Tax_dec_nos: Lot_IDS,
                OR_number: $('#or_number_rpt').val(),
                Bank: bank,
                Check_no: $('#rpt-check_no').val(),
                Check_date: $('.c-date').val()
            },
            dataType: 'json',
            success: function(result) {
                if (result.has_error == false) {
                    window.location = baseUrl + "rpt_collection/receipt_print?get=" + Lot_IDS[0];
                }
            }
        });
    }
});

$(document).on('keyup', function(e) {
    if (check_payable != 0) {
        if (e.keyCode == 120) {
            $('#total_payable').html(check_payable);
            $('#myModal').modal('hide');
            $('#modal_payment').modal({ backdrop: 'static' });
            $('#modal_payment').modal('show');
        }
        // Non Cash Input
        if (e.keyCode == 121) {
            $('#total_payable').html(check_payable);
            $('#myModal').modal('hide');
            $('#modal_payment').modal({ backdrop: 'static' });
            $('#modal_payment').modal('show');
        }
    }
});

$(document).on('click', '#f-cash', function() {
    $('#total_payable').html(check_payable);
    $('#myModal').modal('hide');
    $('#modal_payment').modal({ backdrop: 'static' });
    $('#modal_payment').modal('show');
});

$(document).on('click', '#f-non-cash', function() {
    $('.total_pay').html(check_payable);
    $('#total_payable').html(check_payable);
    $('#myModal').modal('hide');
    $('#rpt-non-cash').modal({ backdrop: 'static' });
    $('#rpt-non-cash').modal('show');
});