// {
//     "name": "07node01",
//     "version": "1.0.0",
//     "description": "",
//     "main": "index.js",
//     "scripts": {
//       "test": "echo \"Error: no test specified\" && exit 1"
//     },
//     "keywords": [],
//     "author": "",
//     "license": "ISC",
//     "dependencies": {
//       "mysql": "^2.18.1"
//     }
//   }
  




var http = require('http');


var mysql = require('mysql');





http.createServer(function (req, res) {
  res.writeHead(200, {'Content-Type': 'text/html'});
  res.end('Hello World!..................');
}).listen(8080);


var con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "Info@1234",
    database: "15_mydb_throughnode"
  });
  
//   con.connect(function(err) {
//     if (err) throw err;
//     console.log("Connected!");
//   });

//   con.connect(function(err) {
//     if (err) throw err;
//     console.log("Connected!");
//     con.query(sql, function (err, result) {
//       if (err) throw err;
//       console.log("Result: " + result);
//     });
//   });


//   con.connect(function(err) {
//     if (err) throw err;
//     console.log("Connected!");
//     con.query("CREATE DATABASE 15_mydb_throughnode", function (err, result) {
//       if (err) throw err;
//       console.log("Database created");
//     });
//   });


  con.connect(function(err) {
    if (err) throw err;
    console.log("Connected!");
    //var sql = "DROP TABLE customers";
    //var sql = "CREATE TABLE customers (id bigint(20), name VARCHAR(255), address VARCHAR(255), CONSTRAINT PK_customers PRIMARY KEY (id))";
    //var sql = "CREATE TABLE customers (id bigint(20) AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255), address VARCHAR(255))";
    //var sql = "ALTER TABLE customers ADD COLUMN id INT AUTO_INCREMENT PRIMARY KEY";
    //var sql = "INSERT INTO customers (name, address) VALUES ('Company Inc', 'Highway 37')";
    //var sql = "INSERT INTO customers (name, address) VALUES ?";
    //var values = [
    //         ['John', 'Highway 71'],
    //         ['Peter', 'Lowstreet 4'],
    //         ['Amy', 'Apple st 652'],
    //         ['Hannah', 'Mountain 21'],
    //         ['Michael', 'Valley 345'],
    //         ['Sandy', 'Ocean blvd 2'],
    //         ['Betty', 'Green Grass 1'],
    //         ['Richard', 'Sky st 331'],
    //         ['Susan', 'One way 98'],
    //         ['Vicky', 'Yellow Garden 2'],
    //         ['Ben', 'Park Lane 38'],
    //         ['William', 'Central st 954'],
    //         ['Chuck', 'Main Road 989'],
    //         ['Viola', 'Sideway 1633']
    //     ];
    
    //var sql = "SELECT * FROM customers";
    //var sql = "SELECT name, address FROM customers";
    //var sql = "SELECT * FROM customers WHERE address = 'Park Lane 38'";
    //var sql = "SELECT * FROM customers WHERE address LIKE 'S%'";
    //var adr = 'Mountain 21';
    //var sql = 'SELECT * FROM customers WHERE address = ' + mysql.escape(adr);
    //var adr = 'Mountain 21';
    //var sql = 'SELECT * FROM customers WHERE address = ?';
    //var name = 'Amy';
    //var adr = 'Mountain 21';
    //var sql = 'SELECT * FROM customers WHERE name = ? OR address = ?';
    //var sql = "SELECT * FROM customers ORDER BY name";
    //var sql = "SELECT * FROM customers ORDER BY name DESC";
    //var sql = "DELETE FROM customers WHERE address = 'Mountain 21'";
    //var sql = "DROP TABLE customers";
    //var sql = "DROP TABLE IF EXISTS customers";
    //var sql = "UPDATE customers SET address = 'Canyon 123' WHERE address = 'Valley 345'";
    //var sql = "SELECT * FROM customers LIMIT 5";
    //var sql = "SELECT * FROM customers LIMIT 5 OFFSET 2"; //If you want to return five records, starting from the third record, you can use the "OFFSET" keyword:
    var sql = "SELECT * FROM customers LIMIT 2, 5"; //You can also write your SQL statement like this "LIMIT 2, 5" which returns the same as the offset example above:

    
    //con.query(sql, [values], function (err, result) {
    //con.query(sql, function (err, result) {
    //con.query(sql, function (err, result, fields) {
    //con.query(sql, [adr], function (err, result) {
    //con.query(sql, [name, adr], function (err, result) {
    con.query(sql, function (err, result) {
      if (err) throw err;
      //console.log("Table Droped"); 
      //console.log("Table created");
      //console.log("Table altered");
      //console.log("1 record inserted");
      //console.log(result);
      //console.log("Number of records inserted: " + result.affectedRows); // this is for multiple records enters
      //console.log("1 record inserted, ID: " + result.insertId); // it will show last inserted id
      //console.log(result);
      //console.log(fields);
      //console.log("Number of records deleted: " + result.affectedRows);
      //console.log("Table deleted");
      //console.log(result.affectedRows + " record(s) updated");
      console.log(result);
    });
  });

//npm init -y
