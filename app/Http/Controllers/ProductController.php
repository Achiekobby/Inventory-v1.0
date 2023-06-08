<?php

namespace App\Http\Controllers;

use App\Models\Inventory\Product;
use Illuminate\Http\Request;

//* Requests
use App\Http\Requests\Inventory\ProductCreateRequest;

//* Utilities
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::query()->orderBy('created_at','DESC')->paginate(10);
        return view('Inventory.products.products',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Inventory.products.create_product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCreateRequest $request)
    {
        try{

        }catch(\Exception $e){
            Session::flash('error',$e->getMessage());
            return redirect()->back();
        }
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
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
