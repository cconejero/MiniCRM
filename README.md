![Mini CRM](https://raw.githubusercontent.com/cconejero/MiniCRM/master/public/minicrm.png)
# Mini CRM:
A minimal CRM project to demonstrate:
- MVC
- Auth
- CRUD and Resource Controllers
- Eloquent and Relationships
- Database migrations and seeds
- Form Validation and Requests
- File management
- Basic front-end
- Pagination
- Search
- Basic testing with phpunit

## Requirements
```
php -v // (PHP 8.1.8)
node -v // v18.6.0
npm -v  // 8.14.0
```

## Installation
```
cp .env.example .env
composer install
npm install
php artisan storage:link
npm run build
php artisan migrate:fresh --seed
```

## Default credentials
**User:** test@example.com

**Password:** password

## Run with
```
php artisan serve
```
