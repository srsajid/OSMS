<?php

class HomeController extends BaseController {
    public function home(){

        $user = User::find(1);
        echo'<pre>',print_r($user),'</pre>';
        return View::make('home');
    }
}
