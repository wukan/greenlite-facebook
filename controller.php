<?php

require_once './query-db.php';
require_once './helper.php';

function get_teamname_list($group_id = 0, $sort = 'point') {
  if ($group_id == 0) {
    $group_sql = '';
  } else {
    $group_sql = ' WHERE `group_id`=' . $group_id;
  }
  $query = 'SELECT * FROM `goal_nodes`' . $group_sql;
  $rows = get_query_rows($query);

  $nodes_id = array();
  foreach ($rows as $row) {
    array_push($nodes_id, $row[1]);
  }
    
  $result = array();
  $query = "SELECT `node_id`,`node_label` FROM `nodes` WHERE" . 
    "`node_id` in " . '(' . implode(',', $nodes_id) . ')'; 
  $rows = get_query_rows($query);
  foreach ($rows as $row) {
    array_push($result, array(
      'id' => intval($row[0]),
      'name' => $row[1],
    ));
  };

  $result = array_sort($result, 'name', SORT_ASC);
  return $result; 
}

?>
