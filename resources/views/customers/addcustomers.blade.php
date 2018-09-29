@extends('layout.dash1')
@section('content')

    <!-- Page Content Start -->
    <!-- ================== -->
    <div class="main-grid">
        <div class="agile-grids">
            <div class="table-heading">
                <h2>Add Customer</h2>
            </div>
            <!-- Form start Start -->


            <div class="panel panel-widget forms-panel">
                <div class="forms" >
                    <div class=" form-grids form-grids-right">
                        <div class="widget-shadow " data-example-id="basic-forms">
                            <div class="form-title">
                                <h4 class="text-center">Add Customer Information:</h4>
                            </div>
                            <div class="form-body">
                                <form class="form-horizontal" method="POST" action="/addcustomers">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" name="email" class="form-control" id="email" placeholder="example@example.com" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">Position</label>
                                        <div class="col-sm-9">
                                            <select id="inputState" class="form-control" name="position">
                                                <option value="customer">Customer</option>
                                                <option value="admin">Admin</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="password" class="form-control" id="phone" placeholder="Password" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label"> Confirm Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="password_confirmation" class="form-control" id="phone" placeholder="Confirm Password" required>
                                        </div>
                                    </div>


                                    <div class="col-sm-offset-2">
                                        <button type="submit" class="btn btn-default w3ls-button">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

