<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 26/9/2014
 * Time: 12:37 μμ
 */

use Conner\Tagging\Tag;

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

    public function tags() {
        $tags = Tag::all();
        return View::make('laradmin::tags')->withTags($tags);
    }

    public function tagsJson() {
        $tags = Tag::lists('name');
        $tags = array_values($tags);
        $headers = array(
            'Content-type'=> 'application/json; charset=utf-8',
//            'Cache-Control' => 'max-age='.Config::get('api::general.jsonCacheControl'),
        );
        return Response::json($tags, 200, $headers, JSON_UNESCAPED_UNICODE);
    }

}