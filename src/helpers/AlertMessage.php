<?php
/**
 * Created by PhpStorm.
 * User: nimda
 * Date: 12/31/14
 * Time: 1:48 PM
 */


class AlertMessage {

    const TYPE_ERROR = 'Error';
    const TYPE_WARNING = 'Warning';
    const TYPE_INFO = 'Info';
    const TYPE_SUCCESS = 'Success';

    public $type;
    public $message;

    public static function make($type, $message) {
        return new AlertMessage($type, $message);
    }

    public function __construct($type, $message) {
        $this->type = $type;
        $this->message = $message;
    }

    public static function showMessages($template='laradmin::parts.messages') {
        $messages_view = View::make($template)->with('messages', Session::get('message'))->render();
        return $messages_view;
    }

    public static function success($message) {
        return AlertMessage::make(AlertMessage::TYPE_SUCCESS, $message);
    }

    public static function error($message) {
        return AlertMessage::make(AlertMessage::TYPE_ERROR, $message);
    }

    public static function warning($message) {
        return AlertMessage::make(AlertMessage::TYPE_WARNING, $message);
    }

    public static function info($message) {
        return AlertMessage::make(AlertMessage::TYPE_INFO, $message);
    }

}