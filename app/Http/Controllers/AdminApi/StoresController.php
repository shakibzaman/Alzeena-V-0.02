<?php

namespace App\Http\Controllers\AdminApi;
use App\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class StoresController extends Controller
{

    public function index()
    {
        $store=Store::all();
        return response()->json($store);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'shop_name' => 'required|unique:stores|max:255',
        ]);

        $store = new Store;
        $store->shop_name = $request->shop_name;
        $store->save();

    }

    public function show($id)
    {

        $store=Store::findorfail($id);
        return response()->json($store);
    }

    public function update(Request $request, $id)
    {
        $data=array();
        $data['shop_name']=$request->shop_name;
        DB::table('stores')->where('id',$id)->update($data);

    }

    public function destroy($id)
    {
        DB::table('stores')->where('id',$id)->delete();

    }
}
