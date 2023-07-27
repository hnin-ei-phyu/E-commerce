<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class FrontendController extends Controller
{
    public function welcome(){
        $categories = Category::all();
        $products=Product::paginate(8);
        return view('welcome',compact('products','categories'));
    }

    public function show($id){

        $products=Product::inRandomOrder()
                    ->limit(4)
                    ->get();

        $product=Product::findOrFail($id);
        return view('details',compact('product','products'));
        
    }

    public function search(Request $request){

        $str=$request->category;

        $categories = Category::all();
        $products = Product::where('category', 'LIKE', '%' . $str . '%')
                     ->orWhere('name', 'LIKE', '%' . $str . '%')
                     ->paginate(8);
        $products->appends(['products' => $str]);

        return view('welcome',compact('products','categories'));

    }
}
