<?php

namespace App\Http\Controllers\AdminApi;

use App\Http\Controllers\Controller;
use App\OrderStatus;
use Illuminate\Http\Request;

class OrderStatusController extends Controller
{public function index()
{
    $status=OrderStatus::all();
    return response()->json($status);
}


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'status_name' => 'required|max:255',
        ]);

        $status = new OrderStatus();
        $status->status_name = $request->status_name;
        $status->save();

    }

    public function show($id)
    {

        $status=OrderStatus::findorfail($id);
        return response()->json($status);
    }

    public function update(Request $request, $id)
    {
        $data=array();
        $data['status_name']=$request->status_name;
        DB::table('order_statuses')->where('id',$id)->update($data);

    }

    public function destroy($id)
    {
        DB::table('order_statuses')->where('id',$id)->delete();

    }
}
