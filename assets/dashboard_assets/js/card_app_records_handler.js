$(document).ready(function() {
    var Green_Jan = 0,
        Green_Feb = 0,
        Green_Mar = 0,
        Green_Apr = 0,
        Green_May = 0,
        Green_Jun = 0,
        Green_Jul = 0,
        Green_Aug = 0,
        Green_Sep = 0,
        Green_Oct = 0,
        Green_Nov = 0,
        Green_Dec = 0,
        Yellow_Jan = 0,
        Yellow_Feb = 0,
        Yellow_Mar = 0,
        Yellow_Apr = 0,
        Yellow_May = 0,
        Yellow_Jun = 0,
        Yellow_Jul = 0,
        Yellow_Aug = 0,
        Yellow_Sep = 0,
        Yellow_Oct = 0,
        Yellow_Nov = 0,
        Yellow_Dec = 0;

    Object.keys(cards).forEach(function(key) {
        if (cards[key].Status === 'APPROVED') {
            var date = new Date(cards[key].Date_approved);
            if (cards[key].Card_type === 'Green') {
                if ((date.getFullYear() + " " + (date.getMonth() + 1)) == (this_year + " 1")) {
                    Green_Jan++;
                } else if ((date.getFullYear() + " " + (date.getMonth() + 1)) == (this_year + " 2")) {
                    Green_Feb++;
                } else if ((date.getFullYear() + " " + (date.getMonth() + 1)) == (this_year + " 3")) {
                    Green_Mar++;
                } else if ((date.getFullYear() + " " + (date.getMonth() + 1)) == (this_year + " 4")) {
                    Green_Apr++;
                } else if ((date.getFullYear() + " " + (date.getMonth() + 1)) == (this_year + " 5")) {
                    Green_May++;
                } else if ((date.getFullYear() + " " + (date.getMonth() + 1)) == (this_year + " 6")) {
                    Green_Jun++;
                } else if ((date.getFullYear() + " " + (date.getMonth() + 1)) == (this_year + " 7")) {
                    Green_Jul++;
                } else if ((date.getFullYear() + " " + (date.getMonth() + 1)) == (this_year + " 8")) {
                    Green_Aug++;
                } else if ((date.getFullYear() + " " + (date.getMonth() + 1)) == (this_year + " 9")) {
                    Green_Sep++;
                } else if ((date.getFullYear() + " " + (date.getMonth() + 1)) == (this_year + " 10")) {
                    Green_Oct++;
                } else if ((date.getFullYear() + " " + (date.getMonth() + 1)) == (this_year + " 11")) {
                    Green_Nov++;
                } else if ((date.getFullYear() + " " + (date.getMonth() + 1)) == (this_year + " 12")) {
                    Green_Dec++;
                }
            } else if (cards[key].Card_type === 'Yellow') {
                if ((date.getFullYear() + " " + (date.getMonth() + 1)) == (this_year + " 1")) {
                    Yellow_Jan++;
                } else if ((date.getFullYear() + " " + (date.getMonth() + 1)) == (this_year + " 2")) {
                    Yellow_Feb++;
                } else if ((date.getFullYear() + " " + (date.getMonth() + 1)) == (this_year + " 3")) {
                    Yellow_Mar++;
                } else if ((date.getFullYear() + " " + (date.getMonth() + 1)) == (this_year + " 4")) {
                    Yellow_Apr++;
                } else if ((date.getFullYear() + " " + (date.getMonth() + 1)) == (this_year + " 5")) {
                    Yellow_May++;
                } else if ((date.getFullYear() + " " + (date.getMonth() + 1)) == (this_year + " 6")) {
                    Yellow_Jun++;
                } else if ((date.getFullYear() + " " + (date.getMonth() + 1)) == (this_year + " 7")) {
                    Yellow_Jul++;
                } else if ((date.getFullYear() + " " + (date.getMonth() + 1)) == (this_year + " 8")) {
                    Yellow_Aug++;
                } else if ((date.getFullYear() + " " + (date.getMonth() + 1)) == (this_year + " 9")) {
                    Yellow_Sep++;
                } else if ((date.getFullYear() + " " + (date.getMonth() + 1)) == (this_year + " 10")) {
                    Yellow_Oct++;
                } else if ((date.getFullYear() + " " + (date.getMonth() + 1)) == (this_year + " 11")) {
                    Yellow_Nov++;
                } else if ((date.getFullYear() + " " + (date.getMonth() + 1)) == (this_year + " 12")) {
                    Yellow_Dec++;
                }
            }
        }
    });
    // <Application chart>
    var App_record_data = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
                label: 'Green Cards',
                fillColor: '#00a65a',
                strokeColor: 'green',
                data: [Green_Jan, Green_Feb, Green_Mar, Green_Apr, Green_May, Green_Jun,
                    Green_Jul, Green_Aug, Green_Sep, Green_Oct, Green_Nov, Green_Dec
                ]
            },
            {
                label: 'Yellow Cards',
                fillColor: '#f2c211',
                strokeColor: '#f39c12',
                data: [Yellow_Jan, Yellow_Feb, Yellow_Mar, Yellow_Apr, Yellow_May, Yellow_Jun,
                    Yellow_Jul, Yellow_Aug, Yellow_Sep, Yellow_Oct, Yellow_Nov, Yellow_Dec
                ]
            }
        ]
    };
    var barChartCanvas = $('#App_record').get(0).getContext('2d');
    var barChart = new Chart(barChartCanvas);
    var barChartData = App_record_data;
    var barChartOptions = {
        scaleBeginAtZero: true, //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
        scaleShowGridLines: true, //Boolean - Whether grid lines are shown across the chart
        scaleGridLineColor: 'rgba(0,0,0,.05)', //String - Colour of the grid lines
        scaleGridLineWidth: 1, //Number - Width of the grid lines
        scaleShowHorizontalLines: true, //Boolean - Whether to show horizontal lines (except X axis)
        scaleShowVerticalLines: true, //Boolean - Whether to show vertical lines (except Y axis)
        barShowStroke: true, //Boolean - If there is a stroke on each bar
        barStrokeWidth: 2, //Number - Pixel width of the bar stroke
        barValueSpacing: 5, //Number - Spacing between each of the X value sets
        barDatasetSpacing: 2, //Number - Spacing between data sets within X values
        //String - A legend template
        legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
        responsive: true, //Boolean - whether to make the chart responsive
        maintainAspectRatio: true,
    };

    barChartOptions.datasetFill = false;
    barChart.Bar(barChartData, barChartOptions);
    // </Application chart>
});