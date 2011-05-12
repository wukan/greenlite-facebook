$(document).ready(function() {

FB.getLoginStatus(function(response) {
  if (response.session) {
    $('#logged').show();
    $('#unlogged').hide();
  } else {
    $('#unlogged').show();
    $('#logged').hide();
  }
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

