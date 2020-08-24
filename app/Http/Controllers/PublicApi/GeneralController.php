<?php

namespace App\Http\Controllers\PublicApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use App\Extra;
use DB;

class GeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $general=Extra::all();
        return response()->json($general);
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
        if($request->image){
            $logo = DB::table('extras')
            ->where('logo', '=', '')
            ->first();
            if (is_null($logo)) {
                $position = strpos($request->image, ';');
                $sub=substr($request->image, 0 ,$position);
                $ext=explode('/', $sub)[1];
                $name=time().".".$ext;
                $img=Image::make($request->image);
                $upload_path='admin/backend/product/';
                $image_url=$upload_path.$name;
                $img->save($image_url);

                $data['logo']=$image_url;
                DB::table('extras')->where('id',1)->update($data);
            }
            else {
            $position = strpos($request->image, ';');
            $sub=substr($request->image, 0 ,$position);
            $ext=explode('/', $sub)[1];
            $name=time().".".$ext;
            $img=Image::make($request->image);
            $upload_path='admin/backend/product/';
            $image_url=$upload_path.$name;
            $img->save($image_url);
    
            $logo =new Extra;
            $logo->logo =  $image_url;
            $logo->save();
     }
    }


  
            
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
