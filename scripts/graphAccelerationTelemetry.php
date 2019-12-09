<div class="d-flex justify-content-center">
    <div style="width:75%;">
        <canvas id="accelChart"></canvas>
    </div>
</div>
<script>
    var json = {"jsonarray":<?php echo($json); ?>};
    var altitudeLabels = json.jsonarray.map(function(e) {
       return e.altitude;
    });
    var accelX = json.jsonarray.map(function(e) {
       return e.accelX;
    });
    var accelY = json.jsonarray.map(function(e) {
       return e.accelY;
    });
    var accelZ = json.jsonarray.map(function(e) {
       return e.accelZ;
    });
    var ctx = document.getElementById('accelChart').getContext('2d');
    var accelChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: altitudeLabels,
            datasets: [{
                label: 'X Acceleration',
                data: accelX,
                backgroundColor: 'rgba(255, 157, 30, 0.5)',
                borderColor: 'rgba(255, 157, 30, 0.5)',
                fill: false,
            }, {
                label: 'Y Acceleration',
                data: accelY,
                backgroundColor: 'rgba(46, 133, 64, 0.5)',
                borderColor: 'rgba(46, 133, 64, 0.5)',
                fill: false,
            }, {
                label: 'Z Acceleration',
                data: accelZ,
                backgroundColor: 'rgba(32, 84, 147, 0.5)',
                borderColor: 'rgba(32, 84, 147, 0.5)',
                fill: false,
            }
            ]
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: "Acceleration vs. Altitude"
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Altitude (Sea Level) (m)'
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Raw Accelerometer Data'
                    }
                }],                
            }
        }
    });
</script>