@extends('layout.dash1')
@section('content')

    <!-- Page Content Start -->
    <!-- ================== -->
    <div class="main-grid">
        <div class="agile-grids">


            <!-- blank-page -->
            <div class="table-heading">
                <h2>{!! $user->name !!}'s Information</h2>
            </div>

            <div class="well">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        @if(session('info'))
                            <div class="alert alert-success">
                                {{session('info')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="panel panel-widget forms-panel">
                    <div class="row">
                        <div class="col-md-5">
                        </div>
                        <div class="col-md-7">
                            <br>
                            <div class="img-circle">
                                <img src="{{asset('upload/default/'.$user->profile->image)}}" alt=" " class="img-circle" />
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="forms" >
                        <div class=" form-grids form-grids-right">
                            <div class="widget-shadow " data-example-id="basic-forms">
                                <!-- Basic information starts -->
                                <div class="form-title">
                                    <h4 class="text-center"> Basic Information:</h4>
                                </div>
                                <div class="form-body">
                                    <form class="form-horizontal" >
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="name" class="form-control" id="name" value="{{$user->name}}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-2 control-label">Position</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="position" class="form-control" id="position" value="{{$user->position}}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="platform" class="form-control" id="role" value="{{$user->profile->address}}" disabled>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--End of Basic information -->

                                <!-- Contact information starts -->
                                <div class="form-title">
                                    <h4 class="text-center"> Contact Information:</h4>
                                </div>
                                <div class="form-body">
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                            <div class="col-sm-9">
                                                <input type="email" name="email" class="form-control" id="email" value="{{$user->email}}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-2 control-label">Phone</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="phone" class="form-control" id="phone" value="{{$user->profile->phone}}" disabled>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- End of Contact information -->

                                <!-- About information starts -->
                                <div class="form-title">
                                    <h4 class="text-center"> About Information:</h4>
                                </div>
                                <div class="form-body">
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-2 control-label">About </label>
                                            <div class="col-sm-9">
                                                <textarea type="text" name="about" class="form-control" id="about" disabled>{!! $user->profile->about_me !!}</textarea>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- End About information -->

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>


@endsection




