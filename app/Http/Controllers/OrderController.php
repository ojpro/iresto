<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public static function store($order, $id)
    {
        Order::create([
            'plate_id' => $order['plate_id'],
            'quantity' => $order['quantity'],
            'order_details_id' => $id
        ]);
    }

    public function index()
    {
        $orders = Order::paginate(10);
        return view('pages.orders', ['orders' => $orders]);
    }

    public function destroy($id)
    {
        $orders = Order::where('order_details_id',$id)->get();

        foreach ($orders as $order){
            $order->delete();
        }

        OrderDetail::where('id',$id)->delete();

        return redirect()->route('orders.index');
    }
}
