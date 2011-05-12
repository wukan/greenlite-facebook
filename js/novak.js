$(document).ready(function() {

function showRegistrationForm() {
  if (location.href.search('signup') != -1) {
    $('#fb-login-btn').hide();
    $('#fb-reg-btn').show();
  } 
}
showRegistrationForm();

FB.init({
  appId: '145575762174998', 
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
    $('#fb-login-btn').show();
  } else {
    $('#fb-login-btn').hide();
    $('#log-status h3').text('Connected');
    $('#log-status').show();
  }
  /*
  if (response.session) {
    $('#logged').show();
    $('#unlogged').hide();
  } else {
    $('#unlogged').show();
    $('#logged').hide();
  }
  */
});

$('#fb-login').click(function() {
  FB.login(function(response) {
    if (response.session) {
      if (response.perms) {
        console.log('LOG: logged in and granted permission');       
      } else {
        console.log('LOG: logged in');
      }  
      location.reload();
    } else {
      console.log('LOG: not logged in');
    }
  });
}, {perms:'email'});

$('#fb-logout').click(function() {
  FB.logout(function(response) {
    console.log('LOG: logged out');
    location.reload();
  });
});

$('#logout').click(function() {
  // console.log('LOG: click'); 
});

});

