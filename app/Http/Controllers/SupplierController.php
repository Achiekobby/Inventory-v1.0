<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

//* Models
use App\Models\Inventory\Supplier;
use App\Models\Inventory\Address;

//* Requests
use App\Http\Requests\Inventory\SupplierCreateRequest;

//* Utilities
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    //* Get all Suppliers
    public function index(){
        $suppliers = Supplier::orderBy('created_at','DESC')->paginate(10);
        $suppliers->each(function($supplier){
            $supplier->address = $supplier->address->street;
        });
        return view('Inventory.suppliers', compact('suppliers'));
    }

    //* Creating a new supplier
    public function create(){
        return view('Inventory.create_supplier');
    }

    //* Store the supplier in the database
    public function store(SupplierCreateRequest $request)
    {

        //* store the address first followed by the creation of the supplier using the DB Transactions
        $supplier_creation = DB::transaction(function() use ($request){
            $first_name     = $request->validated()['first_name'];
            $last_name      = $request->validated()['last_name'];
            $email          = $request->validated()['email'];
            $phone_number   = $request->validated()['phone'];
            $organization   = $request->validated()['organization'];
            $role           = $request->validated()['role'];
            $country        = $request->validated()['country'];
            $city           = $request->validated()['city'];
            $region         = $request->validated()['region'];
            $address        = $request->validated()['address'];

            $supplier = Supplier::query()->create([
                'first_name'    =>$first_name,
                'last_name'     =>$last_name,
                'organization'  =>$organization,
                'role'          =>$role,
                'email'         =>$email,
                'phone_number'  =>$phone_number,
            ]);

            $address = $supplier->address()->create([
                'country'   =>$country,
                'city'      =>$city,
                'region'    =>$region,
                'street'    =>$address,
            ]);

            return $supplier;
        });

        if($supplier_creation){
            Session::flash('success','You have successfully created a new supplier');
            return redirect()->back();
        }else{
            Session::flash('error','Sorry, the creation of the supplier encountered a problem. Please try again later!');
            return redirect()->back();
        }
    }

    //* Delete a supplier
    public function destroy(Request $request)
    {
        $supplier_id = $request->input('sp_uuid');
        if(!$supplier_id){
            Session::flash('error','You need to properly select a supplier to clear');
            return redirect()->back();
        }
        $supplier = Supplier::query()->where('id',$supplier_id)->delete();
        if($supplier){
            Session::flash('success','Successfully removed supplier!');
            return redirect()->back();
        }
    }

}
