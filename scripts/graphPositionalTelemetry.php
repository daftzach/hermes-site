<div class="d-flex justify-content-center">
    <div style="width:75%;">
        <canvas id="posChart"></canvas>
    </div>
</div>
<script>
    var json = {"jsonarray":<?php echo($json); ?>};
    var timeLabels = json.jsonarray.map(function(e) {
       return e.time;
    });
    var altitude = json.jsonarray.map(function(e) {
       return e.altitude;
    });
    var ctx = document.getElementById('posChart').getContext('2d');
    var posChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: timeLabels,
            datasets: [{
                label: 'Altitude',
                data: altitude,
                backgroundColor: 'rgba(221, 54, 28, 0.5)',
                borderColor: 'rgba(221, 54, 28, 0.5)',
                fill: false,
            }]
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: "Altitude vs. Time"
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Time'
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Altitude (Sea Level) (m)'
                    }
                }],                
            }
        }
    });
</script>