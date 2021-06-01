<?php

function cross_array(array $list_a, array $list_b) {

  if( count($list_a) > count($list_b) ){
    $max_list_length = count($list_a);
  } else {
    $max_list_length = count($list_b);
  }

  $crossed_list = array();
  for($i = 0; $i < $max_list_length; $i++) {
    array_push($crossed_list, $list_a[$i], $list_b[$i]);
  }

  return array_filter($crossed_list);
}

$list_x = array('a', 'b', 'c');
$list_y = array(1, 2, 3);

echo "交互に結合!\n";
print_r(cross_array($list_x, $list_y));

$list_x = array('a', 'b', 'c');
$list_y = array(1, 2, 3, 4, 5);

echo "\n\n長さの違う配列を結合!\n";
print_r(cross_array($list_x, $list_y));

?>
