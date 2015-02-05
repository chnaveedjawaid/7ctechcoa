var TableName = "type";
var mysql      = require('mysql');
var dbconect = require('../../config/dbconfig');
var conn = dbconect.CreateConnection("COA");
module.exports = {
    Select: function (Condtion) {
        var Sql = "SELECT type_id, type_description, type_name FROM" + this.TableName + Condition;
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

    Add: function (TypeDescription, TypeName) {
        var Sql = 'INSTER INTO ' + this.TableName + '(type_description, type_name)';
        Sql = Sql + 'VALUES("' + TypeDescription + '","' + TypeName + '")';
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
    Update: function (TypeDescription, TypeName, TypeId) {
        TypeDescription = TypeDescription.trim();
        TypeName = TypeName.trim();
        TypeId = TypeId.trim();
        var Sql = "UPDATE " + this.TableName + " SET ";
        if (TypeDescription != "") {
            Sql = Sql + "type_description = '" + TypeDescription + "'";
        }
        if (TypeDescription != "" && TypeName != "") {
            Sql = Sql + ",";
        }
        if (TypeName != "") {
            Sql = Sql + "type_name = '" + TypeName + "'";
        }
        Sql = Sql + "WHERE type_id=" + TypeId;
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
    Delete_record: function (Typeid) {
        var Sql = "DELETE FROM "+ this.TableName + " WHERE type_id =" + typeId;
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