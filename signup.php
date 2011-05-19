<?php
require_once './config.php';
require_once './facebook.php';
require_once './query.php';

function parse_signed_request($signed_request, $secret) {
  list($encoded_sig, $payload) = explode('.', $signed_request, 2);

  // decode the data
  $sig = base64_url_decode($encoded_sig);
  $data = json_decode(base64_url_decode($payload), true);

  if (strtoupper($data['algorithm']) !== 'HMAC-SHA256') {
    echo 'Unknown algorithm. Expected HMAC-SHA256';
    return null;
  }

  // check sig
  $expected_sig = hash_hmac('sha256', $payload, $secret, $raw = true);
  if ($sig !== $expected_sig) {
    echo 'Bad signed JSON signature!';
    return null;
  }

  return $data;
}

function base64_url_decode($input) {
  return base64_decode(strtr($input, '-_', '+/'));
}

function user_signup($data) {
  $user_id = $data['user_id'];
  $name = $data['registration']['name'];
  $email = $data['registration']['email'];
  $team_id = $data['registration']['team'];

  $query = "SELECT * FROM `goal_users` WHERE" .
    " `id`=\"$user_id\""; 
  if (get_query_num_rows($query) > 0) {
    $query = "UPDATE `goal_users`".
      " SET `name`=\"$name\"" .
      " `email`=\"$email\"" .
      " `node_id`=$team_id" .
      " WHERE `id`=\"$user_id\"";
    set_query_row($query);
    echo 'User info updated';
  } else {
    $query = "INSERT INTO `goal_users`" .
      " VALUES (\"$user_id\", \"$name\"," .
      " \"$email\", $team_id)";
    set_query_row($query);
    echo 'User info inserted';
  }
}


if ($_REQUEST) {
  $response = parse_signed_request($_REQUEST['signed_request'], FB_SECRET);
  user_signup($response);
} else {
  echo '$_REQUEST is empty';
}

?>
