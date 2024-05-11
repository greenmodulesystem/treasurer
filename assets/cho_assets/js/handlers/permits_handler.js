$(document).ready(function() {
    $('.view').on('click', function() {
        var tr = $(this).closest('tr');
        var row = approved_table.row(tr);
        var ID = row.data()[1];
        window.location.href = baseUrl + "health/permit_view/permit_applications/" + ID;
    });

    $('.tfoot_search').each(function() {
        var title = $('#processing_table thead th').eq($(this).index()).text();
        $(this).html('<input type="text" class="form-control input-sm" placeholder="' + title + '" />');
    });

    $('.tfoot_search2').each(function() {
        var title = $('#approved_table thead th').eq($(this).index()).text();
        $(this).html('<input type="text" class="form-control input-sm" placeholder="' + title + '" />');
    });

    $('.tfoot_search3').each(function() {
        var title = $('#disapproved_table thead th').eq($(this).index()).text();
        $(this).html('<input type="text" class="form-control input-sm" placeholder="' + title + '" />');
    });

    $('#processing_table').DataTable({
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

        "columns": [
            null,
            null,
            null,
            { orderable: false },
            null,
            { orderable: false },
        ],

        "order": [
            [0, "desc"]
        ],

        "lengthMenu": [
            [5, 10, 25],
            [5, 10, 25]
        ],
    });

    var approved_table = $('#approved_table').DataTable({
        initComplete: function() {
            this.api().columns().every(function() {
                var column = this;
                if ($(column.footer()).hasClass('tfoot_search2')) {
                    var that = this;
                    $('input', this.footer()).on('keyup change', function() {
                        that.search(this.value).draw();
                    });
                } else if ($(column.footer()).hasClass('tfoot_select2')) {
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
            { orderable: false },
            { visible: false },
            { visible: false },
            { visible: false },
            { visible: false },
            { orderable: false },
        ],

        "order": [
            [1, "desc"]
        ],

        "lengthMenu": [
            [5, 10, 25],
            [5, 10, 25]
        ],
    });

    $('#disapproved_table').DataTable({
        initComplete: function() {
            this.api().columns().every(function() {
                var column = this;
                if ($(column.footer()).hasClass('tfoot_search3')) {
                    var that = this;
                    $('input', this.footer()).on('keyup change', function() {
                        that.search(this.value).draw();
                    });
                } else if ($(column.footer()).hasClass('tfoot_select3')) {
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

        "columns": [
            { visible: false },
            null,
            null,
            null,
            null,
        ],

        "order": [
            [0, "desc"]
        ],

        "lengthMenu": [
            [5, 10, 25],
            [5, 10, 25]
        ],
    });

    $('#approved_table tbody').on('click', 'td.details-control', function() {
        var tr = $(this).closest('tr');
        var row = approved_table.row(tr);

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
        '<td>Address : ' + d[7] + ', ' + d[8] + ', ' + d[9] + ', ' + d[10] + ', Municipality of Murcia' + '</td>' +
        '</tr>' +
        '</table>';
}