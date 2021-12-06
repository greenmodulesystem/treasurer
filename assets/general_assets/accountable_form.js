$(document).ready(function() {
    $('select.or_type').change(function() {
        or_type = $('.or_type option:selected').val();
    });
    $('select.or_for').change(function() {
        or_for = $('.or_for option:selected').val();
    });
    $('select.collector').change(function() {
        collector_id = $('.collector option:selected').val();
    });
    $('#save').on('click', function() {
        if (or_type == null) {
            alert("Select OR Type");
        }
        $.post({
            url: baseUrl + "accountable_form/service/accountable_form_service/save_accountable_form",
            data: {
                Or_type: or_type,
                Date_release: $('#date_release').val(),
                Stub_no: $('#stub_no').val(),
                OR_for: or_for,
                Start_or: $('#or_start').val(),
                End_or: $('#or_end').val(),
                Release_by: $('#release_by').val(),
                Collector_ID: collector_id
            },
            dataType: 'json',
            success: function(result) {
                if (result.has_error == false) {
                    alert(result.error_message);
                    window.location = baseUrl + "accountable_form";
                } else {
                    alert(result.error_message);
                }
            }
        });
    });
});

var Holder = [];
var Start_Hold = [];
var End_Holder = [];
var Stub_number = [];

$(document).on('click', '#generate-stub', function() {
    var total = 0;
    var end_or = parseFloat($('#end_or').val());
    var start_or = parseFloat($('#start_or').val());
    if ($('#end_or').val() == '' || $('#start_or').val() == '') {
        alert('Empty OR details');
    } else {
        var difference = end_or - start_or;
        var subtotal = (difference);
        total = Math.round(subtotal / 50);

        var start_or_val = '';
        var end_or_val = '';
        var stub_no = '';
        var start_or_data = [];

        for (ctrl = 0; ctrl < total; ctrl++) {
            start_or_val += '<input class="form-control input-sm start-or" value="' + Math.round(start_or) + '" data-val="' + Math.round(start_or) + '"></input></br>';
            start_or_data.push(start_or);
            start_or += 50;
            $('#starts').html(start_or_val);
        }

        $.each(start_or_data, function(index, value) {
            var value_end = (value + 49);
            if (value_end > end_or) {
                end_or_val += '<input class="form-control input-sm end-or" value="' + Math.round(end_or) + '" data-val="' + Math.round(end_or) + '"></input></br>';
            } else {
                end_or_val += '<input class="form-control input-sm end-or" value="' + Math.round(value_end) + '" data-val="' + Math.round(value_end) + '"></input></br>';
            }
            $('#ends').html(end_or_val);
        });

        for (ctrl = 1; ctrl <= total; ctrl++) {
            var a = end_or / total;
            var b = a * ctrl;
            stub_no += '<input class="form-control input-sm stub-or" value="' + ctrl + '" data-val="' + ctrl + '"></input></br>';
            $('#stub-no').html(stub_no);
        }

        $('.start-or').each(function() {
            Start_Hold.push($(this).data('val'));
        });
        $('.end-or').each(function() {
            End_Holder.push($(this).data('val'));
        });
        $('.stub-or').each(function() {
            Stub_number.push($(this).data('val'));
        });
        Holder.push({
            a: Start_Hold,
            b: End_Holder,
            c: Stub_number
        });
    }
});
$(document).on('click', '#submit-stub', function() {
    if (Holder == '') {
        alert('Generate first the OR numbers');
    } else {
        if (collector_id == null || or_type == null) {
            alert("Please select OR Type or Collector");
        } else {
            var i = confirm("Are you sure you want to save the DATA?");
            if (i == false) {
                return;
            } else {
                $.post({
                    url: baseUrl + 'accountable_form/service/accountable_form_service/save_account_form',
                    data: {
                        Data: Holder,
                        Or_type: or_type,
                        Date_release: $('#date_release').val(),
                        Release_by: $('#release_by').val(),
                        Collector_ID: collector_id
                    },
                    dataType: 'json',
                    success: function(result) {
                        if (result.has_error == false) {
                            alert(result.error_message);
                            window.location = baseUrl + "accountable_form";
                        } else {
                            alert(result.error_message);
                        }
                    }
                });
            }
        }
    }
});