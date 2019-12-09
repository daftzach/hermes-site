<div class="d-flex justify-content-center">
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <canvas id="chargeChart"></canvas>
            </div>
            <div class="col-sm">
                <canvas id="voltageChart"></canvas>
            </div>
        </div>
    </div>
</div>
<script>
    var json = {"jsonarray":<?php echo($json); ?>};
    var timeLabels = json.jsonarray.map(function(e) {
       return e.time;
    });
    var charge = json.jsonarray.map(function(e) {
       return e.charge;
    });
    var ctx = document.getElementById('chargeChart').getContext('2d');
    var chargeChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: timeLabels,
            datasets: [{
                label: 'Charge',
                data: charge,
                backgroundColor: 'rgba(255, 157, 30, 0.5)',
                borderColor: 'rgba(255, 157, 30, 0.5)',
                fill: false,
            }]
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: "Charge vs. Time"
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Time (UTC)'
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Charge (%)'
                    }
                }],                
            }
        }
    });
</script>
<script>
    var json = {"jsonarray":<?php echo($json); ?>};
    var timeLabels = json.jsonarray.map(function(e) {
       return e.time;
    });
    var voltage = json.jsonarray.map(function(e) {
       return e.voltage;
    });
    var ctx = document.getElementById('voltageChart').getContext('2d');
    var voltageChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: timeLabels,
            datasets: [{
                label: 'Voltage',
                data: voltage,
                backgroundColor: 'rgba(46, 133, 64, 0.5)',
                borderColor: 'rgba(46, 133, 64, 0.5)',
                fill: false,
            }]
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: "Voltage vs. Time"
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Time (UTC)'
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Voltage (mV)'
                    }
                }],                
            }
        }
    });
</script>