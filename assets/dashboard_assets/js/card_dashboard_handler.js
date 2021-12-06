$(document).ready(function() {
    // ----------------------------- Html2canvas ----------------------------- //
    $("#btnPrintApp").on('click', function() {
        html2canvas($("#printApp").get(0)).then(function(canvas) {
            var printWindow = window.open();
            printWindow.document.body.appendChild(canvas);
            printWindow.focus();
            printWindow.print();
            printWindow.close();
        });
    });

    $("#btnPrintCard").on('click', function() {
        html2canvas($("#printCard").get(0)).then(function(canvas) {
            var printWindow = window.open();
            printWindow.document.body.appendChild(canvas);
            printWindow.focus();
            printWindow.print();
            printWindow.close();
        });
    });
    // ----------------------------- Html2canvas ----------------------------- //

    // --------------------------- Age Group chart --------------------------- //
    'use strict';
    var pieChartCanvas = $('#Age_graph').get(0).getContext('2d');
    var pieChart = new Chart(pieChartCanvas);
    var PieData = [{
            value: Below_20,
            color: '#f56954',
            highlight: '#f56954',
            label: 'Below 20',
        },
        {
            value: Twenties,
            color: '#00a65a',
            highlight: '#00a65a',
            label: '21-30'
        },
        {
            value: Thirties,
            color: '#f39c12',
            highlight: '#f39c12',
            label: '31-40'
        },
        {
            value: Fourties,
            color: '#00c0ef',
            highlight: '#00c0ef',
            label: '41-50'
        },
        {
            value: Fifties,
            color: '#3c8dbc',
            highlight: '#3c8dbc',
            label: '51-60'
        },
        {
            value: Above_60,
            color: '#d2d6de',
            highlight: '#d2d6de',
            label: 'Above 60'
        }
    ];
    var pieOptions = {
        segmentShowStroke: true, // Boolean - Whether we should show a stroke on each segment
        segmentStrokeColor: '#fff', // String - The colour of each segment stroke
        segmentStrokeWidth: 1, // Number - The width of each segment stroke
        percentageInnerCutout: 50, // Number - The percentage of the chart that we cut out of the middle - This is 0 for Pie charts
        animationSteps: 100, // Number - Amount of animation steps
        animationEasing: 'easeOutBounce', // String - Animation easing effect
        animateRotate: true, // Boolean - Whether we animate the rotation of the Doughnut
        animateScale: false, // Boolean - Whether we animate scaling the Doughnut from the centre
        responsive: true, // Boolean - whether to make the chart responsive to window resizing
        maintainAspectRatio: false, // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
        // String - A legend template
        legendTemplate: '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<segments.length; i++){%><li><span style=\'background-color:<%=segments[i].fillColor%>\'></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>',
        tooltipTemplate: '<%=label%> Applicants : <%=value %>' // String - A tooltip template
    };
    pieChart.Doughnut(PieData, pieOptions); // Create pie or douhnut chart - You can switch between pie and douhnut using the method below.
    // --------------------------- Age Group chart --------------------------- //
});