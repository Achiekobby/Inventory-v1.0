<?php

namespace App\Http\Controllers;

use App\Models\Inventory\Category;
use Illuminate\Http\Request;

//* Utilities
use Illuminate\Support\Facades\Validator;
use Session;
use Image;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::query()->paginate(10);
        return view('Inventory.categories.categories', compact('categories'));
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
    public function store(Request $request)
    {
        $rules = [
            'name'=>'required|string',
            'image'=>'required',
        ];
        $validation = Validator::make($request->all(),$rules);
        if($validation->fails()){
            Session::flash('error',$validation->errors()->first());
            return redirect()->back();
        }

        $filename = null;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time().".".$image->getClientOriginalExtension();
            $path = public_path('uploads/'.$filename);

            //* Resizing the image file
            Image::make($image)->resize(300,200)->save($path);
        }
        //* insert the details inside the DB
        $category = Category::query()->create([
            'name'=>$request->name,
            'image'=>$filename,
            'slug'=>Str::slug($request->name)
        ]);

        if($category){
            Session::flash('success', 'Category Added');
            return redirect()->back();
        }
        else{
            Session::flash('error','Sorry, Category creation failed. Please try again');
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $deletion = Category::query()->where('slug', $slug)->delete();
        if(!$deletion){
            Session::flash('error','Sorry, Deletion failed. Please try again');
            return redirect()->route('categories.index');
        }
        Session::flash('success', 'Category deleted successfully');
        return redirect()->route('categories.index');
    }
}
