<?php

class LaradminInitController extends \LaradminBaseController {

    public function main() {
        return View::make('laradmin::install.main');
    }
    public function runMigration()
    {
        Artisan::call('asset:publish', ['package'=>'bonweb/laradmin']);

        Artisan::call('config:publish', ['package'=>'bonweb/laradmin']);
        Artisan::call('config:publish', ['package'=>'atticmedia/anvard']);
        Artisan::call('config:publish', ['package'=>'cartalyst/sentry']);

        Artisan::call('migrate', [
            '--package'=>'bonweb/laradmin',
            '--force' => true,
        ]);
        $seeder = new Bonweb\Laradmin\DatabaseSeeder();
        $seeder->run();

        try
        {
            $data = Input::get('user');
            // Let's register a user.
            $user = Sentry::register($data, false);
            $usergroup = Sentry::findGroupByName('Administrator');
            $user->addGroup($usergroup);

            $user = Sentry::findUserById($user->getId());

            $admin = User::findOrFail($user->getId());
            $admin->activated = 1;
            $admin->save();
        }
        catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
        {
            $message = AlertMessage::make(AlertMessage::TYPE_ERROR, 'Login field is required.');
            return Redirect::route('register')->withMessage($message);
        }
        catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
        {
            $message = AlertMessage::make(AlertMessage::TYPE_ERROR, 'Password field is required.');
            return Redirect::route('register')->withMessage($message);
        }

        return Redirect::route('login')->withMessage('Laradmin install is complete. Login with your admin account now');
    }

}
?>