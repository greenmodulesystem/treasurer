$(document).ready(function() {
    $('#Apply').on('click', function() {
        if (missingValues()) {} else {
            $.ajax({
                type: "POST",
                url: baseUrl + "health/save_permit",
                data: {
                    Sanitary_ID: current[0].ID,
                    Type_ID: $('#Type_ID').val(),
                    Card_qty: $('#Card_qty').val(),
                    Status: "ON PROCESS",
                    Remarks: "BILLED",
                },
            }).done(function(result) {
                document.location.reload(true);
            });
        }
    });

    // $('.approve').on('click', function() {
    //     var ID = $(this).data('id');
    //     $.ajax({
    //         type: "POST",
    //         url: baseUrl + "health/save_permit",
    //         data: {
    //             ID: ID,
    //             Status: "APPROVED",
    //         }
    //     }).done(function(result) {});
    // });

    $('.view').on('click', function() {
        var tr = $(this).closest('tr');
        var row = table.row(tr);
        var ID = row.data()[0];
        window.location.href = baseUrl + "health/permit_view/permit_search/" + ID;
    });

    $('.close').on('click', function() {
        document.location.reload(true);
    });

    // $('.deny').on('click', function() {
    //     var ID = $(this).data('id');
    //     $.ajax({
    //         type: "POST",
    //         url: baseUrl + "health/deny_permit",
    //         data: {
    //             ID: ID,
    //         }
    //     }).done(function(result) {});
    // });

    $('#Type_ID').on('change', function() {
        var ID = $('#Type_ID').val();
        var S_fee = (types.find(type => type.ID == ID)).Sanitary_fee;
        var Card = (types.find(type => type.ID == ID)).Card_type;
        var H_fee = (types.find(type => type.ID == ID)).Fee;
        $('#Sanitary_fee').val("₱" + S_fee);
        $('#Card_type').val(Card + " Card");
        $('#Health_fee').val("₱" + H_fee);
    });

    $('#Update').on('click', function() {
        $('#Type_ID').removeAttr('disabled');
        $('#Card_qty').removeAttr('disabled');
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
                    var select = $('<select class="form-control"><option value="">All</option></select>')
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

        "retrieve": true,

        "order": [
            [0, "desc"]
        ],

        "lengthMenu": [
            [5, 10, 25],
            [5, 10, 25]
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

    $('.tfoot_search').each(function() {
        var title = $('#view_table thead th').eq($(this).index()).text();
        $(this).html('<input type="text" class="form-control input-sm" placeholder="' + title + '" />');
    });
});

function missingValues() {
    var missing = 0;
    $.each($('.input-field '), function() {
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