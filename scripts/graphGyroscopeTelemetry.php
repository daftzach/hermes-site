<div class="d-flex justify-content-center">
    <div style="width:75%;">
        <canvas id="gyroChart"></canvas>
    </div>
</div>
<script>
    var json = {"jsonarray":<?php echo($json); ?>};
    var altitudeLabels = json.jsonarray.map(function(e) {
       return e.altitude;
    });
    var gyroX = json.jsonarray.map(function(e) {
       return e.gyroX;
    });
    var gyroY = json.jsonarray.map(function(e) {
       return e.gyroY;
    });
    var gyroZ = json.jsonarray.map(function(e) {
       return e.gyroZ;
    });
    var ctx = document.getElementById('gyroChart').getContext('2d');
    var gyroChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: altitudeLabels,
            datasets: [{
                label: 'X',
                data: gyroX,
                backgroundColor: 'rgba(255, 157, 30, 0.5)',
                borderColor: 'rgba(255, 157, 30, 0.5)',
                fill: false,
            }, {
                label: 'Y',
                data: gyroY,
                backgroundColor: 'rgba(46, 133, 64, 0.5)',
                borderColor: 'rgba(46, 133, 64, 0.5)',
                fill: false,
            }, {
                label: 'Z',
                data: gyroZ,
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
                text: "Gyroscope vs. Altitude"
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
                        labelString: 'Raw Gyroscopic Data'
                    }
                }],                
            }
        }
    });
</script>