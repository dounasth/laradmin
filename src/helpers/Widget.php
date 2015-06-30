<?php
/**
 * Created by PhpStorm.
 * User: nimda
 * Date: 3/27/15
 * Time: 9:23 PM
 */


class Widget {

    const TYPE_VIEW = 'ViewWidget';
    const TYPE_HTML = 'HtmlWidget';

    public $id;
    public $type;
    public $html;
    public $wrapClass;

    public function __construct($id='', $type=Widget::TYPE_HTML, $html='', $wrapClass='') {
        $this->id = $id;
        $this->type = $type;
        $this->html = $html;
        $this->wrapClass = $wrapClass;
    }

    public function prepare() {

    }

    public function html() {
        if ($this->wrapClass) {
            $this->html = "<div class='{$this->wrapClass}'>{$this->html}</div>";
        }
        return $this->html;
    }

}