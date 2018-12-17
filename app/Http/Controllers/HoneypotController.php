<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Input;

class HoneypotController extends Controller
{
    public function store()
    {

        Validator::extend('honey_pot', function ($attribute, $value, $parameters) {

            return $value == '';

        });

        $rules = array(

            'email' => 'required|email',

            'password' => 'required',

            'honey_pot' => 'honey_pot'

        );

        $messages = array('honey_pot' => 'Nothing Here');

        $validation = Validator::make(Input::all(), $rules, $messages);

        if ($validation->fails()) {
            return Redirect::to('register')->withErrors($validation)->withInput();

        } else {

            return "Awesome!!";

        }

    }


}
