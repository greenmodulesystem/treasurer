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

/*-------------------------------------------------SAVE & PRINT BUTTON---------------------------------------------------------
------------------------------------------------From load_receipt_layout-------------------------------------------------------*/
$(document).on('click', '#print', function() {

    var data = [];
    $('.single-entry').each(function(index, value) {                                
        data.push($(value).data('field') + ':' + $(value).val());   
        
    });
    $('.single-entry-text').each(function(index, value) {                                
        data.push($(value).data('field') + ':' + $(value).text());   
        
    });

    var line_data = [];
    $('.line-data').each(function(index, value) { 
        line_data.push($(value).data('field') + ':' + $(value).text());
    });
    console.info(data);
    // window.print(); 
    // window.onafterprint = back;

    $.post({
        url: baseUrl + "rpt_collection/service/rpt_collection_services/save_all_data",
        data: {
            Collector: $('#collector_name').val(),
            Collector_ID: col_ID,
            Payor:  $('#search_taxpayer').find('option:selected').text(),
            line_data : JSON.stringify(line_data),
            data      : JSON.stringify(data),
           
            
        },
        dataType: 'json',
        success: function(result){
            if (result.has_error == false) {
                alert(result.error_message);
                window.print(); 

                 setTimeout(()=> {
                    window.location.reload(true);
                },3000);
            }else {
                alert(result.error_message);
            }
        }
    });
    

    
})





/*------------------------------------------number to words conversion----------------------------------------------------*/
var a = ['','one ','two ','three ','four ', 'five ','six ','seven ','eight ','nine ','ten ','eleven ','twelve ','thirteen ','fourteen ','fifteen ','sixteen ','seventeen ','eighteen ','nineteen '];
var b = ['', '', 'twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];


function inWords (num) {
    if ((num = num.toString()).length > 9) return 'overflow';
    n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
    if (!n) return; var str = '';
    str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'million ' : '';
    str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'hundred thousand ' : '';
    str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'thousand ' : '';
    str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'hundred ' : '';
    str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + ' ' : '';
    return str;
}




