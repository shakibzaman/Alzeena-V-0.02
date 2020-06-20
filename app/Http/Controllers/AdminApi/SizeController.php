<?php

namespace App\Http\Controllers\AdminApi;
use App\Http\Controllers\Controller;

use App\Size;
use Illuminate\Http\Request;
use DB;

class SizeController extends Controller
{


    public function index()
    {
        $size=Size::all();
        return response()->json($size);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'size' => 'required|max:255',
        ]);

        $sizes = new Size();
        $sizes->size = $request->size;
        $sizes->save();

    }

    public function show($id)
    {

        $size=Size::findorfail($id);
        return response()->json($size);
    }

    public function update(Request $request, $id)
    {
        $data=array();
        $data['size']=$request->size;
        DB::table('sizes')->where('id',$id)->update($data);

    }

    public function destroy($id)
    {
        DB::table('sizes')->where('id',$id)->delete();

    }
}
