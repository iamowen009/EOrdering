<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.index');
    }

    public function category($id)
    {
    	if($id==1)
        	return view('news.toa',compact('id'));
        else
        	return view('news.eordering',compact('id'));

    }
}
