.PHONY: install tests cs-fix cs-check help

.DEFAULT_GOAL := help

help: ## Outputs this help screen.
	@grep -E '(^[a-zA-Z0-9_\/\-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}{printf "\033[32m%-20s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'

install: ## Install dependencies
	composer install

tests: ## Run PHPUnit
	vendor/bin/phpunit

cs-check: ## Check coding style
	vendor/bin/php-cs-fixer fix --dry-run --diff

cs-fix: ## Fix coding style
	vendor/bin/php-cs-fixer fix
