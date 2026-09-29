<?php
$cart = ['apple' => 100, 'banana' => 200, 'peach' => 300];

foreach ($cart as $item => $price) {
  echo nl2br("商品名: $item 価格: $price 円\n");
}
