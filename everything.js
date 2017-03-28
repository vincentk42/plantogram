var sensorLib = require("node-dht-sensor");

var five = require("johnny-five"); //Johnny five req 
var Raspi = require("raspi-io");

var mysql = require("mysql");
var http = require('http');

var status = false;

var board = new five.Board({
    io: new Raspi()
});
//inside jonny five, create a new Raspi thingy

function checkingForUnsent(){
    var con = mysql.createConnection({
        host: "localhost",
        user: "root",
        password: "",
        database: "piTest"
    });

    con.connect(function (err) {
        if (err) {
            console.log('Error connecting to Db');
            return;
        }
//        console.log('Connection established');
    });
    console.log("Unsent is working");
    var number = 0;
    var unsent = false;
    
    con.query('SELECT status FROM pi_data', function(err,rows){
        if(err) throw err;
//        console.log('Status: ' + rows);
//        console.log(rows);
            // console.log(rows);
        for (t = 0; t < rows.length; t++) {
            if(rows[t]["status"] === 0){
                number = t;  
                unsent = true;
            }                               
        }
    });
    var secondQs = "";
    if(unsent = true){
        con.query('SELECT timestamp, temperature, humidity FROM pi_data WHERE id>=?', number, function(err, rows){
            for(t = 0; t < rows.length; t++){
                var querystring = require("querystring");
                var qs = querystring.stringify(rows[t]);
                // console.log(qs);
                secondQs = secondQs + "&"
            }
        });
        return secondQs;
    }

    con.end(function (err) {

    }); 
};

// writes to the db in tablet
function doIt(b) {
    var unsentData = checkingForUnsent();
    var data = {
        temp: b.temperature.toFixed(1),
        hum: b.humidity.toFixed(1)
    };
    var querystring = require("querystring");
    var qs = querystring.stringify(data);
    var qslength = qs.length;
    // console.log("THIS IS THE STRINGITY " + qs);
    

    var options = {
        host: '192.168.1.155',
//        path: '/myStuff/plantogramInsert.php?temp=' + b.temperature.toFixed(1) + '&hum=' + b.humidity.toFixed(1)
        path: '/myStuff/plantogramInsert.php',
        method: 'post',
        headers:{
        'Content-Type': 'application/x-www-form-urlencoded',
        'Content-Length': qslength
        }
    };

    var callback = function (response) {
        var str = '';

        response.on('data', function (chunk) {
            str += chunk;
        });

        response.on('end', function () {
            console.log(str);
            if(str.substring(0,2) === "Do"){
                status = true;
                changeStatus();
            };
//            console.log(status);
        });
        response.on('error', function(){
            
            console.log("Keep going");
            
        });
    };

    var request = http.request(options, callback).setTimeout(3000 , function() { console.log("Problem with connection."); status = false; this.end(); } );
    request.write(qs);
    request.write(unsentData);
    request.end();
    
};

function changeStatus(){
    var con = mysql.createConnection({
        host: "localhost",
        user: "root",
        password: "",
        database: "piTest"
    });

    con.connect(function (err) {
        if (err) {
            console.log('Error connecting to Db');
            return;
        }
        console.log('Connection established');
    });
    
//    con.query('SELECT status FROM pi_data', function(err,rows){
//        if(err) throw err;
////        console.log('Status: ' + rows);
////        console.log(rows);
//    });
    
  
    con.query('UPDATE pi_data SET status=true WHERE status=0', function (err, res) {
        if (err) throw err;
        console.log('Updated to SENT');
    });
 
    con.end(function (err) {

    });
    
};

//writes to the db in raspberryPI
function doItAgain(b) {

    var con = mysql.createConnection({
        host: "localhost",
        user: "root",
        password: "",
        database: "piTest"
    });

    con.connect(function (err) {
        if (err) {
            console.log('Error connecting to Db');
            return;
        }
        console.log('Connection established');
    });

    var newName = {
        temperature: b.temperature.toFixed(1),
        humidity: b.humidity.toFixed(1),
        status: status
    };
    con.query('INSERT INTO pi_data SET ?', newName, function (err, res) {
        if (err) throw err;
//        console.log('Last insert ID:', res.insertId);
    });

    con.end(function (err) {

    });

};


var led = null;
// jonny five requirement, as it isnt blink but now on.

board.on("ready", function () {
    led = new five.Leds(["P1-11", "P1-13", "P1-15"]);
    this.on("exit", function() {
        led.off();
    });
});


var sensor = {
    sensors: [{
        name: "One",
        type: 11,
        pin: 4
    }],
    read: function () {
        // if (led !== null) led[1].on();

        for (var a in this.sensors) {
            var b = sensorLib.read(this.sensors[a].type, this.sensors[a].pin);
            if (b.temperature.toFixed(1) !== "0.0") {
                console.log(b.temperature.toFixed(1) + "°C, " +  b.humidity.toFixed(1) + "%");
                    doItAgain(b);
                    doIt(b);
                  if(b.humidity.toFixed(1) <= 35){
                        if(led !== null) led.off();
                        if(led !== null) led[0].on();
                  };
                  if(b.humidity.toFixed(1) <= 40 && b.humidity.toFixed(1) > 35){
                        if(led !== null) led.off();

                        if(led !== null) led[1].on();

                  }
                  if(b.humidity.toFixed(1) > 40){
                        if(led !== null) led.off();

                        if(led !== null) led[2].on();

                  };
            };
        }


        // if (led !== null) led.off();

        setTimeout(function () {
            sensor.read();
        }, 5000);
    }
};

sensor.read();
