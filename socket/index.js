
var express = require('express');
var app = express();
var http = require('http').Server(app);
var io = require('socket.io')(http, {cors: {origin: "*"}});
var mysql = require('mysql');
var moment = require('moment');
var axios = require('axios');

const LANDLORD_DB_USER = "root";
const LANDLORD_DB_PASSWORD = "";
const LANDLORD_DB_PORT = 3308;

var sockets = {}


let getUserByToken = function ( query, successCallBack) {
    console.log(query.headers);

    let path = query.headers.origin + '/smart-crm/public/remote/v-profile';

 console.log("asking :  " + path  ) ;
    var config = {
        method: 'get',
        url: path,
        headers: query.headers
    };

    axios(config)
            .then(function (response) {
  console.log("User received")

                successCallBack(response.data)
            })
            .catch(function (error) {
        // console.log("User not found in  " + path + " << " + error.message)
           console.log("axios response err  "+JSON.stringify(error))

            });


}


var con = mysql.createConnection({

    host: 'localhost',
    user: LANDLORD_DB_USER,
    password: LANDLORD_DB_PASSWORD,
    database: 'erp_db',
    port: LANDLORD_DB_PORT

});


con.connect(function (err) {
    if (err)
        throw err;
});

function getTenantDatabaseName(query, landlordCon, callback) {

    let key = query.app_id.trim();

    landlordCon.query(
            'SELECT tenants.data as info FROM tenants where id=?', [key]
            , function (err, result, fields) {
                if (err)
                    throw err;
                callback(JSON.parse(result[0].info).tenancy_db_name)

            });

}


function  getTenantConnection(query, landlordCon, callback) {

    getTenantDatabaseName(query, landlordCon, function (db_name) {


        if (db_name != "") {
            console.log(db_name);

            var tenantCon = mysql.createConnection({

                host: 'localhost',
                user: LANDLORD_DB_USER,
                password: LANDLORD_DB_PASSWORD,
                database: db_name,
                port: LANDLORD_DB_PORT

            });

            tenantCon.connect(function (err) {

                if (err)
                    throw err;
                console.log("Tenant Database connection successfully")

            });

            tenantCon;
            callback(tenantCon)
        } else {

            console.log("Connection to tenant database was not established")
        }






    });





}




io.on('connection', function (socket) {
    console.log("Some one wanna come with bearer token ")

    getTenantConnection(socket.handshake.headers, con, function (con) {

        console.log("Connection to tenant database is established")
                ;

        console.log(socket.handshake.headers.origin);


        getUserByToken(socket.handshake, function (user) {


            if (user != null) {




                if (!sockets[user.id]) {
                    sockets[user.id] = [];
                    socket.broadcast.emit('user_connected', user.name);
                }
                sockets[user.id].push(socket)
                console.log("Someone added ")
                con.query('UPDATE users set is_online=1 where id=$(user.id)', function (res, err) {
                    if (err)
                        throw err;
                    console.log("User connected " + user.name)

                });
                socket.on('disconnect', function (err) {
                    socket.broadcast.emit('user_disconnected', user.id);
                    for (var index in sockets[user.id]) {
                        if (socket.id == sockets[user.id][index].id) {
                            sockets[user.id].splice(index, 1);


                        }
                    }
                    con.query('UPDATE users set is_online=0 where id=$(user.id)', function (res, err) {
                        if (err)
                            throw err;
                        console.log("User Left " + user.name)

                    });
                });
            } else {
                console.log("User with that token not found !")
            }



        });







    });




})
http.listen(3000);
