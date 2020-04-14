

var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io').listen(server);
var redis = require('redis');
var sub = redis.createClient();
sub.subscribe('LARAVEL_APP');
console.log()

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
    });
});
server.listen(3000);
