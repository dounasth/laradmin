<?php

class LaradminUserController extends \LaradminBaseController {

    public function listUsers() {
        $users = Sentry::findAllUsers();
        foreach ($users as $user) {
//            $adminGroup = Sentry::findGroupById(1);
//            $user->addGroup($adminGroup);
//            $user->permissions = array(
//                'user.view' => 1,
//                'user.create' => 1,
//                'user.delete' => 1,
//                'user.update' => 1,
//            );
//            $user->save();
        }
        return View::make('laradmin::users.list_users')->with('users', $users);
    }

    public function manageUser($id=0) {
        if (Request::isMethod('post')) {
            if ($id) {
                try
                {
                    // Find the user using the user id
                    $user = Sentry::findUserById($id);

                    // Update the user details
//                $user->email = Input::get('user.email');
//                $user->first_name = Input::get('user.first_name');
//                $user->last_name = Input::get('user.last_name');
//                $user->activation_code = Input::get('user.activation_code');
//                $user->reset_password_code = Input::get('user.reset_password_code');

                    $user->fill(Input::get('user'));

                    // Update the user
                    if ($user->save())
                    {
                        // User information was updated
                    }
                    else
                    {
                        // User information was not updated
                    }
                    return Redirect::route('edit_user', [$id]);
                }
                catch (Cartalyst\Sentry\Users\UserExistsException $e)
                {
                    $message = AlertMessage::make(AlertMessage::TYPE_ERROR, 'User with this login already exists.');
                }
                catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
                {
                    $message = AlertMessage::make(AlertMessage::TYPE_ERROR, 'User was not found.');
                }
                return Redirect::route('edit_user', [$id])->withMessage($message);
            }
            else {
                $message = '';
                try
                {
                    $data = Input::get('user', array());
                    niceprintr($data);
                    // Create the user
                    $user = Sentry::createUser($data);
                    niceprintr($user);

                    // Find the group using the group id
//                    $adminGroup = Sentry::findGroupById(1);

                    // Assign the group to the user
//                    $user->addGroup($adminGroup);
                }
                catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
                {
                    $message = AlertMessage::make(AlertMessage::TYPE_ERROR, 'Login field is required.');
                }
                catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
                {
                    $message = AlertMessage::make(AlertMessage::TYPE_ERROR, 'Password field is required.');
                }
                catch (Cartalyst\Sentry\Users\UserExistsException $e)
                {
                    $message = AlertMessage::make(AlertMessage::TYPE_ERROR, 'User with this login already exists.');
                }
                catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
                {
                    $message = AlertMessage::make(AlertMessage::TYPE_ERROR, 'Group was not found.');
                }

                if ($message) {
                    return Redirect::route('add_user')->withMessage($message);
                }
                else {
                    $message = AlertMessage::make(AlertMessage::TYPE_SUCCESS, 'User created successfully.');
                    return Redirect::route('edit_user', [$user->getId()])->withMessage($message);
                };
            }

        }
        try
        {
            $user = Sentry::findUserById($id);
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            $user = new User();
        }
        $mode = ($id) ? 'edit' : 'add' ;
        return View::make('laradmin::users.manage_user')->with('user', $user)->withMode($mode);
    }

    public function listUsergroups() {
        $groups = Sentry::findAllGroups();
        return View::make('laradmin::users.list_usergroups')->with('groups', $groups);
    }
    public function manageUsergroup($id=0) {
        if (Request::isMethod('post')) {
            try
            {
                if ($id) {
                    $group = Sentry::findGroupById($id);
                    $group->name = Input::get('name');
                    unset($group->permissions);
                    $group->permissions = Input::get('permissions', array());
                    niceprintr(Input::get('permissions'));
                    niceprintr($group);
                    $group->save();
                    // Update the group
                }
                else {
                    $data = Input::all();
                    $group = Sentry::createGroup($data);
                }
            }
            catch (Cartalyst\Sentry\Groups\NameRequiredException $e)
            {
                $message = AlertMessage::make(AlertMessage::TYPE_ERROR, 'Name field is required');
            }
            catch (Cartalyst\Sentry\Groups\GroupExistsException $e)
            {
                $message = AlertMessage::make(AlertMessage::TYPE_ERROR, 'Group already exists');
            }
            return Redirect::route('usergroups')->withMessage($message);
        }

        $group = array();
        $mode = 'add';
        if ($id) {
            $mode = 'edit';
            $group = Sentry::findGroupById($id);
        }
        return View::make('laradmin::users.manage_usergroup')
                    ->withGroup($group)
                    ->withMode($mode);
    }
    public function deleteUsergroup($id) {
        niceprintr($id);
        exit;
    }

