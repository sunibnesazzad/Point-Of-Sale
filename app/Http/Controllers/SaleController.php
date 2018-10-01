<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Product;
use App\Sale;

class SaleController extends Controller
{
    public function index(){
    $user = Auth::user();
    $products = Product::all();

    return view('sale.index',compact('user','products'))->with('title','Sales');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $products = Product::all();
        $id = $request->input('product');
        $qty = $request->input('quantity');
        $product = Product::find($id);
        /*return $product;*/
        //creating sale data
        $sale = new Sale();
        $sale->product_id = $id;
        $sale->user_id = $user->id;
        $sale->brand_name = $product->brand_name;
        $sale->generic_name = $product->generic_name;
        $sale->category = $product->category;
        $sale->orginal_price = $product->orginal_price;
        $sale->sell_price = $product->sell_price;
        $sale->quantity = $qty;

        $real_price = $sale->orginal_price;
        $real_qty_price = $real_price * $qty;
        $sell_price = $product->sell_price;
        $total = $sell_price * $qty;
        $sale->total= $total;
        $profit = $total - $real_qty_price;
        $sale->profit = $profit;
        $sale->save();

        return view('sale.sale',compact('user','products','sale'))->with('title','Sales');
    }

    //deleting sale item
    public function destroy($id){
        Sale::where('id',$id)->delete($id);
        $notification = [
            'message' => 'Sale Product Deleted Sucessfully.!',
            'alert-type' => 'info'
        ];
        return redirect('/sales')->with($notification);
    }
}
