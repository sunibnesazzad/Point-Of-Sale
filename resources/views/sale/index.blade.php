@extends('layout.dash1')
@section('content')

    <!-- Page Content Start -->
    <!-- ================== -->
    <div class="main-grid">
        <div class="agile-grids">


            <!-- blank-page -->
            <div class="table-heading">
                <h2>{{--{!! $user->name !!}'s--}} Point Of Sale Sales</h2>
            </div>

            <div class="form-body">
                <form class="form-horizontal" method="POST" action="{{ route('product.order') }}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <div class="col-sm-7">
                            <select id="inputState" class="form-control" name="product">
                                @foreach($products as $product)
                                    <option value="{{$product->id}}">{{$product->brand_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <input type="number" name="quantity" class="form-control" id="name" placeholder="QTY" required>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            <button class="btn btn-primary" type="submit"><strong>+</strong>Add To Cart</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="well">
                <div class="w3l-table-info">
                    <table id="customer" class="table">
                        <thead>
                        <tr>
                            {{--<th class="text-center">ID</th>--}}
                            <th class="text-center">Product Name</th>
                            <th class="text-center">Generic Name</th>
                            <th class="text-center"><p>Category/ description</p></th>
                            <th class="text-center"> Price</th>
                            <th class="text-center">QTY </th>
                            <th class="text-center">Amount</th>
                            <th class="text-center">Profit</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(\Cart::content() as $sale)
                            <tr>
                                <td class="text-center"><strong>{!! $sale->name !!}</strong></td>
                                <td class="text-center"><strong>{!! $sale->options->generic_name !!}</strong></td>
                                <td class="text-center"><strong>{!! $sale->options->category !!}</strong></td>
                                <td class="text-center"><strong>{!! $sale->price !!}</strong></td>
                                <td class="text-center"><strong>{!! $sale->qty !!}</strong></td>
                                <td class="text-center"><strong>{!! $sale->subtotal !!}</strong></td>
                                <td class="text-center"><strong>{!! $sale->options->profit !!}</strong></td>
                                <td class="text-center">
                                    <a class="btn btn-danger" href="{{ route('product.remove',$sale->rowId) }}">Cancel</a>
                                </td>
                            </tr>
                         @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-7">
                        </div>
                        <div class="col-md-5">
                            <h3>Total ammount : {{ \Cart::subtotal() }}</h3>
                        </div>
                    </div>
                </div>
                <br>
              <button class="btn btn-primary" type="submit" data-toggle="modal" data-target="#myModal_product">Save</button>

               <!-- begin:modal Add product -->
                <div id="myModal_product" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content" >
                            <center>
                                <div class="modal-header">
                                    <div class="row">
                                        <div class="col-md-11">
                                            <h3 class="modal-title">Cash</h3>
                                        </div>
                                        <div class="col-md-1">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                    </div>
                                </div>
                            </center>
                            <div class="modal-body" >
                                <form class="form-horizontal" method="POST" action="/payment">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Customer Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Customer Name" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Cash Amount</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="cash" class="form-control" id="name" placeholder="100" required>
                                        </div>
                                    </div>
                                    <br>
                                    <input class="btn btn-primary" type="submit" value="Save">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End:modal Add Product -->

            </div>

        </div>
    </div>


@endsection



<style>
    button{
        display: block;
        width: 100%;
        border: none;
        padding: 14px 28px;
        font-size: 16px;
        cursor: pointer;
        text-align: center;
    }
</style>





