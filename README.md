#install linux
##install npm https://docs.npmjs.com/cli/v7/commands/npm-install
npm install
##install composer https://getcomposer.org/
sudo apt install composer

#start project api todo
##install composer dependences
cd todo/
composer install
##start laravel dependences
php artisan migrate
php artisan passport:install
php artisan db:seed

#start project todowebapp
npm run serve 