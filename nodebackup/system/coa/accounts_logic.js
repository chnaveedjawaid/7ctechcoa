var Responce;
var Verbrose=true;
module.exports = {
    CreateAccount: function (AccountName, AccountDescription, Account_Parent_id, AccountTypeId, res,_Verbrose) {
        Verbrose = _Verbrose;
        var Accountdal = require('system/coa/dal/account.js');
        var Resoult = Accountdal.Add(AccountName, AccountDescription, Account_Parent_id, AccountTypeId);

        if (Resoult == true) {
            res.writeHead(200, { 'Content-Type': 'application/json' });
            res.write(JSON.stringify({ 'resoult': 'Request processed sccessfully' }));
            res.end();
        }
        else {
            res.writeHead(200, { 'Content-Type': 'application/json' });
            res.write(JSON.stringify({ 'error': Resoult }));
            res.write(Resoult);
            res.end();
        }
    },
    LoadAllAcountFormated: function (res, _Verbrose) {
        Verbrose = _Verbrose;
        Responce = res;
        var Accountdal = require('system/coa/dal/account.js');
        var Resoult = Accountdal.SelectFormated("", LoadAllAccount_CallBack);
    },
    LoadAllAcount: function (res) {
        Responce = res;
        var Accountdal = require('system/coa/dal/account.js');
        var Resoult = Accountdal.Select("", LoadAllAccount_CallBack);
    },
    LoadAcount: function (condition, res) {
        if (condition.indexOf("=") == -1) {
            Responce = res;
            var Accountdal = require('system/coa/dal/account.js');
            var Resoult = Accountdal.Select("where(id=" + condition + ")", LoadAllAccount_CallBack);
        }
        else {
            Responce.writeHead(200, { 'Content-Type': 'application/json' });
            Responce.write(JSON.stringify({ 'error': "Sql injection detected!" }));
        }
    },
    UpdateAcout: function (AccountName, AccountDescription, AccountTypeId, Account_Parent_id, AccountId, res,_Verbrose) {
        Verbrose = _Verbrose;
        Responce = res;
        var Accountdal = require('system/coa/dal/account.js');
        Accountdal.Update(AccountName, AccountDescription, AccountTypeId, Account_Parent_id, AccountId, UpdateAccount_CallBack);
    },
    Select_Drcr: function (Account_id, res) {
                Responce = res;
        var Accountdal = require('system/coa/dal/account.js');
        Accountdal.Select_Drcr(Account_id, LoadAllAccount_CallBack);
    },
    Drcr: function (Account_id, Dr, Cr, res, _Verbrose) {
        Verbrose = _Verbrose;
        Responce = res;
        var Accountdal = require('system/coa/dal/account.js');
        Accountdal.Insert_Drcr(Account_id, Dr, Cr, UpdateAccount_CallBack);
    }

};


function LoadAllAccount_CallBack(err,rows,fields){
    if(Verbrose==true){
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
function UpdateAccount_CallBack(err,rows,fields){
    if (Verbrose==true) {
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
}