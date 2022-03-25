$(document).ready(function() {
    document.getElementById("remit-collection").disabled = true;
});

$(document).on('click', '#printing', function() {
    $('#print-abstract').printThis();
    document.getElementById("remit-collection").disabled = false;
});

/** remit collection */
$(document).on('click', '#remit-collection', function() {
    var confirmation = confirm('Are you sure to remit your collection?');
    if (confirmation == false) {
        return false;
    } else {
        $.post({
            url: baseUrl + 'reports/service/reports_service/remit_collection',
            data: {
                Data: Data
            },
            dataType: 'json',
            success: function(e) {
                if (e.has_error == false) {
                    alert(e.error_message);
                    window.location = baseUrl + "reports";
                } else {
                    alert(e.error_message);
                }
            }
        });
    }
});