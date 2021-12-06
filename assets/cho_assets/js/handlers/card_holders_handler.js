$(document).ready(function() {
    $('#save').on('click', function() {
        if (missingValues()) {} else {
            $.ajax({
                type: "POST",
                url: baseUrl + "health/save_card",
                data: {
                    ID: "",
                    First_name: $('#First_name').val(),
                    Middle_name: $('#Middle_name').val(),
                    Last_name: $('#Last_name').val(),
                    Age: $('#Age').val(),
                    Gender: $('#Gender').val(),
                    Contact_number: $('#Contact_number').val(),
                    Street: $('#Street').val(),
                    Purok: $('#Purok').val(),
                    Brgy_ID: $('#Brgy_ID').val(),
                },
                success: (function() {
                    $("#profile-modal").modal();
                })
            }).done(function(result) {
                clearForm();
            });
        }
    });

    $('.close').on('click', function() {
        document.location.reload(true);
    });

    $('.view').on('click', function() {
        var tr = $(this).closest('tr');
        var row = table.row(tr);
        var ID = row.data()[1];
        window.location.href = baseUrl + "health/card_holder_view/" + ID;
    });

    $('.tfoot_search').each(function() {
        var title = $('#prof_table thead th').eq($(this).index()).text();
        $(this).html('<input type="text" class="form-control input-sm" placeholder="' + title + '" />');
    });

    var table = $('#prof_table').DataTable({
        initComplete: function() {
            this.api().columns().every(function() {
                var column = this;
                if ($(column.footer()).hasClass('tfoot_search')) {
                    var that = this;
                    $('input', this.footer()).on('keyup change', function() {
                        that.search(this.value).draw();
                    });
                } else if ($(column.footer()).hasClass('tfoot_select')) {
                    var select = $('<select class="form-control input-sm"><option value="">All</option></select>')
                        .appendTo($(column.footer()).empty())
                        .on('change', function() {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );
                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        });
                    column.data().unique().sort().each(function(d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>')
                    });
                }
            });
        },

        "order": [
            [1, "desc"]
        ],

        "lengthMenu": [
            [5, 10, 25],
            [5, 10, 25]
        ],

        "columns": [{
                "className": 'details-control',
                "orderable": false,
                "data": null,
                "defaultContent": ''
            },
            { visible: false },
            null,
            null,
            null,
            null,
            null,
            { visible: false },
            { visible: false },
            { orderable: false },
        ],

    });

    $('#prof_table tbody').on('click', 'td.details-control', function() {
        var tr = $(this).closest('tr');
        var row = table.row(tr);

        if (row.child.isShown()) {
            tr.removeClass('shown');
            row.child.hide();
        } else {
            tr.addClass('shown');
            row.child(format(row.data())).show();
        }
    });

    $(".dataTables_filter input").addClass('input-sm');
    $(".dataTables_length select").addClass('input-sm');
});

function format(d) {
    return '<table class="table table-bordered" style="display:block;text-align:left;">' +
        '<tr>' +
        '<td>Contact Number : ' + d[7] + '</td>' +
        '<td>Address : ' + d[8] + '</td>' +
        '</tr>' +
        '</table>';
}

function clearForm() {
    $('#ID').val('');
    $('#First_name').val('');
    $('#Middle_name').val('');
    $('#Last_name').val('');
    $('#Age').val('');
    $('#Gender').val('');
    $('#Contact_number').val('');
    $('#Street').val('');
    $('#Zone').val('');
    $('#Barangay').val('');
    $('#City').val('');
}

function missingValues() {
    var missing = 0;
    $.each($('.profile-input'), function() {
        $(this).parent('div').removeClass('has-error');
        $("label[for=" + $(this).attr("id") + "]").attr('hidden', true);
        if ($.trim($(this).val()) === '') {
            $(this).parent('div').addClass('has-error');
            $("label[for=" + $(this).attr("id") + "]").removeAttr('hidden');
            missing++;
        }
    });

    if (missing != 0) {
        return true;
    }
}