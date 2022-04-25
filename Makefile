BASE_MAKEFILE_DIR := $(shell dirname $(realpath $(firstword $(MAKEFILE_LIST))))

setup:
	cp $(BASE_MAKEFILE_DIR)/etc/docker/dev/docker-compose.yml.dist $(BASE_MAKEFILE_DIR)/docker-compose.yml
	cp $(BASE_MAKEFILE_DIR)/.env.dist $(BASE_MAKEFILE_DIR)/.env
	cp $(BASE_MAKEFILE_DIR)/phpunit.xml.dist $(BASE_MAKEFILE_DIR)/phpunit.xml
	cp $(BASE_MAKEFILE_DIR)/behat.yml.dist ./behat.yml
	cp $(BASE_MAKEFILE_DIR)/.php-cs-fixer.php.dist ./.php-cs-fixer.php

	# Slate - API Doc
	make slate-install

init:
	@docker-compose up -d

generate-jwt-certificate:
	openssl genpkey -out $(BASE_MAKEFILE_DIR)/config/jwt/private.pem -aes256 -algorithm rsa -pkeyopt rsa_keygen_bits:4096
	openssl pkey -in $(BASE_MAKEFILE_DIR)/config/jwt/private.pem -out $(BASE_MAKEFILE_DIR)/config/jwt/public.pem -pubout

slate-install:
	make slate-init
	make slate-refresh-resources

slate-init:
	docker-compose -f ./etc/slate/docker-compose.yml up -d

slate-refresh-resources:
	docker exec -i iseazy-wines-mesasurements-api-doc make --makefile=/srv/slate/source/Makefile refresh-resources

slate-build:
	make slate-refresh-resources
	rm -rf ./public/doc
	docker exec -it iseazy-wines-mesasurements-api-doc /srv/slate/slate.sh build
	cp -r ./etc/slate/build ./public/doc
	rm -f ./public/doc/Makefile
