# 18週目ミニドリル 1問目

# 目的

このミニドリルでは、PHPで「配列」というデータのかたまりを扱う方法を学びます。
配列は、複数の情報を一度に整理して保存できる便利なものです。
この課題を通じて、PHPで配列を作り、正しく表示する方法を学びましょう。

最初は少し難しいかもしれませんが、配列を使えるようになると、もっと複雑なプログラムを作るときに役立ちます。ぜひミニドリルを通して理解を深めましょう！
※ 生成AIは使わずに解消するとより理解が深まります！

# 問題

localhost:8080/week18-1/index.phpにアクセスしたら、以下のように表示されるように修正してください

```
array(3) { ["name"]=> string(5) "Posse" ["age"]=> int(38) ["address"]=> string(5) "Tokyo" }
```

※修正箇所はindex.phpの3行目です。


# Answer

〇docker-compose.yml

version: "3"

services:
  web:
    image: nginx
    ports:
      - "8080:80"
    volumes:
      - ./default.conf:/etc/nginx/conf.d/default.conf
      - ./src/week18-1:/var/www/html
    depends_on:
      - php
  php:
    build: ./php
    volumes:
      - ./src/week18-1:/var/www/html
    depends_on:
      - db
  db:
    build:
      context: .
      dockerfile: "./db/Dockerfile"
    environment:
      - MYSQL_DATABASE=ph2drill
      - MYSQL_ROOT_PASSWORD=password
    ports:
      - 3306:3306
    volumes:
      - ./db:/docker-entrypoint-initdb.d
      - ./db/:/etc/mysql/conf.d
      - ./src/week18-1:/var/www/html

〇index.php
<?php

$posse = [
    'name' => 'Posse',
    'age' => 38,
    'address' => 'Tokyo'
];
var_dump($posse);