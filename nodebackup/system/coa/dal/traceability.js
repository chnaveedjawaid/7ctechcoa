var TableName = "traceability";
var mysql      = require('mysql');
var dbconect = require('system/config/dbconfig');
var conn = dbconect.CreateConnection("COA");
module.exports = {
    Select: function (Condtion,CallBack) {
        if(Condtion==""){
        var Sql = "SELECT * FROM " + TableName 
        }
        else{
             var Sql = "SELECT * FROM " + TableName +" "+ Condtion;
        }
        conn.query(Sql, CallBack);
    },

    Add: function (TraceabilityEntityType, TraceabilityEntityName, TraceabilityDate, TraceabilityTime, TraceabilityActivityType, CallBack) {
        var Sql = 'INSERT INTO ' + TableName + '(entity_type,entity_name, date, time, activity_type)';
        Sql = Sql + 'VALUES(' + TraceabilityEntityType + ',"' + TraceabilityEntityName + '","' + TraceabilityDate + '","' + TraceabilityTime + '",' + TraceabilityActivityType + ')';
        console.log(Sql);
        conn.query(Sql, CallBack);

    },
    Update: function (TraceabilityEntityType, TraceabilityEntityName, TraceabilityDate, TraceabilityTime, TraceabilityActivityType, TraceabilityId) {
        TraceabilityEntityType = TraceabilityEntityType.trim();
        TraceabilityEntityName = TraceabilityEntityName.trim();
        TraceabilityDate = TraceabilityDate.trim();
        TraceabilityTime = TraceabilityTime.trim();
        TraceabilityActivityType = TraceabilityActivityType.trim();
        TraceabilityId = TraceabilityId.trim();


        var Sql = "UPDATE " + this.TableName + " SET ";
        if (TraceabilityEntityType != "") {
            Sql = Sql + "entity_type = '" + TraceabilityEntityType + "'";
        }
        if (TraceabilityEntityName != "") {
            Sql = Sql + "entity_name = '" + TraceabilityEntityName + "'";
        }
        if (TraceabilityDate != "") {
            Sql = Sql + "date = '" + TraceabilityDate + "'";
        }
        if (TraceabilityTime != "") {
            Sql = Sql + "time = '" + TraceabilityTime + "'";
        }
        if (TraceabilityActivityType != "") {
            Sql = Sql + "activity_type = '" + TraceabilityActivityType + "'";
        }

        Sql = Sql + "WHERE id=" + TraceabilityId;
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
    Delete_record: function (TraceabilityId) {
        var Sql = "DELETE FROM " + this.TableName + " WHERE id =" + TraceabilityId;
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