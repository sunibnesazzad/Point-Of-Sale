@extends('layout.dash1')
@section('content')

    <!-- Page Content Start -->
    <!-- ================== -->
    <div class="main-grid">
        <div class="agile-grids">


            <!-- blank-page -->
            <div class="table-heading">
                <h2>{!! $user->name !!}'s Point Of Sale</h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p>Number of Customers : <strong>{{$num2}}</strong></p>
                </div>
                <div class="col-md-6">
                    <p>Number of Products : <strong>{{$num1}}</strong></p>
                </div>
            </div>

            <hr>
            <div class="well">
                <div class="w3l-table-info">

                    <table id="table">
                        <thead>
                        <tr>
                            <th class="text-center">Order Id</th>
                            <th class="text-center">Category</th>
                            <th class="text-center">Number of Product</th>
                            <th class="text-center">Total sale</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($details as $product)
                            <tr>
                                <td class="text-center"><strong>{!! $product->id !!}</strong></td>
                                <td class="text-center"><strong>{!! $product->brand_name !!}</strong></td>
                                <td class="text-center"><strong>{!! $product->quantity !!}</strong></td>
                                <td class="text-center"><strong>{!! $product->total !!}</strong></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>


@endsection




