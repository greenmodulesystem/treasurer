$(document).ready(function(){
    load_particular_details();
});

/** clicked to void OR */
$('#void_payor').on('click', function() {
    $.post({
        url: baseUrl + "void_receipt/services/void_receipt_service/void_applicant_receipt",
        data: {
            ID: ID,
            Remarks: $('#void_data').val()
        },
        dataType: 'json',
        success: function(result) {
            if (result.has_error === false) {
                window.location = baseUrl + "void_receipt";
            }
        }
    });
});

/** udpate of OR number */
$(document).on('click', '.update-or', function(){
    var ID = $(this).data('id');
    var PDate = $(this).data('date');
    var OR = $(this).data('or');
    window.location = baseUrl + "void_receipt/view_update?token=" + ID + "&OR=" + OR;
   
});

/** load particulars of searched OR number */
var load_particular_details = () => {
   
    $(document).gmLoadPage({
        url: baseUrl + 'void_receipt/laod_particulars/' + $('#or-number').val(),            
        load_on: '#load-particular-or',
        
    });
   
}

/** clicked to edit or number */
$(document).on('click', '#edit-or-number', function(){
    // alert('update or here');

    $("#editable-payer").css("display","block");
    $("#readonly-payer").css("display","none");

    $("#editable-paidby").css("display","block");
    $("#readonly-paidby").css("display","none");

    $(".editable-amount").css("display","block");
    $(".readonly-amount").css("display","none");

    $(".editable-remarks").css("display","block");
    $(".readonly-remarks").css("display","none");

    $("#update-or-details").css("display","inline-block");
    $("#reprint").css("display","none");
    $("#edit-or-number").attr("disabled","disabled");

    $('.edit-part').css("display","inline-block");

});

$(document).on('change', '#editable-payer', function(){
    var copyPayer = $(this).val();
    $("#editable-paidby").val(copyPayer);
});
$(document).on('change', '.editable-amount', function(){
    var total = 0;
   
    $('.editable-amount').each(function(){
      
        total = total + parseInt($(this).val());
    });
   
    $("#total-amt").text(total);
});

$(document).on('click', '#update-or-details', function(){
    var partPaid_ID = [];
    var pname = []
    var amount = [];
    var remarks = [];
    var particulars = [];
    var x = [];
   
 

    $('.pPaid_ID').each(function(){
        partPaid_ID.push($(this).text());
    });
    $('.editable-amount').each(function(){
        amount.push($(this).val());
    });

    $('.editable-remarks').each(function(){
        remarks.push($(this).val());
    });
    $('.pname_2').each(function(){
        pname.push($(this).val());
    });
   
   
    $('.pname').each(function(i) {
        
        var obj = {
            particular: pname[i],
            amount: amount[i],
            remarks: remarks[i],
        };
        particulars.push(obj);
        
    });
    
    console.log(particulars);

    var a = confirm('Are you sure to save?');
    if (a == false) {
        return false;
    } else {
        $.post({
            url: baseUrl + "void_receipt/services/void_receipt_service/update_or",
            data: {

                or_number: $('#or-number').val(),
                payer: $('#editable-payer').val(),
                paidby: $('#editable-paidby').val(),
                date_paid:  $('#date_paid').val(),
                partPaid_ID :  partPaid_ID,
                amount : amount,
                remarks : remarks

            },
            dataType: 'json',
            success: function(result) {
                if (result.has_error == false) {
                    alert(result.error_message); 
                    
                    // setTimeout(()=> {
                    //     window.location.reload(true);
                    // },1000);

                    var data_print = [];
                    var cash = {
                        or_number: $('#or-number').val(),
                        payor: $('#editable-payer').val(),
                        address: $('#address').val(),
                        particulars: particulars,
                        date_paid: $('#date_paid').val(),
                        total: $('#total_payable_gen').val(),
                        bank: null,
                        type: "Cash"
                    };
                    var cheque = {

                        or_number: $('#or-number').val(),
                        payor: $('#editable-payer').val(),
                        address: $('#address').val(),
                        date_paid: $('#date_paid').val(),
                        bank: $('#bank').val(),
                        check_no: $('#check_no').val(),
                        check_date: $('#c-date').val(),
                        check_amount: $('#c-amount').val(),
                        type: "Cheque",
                        particulars: particulars,
                    };
                    var ifcheque = $('#cheque').val();

                    if(ifcheque == 1){
                        data_print.push(cheque);
                    }else{
                        data_print.push(cash);
                    }
                    // console.log(cheque);
                    var object = JSON.stringify(data_print);
                 
                    // loadGrid();
                    // document.getElementById("payor_name").value = "";
                    window.location = baseUrl + "void_receipt/print_receipt?get=" + object;
                } else {
                    alert(result.error_message);
                }
            }
        });
    }
});

$(document).on('click', '#reprint', function(){
    var partPaid_ID = [];
    var pname = []
    var amount = [];
    var remarks = [];
    var particulars = [];
    var x = [];
   
 

    $('.pPaid_ID').each(function(){
        partPaid_ID.push($(this).text());
    });
    $('.editable-amount').each(function(){
        amount.push($(this).val());
    });

    $('.editable-remarks').each(function(){
        remarks.push($(this).val());
    });
    $('.pname_2').each(function(){
        pname.push($(this).val());
    });
   
   
    $('.pname').each(function(i) {
        
        var obj = {
            particular: pname[i],
            amount: amount[i],
            remarks: remarks[i],
        };
        particulars.push(obj);
        
    });
    
    console.log(particulars);

    var data_print = [];
    var cash = {
        or_number: $('#or-number').val(),
        payor: $('#editable-payer').val(),
        address: $('#address').val(),
        particulars: particulars,
        date_paid: $('#date_paid').val(),
        total: $('#total_payable_gen').val(),
        bank: null,
        type: "Cash"
    };
    var cheque = {

        or_number: $('#or-number').val(),
        payor: $('#editable-payer').val(),
        address: $('#address').val(),
        date_paid: $('#date_paid').val(),
        bank: $('#bank').val(),
        check_no: $('#check_no').val(),
        check_date: $('#c-date').val(),
        check_amount: $('#c-amount').val(),
        type: "Cheque",
        particulars: particulars,
    };
    var ifcheque = $('#cheque').val();

    if(ifcheque == 1){
        data_print.push(cheque);
    }else{
        data_print.push(cash);
    }
    // console.log(cheque);
    var object = JSON.stringify(data_print);
 
    // loadGrid();
    // document.getElementById("payor_name").value = "";
    window.location = baseUrl + "void_receipt/print_receipt?get=" + object;
});