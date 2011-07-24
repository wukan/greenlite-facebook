<?php
require_once('./query-db.php');
require_once('./facebook.php');

?>

<div id="users" style="border:dotted 1px">
  <div id="log-status" style="display:none margin:4px;">
    <h3></h3>
  </div>
  <div id="fb-userinfo" style="display:none margin:4px;">
    <p id="fb-user-name">Hi, Alun.</p>
    <p>Welcome GreenLtie.</p>
    <p id="fb-user-team">Your team is McNutt.</p>
    <ul>
      <li>Friend 1</li>
      <li>Friend 2</li>
    </ul>
  </div>
  <fb:like style="margin:4px;" 
           href="<?=SITE_DOMAIN?>" 
           send="false" width="240" 
           show_faces="true" font="lucida grande">
  </fb:like>
  <fb:facepile 
    style="margin:4px;" 
    app_id="145575762174998" 
    width="200" 
    max_rows="1">
  </fb:facepile>
</div> <!-- end #users -->
