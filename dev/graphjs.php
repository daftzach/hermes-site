<!doctype html>
<html>

<head>
    <title>Line Chart</title>
    <script src="../../chartjs/Chart.min.js"></script>
</head>
<body>
    <canvas id="myChart"></canvas>
<script>
var jsonfile = {"jsonarray":[{"time":"2019-12-04 04:03:36","altitude":"1500"},{"time":"2019-12-04 04:03:36","altitude":"1600"},{"time":"2019-12-04 04:03:36","altitude":"2000"},{"time":"2019-12-04 04:03:37","altitude":"3000"}]};
var labels = jsonfile.jsonarray.map(function(e) {
   return e.time;
});
var data = jsonfile.jsonarray.map(function(e) {
   return e.altitude;
});;
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            data: data,
            backgroundColor: 'rgba(0, 119, 204, 0.3)'
        }]
    }
});
</script>
</body>

</html>