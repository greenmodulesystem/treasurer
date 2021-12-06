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