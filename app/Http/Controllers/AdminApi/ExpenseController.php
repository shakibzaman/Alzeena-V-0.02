<?php

namespace App\Http\Controllers\AdminApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Expense;

class ExpenseController extends Controller
{

    public function index()
    {
        $expense = DB::table('expenses')
            ->join('expense_categories', 'expenses.exp_category_id', 'expense_categories.id')
            ->select('expense_categories.category_name', 'expenses.*')
            ->orderBy('expenses.id', 'DESC')
            ->get();
        return response()->json($expense);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'details' => 'required|max:255',
            'amount' => 'required'
        ]);

        $expense = new Expense;
        $expense->exp_category_id = $request->exp_category_id;
        $expense->details = $request->details;
        $expense->amount = $request->amount;
        $expense->expense_date = date('Y-m-d');
        $expense->expense_month=date('F');
        $expense->save();
    }

    public function show($id)
    {
        $expense = Expense::findorfail($id);
        return response()->json($expense);
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'details' => 'required|max:255',
            'amount' => 'required'
        ]);

        $data = array();
        $data['details'] = $request->details;
        $data['amount'] = $request->amount;
        $data['expense_date'] = $request->expense_date;
        $data['exp_category_id'] = $request->exp_category_id;
        DB::table('expenses')->where('id', $id)->update($data);
    }

    public function destroy($id)
    {
        DB::table('expenses')->where('id', $id)->delete();
    }
}
