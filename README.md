## 問題4の解き方について

主な解法は以下の2通り

#### (1) 全ての組み合わせの数字を作り、比較する方法

###### メリット
- 考え方自体は数学的にシンプル

###### デメリット
- 配列の要素が増えるにしたがって計算量が膨大になる
  - O(N!)となるので計算時間は最悪になる
- 配列の要素が増えると計算不可能になる（最大でも19個まで）
  - 組み合わせて作られた数字の桁数が、処理できる桁数をオーバーしてしまう
  - 64bitシステムにおいて、PHPのint型が処理できる最大数は`9223372036854775807` -> 19桁

#### (2) 数字の桁数を揃えて比較し、並べ替えを行う方法

###### メリット
- 計算時間が早い
  - 計算時間 O(N)なので現実的な時間で高速に計算できる
- 配列の要素数が増えても計算可能
  - 要素の比較は最大の要素の桁数に合わせて行われるため、問題なく処理できる

###### デメリット
- 配列の処理が(1)に比べて複雑になる


#### 例）

対象の配列を [ 8, 7, 6 ] とする。

(1)の場合、[ 876, 867, 786, 768, 687, 678] の6通り（3!通り）を作成してから比較する。
```
→ 要素が1つ増えた場合、24通り（4!通り）を作成して比較することになる
→ 計算時間：O(N!)
```

(2)の場合、すでに並び替え済みなので比較回数は最大でも3回で済む。
```
→ 要素が1つ増えた場合、比較回数は最低4回
→ 最大要素の桁数によって二重ループの計算量は変わるが、最大でもint型の桁数の範囲（1〜19回の比較）なので計算時間の考慮に含める必要がない
→ 計算時間：O(N)
```

計算時間を比較すると

|N:要素数|O(N)|O(N^2)|O(N!)|
|---|---|---|---|
|2|2|4|2|
|3|3|9|6|
|4|4|16|24|
|5|5|25|120|
|10|10|100|3628800|
|20|20|400|2.4329020081766 * 10^5|
|100|100|10000|9.3326215443944 * 10^157|

（1）の方法は要素数が増えるごとに計算量が膨大になることがわかる。

（2）の方法は要素数が増えても計算時間は比例し、高速に計算が可能であるとわかる

### まとめ

いくつか手法を思いついた場合は、その手法の可用性や可読性、計算時間などを考慮して最適解を求められるといいですね


#### <参考>
計算量オーダーについて
https://qiita.com/asksaito/items/59e0d48408f1eab081b5
