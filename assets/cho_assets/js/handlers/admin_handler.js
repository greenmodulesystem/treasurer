$(document).ready(function() {
    $('#Add_officer').on('click', function() {
        if (missingValues()) {} else {
            $.ajax({
                type: "POST",
                url: baseUrl + "health/add_officer",
                data: {
                    Officer_name: $('#Officer_name').val(),
                    Position: $('#Position').val(),
                },
            }).done(function(result) {
                clearForm();
                load_officers();
            });
        }
    });
});

function clearForm() {
    $('#Officer_name').val('');
    $('#Position').val('');
}

function missingValues() {
    var missing = 0;
    $.each($('.input-field'), function() {
        $(this).parent('div').removeClass('has-error');
        $("label[for=" + $(this).attr("id") + "]").attr('hidden', true);
        if ($(this).is(':enabled')) {
            if ($.trim($(this).val()) === '') {
                $(this).parent('div').addClass('has-error');
                $("label[for=" + $(this).attr("id") + "]").removeAttr('hidden');
                missing++;
            }
        }
    });

    if (missing != 0) {
        return true;
    }
}