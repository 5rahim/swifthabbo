<?php

require '../brain/core.php';

$list_order = $_POST['list_order'];

$list = explode(',' , $list_order);
$i = 1 ;
foreach($list as $id) {
  
  global $DB;
  
  $DB->Exec('UPDATE widgets SET item_order = ? WHERE id = ?',array($i,$id));
  
  $i++ ;
}
?>