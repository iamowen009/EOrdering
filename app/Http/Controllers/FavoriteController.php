<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FavoriteController extends Controller
{
    public function index()
    {
        return view('favorite.index');
    }
}
