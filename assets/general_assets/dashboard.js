$(document).ready(function() {
    $('.save').on('click', function() {
        var key = $(this).data('id');
        var or_for = $('select[name="' + key + '"] option:selected').val();
        if (or_for != '') {
            $.post({
                url: baseUrl + "dashboard/service/dashboard_service/update_or_for",
                data: {
                    ID: key,
                    OR_for: or_for
                },
                dataType: 'json',
                success: function(result) {
                    if (result.has_error == false) {
                        window.location = baseUrl + "dashboard";
                    } else {
                        alert(result.error_message);
                    }
                }
            });
        } else {
            alert("Select OR For");
        }
    });

    $('.cancel_form').on('click', function() {
        var key = $(this).data('id');
        var origin = $(this).data('origin');
        $.post({
            url: baseUrl + "dashboard/service/dashboard_service/cancel_form",
            data: {
                ID:     key,
                origin: origin
            },
            dataType: 'json',
            success: function(response) {
                if (response.has_error === false) {
                    window.location = baseUrl + "dashboard";
                } else {
                    alert(response.error_message);
                }
            }
        });
    });
});