@extends('layout.dash1')
@section('content')

    <!-- Page Content Start -->
    <!-- ================== -->
    <div class="main-grid">
        <div class="agile-grids">
            <div class="table-heading">
                <h2>Update Profile</h2>
            </div>
            <!-- Form start Start -->


            <div class="panel panel-widget forms-panel">
                <div class="forms" >
                    <div class=" form-grids form-grids-right">
                        <div class="widget-shadow " data-example-id="basic-forms">
                            <div class="form-title">
                                <h4 class="text-center">Edit Profile Information:</h4>
                            </div>
                            <div class="form-body">
                                <form class="form-horizontal" method="POST" action="/edit/{{$profile->id}}" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-5">
                                            </div>
                                            <div class="col-md-7">
                                                <br>
                                                <div class="img-circle">
                                                    <img src="{{asset('upload/default/'.$user->profile->image)}}" alt=" " class="img-circle" />
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Choose Image to Upload</label>
                                                    <input type="file" id="image" name="image" multiple>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" class="form-control" id="name" value="{{$user->name}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" name="email" class="form-control" id="email" value="{{$user->email}}" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">Phone</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="phone" class="form-control" id="phone" value="{{$profile->phone}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">Position</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="position" class="form-control" id="position" value="{{$profile->position}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="address" class="form-control" id="role" value="{{$profile->address}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">About </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="about" class="form-control" id="role" value="{{$profile->about_me}}" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-offset-2">
                                        <button type="submit" class="btn btn-default w3ls-button">UPDATE</button>
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