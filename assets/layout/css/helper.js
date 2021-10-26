function callApi (link,method,param) {
    return new Promise((resolve, reject) => {
      $.ajax({
          headers   : { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
          url		: link,
          method	: method,
          data		: param == undefined ? {} : param,
          success: function( res ) {
              resolve(res);
          },
          fail: function(err) {
              reject(new Error('In 10% of the cases, I fail. Miserably.'));
          }
      });
  });
}

function InitPusher(channel,event,bind) {
  Pusher.logToConsole = false;
  var pusher = new Pusher(pusher_app_id, { cluster: 'ap1', forceTLS: true });
  var channel = pusher.subscribe(channel);
  channel.bind(event, function(res) {
    bind(res);
  });
}
