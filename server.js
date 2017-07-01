var socket  = require( 'socket.io' );
var express = require('express');
var app     = express();
var server  = require('http').createServer(app);
var io      = socket.listen( server );
var port    = process.env.PORT || 3500;

server.listen(port, function () {
  console.log('Server listening at port %d', port);
});


io.on('connection', function (socket) {

  socket.on( 'new_notif', function( data ) {
    io.sockets.emit( 'new_notif', {
    	new_notif_updates_count: data.new_notif_updates_count,
      new_notif_detail: data.new_notif_detail,
      new_notif_url: data.new_notif_url,
      new_member_id: data.new_member_id
    });
  });

  socket.on( 'new_notif_updates_count', function( data ) {
    io.sockets.emit( 'new_notif_updates_count', {
      new_count: data.new_count,
      new_count_member_id: data.new_count_member_id
    });
  });

  socket.on( 'new_count_all_post', function( data ) {
    io.sockets.emit( 'new_count_all_post', {
      new_count_all_post: data.new_count_all_post,
      user_new_post: data.user_new_post,
      new_post_member_count: data.new_post_member_count
    });
  });

  socket.on('error', function (err) {
    console.log(err);
  });

});
