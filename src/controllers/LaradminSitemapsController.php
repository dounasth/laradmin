<?php


class LaradminSitemapsController extends \LaradminBaseController
{
    public function index()
    {
        /*
        // Get a general sitemap.
        Sitemap::addSitemap('/sitemap-categories.xml');
        // You can use the route helpers too.
        Sitemap::addSitemap(URL::route('sitemaps.posts'));
        Sitemap::addSitemap(route('sitemaps.users'));
        */

        Sitemap::addSitemap(route('site.sitemap.pages'));
        Sitemap::addSitemap(route('site.sitemap.categories'));
        Sitemap::addSitemap(route('site.sitemap.coupons'));
//        Sitemap::addSitemap(route('site.sitemap.tags'));

        // Return the sitemap to the client.
        return Sitemap::renderSitemapIndex();
    }

    public function pages()
    {
        $pages = \Bonweb\Laradmin\Page::enabled()->get();

        Sitemap::addTag(route('home'), '', 'daily', '0.8');

        foreach ($pages as $page) {
            Sitemap::addTag(route('site.pages.view', $page->slug), $page->created_at, 'daily', '0.8');
        }

        $response = Response::make(Sitemap::xml(), 200);
        $response->header('Content-Type', 'text/xml');
        return $response;
    }

}
