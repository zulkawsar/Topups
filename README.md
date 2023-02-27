## Start
Basic Requirement
| Laravel version   |	PHP
| ---               | ---           |
| ^8.0              | 7.3 - 8.1

Clone the repository
```
git clone https://github.com/zulkawsar/Topups.git
```
Go to the folder
```
cd Topups
```
Update the Composer ( Before run the composer update command please enable the ```extension=gd ```  )
```
Composer update
```

Then you need to copy the .env.example to .env
```
cp .env.example .env
```

The set the database information 
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

Then run the seeder
```
php artisan migrate:fresh --seed
```
Its seeding up 500 Users and 50,000 (you can modify it if you need more records) Topups records. It's take some time, Please wait :)
After finishing, You need a little bit modify in TopupFactory

In definition(), just modify subDay(1) -> subDay(2), or you remove it (for current date data seeder) Then run
```
php artisan db:seed --class=TopupSeeder
```

After finishing run the application
```
php artisan serve
```
You can config the QUEUE_CONNECTION in .env file.
If you use QUEUE_CONNECTION=database, Please run the below command for running the query:work
```
php artisan queue:work
```

There is a command for generate the top topup user, that you run automatically every day at first hours
```
php artisan top:user
```

---------------------------------------------
You can manually generate the top topup user from the UI
browse the http://127.0.0.1:8000 and select the date and click the Generate Topup
It will generate the specific date top topup users

Note: Make sure the your queue is running

If you have any query please email: zulkawsar@gmail.com

