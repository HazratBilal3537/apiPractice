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

        // Cookie::queue('cokkeiskey', 'value of coookies', 700);
        // $cookies = $request->cookies->get('cokkeiskey');
        // dd($cookies);
///////////////////////////////////////////////////////////////////// store data in session
        $request->session()->put('session_key','values of the session');
      $sessiondata=  $request->session()->get('session_key');
        dd($sessiondata);
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
        $validatedData = $request->validated();

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
