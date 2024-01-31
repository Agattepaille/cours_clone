const { faker } = require('@faker-js/faker');
var mysql      = require('mysql');
var connection = mysql.createConnection({
  host     : 'localhost',
  user     : 'root',
  password : '',
  database : 'test'
});
 
connection.connect();

for (let index = 0; index < 20; index++) {
  connection.query('INSERT INTO employees2 (ID,FIRSTNAME,SURNAME,JOB,CITY,SALARY) VALUES (\'' + faker.random.numeric(6, {allowLeadingZeros: false}) + '\',\'' + faker.person.firstName() + '\',\'' + faker.person.lastName() + '\',\'' + faker.person.jobTitle() + '\',\'' + faker.location.city() + '\',\'' + faker.number.int({ min: 1000, max: 10000 }) + '\' )', 
  function (error, results, fields) {
    if (error) throw error;
    console.log(results);
  });
} 

connection.end();