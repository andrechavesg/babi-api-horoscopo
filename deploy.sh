#!/usr/bin/env bash
git pull origin master
docker-compose down
docker-compose build
docker-compose up -d
docker exec -w /home/wwwroot/babi babi_php composer install
docker exec babi_php php /home/wwwroot/babi/bin/console doctrine:migration:migrate
docker exec babi_php php /home/wwwroot/babi/bin/console cache:clear
docker exec babi_php php /home/wwwroot/babi/bin/console cache:clear --env=prod
docker exec babi_php php /home/wwwroot/babi/bin/console cache:warmup
docker exec babi_php php /home/wwwroot/babi/bin/console cache:warmup --env=prod
