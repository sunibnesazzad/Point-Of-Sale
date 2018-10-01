<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Order;
use App\OrderProduct;
use App\Product;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function show($id){

        $user =  $user = Auth::user();
        $order = Order::find($id);

        $details = DB::table('order_products')->where('order_id', $order->id)->get();

        /*$change = $order->customer_cash - $order->total_price;*/


        return view('invoice.invoice',compact('user','order','details'))->with('title','Invoice');

    }
}
