<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', '0')->get();
        return view('layouts.Admin.oeders.index', compact('orders'));
    }
    public function view($id)
    {
        $orders = Order::where('id', $id)->first();
        return view('layouts.Admin.oeders.view', compact('orders'));
    }
    public function updateorder(Request $request,$id)
    {
        $orders=Order::find($id);
        $orders->status=$request->input('order_status');
        $orders->update();
        return redirect('orders')->with('status',"Order Updated Successfully");

    }

    public function orderhistory()
    {
        $orders = Order::where('status', '1')->get();
        return view('layouts.Admin.oeders.history', compact('orders'));
    }
    //
}
