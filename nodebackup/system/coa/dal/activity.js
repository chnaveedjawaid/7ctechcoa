var TableName = "activity_type";
var mysql      = require('mysql');
var dbconect = require('system/config/dbconfig');
var conn = dbconect.CreateConnection("COA");
module.exports = {
    Select: function (CallBak, Condition) {
        if (Condition == "") {
            var Sql = "SELECT * FROM " + TableName;
        }
        else {
            var Sql = "SELECT * FROM " + TableName + " " + Condition;
        }
        console.log(Sql);
        conn.query(Sql, CallBak);
    },

    Add: function (ActivityType, ActivityDescription) {
        var Sql = 'INSTER INTO ' + this.TableName + '(type, description)';
        Sql = Sql + 'VALUES("' + ActivityType + '","' + ActivityDescription + '")';
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
    Update: function (ActivityType, ActivityDescription, ActivityId) {
        ActivityType = ActivityType.trim();
        ActivityDescription = ActivityDescription.trim();
        ActivityId = ActivityId.trim();


        var Sql = "UPDATE " + this.TableName + " SET ";
        if (ActivityType != "") {
            Sql = Sql + "name = '" + ActivityType + "'";
        }
        if (ActivityDescription != "") {
            Sql = Sql + "description = '" + ActivityDescription + "'";
        }

        Sql = Sql + "WHERE id=" + ActivityId;
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
    Delete_record: function (ActivityId) {
        var Sql = "DELETE FROM " + this.TableName + " WHERE id =" + ActivityId;
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