# Mute all `make` specific output. Comment this out to get some debug information.
.SILENT:

# .DEFAULT: If the command does not exist in this makefile
# default:  If no command was specified
.DEFAULT default:
	$(MAKE) help

.PHONY: test

help:
	@echo "Usage:"
	@echo "     make [command]"
	@echo
	@echo "Available commands:"
	@grep '^[^#[:space:]].*:' Makefile | grep -v '^default' | grep -v '^\.' | grep -v '=' | grep -v '^_' | sed 's/://' | xargs -n 1 echo ' -'

########################################################################################################################

test:
	- docker run --rm -v=$(PWD):/opt/pizzashop -w="/opt/pizzashop" php:7.3-alpine ash -c "php vendor/bin/phpunit && php vendor/bin/behat"

