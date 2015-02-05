var TableName = "transaction";
var mysql      = require('mysql');
var dbconect = require('system/config/dbconfig');
var conn = dbconect.CreateConnection("COA");
module.exports = {
    Select: function (Condtion, CallBack) {
        var Sql = "SELECT * FROM " + TableName + " " + Condtion;
        conn.query(Sql, CallBack);
    },

    LastID: function (CallBack) {
        var Sql = "SELECT MAX(ID) FROM " + TableName;
        console.log(Sql);
        conn.query(Sql, CallBack);
    },


    Add: function (TransactionTypeId, TransactionDescription, TransactionDate, TransactionTime, CallBack) {
        var Sql = 'INSERT INTO ' + TableName + '(type_id, description, date, time)';
        Sql = Sql + 'VALUES(' + TransactionTypeId + ',"' + TransactionDescription + '","' + TransactionDate + '","' + TransactionTime + '")';
        conn.query(Sql, CallBack);

    },


    Update: function (TransactionTypeId, TransactionDescription, TransactionDate, TransactionTime, TransactionId, CallBack) {
        TransactionDescription = TransactionDescription.trim();
        TransactionId = TransactionId.trim();
        TransactionTypeId = TransactionTypeId.trim();
        var Sql = "UPDATE " + this.TableName + " SET ";
        if (TransactionTypeId != "") {
            Sql = Sql + "type_id = '" + TransactionTypeId + "'";
        }
        if (TransactionDescription != "") {
            Sql = Sql + "description = '" + TransactionDescription + "'";
        }
        if (TransactionDate != "") {
            Sql = Sql + "date = '" + TransactionDate + "'";
        }
        if (TransactionTime != "") {
            Sql = Sql + "time = '" + TransactionTime + "'";
        }
        Sql = Sql + "WHERE id=" + TransactionId;
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
    Delete_record: function (TransactionId) {
        var Sql = "DELETE FROM " + this.TableName + " WHERE id =" + TransactionId;
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