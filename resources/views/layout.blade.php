<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body>
  @include('sweetalert::alert')

    <!-- Navbar Area Start -->
    <header>

    </header>
    <!-- Navbar Area End -->


    @yield('content')
    <!--for adding your content-->

    <!-- Add Footer Area Start -->

    <h1>footer here</h1>
    <!-- Add Footer Area End -->


</body>

</html>
