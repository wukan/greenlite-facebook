<?php

require_once('../query.php');
require_once('../facebook.php');

$facebook = new Facebook(array(
  'appId' => FB_APP_ID,
  'secret' => FB_SECRET,
  'cookie' => true,
));

$session = $facebook->getSession();

if (!$session) {
  $login_url = $facebook->getLoginUrl();
  header('Location: ' . $login_url);
}

header('Content-type: application/json');

$user = $facebook->api('/me');
$friends = $facebook->api('/me/friends');
$friends = $friends['data'];

$uid = $user['id'];
$result = get_user($uid);
$result['friends'] = get_friends($friends);

echo json_encode($result);

function get_friends($friends_list) {
  $friends_id_list = array();
  foreach ($friends_list as $friend) {
    array_push($friends_id_list, $friend['id']);
  }
  $query = "SELECT * FROM `goal_users`" .
    " WHERE `id` in (" . implode(',', $friends_id_list) . ")";
  $rows = get_query_rows($query);
  
  $friends = array();
  if (count($rows) > 0) {
    foreach ($rows as $row) {
      array_push($friends, array(
        'id' => $row[0],
        'name' => $row[1],
        'team_id' => $row[3],
      ));
    }
  } 
  return $friends;
}

function get_user($user_id) {
  $query = "SELECT * FROM `goal_users`"
    . " WHERE `id`=$user_id";    
  $rows = get_query_rows($query);

  $user = array();
  if (count($rows) > 0) {
    $user['id'] = $rows[0][0];
    $user['name'] = $rows[0][1];
    $user['email'] = $rows[0][2];
    $user['team_id'] = $team_id = $rows[0][3];
    $query = "SELECT `node_label` FROM `nodes`"
      . " WHERE `node_id`=$team_id";
    $team_rows = get_query_rows($query);
    if (count($team_rows) > 0) {
      $user['team_name'] = $team_rows[0][0];
    } else {
      $user['team_name'] = 'Undefined team';
    }
  } else {
    $user['error'] = 1;
    $user['message'] = 'Can not find the user given user_id';
  }

  return $user;
}

?>
