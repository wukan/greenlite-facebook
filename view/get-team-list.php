<?php

require_once('../query.php');

header('Content-type: application/json');

if (!empty($_GET['group'])) {
  $group_id = intval($_GET['group']);
} else {
  $group_id = 0;
}

$result = get_node_list($group_id, 'name');
echo json_encode($result);

?>
