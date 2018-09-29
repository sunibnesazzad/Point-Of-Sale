@extends('layout.dash1')
@section('content')

    <!-- Page Content Start -->
    <!-- ================== -->
    <div class="main-grid">
        <div class="agile-grids">
            <div class="table-heading">
                <h2>Add Product</h2>
            </div>
            <!-- Form start Start -->


            <div class="panel panel-widget forms-panel">
                <div class="forms" >
                    <div class=" form-grids form-grids-right">
                        <div class="widget-shadow " data-example-id="basic-forms">
                            <div class="form-title">
                                <h4 class="text-center">Add Product Information:</h4>
                            </div>
                            <div class="form-body">
                                <form class="form-horizontal" method="POST" action="{!! route('product.edit',$product->id) !!}" id="">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Brand Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="brand_name" class="form-control" id="name" value="{{$product->brand_name}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Generic Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="generic_name" class="form-control" id="name" value="{{$product->generic_name}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Category</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="category" class="form-control" id="name" value="{{$product->category}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Arrival Date</label>
                                        <div class="col-sm-9">
                                            <input id="date" type="date" class="form-control" name="receive_date" value="{{$product->receive_date}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Exp Date</label>
                                        <div class="col-sm-9">
                                            <input id="date" type="date" class="form-control" name="exp_date" value="{{$product->exp_date}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Orginal Price</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="orginal_price" class="form-control" id="name" value="{{$product->orginal_price}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Selling Price</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="sell_price" class="form-control" id="name" value="{{$product->sell_price}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Quantity</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="quantity" class="form-control" id="name" value="{{$product->quantity}}" required>
                                        </div>
                                    </div>
                                    <br>
                                    <input class="btn btn-primary" type="submit" value="Update">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

