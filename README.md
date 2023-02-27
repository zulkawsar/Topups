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

In definition(), just modify subDay(1) -> subDay(2), or you remove it Then run
```
php artisan db:seed --class=TopupSeeder
```
