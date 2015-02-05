var TableName = "transaction_type";
var mysql      = require('mysql');
var dbconect = require('../../config/dbconfig');
var conn = dbconect.CreateConnection("COA");
module.exports = {
    Select: function (Condtion) {
        var Sql = "SELECT * FROM" + this.TableName + Condtion;
        conn.query(Sql, function (err, rows, fields) {
            if (typeof (err) != 'undefined') {
                return err;
            }
            else {
                return rows;
            }
        }
                );
    },

    Add: function (TransactionName, TransactionDescription) {
        var Sql = 'INSTER INTO ' + this.TableName + '(name, description)';
        Sql = Sql + 'VALUES("' + TransactionName + '","' + TransactionDescription + '")';
        conn.query(Sql, function (err, rows, fields) {
            if (typeof (err) != 'undefined') {
                return err;
            }
            else {
                return true;
            }
        }
                );

    },
    Update: function (TransactionName, TransactionDescription, TransactionTypeId) {
        TransactionName = TransactionName.trim();
        TransactionDescription = TransactionDescription.trim();
        TransactionTypeId = TransactionTypeId.trim();
		
		
        var Sql = "UPDATE " + this.TableName + " SET ";
        if (TransactionName != "") {
            Sql = Sql + "name = '" + TransactionName + "'";
        }
		if (TransactionDescription != "") {
            Sql = Sql + "description = '" + TransactionDescription + "'";
        }
        		
        Sql = Sql + "WHERE type_id=" + TransactionTypeId;
        conn.query(Sql, function (err, rows, fields) {
            if (typeof (err) != 'undefined') {
                return err;
            }
            else {
                return true;
            }
        }
                );
    },
    Delete_record: function (TransactionTypeId) {
        var Sql = "DELETE FROM "+ this.TableName + " WHERE type_id =" + TransactionTypeId;
        conn.query(Sql, function (err, rows, fields) {
            if (typeof (err) != 'undefined') {
                return err;
            }
            else {
                return true;
            }
        }
                );
    }

};