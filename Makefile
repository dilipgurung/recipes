.PHONY: all install migrate reset seed import run test

all: install test

install:
	composer install

migrate:
	php artisan migrate

reset:
	php artisan migrate:reset

seed:
	php artisan db:seed
	
import:
	php artisan ingest:data

run:
	php artisan serve

test:
	./vendor/bin/phpunit
