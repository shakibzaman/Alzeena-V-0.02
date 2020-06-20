<?php

namespace App\Http\Controllers\AdminApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\StoreProduct;
use Image;
class StoresProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=DB::table('store_products')
            ->join('categories','store_products.category_id','categories.id')
            ->join('suppliers','store_products.supplier_id','suppliers.id')
            ->select('categories.category_name','suppliers.name','store_products.*')
            ->orderBy('store_products.id','DESC')
            ->get();
        return response()->json($product);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|max:255',
            'product_code' => 'required|unique:products|max:255',
            'category_id' => 'required',
            'supplier_id' => 'required',
            'buying_price' => 'required',
            'root' => 'required',
            'selling_price' => 'required',
            'buying_date' => 'required',
            'product_quantity' => 'required',
        ]);

        if($request->image){
            $position = strpos($request->image, ';');
            $sub=substr($request->image, 0 ,$position);
            $ext=explode('/', $sub)[1];
            $name=time().".".$ext;
            $img=Image::make($request->image)->resize(240,200);
            $upload_path='backend/product/';
            $image_url=$upload_path.$name;
            $img->save($image_url);

            $product = new OnlineProduct;
            $product->product_name = $request->product_name;
            $product->product_code = $request->product_code;
            $product->category_id = $request->category_id;
            $product->supplier_id = $request->supplier_id;
            $product->buying_price = $request->buying_price;
            $product->root = $request->root;
            $product->selling_price = $request->selling_price;
            $product->buying_date = $request->buying_date;
            $product->product_quantity = $request->product_quantity;
            $product->image =  $image_url;
            $product->save();
        }else{
            $product = new OnlineProduct;
            $product->product_name = $request->product_name;
            $product->product_code = $request->product_code;
            $product->category_id = $request->category_id;
            $product->supplier_id = $request->supplier_id;
            $product->root = $request->root;
            $product->buying_price = $request->buying_price;
            $product->selling_price = $request->selling_price;
            $product->buying_date = $request->buying_date;
            $product->product_quantity = $request->product_quantity;
            $product->save();
        }
    }

    public function show($id)
    {
        $product=DB::table('online_products')->where('id',$id)->first();
        return response()->json($product);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|max:255',
            'product_code' => 'required|max:255',
            'category_id' => 'required',
            'supplier_id' => 'required',
            'buying_price' => 'required',
            'root' => 'required',
            'selling_price' => 'required',
            'product_quantity' => 'required',
        ]);

        $data=array();
        $data['product_name']=$request->product_name;
        $data['product_code']=$request->product_code;
        $data['category_id']=$request->category_id;
        $data['supplier_id']=$request->supplier_id;
        $data['root']=$request->root;
        $data['buying_price']=$request->buying_price;
        $data['selling_price']=$request->selling_price;
        $data['buying_date']=$request->buying_date;
        $data['product_quantity']=$request->product_quantity;
        $image=$request->newphoto;
        if ($image) {
            $position = strpos($image, ';');
            $sub=substr($image, 0 ,$position);
            $ext=explode('/', $sub)[1];
            $name=time().".".$ext;
            $img=Image::make($image)->resize(240,200);
            $upload_path='backend/product/';
            $image_url=$upload_path.$name;
            $success=$img->save($image_url);
            if  ($success) {
                $data['image']=$image_url;
                $img=DB::table('online_products')->where('id',$id)->first();
                $image_path = $img->image;
                $done=unlink($image_path);
                $user=DB::table('online_products')->where('id',$id)->update($data);
            }
        }else{
            $oldlogo=$request->image;
            $data['image']=$oldlogo;
            DB::table('online_products')->where('id',$id)->update($data);

        }
    }


    public function destroy($id)
    {
        $product=DB::table('online_products')->where('id',$id)->first();
        $image=$product->image;
        if ($image) {
            unlink($image);
            DB::table('online_products')->where('id',$id)->delete();
        }else{
            DB::table('online_products')->where('id',$id)->delete();
        }
    }
}
