<?php

class LaradminContactController extends \LaradminBaseController {

	public function contact()
	{
        $msg = Session::get('message', '');
        $sent = Session::get('sent', false);
        $email = Session::get('data.email', '');
        $message = Session::get('data.message', '');
        return View::make('laradmin::site.contact')->withMsg($msg)->withSent($sent)
                                    ->withEmail($email)->withMessage($message);
	}

	public function sendContact()
	{
        $captcha = Input::get('g-recaptcha-response', '');
        if ($captcha) {
            $isCaptchaOk = $this->curlPost('https://www.google.com/recaptcha/api/siteverify', array(
                'secret' => '6LehSxATAAAAAKCyLRC1NYMFEQeoNGBDf0Nko21L',
                'response' => $captcha,
                'remoteip' => $_SERVER['SERVER_ADDR'],
            ));
            if ($isCaptchaOk['success']) {
                $email = Input::get('email', '');
                $msg = Input::get('message', '');
                //  Send to admin
                Mail::send('emails.contact_form', array('msg' => $msg), function($message) use ($email)
                {
                    $message->to(Config::get('laradmin::general.mail.from.address'), Config::get('laradmin::general.mail.from.name'))
                        ->subject('Νέo μύνημα απο τη διεύθυνση '.$email);
                });
                $msg = 'Εγινε αποστολη του μυνηματος σας. Ευχαριστουμε.';
                $sent = true;
            }
            else {
                $msg = 'Δεν έχει γίνει επιβεβαίωση captcha.';
                $sent = false;
            }
        }
        else {
            $msg = 'Δεν έχει γίνει επιβεβαίωση captcha.';
            $sent = false;
        }
        return Redirect::route('contact')->withMessage($msg)->withSent($sent)->withData(Input::all());
	}

    protected function curlPost($url, $data) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec ($ch);
        curl_close ($ch);
        $server_output = json_decode($server_output, true);
        return $server_output;
    }
}
