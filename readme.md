### Как запустить

Комманды в консоли

```console
git clone https://github.com/mikesvis/job-task.git
cd job-task
cp .env.example .env
composer install
php artisan key:generate
```

Обновляем конфигурацию подключения к базе в `.env`

```
...
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
...
```

```console
php artisan migrate && php artisan db:seed
php artisan serve
```

Profit! Сайт доступен по адресу, указанный в информации по работе комманды `serve`

### Тесты

```console
php artisan test
```
