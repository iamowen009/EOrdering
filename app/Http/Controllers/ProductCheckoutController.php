<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProductCheckoutController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }

    public function summary($id){
    	return view('cart.summary',compact('id'));
    }
}
