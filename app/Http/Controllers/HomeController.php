<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Mail;

class HomeController extends Controller
{
    public function index($id = 0)
    {
        return view('home.index',compact('id'));
    }

    public function layout($no = 0){
      return view('home.inc-home-'. $no );
    }

    public function mail(){
    	$data = array('name' => 'Jordan');
    	$sent = Mail::send('emails.mailExample', $data, function($message)
		{
			$message->to('piigabo.oc@gmail.com')
			->subject('Hi there!  Laravel sent me!');
		});

		if( ! $sent) dd("something wrong");
		dd("Mail Send Successfully");


	}

}
