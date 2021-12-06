$(document).on('click', '#save-data', function() {
    $.post({
        url: baseUrl + 'add-payer/service/add-payer-service/save',
        data: {
            Name: $('#name').val(),
            Address: $('#address').val()
        },
        dataType: 'json',
        success: function(e) {
            if (e.has_error == false) {
                alert(e.error_message);
                window.location = baseUrl + 'add-payer';
            } else {
                alert(e.error_message);
            }
        }
    });
});