var Responce;
var Verbrose
var TransectionDescription;
var TransectionDate;
var TransectionTime;
var TransectionType_id;
var Account_id;
var CorespondingAccount_id;
var Dabit;
var Responce;
module.exports = {
    PostTransection: function (_TransectionDescription, _TransectionDate, _TransectionTime, _TransectionType_id, _Account_id, _CorespondingAccount_id, _Dabit, res, _Verbrose) {
        Responce = res;
        Verbrose = _Verbrose;
        TransectionDescription = _TransectionDescription
        TransectionDate = _TransectionDate
        TransectionTime = _TransectionTime
        TransectionType_id = _TransectionType_id
        Account_id = _Account_id
        CorespondingAccount_id = _CorespondingAccount_id
        Dabit = _Dabit;
        var Accounts = require('system/coa/accounts_logic.js'); 
        Accounts.Drcr(Account_id, Dabit, 00, null, false);
        Accounts.Drcr(CorespondingAccount_id, 00, Dabit, null, false);
        var General = require('system/coa/General_logic.js');
        General.NewTransection(Account_id, Dabit, 00, false);
        General.NewTransection(CorespondingAccount_id, 00, Dabit, false);
        var Transection = require('system/coa/dal/transaction.js');
        Transection.Add(TransectionType_id, TransectionDescription, TransectionDate, TransectionTime, Transection_add_Callback);
    }

};
function Transection_add_Callback(err,rows,fields){
    var Transection = require('system/coa/dal/transaction.js');
   
    Transection.LastID(TransectionLastId);
}

function TransectionLastId(err,rows,fields){
    if (Verbrose) { 
     if (err == null) {
            Responce.writeHead(200, { 'Content-Type': 'application/json' });
            Responce.write(JSON.stringify({ 'resoult': rows }));
            Responce.end();
        }
        else {
            Responce.writeHead(200, { 'Content-Type': 'application/json' });
            Responce.write(JSON.stringify({ 'error': err }));
            Responce.end();
        }
    } 
}