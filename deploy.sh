#!/usr/bin/env bash
git pull origin master
docker-compose down
docker-compose build
docker-compose up -d
docker exec -w /home/wwwroot/ataba ataba_php composer install
docker exec ataba_php php /home/wwwroot/ataba/bin/console doctrine:migration:migrate
docker exec ataba_php php /home/wwwroot/ataba/bin/console cache:clear
docker exec ataba_php php /home/wwwroot/ataba/bin/console cache:clear --env=prod
docker exec ataba_php php /home/wwwroot/ataba/bin/console cache:warmup
docker exec ataba_php php /home/wwwroot/ataba/bin/console cache:warmup --env=prod
