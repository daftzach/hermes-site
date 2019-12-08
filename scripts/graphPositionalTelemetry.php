<div style="width:50%;">
    <canvas id="posChart"></canvas>
</div>
<script>
    var json = {"jsonarray":<?php echo($json); ?>};
    var timeLables = json.jsonarray.map(function(e) {
       return e.time;
    });
    var altitude = json.jsonarray.map(function(e) {
       return e.altitude;
    });
    var ctx = document.getElementById('posChart').getContext('2d');
    var posChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: timeLables,
            datasets: [{
                label: 'Altitude',
                data: altitude,
                backgroundColor: 'rgba(221, 54, 28, 0.5)',
                borderColor: 'rgba(221, 54, 28, 0.5)',
                fill: false,
            }]
        }
    });
</script>