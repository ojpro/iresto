<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public static function store($order,$id){
		Order::create([
			'plate_id'=>$order['plate_id'],
			'quantity'=>$order['quantity'],
			'order_details_id'=>$id
		]);
    }
}
