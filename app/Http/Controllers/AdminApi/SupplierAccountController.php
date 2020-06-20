<?php

namespace App\Http\Controllers\AdminApi;

use App\Http\Controllers\Controller;
use App\SuuplierAccount;
use Illuminate\Http\Request;
use DB;

class SupplierAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $account=DB::table('suuplier_accounts')
            ->join('suppliers','suuplier_accounts.sup_id','suppliers.id')
            ->select('suuplier_accounts.*','suppliers.*')
            ->get();
        return response()->json($account);
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

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'sup_id' => 'required|max:255',
            'amount' => 'required',
            'due' => 'required',
            'entry_date' => 'required',
        ]);

        $account = new SuuplierAccount();
        $account->sup_id = $request->sup_id;
        $account->amount = $request->amount;
        $account->pay = $request->pay;
        $account->due = $request->due;
        $account->entry_date = $request->entry_date;
        $account->entry_month = date('F');
        $account->save();
    }

    public function show($id)
    {
        $product=DB::table('suuplier_accounts')->where('id',$id)->first();
        return response()->json($product);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
//        $final_due=($request->due)-($request->newPay);
//        $final_pay=($request->due)+($request->newPay);
//        $data=array();
//        $data['due']=$final_due;
//        $data['pay']=$final_pay;
//        return $data;
//        DB::table('suuplier_accounts')->where('id',$id)->update($data);

    }

    public function destroy($id)
    {
        //
    }
    public function SupplierUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
//            'product_quantity' => 'required',
        ]);
        $final_due=($request->due)-($request->newPay);
        $final_pay=($request->due)+($request->newPay);
        $data=array();
        $data['due']=$final_due;
        $data['pay']=$final_pay;
//        return $data;
        DB::table('suuplier_accounts')->where('id',$id)->update($data);
    }

}
