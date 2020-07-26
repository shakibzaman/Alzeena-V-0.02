<?php

namespace App\Http\Controllers\AdminApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Product;
use Image;
use App\OnlineProduct;
use App\StoreProduct;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=DB::table('products')
                ->join('categories','products.category_id','categories.id')
                ->join('suppliers','products.supplier_id','suppliers.id')
                ->join('sizes','products.size_id','sizes.id')
                ->select('sizes.size','categories.category_name','suppliers.name','products.*')
                ->orderBy('products.id','DESC')
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
         'size_id' => 'required',
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
                   $upload_path='admin/backend/product/';
                   $image_url=$upload_path.$name;
                   $img->save($image_url);

                   $position2 = strpos($request->mulimage, ';');
                   $sub2=substr($request->mulimage, 0 ,$position2);
                   $ext2=explode('/', $sub2)[1];
                   $name2=time().".".$ext2;
                   $img2=Image::make($request->mulimage)->resize(240,200);
                   $upload_path2='admin/backend/product/';
                   $image_url2=$upload_path2.$name2;
                   $img2->save($image_url2);

                   $product = new Product;
                   $product->product_name = $request->product_name;
                   $product->product_code = $request->product_code;
                   $product->category_id = $request->category_id;
                   $product->supplier_id = $request->supplier_id;
                   $product->buying_price = $request->buying_price;
                   $product->size_id = $request->size_id;
                   $product->selling_price = $request->selling_price;
                   $product->buying_date = $request->buying_date;
                   $product->product_quantity = $request->product_quantity;
                   $product->image =  $image_url;
                   $product->mulimage=$image_url2;
                   $product->details=$request->details;
                   $product->discount_price=$request->discount_price;
                
                   $product->save();
            }
            
        else{
                    $product = new Product;
                   $product->product_name = $request->product_name;
                   $product->product_code = $request->product_code;
                   $product->category_id = $request->category_id;
                   $product->supplier_id = $request->supplier_id;
                   $product->size_id = $request->size_id;
                   $product->buying_price = $request->buying_price;
                   $product->selling_price = $request->selling_price;
                   $product->buying_date = $request->buying_date;
                   $product->product_quantity = $request->product_quantity;
                   $product->details=$request->details;
                   $product->discount_price=$request->discount_price;
                   $product->save();
            
            }
        
    }

    public function show($id)
    {
        $product=DB::table('products')
                ->join('sizes','products.size_id','sizes.id')
                ->where('products.id',$id)
                ->select('products.*','sizes.*')
            ->first();
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
         'size_id' => 'required',
         'selling_price' => 'required',
         'product_quantity' => 'required',
        ]);

        $data=array();
        $data['product_name']=$request->product_name;
        $data['product_code']=$request->product_code;
        $data['category_id']=$request->category_id;
        $data['supplier_id']=$request->supplier_id;
        $data['size_id']=$request->size_id;
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
             $img=DB::table('products')->where('id',$id)->first();
             $image_path = $img->image;
             $done=unlink($image_path);
             $user=DB::table('products')->where('id',$id)->update($data);
           }
       }else{
           $oldlogo=$request->image;
           $data['image']=$oldlogo;
           DB::table('products')->where('id',$id)->update($data);

       }
    }


    public function destroy($id)
    {
       $product=DB::table('products')->where('id',$id)->first();
       $image=$product->image;
       if ($image) {
          unlink($image);
          DB::table('products')->where('id',$id)->delete();
       }else{
        DB::table('products')->where('id',$id)->delete();
       }
    }
    public function StockTransfer(Request $request,$id)
    {
        $productInfo=Product::find($id);
        $validatedData = $request->validate([
            'product_quantity' => 'required',
            'store_id' => 'required',
        ]);
        $data=array();
        $data['id']=$productInfo->id;;
        $data['category_id']=$productInfo->category_id;
        $data['product_name']=$productInfo->product_name;
        $data['product_code']=$productInfo->product_code;
        $data['size']=$productInfo->size;
        $data['buying_price']=$request->buying_price;
        $data['selling_price']=$request->selling_price;
        $data['supplier_id']=$request->supplier_id;
        $data['buying_date']=$request->buying_date;
        $data['image']=$request->image;
        $data['product_quantity']=$request->product_quantity;
        if($request->store_id==1){

        }
//        For Online Products id=2
        if($request->store_id==2){
            $onlineproduct=OnlineProduct::find($id);
            if($onlineproduct){
                $ext_pro_qty=(int)($onlineproduct->product_quantity);
                $get_qty=(int)($request->product_quantity);
                $update_qty=$ext_pro_qty+$get_qty;
                $data=array();
                $data['product_quantity']=$update_qty;
                DB::table('online_products')->where('id',$id)->update($data);
                $prev_qty=(int)($productInfo->product_quantity);
                $update_qty=$prev_qty-$get_qty;
                $qty_data=array();
                $qty_data['product_quantity']=$update_qty;
                //return $update_qty;
                DB::table('products')->where('id',$id)->update($qty_data);
            }
            else{
                DB::table('online_products')->insert($data);
                $get_qty=(int)($request->product_quantity);
                $prev_qty=(int)($productInfo->product_quantity);
                $update_qty=$prev_qty-$get_qty;
                $qty_data=array();
                $qty_data['product_quantity']=$update_qty;
                //return $update_qty;
                DB::table('products')->where('id',$id)->update($qty_data);
            }
        }
//        For ShopProducts
        if($request->store_id==3){
            $storeProduct=StoreProduct::find($id);
            if($storeProduct){
                $ext_pro_qty=(int)($storeProduct->product_quantity);
                $get_qty=(int)($request->product_quantity);
                $update_qty=$ext_pro_qty+$get_qty;
                $data=array();
                $data['product_quantity']=$update_qty;
                DB::table('store_products')->where('id',$id)->update($data);
                $prev_qty=(int)($productInfo->product_quantity);
                $update_qty=$prev_qty-$get_qty;
                $qty_data=array();
                $qty_data['product_quantity']=$update_qty;
                //return $update_qty;
                DB::table('products')->where('id',$id)->update($qty_data);
            }
            else{
                DB::table('store_products')->insert($data);
                $get_qty=(int)($request->product_quantity);
                $prev_qty=(int)($productInfo->product_quantity);
                $update_qty=$prev_qty-$get_qty;
                $qty_data=array();
                $qty_data['product_quantity']=$update_qty;
                //return $update_qty;
                DB::table('products')->where('id',$id)->update($qty_data);
            }
        }
    }
    public function StockUpdate(Request $request,$id)
    {
        $validatedData = $request->validate([
            'product_quantity' => 'required',
        ]);
        $data=array();
        $data['product_quantity']=$request->product_quantity;
        DB::table('products')->where('id',$id)->update($data);
    }
}
