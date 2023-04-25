

var mysql = require('mysql');

var con = mysql.createConnection({
    host: "localhost",
    user: "brilliant",
    password: "2112002",
    database: "horticulturedb"
});


con.connect(function(err) {
    if (err) throw err;
    console.log("Connected!");
});


con.query("SELECT users_uid FROM ho_users where users_id = 1 ", function (err, result, fields) {
    if (err) throw err;
    console.log(result[0]['users_uid']);
});


