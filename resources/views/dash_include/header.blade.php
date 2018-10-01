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
    {{--Scrips for CKEditor--}}
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript">CKEDITOR.replace( 'editor1' );</script>

{{-- <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
 <script>
     tinymce.init({
         selector: '#mytextarea'
     });
 </script>--}}

<!-- tables -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin_dash_theme/css/table-style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('admin_dash_theme/css/basictable.css')}}" />
    <script type="text/javascript" src="{{asset('admin_dash_theme/js/jquery.basictable.min.js')}}"></script>

    <link rel="stylesheet" type="text/css" href="{{asset('//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css')}}">
{{--<script type="text/javascript">
    $(document).ready(function() {
        $('#table').basictable();

        $('#table-breakpoint').basictable({
            breakpoint: 768
        });

        $('#table-swap-axis').basictable({
            swapAxis: true
        });

        $('#table-force-off').basictable({
            forceResponsive: false
        });

        $('#table-no-resize').basictable({
            noResize: true
        });

        $('#table-two-axis').basictable();

        $('#table-max-height').basictable({
            tableWrapper: true
        });
    });
</script>--}}
<!-- //tables -->

</head>