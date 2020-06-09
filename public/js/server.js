var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io').listen('http://139.59.75.68/socket/');
var redis = require('redis');
var sub = redis.createClient();
sub.subscribe('LARAVEL_APP');

//server.listen(8890);
// const hostname = '192.168.43.31';
const port = 8080;
console.log(io);
sub.on('message', async function (channel, message) {
    message = JSON.parse(message)
    if (message['event'] == 'test-event') {
	console.log(message);
	io.emit('notification-load', message.payload)
   }

    // if (message['event'] == 'test-event') {
    //     io.in(message.email).emit('notification-load', message.payload)
    // }
});
io.on('connection', function (socket) {   
socket.on('login', function(request){
        console.log('Logged In', request.email)
        socket.join(request.email)
    })
    console.log("client connected");
    var redisClient = redis.createClient();
    redisClient.subscribe('message'); 
redisClient.on("message", function(channel, data) {
        console.log("mew message add in queue "+ data['message'] + " channel");
        socket.emit(channel, data);
		console.log('this is test');
    });
});
server.listen(port);
