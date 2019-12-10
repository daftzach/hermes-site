<div class="d-flex justify-content-center">
    <div class="container">
        <div class="col-sm">
            <canvas id="accelChart"></canvas>
        </div>
        <div class="col-sm">
            <canvas id="gyroChart"></canvas>
        </div>
        <div class="col-sm">
                <canvas id="posChart"></canvas>
        </div>
        <div class="col-sm">
            <canvas id="chargeChart"></canvas>
        </div>
        <div class="col-sm">
            <canvas id="voltageChart"></canvas>
        </div>
        <div class="col-sm">
            <canvas id="temperatureChart"></canvas>
        </div>
        <div class="col-sm">
            <canvas id="pressureChart"></canvas>
        </div>
        <div class="col-sm">
            <canvas id="humidityChart"></canvas>
        </div>
        <div class="col-sm">
            <canvas id="gasChart"></canvas>
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
                label: 'VOC Gas Composition',
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
                        labelString: 'VOC Gas Composition (KOhms)'
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