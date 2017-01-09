var Responce;
var Verbrose = true;
module.exports = {
    NewTransection: function (AccountId, Dr, Cr, _Verbrose) {
        Verbrose = _Verbrose;
        var General = require('system/coa/dal/transaction_general_general.js');
        General.Add(AccountId, Dr, Cr);
    }

};

function NewTrnasection_CallBakc(err,rows,fields){
    if(Verbrose){
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
            Responce.write(JSON.stringify({ 'err_msg': err }));
            Responce.end();
        }
    }
}