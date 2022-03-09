$(document).ready(function () {
    document.getElementById("save_print").disabled = true;
})

/** save remit collection */
$(document).on('click', '#save_print', function () {
    var i = confirm('Are you done printing the ABSTRACT?');
    if (i == false) {
        return;
    } else {
        var confirmation = confirm('Are you sure to remit this collection?');

        if (confirmation == false) {
            return;
        } else {
            var Data = [];

            $.each(gen_data, function (key, value) {
                var storage = {
                    ID: value.ID,
                    accountable_number: value.Accountable_form_number,
                    date_now: value.Date_created
                };
                Data.push(storage);
            })

            $.post({
                url: baseUrl + "reports/service/reports_service/update_remitted",
                data: {
                    data: JSON.stringify(Data)
                },
                dataType: 'json',
                success: function (result) {
                    if (result.has_error === false) {
                        alert(result.error_message);
                        window.location = baseUrl + "reports";
                    }
                }
            });
        }
    }
});

/** click to enable remit and save colleciton */
$(document).on('click', '#print-abstract', function () {
    document.getElementById("save_print").disabled = false;
})
