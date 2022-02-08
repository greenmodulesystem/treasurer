var remitted_data;
var Void_ID;
var unremit_type;
var remit_data = remit_data;

$(document).on('change', '.type_reports', function() {
    type_of = $('.type_reports option:selected').val();
    if (type_of != undefined) {
        document.getElementById("generate").disabled = false;
    }
});

$(document).on('click', '.btn-view-unremitted', function() {
    window.location = "reports/display_unremitted?get=" + unremit_type;
});

$(document).on('click', '#generate_unremit', function() {
    type_of = $('.select-or-type option:selected').val();
    $.post({
        url: baseUrl + "reports/service/reports_service/generate_unremitted",
        data: {Type: type_of},
        dataType: 'json',
        success: function(result) {
            $.post({
                url: baseUrl + "reports/service/reports_service/unremitted",
                data: {
                    result: result
                },
                success: function(response) {
                    $('#load-unremitted').html(response);
                }
            });
        }
    });
});

$(document).on('click', '.set_void', function() {
    Void_ID = $(this).data('id');
    $('#void_modal').modal("show");
});

$(document).on('click', '#void_reciept', function() {
    $.post({
        url: baseUrl + "void_receipt/services/void_receipt_service/void_applicant_receipt",
        data: {
            ID: Void_ID,
            Remarks: $('#void_remark').val()
        },
        dataType: 'json',
        success: function(result) {
            if (result.has_error === false) {
                window.location = baseUrl + "reports";
            }
        }
    });
});

$('input[name=typeOF]').change(function() {
    values = $('input[name=typeOF]:checked').val();
    if (values === 'range') {
        document.getElementById("end_date_range").style.display = "block";
    } else {
        document.getElementById("end_date_range").style.display = "none";
    }
});

$(document).on('click', '#remitted', function() {
    var i = confirm('Are you sure you want to remit this report?');
    if (i == false) {
        return;
    } else {
        $.post({
            url: baseUrl + "reports/service/reports_service/update_remitted",
            data: {
                data: remitted_data
            },
            dataType: 'json',
            success: function(result) {
                if (result.has_error === false) {
                    alert(result.error_message);
                    window.location = baseUrl + "reports";
                }
            }
        });
    }
});

$(document).on('click', '#cedula_remittance', function() {
    var i = confirm('Are you sure you want to remit this report?');
    if (i == false) {
        return;
    } else {
        $.post({
            url: baseUrl + "reports/service/reports_service/cedula_remittance",
            data: {
                data: remitted_data
            },
            dataType: 'json',
            success: function(response) {
                if (response.has_error === false) {
                    alert(response.error_message);
                    window.location = baseUrl + "reports";
                }
            }
        });
    }
});

$(document).on('click', '#to_remit', function() {
    var i = confirm('Are you sure you want to remit this report?');
    if (i == false) {
        return;
    } else {
        $.post({
            url: baseUrl + "reports/service/reports_service/update_remitted",
            data: {
                data: remit_data
            },
            dataType: 'json',
            success: function(result) {
                if (result.has_error === false) {
                    alert(result.error_message);
                }
            }
        });
    }
});

$(document).ready(function() {
    if (type_of == undefined) {
        document.getElementById("generate").disabled = true;
    }

    $('#generate').on('click', function() {
        if (values === '') {
            alert('Select kind of report');
        } else {
            if (type_of === 'Cedula') {
                $.post({
                    url: baseUrl + "reports/service/reports_service/generate_report_cedula",
                    data: {
                        date: $('#reports_date').val(),
                        collection_type: type_of,
                        end_date: $('#end_date').val(),
                        type: values
                    },
                    dataType: 'json',
                    success: function(response) {
                        var object = JSON.stringify(response);
                        remitted_data = response;
                        if (object != '') {
                            $.post({
                                url: baseUrl + "reports/reports/display_generated_cedula_reports",
                                data: {
                                    Data: object
                                },
                                success: function(value) {
                                    $('#load-reports').html(value);
                                }
                            });
                        }
                    }
                });
            } else {
                $.post({
                    url: baseUrl + "reports/service/reports_service/generate_report",
                    data: {
                        date: $('#reports_date').val(),
                        collection_type: type_of,
                        end_date: $('#end_date').val(),
                        type: values
                    },
                    dataType: 'json',
                    success: function(result) {
                        var object = JSON.stringify(result);
                        remitted_data = result;
                        if (object != '') {
                            $.post({
                                url: baseUrl + "reports/reports/display_generated_reports",
                                data: {
                                    Data: object
                                },
                                success: function(value) {
                                    $('#load-reports').html(value);
                                }
                            });
                        }
                    }
                });
            }
        }
    });
});
