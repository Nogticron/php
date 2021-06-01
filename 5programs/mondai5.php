<?php
// 1,2,…,9の数をこの順序で、"+"、"-"、またはななにもせず結果が100となるあらゆる組合せを出力するプログラムを記述せよ。
// 例えば、1 + 2 + 34 – 5 + 67 – 8 + 9 = 100となる

// $test_list = array(1, 2, 34, -5, 67, -8, 9);
// $test_challenge_list = array(
//   "12345-6-78+9"
// );

// 全ての組み合わせ候補の文字列のリストを返す関数
function create_all_candidacy(array $list) {
  $challenge_list = array();
  $operator_list = array("+", "-", null);

  foreach($operator_list as $ope) {
    $list[1] = $ope;

    foreach($operator_list as $ope) {
      $list[3] = $ope;

      foreach($operator_list as $ope) {
        $list[5] = $ope;

        foreach($operator_list as $ope) {
          $list[7] = $ope;

          foreach($operator_list as $ope) {
            $list[9] = $ope;

            foreach($operator_list as $ope) {
              $list[11] = $ope;

              foreach($operator_list as $ope) {
                $list[13] = $ope;

                foreach($operator_list as $ope) {
                  $list[15] = $ope;

                  array_push($challenge_list, implode("",$list));
                }
              }
            }
          }
        }
      }
    }
  }

  return $challenge_list;
}

function calc_value(int $val, bool $is_negative) {
  if($is_negative) {
    return -$val;
  } else {
    return $val;
  }
}

// 文字列をリストに変換し、その総リストを返す関数
// "1+2+34-5+67-8+9" => [1, 2, 34, -5, 67, -8, 9]
function translate_str_to_list(array $challenge_list) {
  $result_list = array(); 

  foreach($challenge_list as $formula_str) {
    $val         = null;
    $is_negative = false;
    $list = array();

    for($i = 0; $i < strlen($formula_str); $i++) {

      if($formula_str[$i] == '-'){
        array_push($list, calc_value((int) $val, $is_negative));

        $is_negative = true;
        $val = null;

      } elseif($formula_str[$i] == '+') {
        array_push($list, calc_value((int) $val, $is_negative));

        $is_negative = false;
        $val = null;

      } else { 

        if($val == null) {
          $val = $formula_str[$i];
        } else {
          $val = $val * 10 + $formula_str[$i];
        }
      }

      // 最後の数字の場合の処理
      if( $i == (strlen($formula_str) - 1) ) {
        array_push($list, calc_value((int) $val, $is_negative));
        array_push($result_list, $list);
      }
    }
  }

  return $result_list;
}

// 要素の合計が100になるリストのリストを返す関数
function judge_sum_100(array $result_list) {
  $correct_list = array();

  foreach($result_list as $list) {
    if (array_sum($list) == 100) {
      array_push($correct_list, $list);
    }
  }

  return $correct_list;
}

function print_formula(array $correct_list) {
  foreach($correct_list as $list) {

    foreach($list as $i => $val) {
      if((int) $val > 0 && $i != 0) {
        echo "+".$val;
      } else {
        echo $val;
      }
    }
    echo " = 100\n";
  }
}


$list = array(1, null, 2, null, 3, null, 4, null, 5, null, 6, null, 7, null, 8, null, 9);

$challenge_list = create_all_candidacy($list);
$result_list = translate_str_to_list($challenge_list);
$correct_list = judge_sum_100($result_list);
print_formula($correct_list);

?>
