@extends('layout.dash1')
@section('content')

    <!-- Page Content Start -->
    <!-- ================== -->
    <div class="main-grid">
        <div class="agile-grids">


            <!-- blank-page -->
            <div class="table-heading">
                <h2> Point Of Sale Invoice</h2>
            </div>
            <hr>
            <div class="row">
                <div class=" col-md-2">
                    <h4>Customer Name :</h4>
                </div>
                <div class=" col-md-10">
                    <h4>{{$order->customer_name}}</h4>
                </div>
            </div><br>
            <div class="row">
                <div class=" col-md-2">
                    <h4>Order Number :</h4>
                </div>
                <div class=" col-md-10">
                    <h4>{{$order->id}}</h4>
                </div>
            </div><br>
            <div class="row">
                <div class=" col-md-2">
                    <h4>Order Date :</h4>
                </div>
                <div class=" col-md-10">
                    <h4>{{$order->created_at}}</h4>
                </div>
            </div><br>

            <div class="well">
                <div class="w3l-table-info">
                    <table id="customer" class="table">
                        <thead>
                        <tr>
                            <th class="text-center">Product Code</th>
                            <th class="text-center">Product Name</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center"><p>Price</p></th>
                            <th class="text-center">Discount</th>
                            <th class="text-center">Ammount</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($details as $product)
                            <tr>
                                <td class="text-center"><strong>{!! $product->brand_name !!}</strong></td>
                                <td class="text-center"><strong>{!! $product->category !!}</strong></td>
                                <td class="text-center"><strong>{!! $product->quantity !!}</strong></td>
                                <td class="text-center"><strong>{!! $product->sell_price !!}</strong></td>
                                <td class="text-center"><strong>{!! $order->discount !!}</strong></td>
                                <td class="text-center"><strong>{!! $product->sell_price !!}</strong></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-9">
                        </div>
                        <div class="col-md-3">
                            <h4>Total ammount : {{ $order->total_price }}</h4>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-9">
                        </div>
                        <div class="col-md-3">
                            <h4>Cash Tendered : {{ $order->customer_cash }}</h4>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-9">
                        </div>
                        <div class="col-md-3">
                            <h4>Change : {{ $order->change }}</h4>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-9">
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-primary">Print</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection









