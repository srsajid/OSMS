<?php
Class AccountController extends BaseController{
    public function getSignIn(){
        return View::make('account.signin');
    }

    public function postSignIn(){
        $validator = Validator::make(Input::all(),
            array(
                'username' => 'required|email',
                'password' => 'required'
            )
        );
        if($validator->fails()){
            return Redirect::route('sign-in')
                ->withErrors($validator)
                ->withInput();
        }
        else{
            $auth = Auth::attempt(array(
                    'username' => Input::get('username'),
                    'password' => Input::get('password')
                )
            );
            if($auth){
                return Redirect::route('admin');
            }
            else{
                return Redirect::route('')
                    -> with('global','Wrong username and password.');
            }
        }
        return Redirect::route('sign-in')
            -> with('global','There was a problem singing in.');
    }
}