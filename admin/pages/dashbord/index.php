<?php
include("query.php");
if (!isset($_SESSION['username'])) {
  header(("location:../../index.php"));
}





$questions = $dash->select_que();
$exams = $dash->select_exam();
$users = $dash->users();
$pass = $dash->pass();
$fail = $dash->fail();

$barData = $_SESSION['barData'];
$barDate = $_SESSION['barDate'];

$linesData = $_SESSION['lineData'];
$linesDate = $_SESSION['lineDate'];




?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- <link href="../../css/main.css" rel="stylesheet"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />

</head>

<body>

  <div class="container-fluid bodysection p-2">

    <?php
    require("../../components/common/sidebar.php");



    ?>

    <div class="row">
      <!-- 

      <div class="col-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12"> -->
      <div class="ps-5 pe-5 maincontainer active-cont mainmargin">
        <div class="container my-4 ">
          <div class="row gy-5">
            <div class="col col-xxl-12 col-xl-12">
              <div class="row g-4 ">
                <div class="col-12 col-md-12 col-lg-6 col-xl-3 col-xxl-3">
                  <div class="dashbox me-4 pt-5  ">
                    <p class="number-head">Total Questions</p>
                    <h4 class="numbers"><?php echo $questions ?></h4>
                  </div>
                </div>

                <div class="col-12 col-md-12 col-lg-6 col-xl-3 col-xxl-3">
                  <div class="dashbox e-total pt-5 me-4">
                    <p class="number-head ">Total Exams</p>
                    <h4 class="numbers"><?php echo $exams ?></h4>
                  </div>
                </div>

                <div class="col-12 col-md-12 col-lg-6 col-xl-3 col-xxl-3 ">
                  <div class="dashbox e-attent  pt-5 me-4 text-white">
                    <p class="number-head"> Total Users</p>
                    <h4 class="numbers"><?php echo $users ?></h4>
                  </div>
                </div>

                <div class="col-12 col-md-12 col-lg-6 col-xl-3 col-xxl-3 ">
                  <div class="presantage-box d-flex align-items-center justify-content-center  ">
                    <canvas id="doughnutChart" width="230" height="239"></canvas>

                  </div>

                </div>

              </div>
            </div>

            <div class="col-12 col-md-12 col-lg-12 col-xxl-12 col-xl-12 chartmain">
              <div class="row gy-3">

                <div class="col-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6">
                  <div class="chart bar-chart">
                    <canvas id="myChart" width="400" height="385"></canvas>
                  </div>
                </div>

                <div class="col-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6 ">
                  <div class="linechart line-chart">
                    <canvas id="mylineChart" width="400" height="270"></canvas>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- 
      </div> -->
    </div>
  </div>





  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js"></script>


  <script src="https://kit.fontawesome.com/64fc7c3650.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script src="../../js/sidebar.js"></script>

  <!-- sidebar js -->

  <!-- chart js  -->

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: <?php echo $barDate; ?>,
        datasets: [{
          label: "Exam Attended",
          data: <?php echo $barData; ?>,
          borderColor: '#4c76f0',
          borderWidth: 2,
          hoverBackgroundColor: '#5059F2',
          hoverBorderColor: '#2a47db',
          hoverBorderWidth: 3,
          borderRadius: 5,
          backgroundColor: function(context) {
            var chart = context.chart;
            var dataset = chart.data.datasets[context.datasetIndex];
            var meta = chart.getDatasetMeta(context.datasetIndex);
            var i = meta.data[context.dataIndex]._index;

            // Define color palette
            var colorPalette = ['#606BF7', '#4c76f0', '#ff5733', '#ffbb33'];

            return colorPalette[i % colorPalette.length];
          }
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        animation: {
          duration: 1000,
          easing: 'easeInOutBounce'
        },
        layout: {
          padding: {
            top: 20,
            left: 30,
            right: 30,
            bottom: 20
          }
        },
        legend: {
          position: 'bottom',
          labels: {
            display: false,
            fontColor: '#333',
            fontSize: 14
          }
        },
        title: {
          display: true,
          text: 'Exams Attended',
          fontSize: 18,
          fontColor: '#4c76f0',
          fontFamily: 'Arial, sans-serif',
        },
        tooltips: {
          enabled: true,
          backgroundColor: 'rgba(0,0,0,0.7)',
          titleFontSize: 14,
          bodyFontSize: 12,
          cornerRadius: 5,
          xPadding: 10,
          yPadding: 10
        },
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              stepSize: 5,
              fontColor: '#777',
              fontSize: 12
            },
            grid: {
              borderDash: [5, 5],
              color: "#F9F9F9"
            },
            title: {
              display: false,
              text: 'Number of Students',
              fontColor: '#4c76f0',
              fontSize: 14
            }
          },
          x: {
            ticks: {
              fontColor: '#777',
              fontSize: 12
            },
            grid: {
              borderDash: [5, 5],
              color: "#F9F9F9"
            },

            title: {
              display: false,
              text: 'Class/Date',
              fontColor: '#4c76f0',
              fontSize: 14
            }
          }
        }
      }
    });
  </script>




  <!-- line chart js -->
  <script>
    var ctx = document.getElementById('mylineChart').getContext('2d');
    var chart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: <?php echo $linesDate ?>,
        datasets: [{
          label: "Users",
          fill: false,
          backgroundColor: 'rgba(96, 107, 247, 0.15)',
          borderColor: '#60A0F7',
          borderWidth: 3,
          lineTension: 0.4,
          pointBackgroundColor: '#FFFFFF',
          pointBorderColor: '#60A0F7',
          pointRadius: 8,
          pointHoverRadius: 10,
          pointHoverBackgroundColor: '#60A0F7',
          pointHoverBorderColor: '#fff',
          pointHoverBorderWidth: 3,
          data: <?php echo $linesData ?>,
        }]
      },
      options: {
        layout: {
          padding: {
            top: 20,
            bottom: 20,
            left: 20,
            right: 20
          }
        },
        plugins: {
          legend: {
            position: 'top',
            labels: {
              display: false,
              fontColor: '#4b4b4b',
              font: {
                style: 'bold'
              }
            }
          },
          tooltip: {
            backgroundColor: 'rgba(0, 0, 0, 0.7)',
            titleFont: {
              size: 14
            },
            bodyFont: {
              size: 12
            },
            cornerRadius: 5,
            padding: 10
          }
        },
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              font: {
                size: 12
              },
              color: '#4b4b4b'
            },
            grid: {
              display: true,
              borderDash: [6, 6],
              color: "#F9F9F9"
            },
            title: {
              display: true,
              text: 'Number of Students',
              color: '#4b4b4b',
              font: {
                size: 14,
                weight: 'bold'
              }
            }
          },
          x: {
            ticks: {
              font: {
                size: 12
              },
              color: '#4b4b4b'
            },
            grid: {
              display: false,
              borderDash: [6, 6],
              color: '#e0e0e0'
            },
            title: {
              display: true,
              text: 'Class',
              color: '#4b4b4b',
              font: {
                size: 14,
                weight: 'bold'
              }
            }
          }
        },
        hover: {
          mode: 'nearest',
          intersect: false
        }
      }
    });
  </script>






  <script>
    var ctx = document.getElementById('doughnutChart').getContext('2d');

    var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'doughnut', // also try bar or other graph types

      // The data for our dataset
      data: {
        labels: ["pass", "fail", ],
        // Information about the dataset
        datasets: [{
          label: "exam result",
          backgroundColor: ["#606BF7", "#ECF2FF", ],
          borderColor: 'white',
          data: [<?php echo $pass ?>, <?php echo $fail ?>],
        }]
      },

      // Configuration options
      options: {
        maintainAspectRatio: false,
        responsive: true,
        layout: {
          padding: 20,
        },
        legend: {
          position: 'left',

        },

        // Ensure responsiveness if desired

        title: {
          display: true,
          text: 'Exam Result',
          position: 'top',
        },

      }
    });
  </script>

</body>

</html>