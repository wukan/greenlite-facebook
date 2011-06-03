<?php

require_once('query.php');
require_once('login.php');

function get_node_list($group_id = 0, $sort = 'point') {
  if ($group_id == 0) {
    $group_sql = '';
  } else {
    $group_sql = ' WHERE `group_id`=' . $group_id;
  }
  $query = 'SELECT * FROM `goal_nodes`' . $group_sql;
  $goal_nodes = get_query_rows($query);
    
  $result = array();
  for ($i = 0; $i < count($goal_nodes); $i += 1) {
    $query = "SELECT node_label FROM nodes WHERE node_id = " 
      . $goal_nodes[$i][1];    
    $node = get_query_rows($query);
    $goal_node = array(
      'id' => intval($goal_nodes[$i][1]),
      'name' => $node[0][0],
      'point' => intval($goal_nodes[$i][3])
    );
    array_push($result, $goal_node);
  }

  if ($sort == 'name')
    $result = array_sort($result, 'name', SORT_ASC);
  elseif ($sort == 'point') 
    $result = array_sort($result, 'point', SORT_DESC);

  return $result; 
}

?>
