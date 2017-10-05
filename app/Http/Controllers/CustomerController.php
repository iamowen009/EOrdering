<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer.index');
    }

    public function profile(){
    	return view('customer.profile');
    }
    public function contact(){
    	return view('customer.contact');
    }

    public function profile_update(){
    	return view('customer.profile_update');
    }

    public function store(){
    	return view('customer.store');
    }

    public function password_update(){
    	return view('customer.password_update');
    }

    public function forgot_password(){
        return view('forgot_password');
    }

    public function forgotconf_password(){
        return view('forgotconf_password');
    }
    public function recover_password(){
        return view('recover_password');
    }
}
