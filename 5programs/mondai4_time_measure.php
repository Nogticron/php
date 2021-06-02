<?php
// microtime()の結果aとbの差を計算する
// 戻り値は単一のfloat値
function diffmicrotime($a, $b)
{
	list($am, $at) = explode(' ', $a);
	list($bm, $bt) = explode(' ', $b);
	return ((float)$am-(float)$bm) + ((float)$at-(float)$bt);
}

function time_measure_main(array $list) {
  $start = microtime();

  $max_digits   = find_max_digits($list);                 // 配列要素の最大の桁数を返す => 2 
  $aligned_list = align_list_digits($list, $max_digits);  // 配列の要素の桁数を、最大の桁数に合わせた配列を生成し返す => [ 50, 20, 10, 90 ]
  $index_list   = make_index_list($aligned_list);         // 配列の要素の大きい順のインデックスのリストを取得する => [3, 0, 1, 2]

  $end = microtime();
  print_joined_list($list, $index_list);

  $time = diffmicrotime($end, $start) * 1000000;
  echo "計算時間 : ".$time." マイクロ秒\n\n\n";
}

function find_max_digits(array $list) {
  $max_digits = 0;

  foreach($list as $val) {
    $val = (string) $val;

    if(strlen($val) > $max_digits) { 
      $max_digits = strlen($val); 
    }
  }

  return $max_digits;
}


function align_list_digits(array $list, int $digits) {
  foreach($list as $i => $val) {
    $val_digits = strlen((string) $val);

    while($val_digits < $digits) {
      $list[$i] *= 10;
      $val_digits++;
    }
  }

  return $list;
}

function make_index_list(array $val_list) {
  $index_list = array();

  for($j = 0; $j < count($val_list); $j++) {

    // 配列の最大要素を見つけたら値を0にし、そのインデックスを別の配列にpushする
    $max          = 0;
    $index_of_max = 0;
    foreach($val_list as $i => $val) {
      if( $val > $max ) {
        $max          = $val;
        $index_of_max = $i;
      }
    }

    $val_list[$index_of_max] = 0;
    array_push($index_list, $index_of_max);
  }

  return $index_list;
}

function print_joined_list(array $val_list, array $index_list) {
  $result_str = "";

  foreach($index_list as $index) {
    $result_str .= (string) $val_list[$index];
  }

  echo $result_str."\n";
}


$list = array(50, 2, 1, 9);
echo ">> [50, 2, 1, 9]の場合\n（初回microtime()の呼び出しでオーバーヘッドがあるため時間がかかる）\n";
time_measure_main($list);

$list = array(50, 2, 1, 9);
echo ">> [50, 2, 1, 9]の場合（計算時間正確）\n";
time_measure_main($list);



//　1~99のランダムな要素をもつ、要素数10の配列の場合
$list = array_fill(0, 10, 0);
for($i = 0; $i < count($list); $i++) {
  $list[$i] = mt_rand(1,99);
}
echo "\n\n\n>> 1~99のランダムな要素をもつ、要素数10の配列の場合\n";
time_measure_main($list);

//　1~999のランダムな要素をもつ、要素数10の配列の場合
$list = array_fill(0, 10, 0);
for($i = 0; $i < count($list); $i++) {
  $list[$i] = mt_rand(1,999);
}
echo ">> 1~999のランダムな要素をもつ、要素数10の配列の場合\n";
time_measure_main($list);

//　1~9999のランダムな要素をもつ、要素数10の配列の場合
$list = array_fill(0, 10, 0);
for($i = 0; $i < count($list); $i++) {
  $list[$i] = mt_rand(1,9999);
}
echo ">> 1~9999のランダムな要素をもつ、要素数10の配列の場合\n";
time_measure_main($list);




//　1~99のランダムな要素をもつ、要素数100の配列の場合
$list = array_fill(0, 100, 0);
for($i = 0; $i < count($list); $i++) {
  $list[$i] = mt_rand(1,99);
}
echo "\n\n\n>> 1~99のランダムな要素をもつ、要素数100の配列の場合\n";
time_measure_main($list);

//　1~999のランダムな要素をもつ、要素数100の配列の場合
$list = array_fill(0, 100, 0);
for($i = 0; $i < count($list); $i++) {
  $list[$i] = mt_rand(1,999);
}
echo ">> 1~999のランダムな要素をもつ、要素数100の配列の場合\n";
time_measure_main($list);

//　1~9999のランダムな要素をもつ、要素数100の配列の場合
$list = array_fill(0, 100, 0);
for($i = 0; $i < count($list); $i++) {
  $list[$i] = mt_rand(1,9999);
}
echo ">> 1~9999のランダムな要素をもつ、要素数100の配列の場合\n";
time_measure_main($list);




//　1~99のランダムな要素をもつ、要素数1000の配列の場合
$list = array_fill(0, 1000, 0);
for($i = 0; $i < count($list); $i++) {
  $list[$i] = mt_rand(1,99);
}
echo "\n\n\n>> 1~99のランダムな要素をもつ、要素数1000の配列の場合\n";
time_measure_main($list);

//　1~999のランダムな要素をもつ、要素数1000の配列の場合
$list = array_fill(0, 1000, 0);
for($i = 0; $i < count($list); $i++) {
  $list[$i] = mt_rand(1,999);
}
echo ">> 1~999のランダムな要素をもつ、要素数1000の配列の場合\n";
time_measure_main($list);

//　1~9999のランダムな要素をもつ、要素数1000の配列の場合
$list = array_fill(0, 1000, 0);
for($i = 0; $i < count($list); $i++) {
  $list[$i] = mt_rand(1,9999);
}
echo ">> 1~9999のランダムな要素をもつ、要素数1000の配列の場合\n";
time_measure_main($list);
?>
