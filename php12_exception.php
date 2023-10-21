<?php

/*ⅻ.[PHP][Level2]例外処理を使うことができる
/*2. 電卓
例外処理の付いた電卓プログラムを作成する。*/

// calculate関数の定義
function calculate($num1, $num2, $operator) 
{
  // $num1と$num2が整数であるかの検証
  if (!is_int($num1) || !is_int($num2)) 
  {
    throw new Exception("num1、num2には整数を入力してください"); 
  }

  // ゼロでの割り算の検証
  if  ($num2 === 0 && $operator === '/') 
  {
    throw new Exception("ゼロによる割り算は許可されていません");
  }

  // 正しい演算子の確認
  if (!in_array($operator, ['+', '-', '*', '/']))  
  {
    throw new Exception ("演算子には +, -, *, / のいずれかを使用してください");
  }

  // 演算の実行
  switch ($operator)
  {
    case '+':
      return $num1 + $num2;
    case '-':
      return $num1 - $num2;
    case '*':
      return $num1 * $num2;
    case '/':
      return $num / $num2;
  }
}

// ユーザーからの入力の受け取り
echo "1番目の整数を入力してください:" . PHP_EOL;
$num1 = (int)trim(fgets(STDIN));

echo "2番目の整数を入力してください:" . PHP_EOL;
$num2 = (int)trim(fgets(STDIN));

echo "演算子(+, -, *, /)を入力してください:" . PHP_EOL;
$operator = trim(fgets(STDIN));

// 例外処理と結果の表示
try
{
  $result = calculate($num1, $num2, $operator);
  echo $result . PHP_EOL;
} catch (Exception $e) {
  echo $e->getMessage() . PHP_EOL;
}


?>