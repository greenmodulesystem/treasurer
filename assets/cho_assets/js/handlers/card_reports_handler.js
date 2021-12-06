$(document).ready(function() {
    // ------------------------------ DataTable ------------------------------ //
    $('.tfoot_search').each(function() {
        var title = $('#approved_table thead th').eq($(this).index()).text();
        $(this).html('<input type="text" class="form-control input-sm" placeholder="' + title + '" />');
    });

    $('.tfoot_search2').each(function() {
        var title = $('#processing_table thead th').eq($(this).index()).text();
        $(this).html('<input type="text" class="form-control input-sm" placeholder="' + title + '" />');
    });

    $('.tfoot_search3').each(function() {
        var title = $('#processing_table thead th').eq($(this).index()).text();
        $(this).html('<input type="text" class="form-control input-sm" placeholder="' + title + '" />');
    });

    $('#processing_table').DataTable({
        initComplete: function() {
            this.api().columns().every(function() {
                var column = this;
                if ($(column.footer()).hasClass('tfoot_search2')) {
                    var that = this;
                    $('input', this.footer()).on('keyup change', function() {
                        that.search(this.value).draw();
                    });
                } else if ($(column.footer()).hasClass('tfoot_select2')) {
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
        ],
    });

    var table = $('#approved_table').DataTable({
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

        "columns": [
            { visible: false },
            null,
            null,
            null,
            null,
            null,
            null,
            { visible: false },
            null,
            { orderable: false },
        ],

        buttons: {
            buttons: [{
                extend: 'print',
                text: '<i class="fa fa-print"></i>&ensp;Print',
                title: $('#printTitle').text(),
                exportOptions: {
                    columns: [1, 2, 3, 4, 5, 6, 8]
                }
            }],
            dom: {
                button: {
                    className: 'btn btn-default btn-sm'
                }
            }
        },

        dom: "<'row'<'col-sm-6'l><'col-sm-5 text-right'" + '<"toolbar">' + "><'col-sm-1'B>>" +
            "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-5'i><'col-sm-7'p>>"
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
            null,
        ],
    });

    $("div.toolbar").html(
        '<div class="row form-inline">' +
        '<label>Date Range :&ensp;</label>' +
        '<input type="text" id="min" class="form-control input-sm" placeholder="Min date">&ensp;' +
        '<input type="text" id="max" class="form-control input-sm" placeholder="Max date">' +
        '</div>'
    );

    $("#min").datepicker({
        onSelect: function() {
            table.draw();
        },
        todayHighlight: true,
        orientation: "bottom auto"
    });

    $("#max").datepicker({
        onSelect: function() {
            table.draw();
        },
        todayHighlight: true,
        orientation: "bottom auto"
    });

    $('#min, #max').change(function() {
        table.draw();
    });

    $(".dataTables_filter input").addClass('input-sm');
    $(".dataTables_length select").addClass('input-sm');
    // ------------------------------ DataTable ------------------------------ //


    // ------------------------------ Functions ------------------------------ //
    $('.view_card').on('click', function() {
        var tr = $(this).closest('tr');
        var row = table.row(tr);
        var ID = row.data()[0];
        window.location.href = baseUrl + "health/card_view/card_reports/" + ID;
    });
    // ------------------------------ Functions ------------------------------ //
});


$.fn.dataTable.ext.search.push(
    function(settings, data, dataIndex) {
        var emptyMin = jQuery.isEmptyObject($('#min').datepicker("getDate"));
        var emptyMax = jQuery.isEmptyObject($('#max').datepicker("getDate"));
        var min = emptyMin ? $('#min').datepicker("getDate") : null;
        var max = emptyMax ? $('#max').datepicker("getDate") : null;
        var startDate = new Date(data[6]);

        if ((min == null && max == null) ||
            (min == null && startDate <= max) ||
            (max == null && startDate >= min) ||
            (startDate <= max && startDate >= min)) {
            return true;
        }
        return false;
    }
);