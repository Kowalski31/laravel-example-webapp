/* -------------- CHARTS -------------- */

// BAR CHART


document.addEventListener('DOMContentLoaded', function() {

    const barChartOptions = {
    series: [
      {
        data: [10, 8, 6, 4, 2],
      },
    ],
    chart: {
      type: 'bar',
      height: 350,
      toolbar: {
        show: false,
      },
    },
    colors: ['#246dec', '#cc3c43', '#367952', '#f5b74f', '#4f35a1'],
    plotOptions: {
      bar: {
        distributed: true,
        borderRadius: 4,
        horizontal: false,
        columnWidth: '40%',
      },
    },
    dataLabels: {
      enabled: false,
    },
    legend: {
      show: false,
    },
    xaxis: {
      categories: ['Laptop', 'Phone', 'Monitor', 'Headphones', 'Camera'],
    },
    yaxis: {
      title: {
        text: 'Count',
      },
    },
  };
  var temp1 = document.querySelector('#bar-chart');

    if(temp1)
        {
            const barChart = new ApexCharts(
                document.querySelector('#bar-chart'),
                barChartOptions
              );
              barChart.render();
        }


  // AREA CHART
  const areaChartOptions = {
    series: [
      {
        name: 'Purchase Orders',
        data: [31, 40, 28, 51, 42, 109, 100],
      },
      {
        name: 'Sales Orders',
        data: [11, 32, 45, 32, 34, 52, 41],
      },
    ],
    chart: {
      height: 350,
      type: 'area',
      toolbar: {
        show: false,
      },
    },
    colors: ['#4f35a1', '#daa520'],
    dataLabels: {
      enabled: false,
    },
    stroke: {
      curve: 'smooth',
    },
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
    markers: {
      size: 0,
    },
    yaxis: [
      {
        title: {
          text: 'Purchase Orders',
        },
      },
      {
        opposite: true,
        title: {
          text: 'Sales Orders',
        },
      },
    ],
    tooltip: {
      shared: true,
      intersect: false,
    },
  };

  var temp2 = document.querySelector('#area-chart');

  if(temp2)
    {
        const areaChart = new ApexCharts(document.querySelector('#area-chart'), areaChartOptions);
        areaChart.render();
    }

});
