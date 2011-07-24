$(document).ready(function() {

FB_APP_ID = '145575762174998';
DOMAIN = location.protocol + '//' + location.host + '/fb';

FB.init({
  appId: FB_APP_ID, 
  status: true, 
  cookie: true, 
  xfbml: true 
});

FB.getLoginStatus(function(response) {
  if (response.status == 'unknown') {
    $('#log-status h3').text('Not logged in');
    $('#log-status').show();
    $('#fb-login-btn').show();
    FB.Event.subscribe('auth.statusChange', function(response) {
      console.log(response);
      if (response.status == 'notConnected') {
        window.location.href = './index.php';
      } else if (response.status == 'connected') {
        window.location.href = './user.php';
      }
    });
  } else if (response.status == 'notConnected') {
    $('#log-status h3').text('Logged in but not connected');
    $('#log-status').show();
    $('#fb-reg-btn').show();
  } else if (response.status == 'connected') {
    window.location.href = './user.php';
  }
});

});

