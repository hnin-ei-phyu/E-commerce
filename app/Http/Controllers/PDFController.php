<?php

namespace App\Http\Controllers;
use PDF;
use Mail;

use Illuminate\Http\Request;
use App\models\Order;


class PDFController extends Controller
{
    public function index($id){
        $order=Order::FindOrFail($id);
        $myorder=$order->toArray();

        $data['orderid']=$myorder['orderid'];
        $data['order_date']=$myorder['order_date'];
        $data['customer_email']=$myorder['customer_email'];
        $data['customer_name']=$myorder['customer_name'];
        $data['customer_phone']=$myorder['customer_phone'];
        $data['shipping_fee']=$myorder['shipping_fee'];
        $data['total']=$myorder['total'];

        $pdf = PDF::loadView('emails.myTestMail',$data);

        Mail::send('emails.myTestMail',$data,function($message)use($data,$pdf){
            $message->to($data['customer_email'])
                    ->subject("Order Details")
                    ->attachData($pdf->output(),"receipt.pdf");
        });
        return view('paymentconfirm');
        
    }
}
