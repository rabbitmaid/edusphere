import ApexCharts from 'apexcharts'

document.addEventListener('livewire:navigated', () => {

   let chartElement = document.querySelector("#transactionChart");

   if(chartElement !== null) {

    let chartElementData = JSON.parse(chartElement.getAttribute('data-chart'));

    let amounts = [];
    let hours = [];

    chartElementData.forEach(data => {
        amounts.push(data.amount);
        hours.push(data.time);
    });

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
              name: 'transactions',
              data: amounts
            }],
            xaxis: {
              categories: hours
            }
          }
          
          let chart = new ApexCharts(chartElement, options);
          chart.render();
   }

   let genderChartElement = document.querySelector('#genderChart');

   if(genderChartElement !== null) {

    let genderChartData = JSON.parse(genderChartElement.getAttribute('data-chart'));

    // console.log(genderChartData);


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