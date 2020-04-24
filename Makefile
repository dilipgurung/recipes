# Commands to run inside the container
.PHONY=all
all: install migrate seed

.PHONY=install
install: config db
	composer install

.PHONY=config
config:
	cp .env.example .env

.PHONY=db
db:
	touch database/database.sqlite

.PHONY=migrate
migrate:
	php artisan migrate

.PHONY=import
import:
	php artisan ingest:data

.PHONY=reset
reset:
	php artisan migrate:reset

.PHONY=seed
seed: import
	php artisan db:seed

.PHONY=run
run:
	php artisan serve

.PHONY=test
test:
	./vendor/bin/phpunit

# Commands to run outside the container
.PHONY=up
up:
	docker-compose up -d

.PHONY=down
down:
	docker-compose down

.PHONY=logs
logs:
	docker-compose logs -f

.PHONY=ssh
ssh:
	docker-compose exec app bash
