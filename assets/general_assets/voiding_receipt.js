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
    window.location = baseUrl + "void_receipt/view_update?token=" + ID + "&date=" + PDate;
});

/** load particulars of searched OR number */
var load_particular_details = () => {
    $(document).gmLoadPage({
        url: baseUrl + 'void_receipt/laod_particulars/' + $('#or-number').val(),            
        load_on: '#load-particular-or'
    });
}

/** clicked to edit or number */
$(document).on('click', '#edit-or-number', function(){
    alert('update or here');
});