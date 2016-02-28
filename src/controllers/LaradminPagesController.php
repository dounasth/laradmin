<?php

use Bonweb\Laradmin\Page;

class LaradminPagesController extends \LaradminBaseController {

    public function viewPage($page)
    {
        $page = Page::whereSlug($page)->first();
        return View::make('laradmin::site.page')->withPage($page);
    }

    public function pages($id=0) {
        if (Request::isMethod('post')) {
            $page = Page::findOrNew(Input::get('id'));
            $page->fill(Input::all());
            $page->save();
            return Redirect::route('pages.manage');
        }

        $pages = Page::all();
        $editpage = Page::find($id);
        $editpage = (!empty($editpage)) ? $editpage : new Page() ;
        $action = (!empty($id)) ? $id : 'add' ;
        $actiontext = (!empty($id)) ? 'Edit' : 'Add new' ;
        return View::make('laradmin::pages_manage')
            ->withPages($pages)
            ->withEditpage($editpage)
            ->withAction($action)
            ->withActiontext($actiontext)
            ;
    }

    public function deletePage($id) {
        $page = Page::find($id);
        $page->delete();
        return Redirect::route('pages.manage');
    }

    public function sitemapPage() {
        return View::make('laradmin::site.sitemap');
    }
}
