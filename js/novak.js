$(document).ready(function() {

FB_APP_ID = '145575762174998';
DOMAIN = document.domain + '/fb';

function showRegistrationForm() {
  if (location.href.search('signup') != -1) {
    $('#fb-login-btn').hide();
  } 
}

function getUserInfo() {
  $.get('https://www.facebook.com/dialog/oauth?'
       + 'client_id=' + FB_APP_ID
       + '&redirect_uri=' + DOMAIN 
       + '/view/get-user.php', function(data) {
    console.log(data);
  });
}

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
  } else if (response.status == 'notConnected') {
    $('#log-status h3').text('Logged in but not connected');
    $('#log-status').show();
    $('#fb-reg-btn').show();
  } else {
    $('#fb-login-btn').hide();
    $('#log-status h3').text('Connected');
    $('#log-status').show();
    getUserInfo();
  }
});

});

