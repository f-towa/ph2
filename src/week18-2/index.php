<?php

$numbers = [10, 11, 12, 13, 14, 15];

for ($i = 0; $i < count($numbers); $i++) {
  if ($numbers[$i] > 12) {
    echo nl2br("12より大きい数: {$numbers[$i]} です。\n");
  } else {
    echo nl2br("12以下の数: {$numbers[$i]} です。\n");
  }
}