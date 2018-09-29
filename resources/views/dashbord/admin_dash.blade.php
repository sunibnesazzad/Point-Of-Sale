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
                    <a class="btn btn-primary" href="{{ route('customers.add') }}">Add Customers</a>
                </div>
                <div class="col-md-6">
                    {{--<a class="btn btn-primary" href="{{ route('customers.add') }}">Add Customers</a>--}}
                </div>
            </div>
            <hr>
            <div class="well">
                <div class="w3l-table-info">

                    <table id="table">
                        <thead>
                        <tr>
                            <th>Account</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Income Money IN</th>
                            <th>Expense Money Out</th>
                            <th>Debit/Credit</th>
                            <th>Overall Balance</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>


@endsection




