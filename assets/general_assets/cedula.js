$(document).ready(function() {
    var radioValue;
    var total_interest;

    $("input[type='radio']").on('change', function() {
        radioValue = $("input[name='collection']:checked").val();

        if (radioValue == "student") {
            $('.tax-b').val(0);
        } else if (radioValue == "senior") {
            $('.tax-b').val(5);
            calculates();
        } else if (radioValue == 'male') {
            $('.tax-b').val(5);
            calculates();
        } else if (radioValue == 'female') {
            $('.tax-b').val(5);
            calculates();
        } else if (radioValue == 'tricycle') {
            $('.tax-b').val(30);
            calculates();
        } else if (radioValue == 'tri_operator') {
            $('.tax-b').val(35);
            calculates();
        }
    });

    $('.interests').on('keyup', function() {
        calculates();
    });

    $('.tax-b').on('keyup', function() {
        calculates();
    });

    function calculates() {
        var t_a = $('#tax-a').val();
        var t_b = $('.tax-b').val();
        var inte = $('#interest').val();

        var total = (parseFloat(t_a) + parseFloat(t_b));
        var percent = (parseFloat(inte) / 100);
        total_interest = ((percent * total) + total);
        $('#total_inte').val(Math.round(total_interest, 2));
    }

    $('#save-data').on('click', function() {
        var i = confirm("Save Confirm?");
        if (i == false) {
            return;
        } else {
            var col_type = $('input[name=collection]:checked').val();
            $.post({
                url: baseUrl + "cedula/services/cedula_service/save_data",
                data: {
                    Last_name: $('#last-name').val(),
                    First_name: $('#first-name').val(),
                    Middle_ini: $('#mid-initial').val(),
                    Place_issue: $('#place-issue').val(),
                    Address: $('#address').val(),
                    Birthdate: $('#birthdate').val(),
                    Occupation: $('#occu').val(),
                    Type_payor: col_type,
                    OR_number: $('#OR_num').val(),
                    Place_birth: $('#place_birth').val(),
                    tax_a: $('#tax-a').val(),
                    tax_b: $('.tax-b').val(),
                    interest: $('#interest').val(),
                    total_interest: total_interest
                },
                dataType: 'json',
                success: function(response) {
                    if (response.has_error == false) {
                        window.location = "cedula/print_apply_cedula?get=" + response.error_message;
                    }
                }
            });
        }
    });
});