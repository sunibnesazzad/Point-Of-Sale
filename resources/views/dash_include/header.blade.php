<head>

    <!-- Page Icon -->
    <link rel="icon" href="{{asset('/upload/images/ink.png')}}" type="image/gif" sizes="20x20">
    <!-- Title -->
    <title>{{$title}}</title>

    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="{{asset('admin_dash_theme/css/bootstrap.css')}}">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="{{asset('admin_dash_theme/css/style.css')}}" rel='stylesheet' type='text/css' />
    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="{{asset('admin_dash_theme/css/font.css')}}" type="text/css"/>
    <link href="{{asset('admin_dash_theme/css/font-awesome.css')}}" rel="stylesheet">
    {{--Table--}}
    <link rel="stylesheet" type="text/css" href="{{asset('admin_dash_theme/css/table-style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('admin_dash_theme/css/basictable.css')}}" />
    <script type="text/javascript" src="{{asset('admin_dash_theme/js/jquery.basictable.min.js')}}"></script>
    {{--end of table--}}
    <!-- //font-awesome icons -->
    <script src="{{asset('admin_dash_theme/js/jquery2.0.3.min.js')}}"></script>
    <script src="{{asset('admin_dash_theme/js/modernizr.js')}}"></script>
    <script src="{{asset('admin_dash_theme/js/jquery.cookie.js')}}"></script>
    <script src="{{asset('admin_dash_theme/js/screenfull.js')}}"></script>
    <script>
        $(function () {
            $('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

            if (!screenfull.enabled) {
                return false;
            }



            $('#toggle').click(function () {
                screenfull.toggle($('#container')[0]);
            });
        });
    </script>
    <link rel="stylesheet" type="text/css" href="{{asset('//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css')}}">

</head>