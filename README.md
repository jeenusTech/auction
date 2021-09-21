1)composer update or install <br>
2)php artisan migrate<br>
3)php artisan db:seed UserSeeder<br>
4)import the country state and city sqls manually in the db<br>
5)Install aos via npm (npm install aos --save)<br>
6)Install swiper via npm (npm install swiper)<br>
7)Install lightbox via npm(npm install lightbox2 --save)<br>
8)install intervention image(composer require intervention/image)<br>
9)for installing boxicon (npm install boxicons --save)<br>
10)for installing lightbox2(npm install lightbox2 --save)<br>
11)for mail function configure the .env and currently the mailtrap is used for testing<br>
12)configure the .env file for db and then run:<br>
	php artisan config:cache<br>
	php artisan serve<br>
the default credentials for admin: 'email:admin@gmail.com', 'password: admin#2021@auction'<br>
if any error regarding the mail template arises then use the following query, but it won't happen 99%<br>
13)php artisan vendor:publish --tag=laravel-mail(for the laravel mail templates)<br>
	<!-- update to server -->
if any error regarding the custom error template arises then use the following query, but it won't happen 99%   <br>
14)php artisan vendor:publish --tag=laravel-errors<br>
	upload error image from public/error after executing the above query<br>
15)the below queries are for the markdown email templates<br>
	php artisan vendor:publish --tag=laravel-mail<br>
	php artisan vendor:publish --tag=laravel-notifications<br>

	php artisan make:mail CoinQuery --markdown=emails.CoinQueryAdminMail

	php artisan make:mail ToadminContactUs --markdown=emails.ContactUsMail
	php artisan make:mail TouserContactUs --markdown=emails.ContactUsMailUser

php artisan make:migration add_auction_type_to_auction_table --table=auctions<br>
php artisan migrate<br>
Auction:<br>
Auction Controller<br>
index.php<br>
create.php<br>
edit.php<br>
js/admin.js<br>
mix.js<br>
frontend/layouts/footer.php<br>

php artisan make:middleware Language<br>
\App\Http\Middleware\Language::class, register this in kernal middlewareGroups->web<br>
create file callled language.php inside the config directory<br>
php artisan make:controller LanguageController<br>





