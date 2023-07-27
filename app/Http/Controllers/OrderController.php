<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::paginate(10);
        return view('orders.index',compact('orders'));
    }

    public function search(Request $request){

        $str=$request->search;

        $orders = Order::where('customer_name', 'LIKE', '%' . $str . '%')
                     ->orWhere('orderid', 'LIKE', '%' . $str . '%')
                     ->paginate(8);
        $orders->appends(['orders' => $str]);

        return view('orders.index',compact('orders'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::check())

        return view('checkout');

        else

        return redirect('login');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //upload payment receipt copy
        $receipt_copy="none";

        if($request->file('receipt_copy')){
            $receipt_copy=$request->file('receipt_copy')->getClientOriginalName();
            $request->file('receipt_copy')->move(public_path('images'),$receipt_copy);

        }


        $orderid = "#".rand(10000,99999);
        $order_date = "".date('d-m-y');
        $order_status = "not_comfirmed";
        $order_delivery = "none";
        

        if($request->shipping_type=='short')
            $shipping_fee=2000;
        else if($request->shipping_type=='long')
            $shipping_fee=5000;
        else if($request->shipping_type="free")
            $shipping_fee=0;

        $grandtotal = $request->grandtotal;
        $total = $grandtotal + $shipping_fee;

        Order:: create([

            'orderid'=>$orderid,
            'order_date'=>$order_date,
            'ordered_items'=>$request->ordered_items,
            'total'=>$total,
            'customer_name'=>$request->customer_name,
            'customer_email'=>$request->customer_email,
            'customer_phone'=>$request->customer_phone,
            'customer_address'=>$request->customer_address,
            'order_status'=>$order_status,
            'order_delivery'=>$order_delivery,
            'shipping_fee'=>$shipping_fee,
            'payment_type'=>$request->payment_type,
            'receipt_copy'=>$receipt_copy,

        ]);

        return redirect()->route('orders.success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('orders.details',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function success()
    {
        //delete all data
        Session()->forget('cart');
        return view('ordersuccess');
    }

    public function destroy($id){
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->route('orders.index');
    }

    public function processed($id){

        $order=Order::findOrFail($id);
        $order->processed=1;
        $order->save();

        return redirect()->back();
    }

    public function shipped($id){
        
        $order=Order::findOrFail($id);
        $order->shipped=1;
        $order->save();

        return redirect()->back();
    }

    public function enroute($id){
        $order=Order::findOrFail($id);
        $order->enroute=1;
        $order->save();

        return redirect()->back();
    }

    public function arrived($id){
        $order=Order::findOrFail($id);
        $order->arrived=1;
        $order->save();

        return redirect()->back();
    }

    public function ordertrack(){
        return view('ordertrack');
    }

    public function tracking(Request $request){
        $orderid=$request->orderid;
        $order=Order::where('orderid','=',$orderid)->first();
        
        return view('ordertrack',compact('order'));

    }
}