    public function managePermissions() {
        return View::make('laradmin::users.list_permissions')->with('permissions', Config::get('laradmin::permissions.all'));
    }

    public function register() {
        if (Request::isMethod('post')) {
            try
            {
                $data = Input::get('user');
                // Let's register a user.
                $user = Sentry::register($data, false);
                $data = Input::get('usergroups', array());
                foreach ($data as $group) {
                    $usergroup = Sentry::findGroupByName($group);
                    $user->addGroup($usergroup);
                }

                $user = Sentry::findUserById($user->getId());
                Mail::send('laradmin::emails.register', array('user' => $user), function($message) use ($user)
                {
                    $message->from(Config::get('laradmin::general.mail.from.address'), Config::get('laradmin::general.mail.from.name'));
                    $message->to($user->email, "{$user->last_name} {$user->first_name}")->subject('Welcome to My Laravel app!');
                });
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
            catch (Cartalyst\Sentry\Users\UserExistsException $e)
            {
                $message = AlertMessage::make(AlertMessage::TYPE_ERROR, 'User with this login already exists.');
                return Redirect::route('register')->withMessage($message);
            }
            return Redirect::route('activate');
        }

        $groups = Sentry::findAllGroups();
        foreach ($groups as $k=>$group) {
            if (!isset($group->getPermissions()['user_can_register_for'])) {
                unset($groups[$k]);
            }
        }
        return View::make('laradmin::register')
                    ->withGroups($groups);
    }

    public function activate() {
        $email = Input::get('email', '');
        $activationCode = Input::get('activationCode', '');
        if ($email && $activationCode) {
            $message = '';
            try
            {
                // Find the user using the user id
                $user = Sentry::findUserByLogin($email);

                // Attempt to activate the user
                if ($user->attemptActivation($activationCode))
                {
                    // User activation passed
                    niceprintr('User activation passed');
                }
                else
                {
                    // User activation failed
                    niceprintr('User activation failed');
                }
            }
            catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
            {
                $message = AlertMessage::make(AlertMessage::TYPE_ERROR, 'User not found');
            }
            catch (Cartalyst\Sentry\Users\UserAlreadyActivatedException $e)
            {
                $message = AlertMessage::make(AlertMessage::TYPE_ERROR, 'User is already activated');
            }
            return Redirect::route('login')->withMessage($message);
        }
        else {
            return View::make('laradmin::activate');
        }
    }

    public function resendActivation($id=0) {
        $user = Sentry::findUserById($id);
        Mail::send('laradmin::emails.activation', array('user' => $user), function($message) use ($user)
        {
            $message->from(Config::get('laradmin::general.mail.from.address'), Config::get('laradmin::general.mail.from.name'));
            $message->to($user->email, "{$user->last_name} {$user->first_name}")->subject('Here is your activation link');
        });
        return Redirect::to($_SERVER['HTTP_REFERER']);
    }

    public function login() {

        if (Request::isMethod('post')) {
            try
            {
                // Login credentials
                $credentials = array(
                    'email'      => Input::get('username'),
                    'password'   => Input::get('password'),
                );

                // Authenticate the user
                if ($user = Sentry::authenticate($credentials, false)) {
                    Sentry::login($user);
                    if (Auth::attempt($credentials)) {
                        return Redirect::intended('/');
                    }
                    else return Redirect::route('login');
                }
            }
            catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
            {
                $message = AlertMessage::make(AlertMessage::TYPE_ERROR, 'Login field is required.');
            }
            catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
            {
                $message = AlertMessage::make(AlertMessage::TYPE_ERROR, 'Password field is required.');
            }
            catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
            {
                $message = AlertMessage::make(AlertMessage::TYPE_ERROR, 'Wrong password, try again.');
            }
            catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
            {
                $message = AlertMessage::make(AlertMessage::TYPE_ERROR, 'User was not found.');
            }
            catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
            {
                $message = AlertMessage::make(AlertMessage::TYPE_ERROR, 'User is not activated.');
            }

// The following is only required if the throttling is enabled
            catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
            {
                $message = AlertMessage::make(AlertMessage::TYPE_ERROR, 'User is suspended.');
            }
            catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
            {
                $message = AlertMessage::make(AlertMessage::TYPE_ERROR, 'User is banned.');
            }
            return Redirect::route('login')->withMessage($message);
        }

        $socialButtons = '';
        if (class_exists( 'Atticmedia\Anvard\Anvard' )) {
//            $request = Request::create(Config::get('anvard::routes.index'), 'GET');
//            $socialButtons = Route::dispatch($request)->getContent();
            $anvard = App::make('anvard');
            $providers = $anvard->getProviders();
            $socialButtons = View::make('laradmin::social-buttons', compact('providers'))->render();
        }

        return View::make('laradmin::login')->with('socialButtons', $socialButtons);
    }

    public function resetPassword($id) {
        try
        {
            // Find the user using the user email address
            $user = Sentry::findUserById($id);
            // Get the password reset code
            $resetCode = $user->getResetPasswordCode();
            // Now you can send this code to your user via email for example.
            Mail::send('laradmin::emails.reset_password', array('user' => $user, 'resetCode' => $resetCode), function($message) use ($user)
            {
                $message->from(Config::get('laradmin::general.mail.from.address'), Config::get('laradmin::general.mail.from.name'));
                $message->to($user->email, "{$user->last_name} {$user->first_name}")->subject('Here is your activation link');
            });
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            echo 'User was not found.';
        }
        if ($_SERVER['HTTP_REFERER']) {
            return Redirect::to($_SERVER['HTTP_REFERER']);
        }
        else return Redirect::route("login");
    }

    public function doResetPassword() {
        $email = Input::get('user', 0);
        $code = Input::get('code', '');
        $newPassword = Input::get('newPassword', '');
        $confirmPassword = Input::get('newPassword_confirm', '');

//        niceprintr($email);
//        niceprintr($code);
//        niceprintr($newPassword);
//        niceprintr($confirmPassword);

        if (!$email || !$code || !$newPassword || !$confirmPassword) {
            return View::make('laradmin::resetpass');
        }
        if (Request::isMethod('post') && $email && $code && $newPassword) {
            try
            {
                // Find the user using the user id
                $user = Sentry::findUserByLogin($email);

                // Check if the reset password code is valid
                if ($user->checkResetPasswordCode($code))
                {
                    // Attempt to reset the user password
                    if ($user->attemptResetPassword($code, $newPassword))
                    {
                        // Password reset passed
                        $message = AlertMessage::make(AlertMessage::TYPE_SUCCESS, 'Password reset successful');
                        $redir_route = 'do_reset_password';
                    }
                    else
                    {
                        // Password reset failed
                        $message = AlertMessage::make(AlertMessage::TYPE_ERROR, 'Password reset failed');
                        $redir_route = 'do_reset_password';
                    }
                }
                else
                {
                    // The provided password reset code is Invalid
                    $message = AlertMessage::make(AlertMessage::TYPE_ERROR, 'The provided password reset code is Invalid');
                    $redir_route = 'do_reset_password';
                }
            }
            catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
            {
                $message = AlertMessage::make(AlertMessage::TYPE_ERROR, 'User was not found');
                $redir_route = 'do_reset_password';
            }
        }
        return Redirect::route($redir_route)->withMessage($message);
    }

    public function deleteUser($id) {
        try
        {
            // Find the user using the user id
            $user = Sentry::findUserById(1);
            // Delete the user
            $user->delete();
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            echo 'User was not found.';
        }
    }

    public function logout() {
        Auth::logout();
        return Redirect::to('/');
    }

}
