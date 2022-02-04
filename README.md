# entga-examiner-seeder
In this application i wanted to add answers to all examiners in the database based on only three examiners who really completed the exam,
so I have to take there records and distribute it on all other examiners, so i did it by taking the three examiners,thier results and answers in an excel sheet, then i inserted these records to each one in the database, I know it can be done programmaticly,but what if i decided to insert more records or insert more users, or there another one whose not programmer that want to change something, this will make it easy on him.
and it was a chance to implement laravel excel and gian some experience.

# how to install
- first make an integration with mssql take a look on this docs to know how <a src="https://docs.microsoft.com/en-us/sql/connect/php/loading-the-php-sql-driver?view=sql-server-ver15"/>
in my case it required mssql to do that, if you want to use another DB it's up to you

- then clone this repo

- after that go the project distination and run these commands
```
composer install
```
```
cat .env.example > .env
```
```
php artisan key:generate
```
don't forget to set your vars 
```
npm install
```
```
npm run dev
```