# Installation

- Add `"bonweb/laradmin": "dev-master"` to your composer.json
- Set `"minimum-stability": "dev"` to your composer.json
- Set `"prefer": "dist"` to your composer.json
- Run `php composer.phar install` or `composer update`
- Add `'Bonweb\Laradmin\LaradminServiceProvider',` to your `config/app.php` file under `$providers`
- Go to /install register admin user and you are ready to go

# Optional
- Add your service credentials to `app/config/packages/atticmedia/anvard/hybridauth.php`