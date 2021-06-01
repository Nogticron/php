<?php 
// 最初の100個のフィボナッチ数のリストを計算する関数を記述せよ。
// 定義では、フィボナッチ数列の最初の2つの数字は0と1で、次の数は前の2つの合計となる。
// 例えば最初の10個のフィボナッチ数列は、0, 1, 1, 2, 3, 5, 8, 13, 21, 34となる。

function make_fibonacci_list(int $limit) {
  // 最初2つで初期化
  $fibonacci_list = array(0, 1);

  for($i = 1; $i < $limit-1; $i++) {
    array_push($fibonacci_list, $fibonacci_list[$i] + $fibonacci_list[$i-1]);
  }

  return $fibonacci_list;
}

function print_fibonacci_list(array $fibonacci_list) {
  foreach($fibonacci_list as $i => $val) {
    if( $i % 10 == 0){ echo "\n"; }

    echo " ".$val;
  }
  echo "\n";
}


echo "フィボナッチ数列を何個まで出力しますか : ";
$limit = trim(fgets(STDIN));

print_fibonacci_list( make_fibonacci_list($limit) );

?>
