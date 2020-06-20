<?php

namespace App\Http\Controllers\AdminApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class ReportExpenseCategoryController extends Controller
{

    public function SearchExpenseDate(Request $request){
        $data=$request->date;
        $cat=$request->cat_id;
        $details=DB::table('expenses')
            ->join('expense_categories','expenses.exp_category_id','expense_categories.id')
            ->where('expenses.expense_date',$data)
            ->where('expenses.exp_category_id',$cat)
            ->select('expenses.*','expense_categories.*')
            ->orderBy('expenses.id','DESC')->get();
        return response()->json($details);
    }
    public function TotalSearchExpenseDate(Request $request){
        $data=$request->date;
        $cat=$request->cat_id;
        $details=DB::table('expenses')
            ->join('expense_categories','expenses.exp_category_id','expense_categories.id')
            ->where('expenses.expense_date',$data)
            ->where('expenses.exp_category_id',$cat)
            ->select(DB::raw("SUM(expenses.amount) as amount"))->get();
        return response()->json($details);
    }

    public function SearchExpenseMonth(request $request){
        $data=$request->month;
        $cat=$request->cat_idM;
        $details=DB::table('expenses')
            ->join('expense_categories','expenses.exp_category_id','expense_categories.id')
            ->where('expenses.expense_month',$data)
            ->where('expenses.exp_category_id',$cat)
            ->select('expenses.*','expense_categories.*')
            ->orderBy('expenses.id','DESC')->get();
        return response()->json($details);

    }
    public function TotalSearchExpenseMonth(request $request){
        $data=$request->month;
        $cat=$request->cat_idM;
        $details=DB::table('expenses')
            ->join('expense_categories','expenses.exp_category_id','expense_categories.id')
            ->where('expenses.expense_month',$data)
            ->where('expenses.exp_category_id',$cat)
            ->select(DB::raw("SUM(expenses.amount) as amount"))->get();
        return response()->json($details);

    }

    public function SearchExpenseBtwDate(Request $request){
        $data1=$request->date1;
        $data2=$request->date2;
        $cat=$request->cat_idD;
        $details=DB::table('expenses')
            ->join('expense_categories','expenses.exp_category_id','expense_categories.id')
            ->whereBetween('expenses.expense_date',[$data1, $data2])
            ->where('expenses.exp_category_id',$cat)
            ->select('expenses.*','expense_categories.*')
            ->orderBy('expenses.id','DESC')->get();
        return response()->json($details);
    }
    public function TotalSearchExpenseBtwDate(Request $request){
        $data1=$request->date1;
        $data2=$request->date2;
        $cat=$request->cat_idD;
        $details=DB::table('expenses')
            ->join('expense_categories','expenses.exp_category_id','expense_categories.id')
            ->whereBetween('expenses.expense_date',[$data1, $data2])
            ->where('expenses.exp_category_id',$cat)
            ->select(DB::raw("SUM(expenses.amount) as amount"))->get();
        return response()->json($details);
    }
}
