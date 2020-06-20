<?php

namespace App\Http\Controllers\AdminApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Image;
use App\Customer;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer=DB::table('customers')->orderBy('id','DESC')->get();
        return response()->json($customer);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validatedData = $request->validate([
             'name' => 'required|max:255',
             'address' => 'required',
             'phone' => 'required|unique:customers',
         ]);
                   $customer = new Customer;
                   $customer->name = $request->name;
                   $customer->email = $request->email;
                   $customer->phone = $request->phone;
                   $customer->address = $request->address;
                   $customer->discount = $request->discount;
                   $customer->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer=DB::table('customers')->where('id',$id)->first();
        return response()->json($customer);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
             'name' => 'required|max:255',
             'address' => 'required',
             'phone' => 'required',
        ]);
        $customer=Customer::find($id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->discount = $request->discount;
        $customer->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $customer=DB::table('customers')->where('id',$id)->first();

          DB::table('customers')->where('id',$id)->delete();

    }
}
