<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function add($id){

        $product = Product::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "photo" => $product->photo,
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back();
    }

    public function list(){
        $cart = session()->get('cart');
        return view('cart',compact('cart'));
    }

    public function remove($id){
        if($id) {
            $cart = session()->get('cart');
            if(isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
            return redirect()->back();
        }
    }

    public function increase($id){

        $cart = session()->get('cart');
        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        }

        session()->put('cart', $cart);
        return redirect()->back();

    }

    public function decrease($id){

        $cart = session()->get('cart');
        if(isset($cart[$id])){
            if($cart[$id]['quantity']<=1){
                unset($cart[$id]);
            }
            else{
                $cart[$id]['quantity']--;
            }
        }

        session()->put('cart', $cart);
        return redirect()->back();

    }
}
