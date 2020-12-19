# php-app-starter

This is a simple tool to help start a php project. It contains database functionality using the active record design pattern.

A dockerfile and a docker-compose file are also added if needed to run as containers.

To use this tool:
1. Rename the .env.example file to a .env file and populate the fields(e.g DB_NAME) in the file with your own values.
2. Navigate to the src folder on your terminal and run 'composer install'. This should get all dependencies needed. You should already have composer installed globally on your machine for this.
3. You can also replace the content of the file in the migration folder with your own migration files.
4. If not running with docker containers, you can run  the command 'php -S localhost:8000 -t ./public' in the src folder on your terminal window
5. This should then load up the index.php page in the browser on localhost:8000
