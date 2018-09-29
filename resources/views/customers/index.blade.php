@extends('layout.dash1')
@section('content')

    <!-- Page Content Start -->
    <!-- ================== -->
    <div class="main-grid">
        <div class="agile-grids">


            <!-- blank-page -->
            <div class="table-heading">
                <h2>{{--{!! $user->name !!}'s--}} Point Of Sale</h2>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <p>Total Number of Users : <strong>{{$number}}</strong></p>
                </div>
                <div class="col-md-4">
                    <a class="btn btn-primary" href="{{ route('customers.add') }}">+Add Customers</a>
                </div>
            </div>
            <hr>
            <div class="well">
                <div class="w3l-table-info">
                    <table id="customer" class="table">
                        <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th>Name</th>
                            <th>Position</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $customer)
                            <tr>
                                <td><strong>{!! $customer->id !!}</strong></td>
                                <td><strong>{!! $customer->name !!}</strong></td>
                                <td><strong>{!! $customer->position !!}</strong></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>


@endsection



@section('scripts')

    <script type="text/javascript">
            $('#customer').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": '{{ route('datatable.customers') }}',
                "columns": [
                    { "data": "id" },
                    { "data": "name" },
                    { "data": "position" },
                ]
            });
    </script>
@endsection




