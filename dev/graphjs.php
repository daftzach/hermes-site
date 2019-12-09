<!doctype html>
<html>

<head>
    <title>Line Chart</title>
    <script src="../../chartjs/Chart.min.js"></script>
</head>
<body>
<canvas id="posChart"></canvas>
<script>
    var json = {"jsonarray":[{"time":"2019-12-04 04:03:36","altitude":"1500"},{"time":"2019-12-04 04:03:36","altitude":"1600"},{"time":"2019-12-04 04:03:36","altitude":"2000"},{"time":"2019-12-04 04:03:37","altitude":"3000"}]};
    var timeLables = json.jsonarray.map(function(e) {
       return e.time;
    });
    var altitude = json.jsonarray.map(function(e) {
       return e.altitude;
    });;
    var ctx = document.getElementById('posChart').getContext('2d');
    var posChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: timeLables,
            datasets: [{
                data: altitude
            }]
        }
    });
</script>
</body>

</html>