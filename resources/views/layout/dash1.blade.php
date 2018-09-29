<!DOCTYPE>
<html lang="en">

@include('dash_include.header')

<body class="dashboard-page">

@include('dash_include.sidebar')

<section class="wrapper scrollable">


    @include('dash_include.navbar')

    <div class="wraper container-fluid">
        <section class="">
            @yield('content')
        </section>
    </div>

    @include('dash_include.footer')

</section>


@include('dash_include.alertjs')
@include('dash_include.script')
</body>
</html>