<?php
/**
 * Created by PhpStorm.
 * User: nimda
 * Date: 3/27/15
 * Time: 9:23 PM
 */


class ViewWidget extends Widget {

    public $view;
    public $data;

    public function __construct($id='', $type=Widget::TYPE_HTML, $view='', $data=array(), $wrapClass='') {
        $this->id = $id;
        $this->type = $type;
        $this->html = '';
        $this->view = $view;
        $this->data = $data;
        $this->wrapClass = $wrapClass;
    }

    public function html() {
        $this->html = View::make($this->view, $this->data)->render();
        $this->html = parent::html($this);
        return $this->html;
    }

}