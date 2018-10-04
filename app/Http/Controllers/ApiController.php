<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Order;
use App\OrderProduct;
use App\Product;
use Illuminate\Support\Facades\DB;
use Validator;

class ApiController extends BaseController
{
    public function store(Request $request)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'brand_name' => 'required',
            'generic_name' => 'required',
            'category' => 'required',
            'receive_date' => 'required',
            'exp_date' => 'required',
            'orginal_price' => 'required',
            'sell_price' => 'required',
            'quantity' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendWrongError();
        }


        $product = new Product();
        $product->brand_name = request('brand_name');
        $product->generic_name = request('generic_name');
        $product->category = request('category');
        $product->receive_date = request('receive_date');
        $product->exp_date = request('exp_date');
        $product->orginal_price = request('orginal_price');
        $product->sell_price = request('sell_price');
        $product->quantity = request('quantity');
        $product->quantity_left = request('quantity');
        //Total value finding
        $sell = $product->sell_price;
        $left = $product->quantity_left;
        $product->total= $sell * $left;
        $product->save();


        return $this->sendResponse('Product inserted successfully.', 'Your Product has been successfully inserted');
    }

    //For showing Invoice in API

    public function test($id){

        $order = Order::find($id);

        $details = DB::table('order_products')->where('order_id', $order->id)->get();

        /*$change = $order->customer_cash - $order->total_price;*/


        $data[] = ['id' => $order->id ];
        foreach ($details  as $detail){
            $data[] = [
                'product code' => $detail->brand_name,
                'product name' => $detail->category,
                'Qty' => $detail->quantity,
                'price' => $detail->sell_price,
                'discount' => $order->discount,
                'ammount' => $detail->total

            ];
        }
        $data[] = ['total' => $order->total_price ];

        return $this->sendSuccessResponse($data);

    }
}
