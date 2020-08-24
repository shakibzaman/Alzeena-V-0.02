<?php

namespace App\Http\Controllers\AdminApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class ReportOrderCategoryController extends Controller
{

    public function SearchOrderDate(Request $request){
        $data=$request->date;
        $cat=$request->cat_id;
        $details=DB::table('orders')
            ->join('order_details','orders.id','order_details.order_id')
            ->join('products','order_details.product_id','products.id')
            ->join('categories','products.category_id','categories.id')
            ->where('orders.order_date',$data)
            ->where('products.category_id',$cat)
            ->select('products.*','orders.*','order_details.*','categories.*')
            ->orderBy('orders.id','DESC')->get();
        return response()->json($details);
    }
    public function TotalSearchOrderDate(Request $request){
        $data=$request->date;
        $cat=$request->cat_id;
        $details=DB::table('orders')
            ->join('order_details','orders.id','order_details.order_id')
            ->join('products','order_details.product_id','products.id')
            ->join('categories','products.category_id','categories.id')
            ->where('orders.order_date',$data)
            ->where('products.category_id',$cat)
            ->select(DB::raw("SUM(orders.total) as total"),DB::raw("SUM(orders.qty) as qty"),DB::raw("SUM(products.buying_price) as buy"))->get();

        return response()->json($details);
    }

    public function SearchMonth(request $request){
        $data=$request->month;
        $cat=$request->cat_idM;
        $details=DB::table('orders')
            ->join('order_details','orders.id','order_details.order_id')
            ->join('products','order_details.product_id','products.id')
            ->join('categories','products.category_id','categories.id')
            ->where('orders.order_month',$data)
            ->where('products.category_id',$cat)
            ->select('products.*','orders.*','order_details.*')
            ->orderBy('orders.id','DESC')->get();
        return response()->json($details);

    }
    public function TotalSearchMonth(request $request){
        $data=$request->month;
        $cat=$request->cat_idM;
        $details=DB::table('orders')
            ->join('order_details','orders.id','order_details.order_id')
            ->join('products','order_details.product_id','products.id')
            ->join('categories','products.category_id','categories.id')
            ->where('orders.order_month',$data)
            ->where('products.category_id',$cat)
            ->select(DB::raw("SUM(orders.total) as total"),DB::raw("SUM(orders.qty) as qty"),DB::raw("SUM(products.buying_price) as buy"))->get();
        return response()->json($details);

    }

    public function SearchOrderBtwDate(Request $request){
        $data1=$request->date1;
        $data2=$request->date2;
        $cat=$request->cat_idD;
        $details=DB::table('orders')
            ->join('order_details','orders.id','order_details.order_id')
            ->join('products','order_details.product_id','products.id')
            ->join('categories','products.category_id','categories.id')
            ->whereBetween('orders.order_date',[$data1, $data2])
            ->where('products.category_id',$cat)
            ->select('products.*','orders.*','order_details.*')
            ->orderBy('orders.id','DESC')->get();
        return response()->json($details);
    }
    public function TotalSearchOrderBtwDate(Request $request){
        $data1=$request->date1;
        $data2=$request->date2;
        $cat=$request->cat_idD;
        $details=DB::table('orders')
            ->join('order_details','orders.id','order_details.order_id')
            ->join('products','order_details.product_id','products.id')
            ->join('categories','products.category_id','categories.id')
            ->whereBetween('orders.order_date',[$data1, $data2])
            ->where('products.category_id',$cat)
            ->select(DB::raw("SUM(orders.total) as total"),DB::raw("SUM(orders.qty) as qty"),DB::raw("SUM(products.buying_price) as buy"))->get();

        return response()->json($details);
    }
}
