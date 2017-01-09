var TableName = "chart";
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

    Add: function (ChartName, ChartDescription) {
        var Sql = 'INSTER INTO ' + this.TableName + '(name, description)';
        Sql = Sql + 'VALUES("' + ChartName + '","' + ChartDescription + '")';
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
    Update: function (ChartName, ChartDescription, ChartId) {
        ChartName = ChartName.trim();
        ChartDescription = ChartDescription.trim();
        ChartId = ChartId.trim();
		
		
        var Sql = "UPDATE " + this.TableName + " SET ";
        if (ChartName != "") {
            Sql = Sql + "name = '" + ChartName + "'";
        }
		if (ChartDescription != "") {
            Sql = Sql + "description = '" + ChartDescription + "'";
        }
        		
        Sql = Sql + "WHERE id=" + ChartId;
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
    Delete_record: function (ChartId) {
        var Sql = "DELETE FROM "+ this.TableName + " WHERE id =" + ChartId;
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