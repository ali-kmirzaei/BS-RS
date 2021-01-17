<!DOCTYPE html>
<html lang="fa">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/blog-home.css" rel="stylesheet">
    <link rel="stylesheet" href="/app.css">

</head>

<body class="font" style="margin-top: 50px;text-align:right;">

<!-- Navigation -->
@include('layouts.header')

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-12">
            @yield('content')
        </div>

        {{--<!-- Sidebar Widgets Column -->--}}
        {{--<div class="col-md-4">--}}
            {{--@section('sidebar')--}}
                {{--@include('layouts.sidebar')--}}
            {{--@show--}}
        {{--</div>--}}
    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
{{--@include('layouts.footer')--}}

<!-- Bootstrap core JavaScript -->
<script src="/vendor/jquery/jquery.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
