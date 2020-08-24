<?php

namespace App\Http\Controllers\AdminApi;

use App\Http\Controllers\Controller;
use App\WholeSale;
use Illuminate\Http\Request;
use DB;

class WholeSalerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wholesaler=DB::table('whole_sales')->orderBy('id','DESC')->get();
        return response()->json($wholesaler);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'phone' => 'required|unique:whole_sales',
        ]);
        $wholesaler = new WholeSale();
        $wholesaler->name = $request->name;
        $wholesaler->phone = $request->phone;
        $wholesaler->address = $request->address;
        $wholesaler->discount = $request->discount;
        $wholesaler->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $wholesaler=DB::table('whole_sales')->where('id',$id)->first();
        return response()->json($wholesaler);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $wholesaler=WholeSale::find($id);
        $wholesaler->name = $request->name;
        $wholesaler->email = $request->email;
        $wholesaler->phone = $request->phone;
        $wholesaler->address = $request->address;
        $wholesaler->discount = $request->discount;
        $wholesaler->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wholesaler=DB::table('whole_sales')->where('id',$id)->first();

        DB::table('whole_sales')->where('id',$id)->delete();
    }
}
