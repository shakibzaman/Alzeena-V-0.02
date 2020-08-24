<?php

namespace App\Http\Controllers\AdminApi;

use App\ExpenseCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class ExpenseCategoryController extends Controller
{

    public function index()
    {
        $category=ExpenseCategory::all();
        return response()->json($category);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|unique:expense_categories|max:255',
        ]);

        $category = new ExpenseCategory;
        $category->category_name = $request->category_name;
        $category->save();

    }


    public function show($id)
    {
        $category=ExpenseCategory::findorfail($id);
        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        $data=array();
        $data['category_name']=$request->category_name;
        DB::table('expense_categories')->where('id',$id)->update($data);
    }

    public function destroy($id)
    {
        DB::table('expense_categories')->where('id',$id)->delete();
    }
}
