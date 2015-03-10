var mysql = require('mysql');
 
var connection = mysql.createConnection(
    {
      host     : 'localhost',
      user     : 'root',
      password : 'root',
      database : 'karan',
      port     :  3306

    }
);
 
connection.connect();
 
var queryString = 'SELECT * FROM FirstTable';
 
connection.query(queryString, function(err, rows, fields) {
    if (err) throw err;
 
    for (var i in rows) {
        console.log('Post Titles: ', rows[i].number);
    }
});
 
connection.end();
