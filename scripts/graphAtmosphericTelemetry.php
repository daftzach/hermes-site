<div class="d-flex justify-content-center">
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <canvas id="temperatureChart"></canvas>
            </div>
            <div class="col-sm">
                <canvas id="pressureChart"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <canvas id="humidityChart"></canvas>
            </div>
            <div class="col-sm">
                <canvas id="gasChart"></canvas>
             </div>
        </div>
    </div>
</div>
<script>
    var json = {"jsonarray":<?php echo($json); ?>};
    var altitudeLabels = json.jsonarray.map(function(e) {
       return e.altitude;
    });
    var temperature = json.jsonarray.map(function(e) {
       return e.temperature;
    });
    var ctx = document.getElementById('temperatureChart').getContext('2d');
    var temperatureChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: altitudeLabels,
            datasets: [{
                label: 'Temperature',
                data: temperature,
                backgroundColor: 'rgba(255, 157, 30, 0.5)',
                borderColor: 'rgba(255, 157, 30, 0.5)',
                fill: false,
            }]
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: "Temperature vs. Altitude"
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
                        labelString: 'Temperature (c)'
                    }
                }],                
            }
        }
    });
</script>
<script>
    var json = {"jsonarray":<?php echo($json); ?>};
    var altitudeLabels = json.jsonarray.map(function(e) {
       return e.altitude;
    });
    var pressure = json.jsonarray.map(function(e) {
       return e.pressure;
    });
    var ctx = document.getElementById('pressureChart').getContext('2d');
    var pressureChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: altitudeLabels,
            datasets: [{
                label: 'Pressure',
                data: pressure,
                backgroundColor: 'rgba(46, 133, 64, 0.5)',
                borderColor: 'rgba(46, 133, 64, 0.5)',
                fill: false,
            }]
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: "Pressure vs. Altitude"
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
                        labelString: 'Pressure (hPa)'
                    }
                }],                
            }
        }
    });
</script>
<script>
    var json = {"jsonarray":<?php echo($json); ?>};
    var altitudeLabels = json.jsonarray.map(function(e) {
       return e.altitude;
    });
    var humidity = json.jsonarray.map(function(e) {
       return e.humidity;
    });
    var ctx = document.getElementById('humidityChart').getContext('2d');
    var humidityChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: altitudeLabels,
            datasets: [{
                label: 'Humidity',
                data: humidity,
                backgroundColor: 'rgba(32, 84, 147, 0.5)',
                borderColor: 'rgba(32, 84, 147, 0.5)',
                fill: false,
            }]
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: "Humidity vs. Altitude"
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
                        labelString: 'Humidity (%)'
                    }
                }],                
            }
        }
    });
</script>
<script>
    var json = {"jsonarray":<?php echo($json); ?>};
    var altitudeLabels = json.jsonarray.map(function(e) {
       return e.altitude;
    });
    var gas = json.jsonarray.map(function(e) {
       return e.gas;
    });
    var ctx = document.getElementById('gasChart').getContext('2d');
    var gasChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: altitudeLabels,
            datasets: [{
                label: 'VOC Gas Composition %',
                data: gas,
                backgroundColor: 'rgba(221, 54, 28, 0.5)',
                borderColor: 'rgba(221, 54, 28, 0.5)',
                fill: false,
            }]
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: "VOC Gas Composition vs. Altitude"
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
                        labelString: 'VOC Gas Composition (%)'
                    }
                }],                
            }
        }
    });
</script>