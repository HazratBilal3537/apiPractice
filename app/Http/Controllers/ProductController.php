<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products=Product::all();
///////////////////////////////////////////////////////////////////// store data in cookies
foreach($products as $product){
    $product->image =   asset($product->image);
    // dd($product);
}
        return response()->json([
            'data'=>$products,
        ]);
    }

    // produc search querry
    public function search(Request $request)
    {
        $search = strtolower($request->query('query'));
        // using reusable query for search
        $product = Product::searchByName($search)->get();

        return response()->json([
            'data'=>$product,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProductRequest $request)
    {

        // $request->validated();
        $imageName = time().'.'.$request->image->extension();
        // dd('testing',$request);
        $request->image->move(public_path('images'), $imageName);

        $product=new Product();
        $product->name=$request->name;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->quantity=$request->quantity;
        $product->category=$request->category;
        $product->image= 'images/'.$imageName;
        $product->is_active=$request->is_active;
        $product->save();

        return response()->json([
            'success'=>'produc create successfully'
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
