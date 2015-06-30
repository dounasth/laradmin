<?php

class LaradminInitController extends \LaradminBaseController {

    public function initialize()
    {
//        $this->command->info('User table seeded!');
        Sentry::createGroup(array(
            'name'        => 'Administrator',
            'permissions' => array(
                'user.view' => 1,
                'user.create' => 1,
                'user.delete' => 1,
                'user.update' => 1,
            ),
        ));
        Sentry::createGroup(array(
            'name'        => 'Moderator',
            'permissions' => array(
                'user.view' => 1,
                'user.update' => 1,
            ),
        ));
        Sentry::createGroup(array(
            'name'        => 'Editor',
            'permissions' => array(
                'user_can_register_for' => 1,
                'user.create' => 1,
                'user.update' => 1,
            ),
        ));
        Sentry::createGroup(array(
            'name'        => 'Simple User',
            'permissions' => array(
                'user_can_register_for' => 1,
            ),
        ));
    }

}
?>