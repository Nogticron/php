<?php
# forループ、whileループ、および再帰を使用して、リスト内の数字の合計を計算する3つの関数を記述せよ。
$list = array(2,3,4,5,6,7,8);

## for
$sum = 0;
for($i = 0; $i < count($list); $i++) {
  $sum += $list[$i];
}
echo "合計(for)   : ".$sum."\n";

## while
$sum = 0;
$i = 0;
while($i < count($list)){
  $sum += $list[$i];
  $i++;
}
echo "合計(while) : ".$sum."\n";

## 再帰
// 配列の要素数をnとする( list[0] ~ list[n-1] )
function calc_sum(array $list, int $index) {
  if ($index == count($list) - 1) {
    return $list[$index];
  } else {
    return $list[$index] + calc_sum($list, $index+=1);
  }
}

echo "合計(再帰)  : ".calc_sum($list, 0)."\n";

