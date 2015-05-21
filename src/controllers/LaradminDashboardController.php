<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 26/9/2014
 * Time: 12:37 μμ
 */

class LaradminDashboardController extends \LaradminBaseController {

    public function dashboard() {
        $ews = Event::fire('admin.dashboard.widgets');
        $widgets = array();
        foreach ($ews as $k => $v) {
            $v->prepare();
            $widgets[$k] = $v->html();
        }
        return View::make('laradmin::dashboard')->withWidgets($widgets);
    }

} 