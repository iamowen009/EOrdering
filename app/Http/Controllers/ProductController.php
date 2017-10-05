<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProductController extends Controller
{
    public function index($id)
    {
        return view('product.index',compact('id'));
    }
    public function detail($id)
    {
        return view('product.detail',compact('id'));
    }
}
