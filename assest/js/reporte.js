//Date range as a button
$('#daterange-btn').daterangepicker(
    {
      ranges   : {
        'Today'       : [moment(), moment()],
        'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month'  : [moment().startOf('month'), moment().endOf('month')],
        'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      startDate: moment().subtract(29, 'days'),
      endDate  : moment()
    },
    function (start, end) {
      $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
    }
  )
// Sales graph chart
var salesGraphChartCanvas = $('#line-chart').get(0).getContext('2d')
// $('#revenue-chart').get(0).getContext('2d');
var salesGraphChartData = {
labels: ['2011 Q1', '2011 Q2', '2011 Q3', '2011 Q4', '2012 Q1', '2012 Q2', '2012 Q3', '2012 Q4', '2013 Q1', '2013 Q2'],
datasets: [
{
  label: 'Digital Goods',
  fill: false,
  borderWidth: 2,
  lineTension: 0,
  spanGaps: true,
  borderColor: '#efefef',
  pointRadius: 3,
  pointHoverRadius: 7,
  pointColor: '#efefef',
  pointBackgroundColor: '#efefef',
  data: [2666, 2778, 4912, 3767, 6810, 5670, 4820, 15073, 10687, 8432]
}
]
}
var salesGraphChartOptions = {
maintainAspectRatio: false,
responsive: true,
legend: {
  display: false
},
scales: {
  xAxes: [{
    ticks: {
      fontColor: '#efefef'
    },
    gridLines: {
      display: false,
      color: '#efefef',
      drawBorder: false
    }
  }],
  yAxes: [{
    ticks: {
      stepSize: 5000,
      fontColor: '#efefef'
    },
    gridLines: {
      display: true,
      color: '#efefef',
      drawBorder: false
    }
  }]
}
}
// This will get the first returned node in the jQuery collection.
// eslint-disable-next-line no-unused-vars
var salesGraphChart = new Chart(salesGraphChartCanvas, { // lgtm[js/unused-local-variable]
type: 'line',
data: salesGraphChartData,
options: salesGraphChartOptions
})