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


13)php artisan vendor:publish --tag=laravel-mail(for the laravel mail templates)
	<!-- update to server -->
	php artisan make:model TermsAndCondition -a
php artisan vendor:publish --tag=laravel-errors
upload error image from public/error
php artisan vendor:publish --tag=laravel-mail
php artisan vendor:publish --tag=laravel-notifications
php artisan make:model Material -a
php artisan make:migration add_material_to_lots_table --table=lots





