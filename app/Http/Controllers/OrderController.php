<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderProduct;
use Auth;
use App\Sale;
use App\Product;
use \Cart;

class OrderController extends Controller
{
    //Adding to cart
    public function productOrder(Request $request)
    {
        $id = $request->input('product');
        $qty = $request->input('quantity');

        $productItem = Product::find($id);

        //checking Quantity requirement
        $Qty_left = $productItem->quantity_left;
        if ($qty > $Qty_left){

            $notification = [
                'message' => 'This product is out of quantity!',
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }

        //calcutaling profit
        $profit = ($productItem ->sell_price * $qty ) - ($productItem ->orginal_price * $qty );

       Cart::add($productItem ->id, $productItem ->brand_name, $qty, $productItem ->sell_price,
           ['generic_name' => $productItem ->generic_name, 'profit' => $profit, 'category' => $productItem ->category]);

        $notification = [
            'message' => 'A product is successfully added to your cart!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }


    //creating order
    public function payment(Request $request)
    {
        $name = $request->input('name');
        $cash = $request->input('cash');
        $user = Auth::user();


        $order = new Order();

        $order->customer_name = $name;
        $order->customer_cash = $cash;
        $order->user_id = $user->id;

        /*return $order;*/
        $order->save();

        $allPrice = 0;

        foreach (\Cart::content() as $orderItem) {

            $orderProduct = new OrderProduct();

            $orderProduct->order_id = $order->id;
            $orderProduct->user_id = $user->id;
            $orderProduct->product_id = $orderItem->id;
            $orderProduct->brand_name = $orderItem->name;
            $orderProduct->category = $orderItem->options->category;
            $orderProduct->sell_price = $orderItem->price;
            $orderProduct->quantity = $orderItem->qty;
            $orderProduct->total = $orderItem->qty * $orderItem->price;

            $allPrice = $allPrice + $orderProduct->total;

            $orderProduct->save();

            //updateing product table quantity;
            $product = Product::find($orderProduct->product_id);

            $num = $product->quantity_left - $orderProduct->quantity;
            $product->quantity_left = $num;
            $product->total= $product->sell_price * $num;
            $product->save();

        }

        $price = Order::find($order->id);
        $price->total_price = $allPrice;

        $change = $cash - $allPrice;
        $price->change = $change;

        $price->save();

        Cart::destroy();

        $notification = [
            'message' => 'Order is successfully processed!',
            'alert-type' => 'success'
        ];

        return redirect(route('invoice.show',$order->id))->with($notification);
    }


    //Adding to cart
    public function remove($id)
    {
        Cart::remove($id);
        $notification = [
            'message' => 'An product is successfully removed .!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }



}
