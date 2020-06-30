<?php

namespace App\Http\Controllers\AdminApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
class PosController extends Controller
{
    public function GetProduct($id)
    {
    	$product=DB::table('online_products')
                ->where('category_id',$id)
                ->get();
        return response()->json($product);
    }


    public function OrderDone(Request $request)
    {
    	 $validatedData = $request->validate([
           'payby' => 'required',
         ]);
    	 $delevary_charge=$request->delevary_charge;
    	 $due=(($request->total)-($request->pay));
         $data=array();
         $data['phone']=$request->phone;
         $data['qty']=$request->qty;
         $data['sub_total']=$request->subtotal;
         $data['discount']=$request->discount;
         $data['delevary_charge']=$request->delevary_charge;
         $data['delevary_company']=$request->delevary_company;
         $data['order_note']=$request->order_note;
         $data['total']=$request->total;
         $data['payby']=$request->payby;
         $data['pay']=$request->pay;
         $data['due']=$due;
         $data['store_id']=2;
         $data['order_status']=$request->order_status;
         $data['order_by']=Auth::user()->id;
         $data['order_date']=date('Y-m-d');
         $data['order_month']=date('F');
         $data['order_year']=date('Y');
         $order_id=DB::table('orders')->insertGetId($data);

         $contents=DB::table('pos')->get();

         $odata=array();
         foreach ($contents as $content) {
         	$odata['order_id']=$order_id;
         	$odata['product_id']=$content->pro_id;
         	$odata['pro_quantity']=$content->pro_quantity;
         	$odata['product_price']=$content->product_price;
         	$odata['sub_total']=$content->sub_total;
            DB::table('order_details')->insert($odata);

            DB::table('online_products')
                 ->where('id',$content->pro_id)
                 ->update(['product_quantity' => DB::raw('product_quantity -' .$content->pro_quantity)]);

         }

         DB::table('pos')->delete();
         return response('done');

    }
}
