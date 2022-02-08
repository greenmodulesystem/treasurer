$(document).on('click', '.save_print', function() {
    var i = confirm('Print and Save?');
    if (i == false) {
        return;
    } else {
        var Data = [];

        $.each(gen_data, function(key, value) {
            var storage = {
                ID: value.ID,
                accountable_number: value.Accountable_form_number,
                date_now: value.Date_created
            };
            Data.push(storage);
        });

        // $.each(trust_data, function(indx, val) {
        //     var trust = {
        //         ID: val.ID,
        //         accountable_number: val.Accountable_form_number,
        //         date_now: val.Date_paid
        //     };
        //     Data.push(trust);
        // });

        $.post({
            url: baseUrl + "reports/service/reports_service/update_remitted",
            data: {
                data: JSON.stringify(Data)
            },
            dataType: 'json',
            success: function(result) {
                if (result.has_error === false) {
                    alert(result.error_message);
                    // window.location = baseUrl + "reports";
                }
            }
        });
    }
});
