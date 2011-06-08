<?php

require_once('../query.php');
require_once('../facebook.php');

header('Content-type: application/json');

$access_token = null;
if (!isset($_GET['access_token'])) {
  if (!isset($_GET['code'])) {
    echo 'The code is not provided';
    exit(0);
  }

  $code = $_GET['code'];
  $response = file_get_contents(FB_API .
    '/oauth/access_token?' .
    'client_id=' . FB_APP_ID .
    '&client_secret=' . FB_SECRET .
    '&code=' . $code .
    '&redirect_uri=' . SITE_DOMAIN . '/view/get-user.php');
  $access_token = substr($response, strlen('access_token='), 
    strpos($response, '&') - strlen('access_token='));
} else {
  $access_token = $_GET['access_token'];
}

$user = json_decode(file_get_contents(FB_API . '/me' .
  '?access_token=' . $access_token));
$friends = json_decode(file_get_contents(FB_API . '/me/friends' .
  '?access_token=' . $access_token));

$uid = $user->id;
$result = get_user($uid);
$result['friends'] = get_friends($friends);

echo json_encode($result);

function get_friends($friends_list) {
  $friends_id_list = array();
  foreach ($friends_list->data as $friend) {
    array_push($friends_id_list, $friend->id);
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
