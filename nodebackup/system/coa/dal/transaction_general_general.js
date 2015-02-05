var TableName = "transaction_general_general";
var mysql      = require('mysql');
var dbconect = require('system/config/dbconfig');
var conn = dbconect.CreateConnection("COA");
module.exports = {
    Select: function (Condtion,CallBack) {
        var Sql = "SELECT * FROM " + TableName +" "+ Condtion;
        conn.query(Sql,CallBack);
    },

    Add: function (TransactionSubAccountId, TransactionDebit, TransactionCredit,CallBack) {
        var Sql = 'INSERT INTO ' + TableName + ' (account_id, debit, credit) ';
        Sql = Sql + 'VALUES(' + TransactionSubAccountId + ',' + TransactionDebit + ',' + TransactionCredit + ')';
        conn.query(Sql,CallBack);

    },
    Update: function (TransactionSubAccountId, TransactionDebit, TransactionCredit, TransactionId) {
        TransactionSubAccountId = TransactionSubAccountId.trim();
        TransactionDebit = TransactionDebit.trim();
        TransactionCredit = TransactionCredit.trim();
		TransactionId = TransactionId.trim();
		
        var Sql = "UPDATE " + this.TableName + " SET ";
        if (TransactionSubAccountId != "") {
            Sql = Sql + "sub_account_id = '" + TransactionSubAccountId + "'";
        }
		if (TransactionDebit != "") {
            Sql = Sql + "debit = '" + TransactionDebit + "'";
        }
        if (TransactionCredit != "") {
            Sql = Sql + "credit = '" + TransactionCredit + "'";
        }
		
        Sql = Sql + "WHERE transaction_id=" + TransactionId;
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
        var Sql = "DELETE FROM "+ this.TableName + " WHERE transaction_id =" + TransactionId;
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