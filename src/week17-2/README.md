# 17週目ミニドリル 2問目

# 事前確認

1. 1問目がクリアしていること
2. localhost:8080/week17-1/index.phpにアクセスしてください。以下のように数字が表示されることを確認してください。

```
1 2 3 4 5
```

3. docker compose downしてください

# 問題

現在localhost:8080/week17-2/index.phpでアクセスできるが、localhost:3000/week17-2/index.phpでアクセスできるようにしてください。
※アクセスできるとは先ほどの数字が画面に表示されることです

# 解答
services:
  web:
    image: nginx
    ports:
      - "3000:80"
    volumes:
      - ./default.conf:/etc/nginx/conf.d/default.conf
      - ./src:/var/www/html
    depends_on:
      - php

  php:
    build: ./php
    volumes:
      - ./src:/var/www/html
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
      - "3306:3306"
    volumes:
      - ./db:/docker-entrypoint-initdb.d
      - ./db/:/etc/mysql/conf.d
      - ./src:/var/www/html