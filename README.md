1)composer update or install
2)php artisan migrate
3)php artisan db:seed UserSeeder
4)import the country state and city sqls manually in the db
5)Install aos via npm (npm install aos --save)
6)Install swiper via npm (npm install swiper)
7)Install lightbox via npm(npm install lightbox2 --save)
8)install intervention image(composer require intervention/image)
9)for installing boxicon (npm install boxicons --save)
10)for installing lightbox2(npm install lightbox2 --save)
11)for mail function configure the .env and currently the mailtrap is used for testing
12)configure the .env file for db and then run:
	php artisan config:cache
	php artisan serve

if any error regarding the mail template arises then use the following query, but it won't happen 99%
13)php artisan vendor:publish --tag=laravel-mail(for the laravel mail templates)
	<!-- update to server -->
if any error regarding the custom error template arises then use the following query, but it won't happen 99%
14)php artisan vendor:publish --tag=laravel-errors
	upload error image from public/error after executing the above query
15)the below queries are for the markdown email templates
	php artisan vendor:publish --tag=laravel-mail
	php artisan vendor:publish --tag=laravel-notifications

	php artisan make:mail CoinQuery --markdown=emails.CoinQueryAdminMail

	php artisan make:mail ToadminContactUs --markdown=emails.ContactUsMail
	php artisan make:mail TouserContactUs --markdown=emails.ContactUsMailUser

php artisan make:migration add_auction_type_to_auction_table --table=auctions
php artisan migrate
Auction:
Auction Controller
index.php
create.php
edit.php
js/admin.js
mix.js
frontend/layouts/footer.php

php artisan make:middleware Language
\App\Http\Middleware\Language::class, register this in kernal middlewareGroups->web
create file callled language.php inside the config directory
php artisan make:controller LanguageController





