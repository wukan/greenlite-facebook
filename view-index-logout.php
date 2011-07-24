<div id="users" style="border:dotted 1px">
  <div id="log-status" style="display:none margin:4px;">
    <h3></h3>
  </div>
  <fb:like style="margin:4px;" 
           href="<?=SITE_DOMAIN?>" 
           send="false" width="240" 
           show_faces="true" font="lucida grande">
  </fb:like>
  <fb:login-button
    registration-url="#fb-reg-btn"
    id="fb-login-btn"
    style="margin:4px; display:block;">
  </fb:login-button>
  <fb:facepile 
    style="margin:4px;" 
    app_id="145575762174998" 
    width="200" 
    max_rows="1">
  </fb:facepile>
</div> <!-- end #users -->

<div id="join" style="border:dotted 1px">
  <h2>Join</h2>
<?php
// Get the team list for registration
$teams_list = get_teamname_list(3);
$teams_options = array();
foreach ($teams_list as $team) {
array_push($teams_options,  "'{$team['id']}':'{$team['name']}'");
}
?>
  <fb:registration 
    fields="[
      {'name':'name'},
      {'name':'email'},
      {'name':'team', 'description':'Which team?', 
      'type':'select', 
      'options':{<?=implode(',', $teams_options)?>}}
    ]" 
    redirect-uri="<?=SITE_DOMAIN?>/user.php"
    fb-only="True"
    id="fb-reg-btn"
    width="320"
    style="display:none; margin:4px">
  </fb:registration>
</div> <!-- end #join -->
