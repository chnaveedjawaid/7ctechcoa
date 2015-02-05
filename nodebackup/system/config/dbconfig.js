
var mysql      = require('mysql');
module.exports = {
    CreateConnection: function createconnection(dbname) {

        var connection = mysql.createConnection({
            host: 'localhost',
            user: 'root',
            password: ''
            
           
        });
        connection.query('USE coa');
    

            return connection;


    }
};