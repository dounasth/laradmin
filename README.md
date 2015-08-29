# Installation

- Add `"bonweb/laradmin": "dev-master"` to your composer.json
- Set `"minimum-stability": "dev"` to your composer.json
- Set `"prefer": "dist"` to your composer.json
- Run `php composer.phar install` or `composer update`
- Add `'Bonweb\Laradmin\LaradminServiceProvider',` to your `config/app.php` file under `$providers`
- Go to /install register admin user and you are ready to go

- Laradmin defines a home route, so if you have another home route defined in app/routes.php, you will need to remove it or copy the laradmin home route if you want to extend it.

# Optional
- Add your service credentials to `app/config/packages/atticmedia/anvard/hybridauth.php`