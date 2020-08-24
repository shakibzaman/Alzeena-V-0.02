<?php

namespace App\Http\Controllers\AdminApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class OrdersController extends Controller
{
    public function TodayOrder()
    {
        $data=date('Y-m-d');
        $order=DB::table('orders')
            ->join('customers','orders.phone','customers.phone')
            ->join('order_statuses','orders.order_status','order_statuses.id')
            ->where('orders.order_date',$data)
            ->select('customers.name','orders.*','order_statuses.status_name')
            ->orderBy('orders.id','DESC')->get();
        return response()->json($order);
    }
    public function AllOrder()
    {
        $order=DB::table('orders')
            ->join('customers','orders.phone','customers.phone')
            ->join('order_statuses','orders.order_status','order_statuses.id')
            ->join('deli_companies','orders.delevary_company','deli_companies.id')
            ->select('customers.name','orders.*','order_statuses.status_name','deli_companies.company_name')
            ->orderBy('orders.id','DESC')->get();
        return response()->json($order);
    }

    public function PendingOrder()
    {
        $order=DB::table('orders')
            ->join('customers','orders.phone','customers.phone')
            ->join('order_statuses','orders.order_status','order_statuses.id')
            ->where('orders.order_status',1)
            ->select('customers.name','orders.*','order_statuses.status_name')
            ->orderBy('orders.id','DESC')->get();
        return response()->json($order);
    }
    public function DelevaredOrder()
    {
        $order=DB::table('orders')
            ->join('customers','orders.phone','customers.phone')
            ->join('order_statuses','orders.order_status','order_statuses.id')
            ->where('orders.order_status',2)
            ->select('customers.name','orders.*','order_statuses.status_name')
            ->orderBy('orders.id','DESC')->get();
        return response()->json($order);
    }
//    public function CourierOrder()
//    {
//        $order=DB::table('orders')
//            ->join('customers','orders.phone','customers.phone')
//            ->join('order_statuses','orders.order_status','order_statuses.id')
//            ->where('orders.order_status',5)
//            ->select('customers.name','orders.*','order_statuses.status_name')
//            ->orderBy('orders.id','DESC')->get();
//        return response()->json($order);
//    }
    public function StatusOrder(Request $request)
    {
        $order_status=$request->order_status;
        $order=DB::table('orders')
            ->join('customers','orders.phone','customers.phone')
            ->join('order_statuses','orders.order_status','order_statuses.id')
            ->where('orders.order_status',$order_status)
            ->select('customers.name','orders.*','order_statuses.status_name')
            ->orderBy('orders.id','DESC')->get();
        return response()->json($order);
    }
    public function CourierOrder(Request $request)
    {
        $courier_name=$request->delevary_company;
        $order=DB::table('orders')
            ->join('customers','orders.phone','customers.phone')
            ->join('order_statuses','orders.order_status','order_statuses.id')
            ->where('orders.delevary_company',$courier_name)
            ->select('customers.name','orders.*','order_statuses.status_name')
            ->orderBy('orders.id','DESC')->get();
        return response()->json($order);
    }

    public function OrderDetails($id)
    {
        $orders=DB::table('orders')
            ->join('customers','orders.phone','customers.phone')
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
    public function OrderRefundsdetails($id)
    {
        $details=DB::table('order_details')
            ->where('order_details.id',$id)
            ->select('order_details.*')
            ->get();
        return response()->json($details);
    }

    public function SearchOrderDate(Request $request){
        $data=$request->date;
        $details=DB::table('orders')
            ->join('customers','orders.phone','customers.phone')
            ->join('order_statuses','orders.order_status','order_statuses.id')
            ->where('orders.order_date',$data)
            ->select('customers.name','orders.*','order_statuses.status_name')
            ->orderBy('orders.id','DESC')->get();
        return response()->json($details);
    }
    public function SearchOrderBtwDate(Request $request){
        $data1=$request->date1;
        $data2=$request->date2;
        $details=DB::table('orders')
            ->join('customers','orders.phone','customers.phone')
            ->join('order_statuses','orders.order_status','order_statuses.id')
            ->whereBetween('orders.order_date',[$data1, $data2])
            ->select('customers.name','orders.*','order_statuses.status_name')
            ->orderBy('orders.id','DESC')->get();
        return response()->json($details);
    }

    public function SearchMonth(request $request){
        $data=$request->month;
        $details=DB::table('orders')
            ->join('customers','orders.phone','customers.phone')
            ->join('order_statuses','orders.order_status','order_statuses.id')
            ->where('orders.order_month',$data)
            ->select('customers.name','orders.*','order_statuses.status_name')
            ->orderBy('orders.id','DESC')->get();
        return response()->json($details);
    }
    public function show($id)
    {
        $orders=DB::table('orders')
            ->where('orders.id',$id)
            ->select('orders.*')
            ->first();
        return response()->json($orders);
    }
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'order_status' => 'required',
        ]);
        $data=array();
        $data['order_status']=$request->order_status;
        DB::table('orders')->where('id',$id)->update($data);
    }
}
