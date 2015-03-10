var mysql = require('mysql');

 var connection = mysql.createConnection({
  host     : 'localhost',
  port     : '3306',
  user     : 'root',
  password : 'root',
  database : 'karan'
 });

 connection.connect( function(err){
if (err){ 
    throw err;
}
else {
    console.log('Connected');
//res.end('Hello i am connected with database');
}
 });
 

