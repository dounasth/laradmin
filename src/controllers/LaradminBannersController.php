<?php
/**
 * Created by PhpStorm.
 * User: nimda
 * Date: 4/3/15
 * Time: 3:34 PM
 */


class LaradminBannersController extends \LaradminBaseController {

    public function listAll(){
        return View::make('laradmin::banners.list')->withBanners(Banner::all());
    }

    public function add(){
        return View::make('laradmin::banners.add')->withBanner(new Banner());
    }

    public function edit($id){
        return View::make('laradmin::banners.edit')->withBanner(Banner::findOrFail($id));
    }

    public function delete($id){
        $banner = Banner::findOrFail($id);
        $banner->delete();
        return Redirect::route('banners');
    }

    public function save(){
        $id = Input::get('id');
        $data = Input::get('banner');

        if (Input::file('image')) {
            $data['image'] = base64_encode(file_get_contents(Input::file('image')->getRealPath()));
//            $data['image'] = Image::make(Input::file('image')->getRealPath());
        }

        $banner = Banner::findOrNew($id);
        $banner->fill($data);
        $banner->save();
        return Redirect::route('banners');
    }

    public function fetchImage($id) {
        $banner = Banner::findOrFail($id);
        header('Content-type:image/png');
        header('Cache-Control:max-age=2592000, public, must-revalidate');
        echo base64_decode($banner->image);
        exit;
    }

}