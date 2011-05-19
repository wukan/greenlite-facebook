<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>GreenLite Goal Setting</title>
    <link href="css/reset.css" type="text/css" rel="stylesheet" />
    <link href="css/fb-screen.css" type="text/css" rel="stylesheet" />
    <div id="fb-root"></div>
    <script src="http://connect.facebook.net/en_US/all.js"></script>
    <script src="js/jquery-1.5.1.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/novak.js" type="text/javascript" charset="utf-8"></script>
  </head>

  <body>
    <div id="wrapper">
      <div id="header" style="border:solid 1px">
        <h1>GreenLite X Facebook</h1>
        <br class="clear" />
      </div> <!-- end #header -->

      <div id="main" style="border:solid 1px">
        <div id="standing" style="border:dotted 1px">
          <h1>Team Standing</h1>
        </div> <!-- end #standing -->

        <div id="intro" style="border:dotted 1px">
          <h1>Introduction</h1>
        </div> <!-- end #intro -->
        <br class="clear" />
      </div> <!-- end #main -->

      <div id="secondary" style="border:solid 1px">
        <div id="users" style="border:dotted 1px">
          <div id="log-status" style="display:none margin:4px;"><h3></h3></div>
          <fb:like style="margin:4px;" 
                   href="http://www.cs.dartmouth.edu/~wukan/fb/" 
                   send="false" width="240" 
                   show_faces="true" font="lucida grande">
          </fb:like>
          <fb:login-button
            registration-url="http://www.cs.dartmouth.edu/~wukan/fb/?signup=true"
            id="fb-login-btn"
            style="margin:4px; display:block;">
          </fb:login-button>
          <fb:facepile 
            style="margin:4px;" 
            app_id="145575762174998" 
            width="200" 
            max_rows="1">
          </fb:facepile>
          <fb:registration 
            fields="[
              {'name':'name'},
              {'name':'email'},
              {'name':'team', 'description':'Which team?', 'type':'select', 'options':{'N':'Novak', 'C':'Collis'}}
            ]" 
            redirect-uri="http://www.cs.dartmouth.edu/~wukan/fb/signup.php"
            fb-only="True"
            id="fb-reg-btn"
            width="320"
            style="display:none; margin:4px">
          </fb:registration>
          <div id="fb-btns" style="margin:4px">
            <button id="fb-login">FB.login()</button>
            <button id="fb-logout">FB.logout()</button>
          </div>
        </div> <!-- end #users -->
        <div id="join" style="border:dotted 1px">
          <h2>Join</h2>
        </div> <!-- end #join -->
        <br class="clear" />
      </div> <!-- end #secondary -->
    </div> <!-- end #wrapper -->
  </body>

</html>


