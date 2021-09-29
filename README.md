1)composer update or install 

2)php artisan migrate:fresh --seed (before running this command pls configure .env file from root directory and update the database user name, password and db name. After this pls run the given command)

3)php artisan storage:link (too set up the storage path)

4)import the country state and city sqls manually in the db( no need to follow this as for now, since the seed query will auto matically adds all the data)

5)Install aos via npm (npm install aos --save)

6)Install swiper via npm (npm install swiper)

7)Install lightbox via npm(npm install lightbox2 --save)

8)install intervention image(composer require intervention/image)

9)for installing boxicon (npm install boxicons --save)

10)npm run dev ( for compiling all css and js)

11)for mail function configure the .env and currently the mailtrap is used for testing

12)configure the .env file for db and then run:
	1)php artisan config:cache
	2)php artisan serve( run this if you are running the app in local host. Skip this in live)

note: If you are running the app in linux server then You may need to grant all the permissionn to this app and mainly for the folders: bootstrap and storage.

the default credentials for admin: 'email:admin@gmail.com', 'password: admin#2021@auction'

---------------------------------------------------------------
Follow below steps if any error regarding the followings arises
----------------------------------------------------------------
----------------------------------------------------------------
if any error regarding the mail template arises then use the following query, but it won't happen 99%

13)php artisan vendor:publish --tag=laravel-mail(for the laravel mail templates)
	
if any error regarding the custom error template arises then use the following query, but it won't happen 99%  

14)php artisan vendor:publish --tag=laravel-errors
	upload error image from public/error after executing the above query
	....................................................
	dont' run follow queries. they are already done
	...............................................
15)the below queries are for the markdown email templates
	php artisan vendor:publish --tag=laravel-mail
	php artisan vendor:publish --tag=laravel-notifications

	php artisan make:mail CoinQuery --markdown=emails.CoinQueryAdminMail

	php artisan make:mail ToadminContactUs --markdown=emails.ContactUsMail
	php artisan make:mail TouserContactUs --markdown=emails.ContactUsMailUser







