<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Order;
use App\OrderProduct;
use App\Product;
use Illuminate\Support\Facades\DB;
use PDF;
use App;

class InvoiceController extends Controller
{
    public function show($id){

        $user =  $user = Auth::user();
        $order = Order::find($id);

        $details = DB::table('order_products')->where('order_id', $order->id)->get();

        /*$change = $order->customer_cash - $order->total_price;*/

        return view('invoice.invoice',compact('user','order','details'))->with('title','Invoice');

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
        return $data;


    }




    //For showing PDF

    public function pdf($id){
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_detail_data_to_html($id));
        return $pdf->stream();
    }


    public function convert_detail_data_to_html($id){

        $user = Auth::user();
        $order = Order::find($id);
        $details = DB::table('order_products')->where('order_id', $order->id)->get();

        $output = '
     <h3 align="center"> Point Of Sale Invoice</h3>
     <br><br>
    
             <div class="row">
                <div class=" col-md-10">
                    <h4>Customer Name : '.$order->customer_name.'</h4>
                </div>
             </div>
            <div class="row">
                <div class=" col-md-10">
                    <h4>Order Number : '.$order->id.' </h4>
                </div>
            </div>
            <div class="row">
                <div class=" col-md-2">
                    <h4>Order Date : '.$order->created_at.' </h4>
                </div>
            </div>
    
    <br>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="12.5%">Product Code</th>
    <th style="border: 1px solid; padding:12px;" width="12.5%">Product Name</th>
    <th style="border: 1px solid; padding:12px;" width="12.5%">Quantity</th>
    <th style="border: 1px solid; padding:12px;" width="12.5%">Price</th>
    <th style="border: 1px solid; padding:12px;" width="12.5%">Discount</th>
    <th style="border: 1px solid; padding:12px;" width="12.5%">Ammount</th>
   </tr>
     ';
        foreach($details as $product)
        {
            $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$product->brand_name.'</td>
       <td style="border: 1px solid; padding:12px;">'.$product->category.'</td>
       <td style="border: 1px solid; padding:12px;">'.$product->quantity.'</td>
       <td style="border: 1px solid; padding:12px;">'.$product->sell_price.'</td>
       <td style="border: 1px solid; padding:12px;">'.$order->discount.'</td>
       <td style="border: 1px solid; padding:12px;">'.$product->total.'</td>
      </tr>
      ';
        }
        $output .= '</table>';

        $output .= ' <div class="row">
                        <div class="col-md-9">
                        </div>
                        <div class="col-md-3">
                            <h4>Total ammount : '. $order->total_price .'</h4>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-9">
                        </div>
                        <div class="col-md-3">
                            <h4>Cash Tendered : '. $order->customer_cash .'</h4>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-9">
                        </div>
                        <div class="col-md-3">
                            <h4>Change : '. $order->change .'</h4>
                        </div>
                    </div> ';


        return $output;
    }
}
