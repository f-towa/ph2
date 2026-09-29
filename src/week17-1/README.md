# 17週目ミニドリル 1問目

## 問題

docker compose upしようとするとエラーが発生します
これがエラーが起きないようにして画面表示できるようにしてください

### 修正箇所

dcoker-compose.ymlのL10、L16

### 終了条件
- docker compose upでエラーが起きない
- localhost:8080/week17-1/index.phpにアクセスすると下のように数字が表示される

```
1 2 3 4 5
```

# 解答
docker.yml
version: "3"

services:
  web:
    image: nginx
    ports:
      - "8080:80"
    volumes:
      - ./default.conf:/etc/nginx/conf.d/default.conf
      - ./src/week17-1:/var/www/html
    depends_on:
      - php
  php:
    build: ./php
    volumes:
      - ./src/week17-1:/var/www/html
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
      - ./src/week17-1:/var/www/html