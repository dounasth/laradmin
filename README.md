# Installation (NOT READY YET)

-add `"bonweb/laradmin": "dev-master"` to your composer.json
-set `"minimum-stability": "dev"` to your composer.json
-Run `php composer.phar install` or `composer update`


- Add `'Atticmedia\Anvard\AnvardServiceProvider'` to your `config/app.php` file under `$providers`
- Add `'Cartalyst\Sentry\SentryServiceProvider'` to your `config/app.php` file under `$providers`
- Add `'Bonweb\Laradmin\LaradminServiceProvider'` to your `config/app.php` file under `$providers`
- Add `'Sentry' => 'Cartalyst\Sentry\Facades\Laravel\Sentry',` to your `config/app.php` file under `$aliases`

- Check the `app/config/packages/atticmedia/anvard/db.php` file to see if you need to customise anything (see [Configuration](#configuration) below for help)

- Publish the package config `php artisan config:publish atticmedia/anvard`
- Publish the package config `php artisan config:publish cartalyst/sentry`
- Publish the package config `php artisan config:publish bonweb/laradmin`

- Run the migration `php artisan migrate --package=atticmedia/anvard`
- Run the migration `php artisan migrate --package=cartalyst/sentry`
- Run the migration `php artisan migrate --package=cartalyst/laradmin`

- Publish the package assets `php artisan asset:publish bonweb/laradmin`

- Add your service credentials to `app/config/packages/atticmedia/anvard/hybridauth.php`


* https://github.com/cartalyst/sentry
* https://bitbucket.org/atticmedia/anvard
