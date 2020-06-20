<?php

namespace App\Http\Controllers\AdminApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class OrderDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders=DB::table('order_details')
            ->join('orders','orders.id','order_details.order_id')
            ->where('order_details.id',$id)
            ->select('orders.*','order_details.*')
            ->first();
        return response()->json($orders);
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
            'pro_quantity' => 'required',
        ]);
        $orders=DB::table('order_details')
            ->join('orders','orders.id','order_details.order_id')
            ->where('order_details.id',$id)
            ->select('orders.*','order_details.*')
            ->first();
        $old_quantity=$orders->pro_quantity;
        $store_id=$orders->store_id;

        $product_id=$orders->product_id;
        $sub_total=$orders->sub_total;
        $order_id=$orders->order_id;
        $discount=$orders->discount;
        $total=$orders->total;
        $product_price=$orders->product_price;
//        request data
        $sent_qty_request=$request->pro_quantity;
        $final_product_price=$product_price*$sent_qty_request;
        $final_total=$total-$final_product_price+$discount;
        $final_pro_qty=$old_quantity-$sent_qty_request;
//        $sent_subTotal_request=$request->sub_total;
//        $total_request=$request->total;
//        $pay_request=$request->pay;
//        $discount_request=$request->discount;
//        return $final_total;
//        $update_quentity=$old_quantity-$sent_qty_request;
//        $update_sub_total=($sub_total-($sent_subTotal_request*$sent_qty_request));
//        $update_total=($sub_total-$sub_total);
//        $update_pay=($pay_request-$pay_request);
//        $update_discount=($discount_request-$discount_request);
//        return response()->json($sent_subTotal_request);
        if($sent_qty_request>0){
        if($store_id==2){
            $products=DB::table('online_products')
                ->where('online_products.id',$product_id)
                ->select('online_products.*')
                ->first();
            $product_qty=$products->product_quantity;
            $shop_update_qty=($product_qty)+($sent_qty_request);
            $data=array();
            $data['product_quantity']=$shop_update_qty;
            DB::table('online_products')->where('id',$product_id)->update($data);
        }
        if($store_id==3){
            $products=DB::table('store_products')
                ->where('store_products.id',$product_id)
                ->select('store_products.*')
                ->first();
            //$product_qty=$products->product_quantity;
            return $products;
//            $shop_update_qty=($product_qty+$sent_qty_request);
//            $data=array();
//            $data['product_quantity']=$shop_update_qty;
//            DB::table('store_products')->where('id',$product_id)->update($data);
        }
        }
        else{
            return " Can't Refund";
        }

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
