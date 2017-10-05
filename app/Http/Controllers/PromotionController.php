<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PromotionController extends Controller
{
    public function index($id)
    {
        return view('promotion.index',compact('id'));
    }
}
