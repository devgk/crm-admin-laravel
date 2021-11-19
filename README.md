# Basic Content Management System

CMS - Admin Login (Alert for non-admin users) - developed by DevGk
1. Add products form
   1. title
   2. select a category
   3. description
   4. images
   5. price
2. List of products -> Use Datatable with server-side
3. Write Test cases in PHPUnit.

## Description
Build on Laravel 8. PHP Version used ^8. Packages used are listed below:
1. [Yajra Datatable](https://github.com/yajra/laravel-datatables): Datatable Laravel Package
2. [Sweet Alert](https://github.com/realrashid/sweet-alert): Sweet Alert Laravel Package
3. [bootstrap 5](https://getbootstrap.com/docs/5.0/getting-started/introduction/): Bootstrap 5 - Admin Panel Frontend
4. [Volt - Bootstrap 5 Admin Dashboard](https://startbootstrap.com/theme/sb-admin-2): Open source Bootstrap 5 Admin Dashboard. Check for reference and further customizing the UI

### Testing The Application
1. Database: Please open .env and set your database connection details and change the name of the database to your testing database.
2. Run command **composer install* after cloning this project for the first time from the github.
   - Optionally run (*npm install* and npm run watch)
3. Run *php artisan migrate* - to migrate the database
4. Login to the application with the below specified user
   - Email: admin@cmsadmin.com
   - Password: I_@m_CMS_@dmin
5. Use Sample DB (Import into mysql database for test data - optional)
6. Run Test: **php artisan test*