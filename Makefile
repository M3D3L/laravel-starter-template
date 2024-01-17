run-app-with-setup:
	# Copy the example environment file to the actual environment file
	cp ./src/.env.example ./src/.env
	# Build and start the Docker containers
	docker compose build
	docker compose up -d
	# Install dependencies, set permissions, and generate application key
	docker exec php /bin/sh -c "composer install && chmod -R 777 storage && php artisan key:generate"

run-app-with-setup-db:
	# Copy the example environment file to the actual environment file
	cp ./src/.env.example ./src/.env
	# Build and start the Docker containers
	docker compose build
	docker compose up -d
	# Install dependencies, set permissions, generate application key, and run migrations with seeding
	docker exec php /bin/sh -c "composer install && chmod -R 777 storage && php artisan key:generate && php artisan migrate:fresh --seed"

up:
	# Start the Docker containers
	docker compose up -d

down:
	# Stop and remove the Docker containers
	docker compose down

enter-nginx-container:
	# Enter the interactive shell of the Nginx container
	docker exec -it nginx /bin/sh

enter-php-container:
	# Enter the interactive shell of the PHP container
	docker exec -it php /bin/sh

enter-mysql-container:
	# Enter the interactive shell of the MySQL container
	docker exec -it mysql /bin/sh

flush-db:
	# Run the artisan command to fresh migrate the database
	docker exec php /bin/sh -c "php artisan migrate:fresh"

flush-db-with-seeding:
	# Run the artisan command to fresh migrate the database with seeding
	docker exec php /bin/sh -c "php artisan migrate:fresh --seed"

.PHONY: artisan

artisan:
	# Execute the 'php artisan' command in the PHP container
	docker-compose exec php php artisan

migrate:
	docker-compose exec php php artisan migrate

model:
	# Execute the 'php artisan' command in the PHP container
	docker-compose exec php php artisan make:model $(MODEL_NAME) -m

show-model:
	# Show a model using artisan make:model command
	docker-compose exec php php artisan model:show $(MODEL_NAME)

artisan-migration:
	docker-compose exec php php artisan make:migration $(MIGRATION) --create=$(TABLE)

controller:
	# Execute the 'php artisan' command in the PHP container
	docker-compose exec php php artisan make:controller $(CONTROLLER_NAME) --api
