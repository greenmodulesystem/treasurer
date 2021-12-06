$(document).ready(function() {
    if (On_process != 0) {
        var Processing_ID = (card_history.find(history => history.Status == 'ON PROCESS')).ID;
    }
    var Action_by;

    $('.add_card').on('click', function() {
        var type = $(this).data('target');
        if (type.substring(1) == 'green-proceed') {
            Card_ID = 1;
        } else {
            Card_ID = 2;
        }
        $.ajax({
            type: "POST",
            url: baseUrl + "health/add_card",
            data: {
                Card_holder_ID: view_profile[0].ID,
                Card_ID: Card_ID,
                Status: "ON PROCESS",
            }
        }).done(function(result) {});
    });

    $('.close').on('click', function() {
        document.location.reload(true);
    });

    $('.input-field').on('keyup change', function() {
        var changed = (this.value != $(this).data('default') && this.value != '');
        $('#save').prop("disabled", !changed);
    });

    $('tr').click(function() {
        var checked = $(this).find('.chk').is(":checked");
        var action = $(this).find('.action');

        action.prop("disabled", !checked);
    });

    $('.view_card').on('click', function() {
        var tr = $(this).closest('tr');
        var row = table.row(tr);
        var ID = row.data()[0];
        window.location.href = baseUrl + "health/card_view/card_holders/" + ID;
    });

    $('#approve').on('click', function() {
        var ID = Processing_ID;
        var Status = 'APPROVED';
        alert(ID + "\n" + Action_by + "\n" + Status);
    });

    $('#delete').on('click', function() {
        $.ajax({
            type: "POST",
            url: baseUrl + "health/delete",
            data: {
                ID: view_profile[0].ID,
            }
        }).done(function(result) {});
    });

    $('#disapprove').on('click', function() {
        var ID = Processing_ID;
        var Status = 'DISAPPROVED';
        alert(ID + "\n" + Action_by + "\n" + Status);
    });

    $('#edit').click(function() {
        $('#First_name').removeAttr("disabled");
        $('#Middle_name').removeAttr("disabled");
        $('#Last_name').removeAttr("disabled");
        $('#Age').removeAttr("disabled");
        $('#Gender').removeAttr("disabled");
        $('#Contact_number').removeAttr("disabled");
        $('#Street').removeAttr("disabled");
        $('#Purok').removeAttr("disabled");
        $('#Brgy_ID').removeAttr("disabled");
    });

    $('#home').on('click', function() {
        window.location.href = baseUrl + "health/card_holders";
    });

    $('#save').on('click', function() {
        $.ajax({
            type: "POST",
            url: baseUrl + "health/save_card",
            data: {
                ID: view_profile[0].ID,
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
        }).done(function(result) {
            document.location.reload(true);
        });
    });

    $('#submit').on('click', function() {
        $.ajax({
            type: "POST",
            url: baseUrl + "health/authenticate",
            data: {
                Username: $('#Username').val(),
                Password: $('#Password').val()
            }
        }).always(function(e) {
            if (e != "") {
                var data = JSON.parse(e);
                if (data.has_error == true) {
                    $.each($('.user-input'), function() {
                        $(this).parent('div').addClass('has-error');
                    });
                    $("#Error").removeAttr('hidden');
                    $("#Error").html('</br>' + data.error_message);
                } else {
                    $("#user_modal").modal('hide');
                    $("#action_modal").modal({
                        backdrop: false,
                        keyboard: false
                    });
                    Action_by = data.user_details.First_name + " " + data.user_details.Last_name;
                    $("#Action_by").html(data.user_details.First_name + " " + data.user_details.Last_name);
                }
            }
        });
    });

    $('.tfoot_search').each(function() {
        var title = $('#view_table thead th').eq($(this).index()).text();
        $(this).html('<input type="text" class="form-control input-sm" placeholder="' + title + '" />');
    });

    var table = $('#view_table').DataTable({
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

        "order": [0, "desc"],

        "lengthMenu": [
            [5, 10, 25, -1],
            [5, 10, 25, "All"]
        ],

        "columns": [
            { visible: false },
            null,
            null,
            null,
            null,
            null,
            { orderable: false },
        ]
    });

    $(".dataTables_filter input").addClass('input-sm');
    $(".dataTables_length select").addClass('input-sm');
});