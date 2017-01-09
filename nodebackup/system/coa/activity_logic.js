var Responce;
var output;
var entity_type;
var entity_name;
var date;
var time;
var ActivityTypeId;
module.exports = {
    NewActivity: function (_entity_type, _entity_name, _date, _time, activity_type, res) {

        entity_type = _entity_type;
        entity_name = _entity_name;
        date = _date;
        time = _time;
        Responce = res;
        var Activity = require('system/coa/dal/activity.js');
        var abc = Activity.Select("where type='" + activity_type + "'");




    },
    /////////////////////////////////////////////////TO DO////////////////////////////////////////////////
    GetActivities: function(Condition){
      ///////////////////////////////////////Returns activities accourding to condtion or all activities in formated manner////////////////////
      //////////////////////////////////////will have two nested call backs///////////////////////////////////////////////////////////////////  
    },
    /////////////////////////////////////////////////TO DO////////////////////////////////////////////////
    GetActivityArry: function () {
        var Activity = require('system/coa/dal/activity.js');
        Activity.Select(Activity_CallBack);
    }
};
function Activity_CallBack(err,rows,fields){
    ActivityTypeId = rows[0].id;
     var Trace = require('system/coa/dal/traceability.js');
     Trace.Add(entity_type, entity_name, date, time, ActivityTypeId, Trace_CallBack);
    
}
function Trace_CallBack(err,rows,fields){
     if (err == null) {
         Responce.writeHead(200, { 'Content-Type': 'application/json' });
         Responce.write(JSON.stringify({ 'resoult': 'Process completed successfuly' }));
         Responce.write(JSON.stringify({ 'msg': 'true' }));
         Responce.end();
    }
    else {
        Responce.writeHead(200, { 'Content-Type': 'application/json' });
        Responce.write(JSON.stringify({ 'resoult': 'Process failed' }));
        Responce.write(JSON.stringify({ 'msg': 'false' }));
        Responce.write(JSON.stringify({ 'msg': err }));
        Responce.end();
    }
}