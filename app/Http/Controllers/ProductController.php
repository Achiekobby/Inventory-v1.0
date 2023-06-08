<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//*Models
use App\Models\Inventory\Product;

//* Requests
use App\Http\Requests\Inventory\ProductCreateRequest;

//* Utilities
use Session;
use Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
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

            $filename = null;
            if($request->hasFile('image')){
                $request->file('image');
                $filename = time().'.'.$image->getClientOriginalExtension();
                $path = public_path('/uploads/photo',$filename);

                //* resizing and saving the image inside the path
                Image::make($image)->resize(300, 200)->save($path);
            }

            $product = DB::transaction(function() use ($request, $filename){
                $user = Auth::user();
                $item = $user->products()->create([
                    'category_id'   =>$request->validated()['category'],
                    'supplier_id'   =>$request->validated()['supplier'],
                    'brand'         =>$request->validated()['brand'],
                    'SKU'           =>Str::uuid()->toString(),
                    'name'          =>$request->validated()['name'],
                    'desc'          =>$request->validated()['description'],
                    'slug'          =>Str::slug($request->validated()['name']),
                    'code'          =>$request->validated()['bar_code'],
                    'image'         =>$filename,
                    'quantity'      =>$request->validated()['quantity'],
                    'unit_price'    =>number_format((float)$request->validated()['unit_price'],2,'.',''),
                    'total_price'   =>number_format((float)($request->validated()['unit_price'] * $request->validated()['quantity']),2,'.',''),
                    'status'        =>'active'
                ]);
                return $item;
            });
            if($product){
                Session::flash('success','New Product was successfully added');
                return redirect()->route('products.index');
            }
            else{
                Session::flash('error','Sorry, a problem occurred during the creation of a new product. Please try again later');
                return redirect()->back();
            }

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
    public function edit($slug)
    {
        $product = Product::query()->where('slug', $slug)->first();
        if(!$product){
            Session::flash('error', 'Product not found');
            return redirect()->back();
        }
        return view('Inventory.products.edit_product', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
