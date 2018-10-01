<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
@include('dashInclude.head')

<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white">
<div class="wrapper">

    @include('dashInclude.sidebar')
    @include('dashInclude.topBar')
    <div class="page-container">

        <div class="page-content-wrapper">
            <div class="page-content">
                @yield('content')
            </div>
        </div>
    </div>
    @include('dashInclude.footer')
</div>

@include('dashInclude.footerscript')
@include('dashInclude.alertjs')
</body>
</html>