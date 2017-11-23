<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use PDF;

class PrintController extends Controller
{
    public function invoice($orderId)
    {
        $content = file_get_contents('http://202.142.195.168:8010/API/OrderInfo?orderId=' . $orderId);
        $json = json_decode($content, true);
        
        if ($json['result'] == 'SUCCESS') {
            $data['info'] = $json['data']['order'];
            $data['products'] = $json['data']['orderDetailList'];
            $pdf = PDF::loadView('print.invoice', $data)
                ->setPaper('a4');
            return @$pdf->stream();
            //return $pdf->download();
            //print_r($data);
            //return view('print.invoice', $data);
        } else {
            return redirect('/home');
        }
        /*
        $data = [];
        $pdf = PDF::loadView('print.invoice', $data);
        return $pdf->stream();
        */
    }
}
