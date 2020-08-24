<?php

namespace App\Http\Controllers\AdminApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function ProductsCount()
    {
        $count=DB::table('products')
            ->select('products.*')
            ->orderBy('products.id','DESC')
            ->count();
        return response()->json($count);
    }
    public function StoresProductsCount()
    {
        $count=DB::table('store_products')
            ->select('store_products.*')
            ->orderBy('store_products.id','DESC')
            ->count();
        return response()->json($count);
    }
    public function OnlineProductsCount()
    {
        $count=DB::table('online_products')
            ->select('online_products.*')
            ->orderBy('online_products.id','DESC')
            ->count();
        return response()->json($count);
    }
    public function CategoryCount()
    {
        $count=DB::table('categories')
            ->select('categories.*')
            ->orderBy('categories.id','DESC')
            ->count();
        return response()->json($count);
    }
    public function TodayOrderCount()
    {
        $data=date('Y-m-d');
        $order=DB::table('orders')
            ->where('orders.order_date',$data)
            ->select('orders.*')
            ->orderBy('orders.id','DESC')->count();
        return response()->json($order);
    }
    public function TodayOrderAmount()
    {
        $data=date('Y-m-d');
        $order=DB::table('orders')
            ->where('orders.order_date',$data)
            ->select(DB::raw("SUM(orders.total) as amount"))->get();
        return response()->json($order);
    }
    public function ThisMonthOrderCount()
    {
        $data=date('F');
        $order=DB::table('orders')
            ->where('orders.order_month',$data)
            ->select('orders.*')
            ->orderBy('orders.id','DESC')->count();
        return response()->json($order);
    }
    public function ThisMonthOrderAmount()
    {
        $data=date('F');
        $order=DB::table('orders')
            ->where('orders.order_month',$data)
            ->select(DB::raw("SUM(orders.total) as amount"))->get();
        return response()->json($order);
    }
    public function PendingOrderCount()
    {
        $data=date('F');
        $order=DB::table('orders')
            ->where('orders.order_month',$data)
            ->where('orders.order_status',1)
            ->select('orders.*')
            ->orderBy('orders.id','DESC')->count();
        return response()->json($order);
    }
    public function PendingOrderAmount()
    {
        $data=date('F');
        $order=DB::table('orders')
            ->where('orders.order_month',$data)
            ->where('orders.order_status',1)
            ->select(DB::raw("SUM(orders.total) as amount"))->get();
        return response()->json($order);
    }
    public function DeliveredOrderCount()
    {
        $data=date('F');
        $order=DB::table('orders')
            ->where('orders.order_month',$data)
            ->where('orders.order_status',2)
            ->select('orders.*')
            ->orderBy('orders.id','DESC')->count();
        return response()->json($order);
    }
    public function DeliveredOrderAmount()
    {
        $data=date('F');
        $order=DB::table('orders')
            ->where('orders.order_month',$data)
            ->where('orders.order_status',2)
            ->select(DB::raw("SUM(orders.total) as amount"))->get();
        return response()->json($order);
    }

//    Expense
    public function TodayExpenseAmount()
    {
        $data=date('Y-m-d');
        $expense=DB::table('expenses')
            ->where('expenses.expense_date',$data)
            ->select(DB::raw("SUM(expenses.amount) as amount"))->get();
        return response()->json($expense);
    }
    public function MonthExpenseAmount()
    {
        $data=date('F');
        $expense=DB::table('expenses')
            ->where('expenses.expense_month',$data)
            ->select(DB::raw("SUM(expenses.amount) as amount"))->get();
        return response()->json($expense);
    }
}
