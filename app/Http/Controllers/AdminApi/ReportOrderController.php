<?php

namespace App\Http\Controllers\AdminApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class ReportOrderController extends Controller
{
    public function TodayOrder()
    {
    	$data=date('d/m/Y');
    	$order=DB::table('orders')
    	      ->join('order_details','orders.id','order_details.order_id')
    	      ->join('products','order_details.product_id','products.id')
    	      ->where('orders.order_date',$data)
    	      ->select('products.product_name','orders.*','order_details.*')
    	      ->orderBy('orders.id','DESC')->get();
    	return response()->json($order);
    }
    public function AllOrder()
    {
        $order=DB::table('orders')
            ->join('customers','orders.customer_id','customers.id')
            ->join('order_statuses','orders.order_status','order_statuses.id')
            ->select('customers.name','orders.*','order_statuses.status_name')
            ->orderBy('orders.id','DESC')->get();
        return response()->json($order);
    }
    public function PendingOrder()
    {
        $order=DB::table('orders')
            ->join('customers','orders.customer_id','customers.id')
            ->join('order_statuses','orders.order_status','order_statuses.id')
            ->where('orders.order_status',1)
            ->select('customers.name','orders.*','order_statuses.status_name')
            ->orderBy('orders.id','DESC')->get();
        return response()->json($order);
    }
    public function DelevaredOrder()
    {
        $order=DB::table('orders')
            ->join('customers','orders.customer_id','customers.id')
            ->join('order_statuses','orders.order_status','order_statuses.id')
            ->where('orders.order_status',2)
            ->select('customers.name','orders.*','order_statuses.status_name')
            ->orderBy('orders.id','DESC')->get();
        return response()->json($order);
    }

    public function OrderDetails($id)
    {
    	$orders=DB::table('orders')
    	        ->join('customers','orders.customer_id','customers.id')
    	        ->where('orders.id',$id)
    	        ->select('customers.name','customers.phone','customers.address','orders.*')
    	        ->first();
    	  return response()->json($orders);
    }

    public function OrderDetailsAll($id)
    {
    	$details=DB::table('order_details')
    	          ->join('products','order_details.product_id','products.id')
    	          ->where('order_details.order_id',$id)
    	          ->select('products.product_name','products.product_code','products.image','order_details.*')
    	          ->get();
    	  return response()->json($details);
    }

    public function SearchOrderDate(Request $request){
        $data=$request->date;
        $details=DB::table('orders')
            ->join('order_details','orders.id','order_details.order_id')
            ->join('products','order_details.product_id','products.id')
            ->where('orders.order_date',$data)
            ->select('products.*','orders.*','order_details.*')
            ->orderBy('orders.id','DESC')->get();
        return response()->json($details);
    }
    public function TotalSearchOrderDate(Request $request){
        $data=$request->date;
        $details=DB::table('orders')
            ->join('order_details','orders.id','order_details.order_id')
            ->join('products','order_details.product_id','products.id')
            ->where('orders.order_date',$data)
            ->select(DB::raw("SUM(orders.total) as total"),DB::raw("SUM(orders.qty) as qty"),DB::raw("SUM(products.buying_price) as buy"))->get();

        return response()->json($details);
    }

    public function SearchMonth(request $request){
        $data=$request->month;
        $details=DB::table('orders')
            ->join('order_details','orders.id','order_details.order_id')
            ->join('products','order_details.product_id','products.id')
            ->where('orders.order_month',$data)
            ->select('products.*','orders.*','order_details.*')
            ->orderBy('orders.id','DESC')->get();
        return response()->json($details);

    }
    public function TotalSearchMonth(request $request){
        $data=$request->month;
        $details=DB::table('orders')
            ->join('order_details','orders.id','order_details.order_id')
            ->join('products','order_details.product_id','products.id')
            ->where('orders.order_month',$data)
            ->select(DB::raw("SUM(orders.total) as total"),DB::raw("SUM(orders.qty) as qty"),DB::raw("SUM(products.buying_price) as buy"))->get();
        return response()->json($details);

    }

    public function SearchOrderBtwDate(Request $request){
        $data1=$request->date1;
        $data2=$request->date2;
        $details=DB::table('orders')
            ->join('order_details','orders.id','order_details.order_id')
            ->join('products','order_details.product_id','products.id')
            ->whereBetween('orders.order_date',[$data1, $data2])
            ->select('products.*','orders.*','order_details.*')
            ->orderBy('orders.id','DESC')->get();
        return response()->json($details);
    }
    public function TotalSearchOrderBtwDate(Request $request){
        $data1=$request->date1;
        $data2=$request->date2;
        $details=DB::table('orders')
            ->join('order_details','orders.id','order_details.order_id')
            ->join('products','order_details.product_id','products.id')
            ->whereBetween('orders.order_date',[$data1, $data2])
            ->select(DB::raw("SUM(orders.total) as total"),DB::raw("SUM(orders.qty) as qty"),DB::raw("SUM(products.buying_price) as buy"))->get();

        return response()->json($details);
    }
}
