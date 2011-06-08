<?php // query.php

require_once 'config.php';

function set_query_row($query) {
  $db_server = mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);

  if (!$db_server)
    die ("Unable to connect to MySQL: " . mysql_error());

  mysql_select_db(DB_DATABASE)
    or die("Unable to select database: " . mysql_error());

  $result = mysql_query($query);
  if (!$result) 
    die ("Database access failed: " . mysql_error());

  mysql_close($db_server);
}

function get_query_rows($query) {
  $db_server = mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);

  if (!$db_server)
    die ("Unable to connect to MySQL: " . mysql_error());

  mysql_select_db(DB_DATABASE)
    or die("Unable to select database: " . mysql_error());

  $result = mysql_query($query);
  if (!$result) 
    die ("Database access failed: " . mysql_error());

  $node_list = array();
  $rows = mysql_num_rows($result);
  for ($i = 0; $i < $rows; $i += 1) {
    $node_list[$i] = mysql_fetch_row($result);
  }

  mysql_close($db_server);
  return $node_list;
}

function get_query_num_rows($query) {
  $db_server = mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);

  if (!$db_server)
    die ("Unable to connect to MySQL: " . mysql_error());

  mysql_select_db(DB_DATABASE)
    or die("Unable to select database: " . mysql_error());

  $result = mysql_query($query);
  if (!$result) 
    die ("Database access failed: " . mysql_error());

  $num_rows = mysql_num_rows($result);
  mysql_close($db_server);
  return $num_rows;
}

?>
