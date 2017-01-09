var TableName = "account";
var DrcrTableName = "account_dr_cr";
var mysql      = require('mysql');
var dbconect = require('system/config/dbconfig');
var conn = dbconect.CreateConnection("COA");
module.exports = {
    Select_Drcr: function (Account_id, CallBack) {
        if (Account_id == "") {
            var Sql = "SELECT * FROM " + DrcrTableName;
        }
        else {
            var Sql = "SELECT * FROM " + DrcrTableName + "  where account_id= " + Account_id;
        }
        console.log(Sql);
        conn.query(Sql, CallBack);
    },
    Insert_Drcr: function (Account_id, Dr, Cr, CallBack) {
        var Sql = 'INSERT INTO ' + DrcrTableName + ' VALUES (' + Account_id + ',' + Dr + ',' + Cr + ')';
        conn.query(Sql, CallBack);
    },

    Select: function (Condtion, CallBack) {
        if (Condtion == "") {
            var Sql = "SELECT * FROM " + TableName;
        }
        else {
            var Sql = "SELECT * FROM " + TableName + " " + Condtion;
        }

        conn.query(Sql, CallBack);
    },
    SelectFormated: function (Condtion, CallBack) {
        if (Condtion == "") {
            var Sql = "SELECT account.id , account.name as 'ac_name' , account.description,account.parent_id, chart.name as 'type_name' FROM  `account` ,  `chart` WHERE (account.type_id = chart.id)";
        }
        else {
            var Sql = "SELECT account.id ,account.name as 'ac_name' , account.description,account.parent_id, chart.name as 'type_name' FROM  `account` ,  `chart` WHERE (account.type_id = chart.id AND" + Condtion + ")";
        }
        conn.query(Sql, CallBack); ;
    },

    Add: function (AccountName, AccountDescription, parent_id, AccountTypeId) {
        var res = 0;
        var Sql = 'INSERT INTO ' + TableName + '(name, description, type_id,parent_id)';
        Sql = Sql + 'VALUES("' + AccountName + '","' + AccountDescription + '",' + AccountTypeId + ',' + parent_id + ')';
        conn.query(Sql, function (err, rows, fields) {
            if (typeof (err) != 'undefined') {
                res = err;
            }
            else {

            }
        }
         );
        if (res == 0) {
            return true;
        }
        else {
            return res;
        }
    },
    Update: function (AccountName, AccountDescription, AccountTypeId, parent_id, AccountId, CallBack) {
        AccountName = AccountName.trim();
        AccountDescription = AccountDescription.trim();
        AccountTypeId = AccountTypeId.trim();
        AccountId = AccountId.trim();
        parent_id = parent_id.trim();
        var Sql = "UPDATE " + TableName + " SET ";
        if (AccountName != "") {
            Sql = Sql + " name = '" + AccountName + "'";
        }
        if (AccountDescription != "") {
            if (AccountName == "") {
                Sql = Sql + "  description = '" + AccountDescription + "'";
            }
            else {
                Sql = Sql + " , description = '" + AccountDescription + "'";
            }
        }
        if (AccountTypeId != "") {
            if (AccountName == "" && AccountDescription == "") {
                Sql = Sql + "  type_id = " + AccountTypeId + "";
            }
            else {
                Sql = Sql + " , type_id = " + AccountTypeId + "";
            }
        }
        if (parent_id != "") {
            if (AccountName == "" && AccountDescription == "" && AccountTypeId == "") {
                Sql = Sql + "  parent_id = " + parent_id + "";
            }
            else {
                Sql = Sql + " , parent_id = " + parent_id + "";
            }
        }

        Sql = Sql + " WHERE id=" + AccountId;

        conn.query(Sql, CallBack);
    },
    Delete_record: function (ActivityId) {
        var Sql = "DELETE FROM " + TableName + " WHERE id =" + AccountId;
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