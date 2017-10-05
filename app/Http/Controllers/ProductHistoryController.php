<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProductHistoryController extends Controller
{
    public function index()
    {
        return view('product_history.index');
    }
}
