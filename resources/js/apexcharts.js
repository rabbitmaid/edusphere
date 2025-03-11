import ApexCharts from 'apexcharts'

document.addEventListener('livewire:navigated', () => {

   let chartElement = document.querySelector("#chart");

   if(chartElement !== null) {

      let preferredScheme = Flux.appearance;
    
        let options = {

            chart: {
              type: 'area',
              height: 400,
              foreColor: "#ccc",
              background: 'transparent',
              toolbar: {
                autoSelected: "pan",
                show: false
              }
            },

            dataLabels: {
              enabled: false
            },

            fill: {
              gradient: {
                enabled: true,
                opacityFrom: 0.55,
                opacityTo: 0
              }
            },

            stroke: {
              width: 3
            },

            grid: {
              borderColor: "#555",
              clipMarkers: false,
              yaxis: {
                lines: {
                  show: false
                }
              }
            },

            markers: {
              size: 10,
              colors: ["#000524"],
              strokeColor: "#008ffb",
              strokeWidth: 3
            },
    
            theme: {
              mode: preferredScheme
            },

            tooltip: {
              theme: preferredScheme
            },
    
            series: [{
              name: 'sales',
              data: [30,40,35,50,49,60,70,91,125]
            }],
            xaxis: {
              categories: [1991,1992,1993,1994,1995,1996,1997, 1998,1999]
            }
          }
          
          let chart = new ApexCharts(chartElement, options);
          chart.render();
   }

   let genderChartElement = document.querySelector('#genderChart');

   if(genderChartElement !== null) {

    let genderChartData = JSON.parse(genderChartElement.getAttribute('data-chart'));

    console.log(genderChartData);


    let preferredScheme = Flux.appearance;
    
    let options = {

        chart: {
          type: 'pie',
          height: 400,
          foreColor: "#ccc",
          background: 'transparent',
          toolbar: {
            autoSelected: "pan",
            show: false
          }
        },

        dataLabels: {
          enabled: true,
          formatter: function (val) {
            return Math.round(val) + "%"
          }
        },

        legend: {
          show: false
        },

        grid: {
          borderColor: "#555",
          clipMarkers: false,
          yaxis: {
            lines: {
              show: false
            }
          }
        },

        theme: {
          mode: preferredScheme
        },

        tooltip: {
          theme: preferredScheme
        },

        series: [genderChartData.male, genderChartData.female],
        labels: ['Male', 'Female']
      }
      
      let chart = new ApexCharts(genderChartElement, options);
      chart.render();

   }
      

});