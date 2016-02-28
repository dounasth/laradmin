<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 26/9/2014
 * Time: 12:37 μμ
 */

use Conner\Tagging\Tag;
use Bonweb\Laradmin\Page;
use \Bonweb\Laracart\Product;
use \Bonweb\Laracart\Category;

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

    public function search() {
        $q = Input::get('q', '');
        $search = [];
        if (fn_is_not_empty($q)) {
            $search['pages'] = [
                'title' => 'Pages',
                'template' => 'laradmin::search.parts.page',
                'items' => Page::search($q)->get()
            ];
            $search['products'] = [
                'title' => 'Products',
                'template' => 'laradmin::search.parts.product',
                'items' => Product::search($q)->get()
            ];
            $search['categories'] = [
                'title' => 'Categories',
                'template' => 'laradmin::search.parts.category',
                'items' => Category::search($q)->get()
            ];
        }
        return View::make('laradmin::search.admin-search', compact('search'));
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