<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $products = Product::paginate(8);
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $photo_name="";
        if($request->file('photo')){
            $photo_name=$request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('images'),$photo_name);
        }
        else{
            $photo_name="none";
        }
        Product::create([
                'category'=>$request->category,
                'name'=>$request->name,
                'price'=>$request->price,
                'photo'=>$photo_name,
         ]);
         return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $products = Product::findOrFail($id);
       return view('products.edit',compact('products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $photo_name="";
        if($request->file('new_photo')){
            $photo_name=$request->file('new_photo')->getClientOriginalName();
            $request->file('new_photo')->move(public_path('images'),$photo_name);
        }
        else{
            $photo_name=$request->curr_photo;
        }

        $products = Product::findOrFail($id);
        $products->name = $request->name;
        $products->price = $request->price;
        $products->photo=$photo_name;

        $products->save();

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $products = Product::findOrFail($id);
        $products->delete();

        return redirect()->route('products.index');
    }
    
    public function search(Request $request){

        $str=$request->search;

        $products = Product::where('name', 'LIKE', '%' . $str . '%')
                     ->orWhere('category', 'LIKE', '%' . $str . '%')
                     ->paginate(8);
        $products->appends(['products' => $str]);

        return view('products.index',compact('products'));

    }
}
