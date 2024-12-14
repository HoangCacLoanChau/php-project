<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body>
    @extends('layout') 
    @section('content')
        <h1>Edit Car</h1>
        <p class="text-red-500 bg-red-200 border-gray-50">aaaa</p>
        <form action="{{ route('update.car', $car->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="car_name" value="{{ $car->car_name }}">
            <input type="text" name="company" value="{{ $car->company }}">
            <input type="number" name="price" value="{{ $car->price }}">
            <input type="text" name="image" value="{{ $car->image }}">
            <input type="text" name="description" value="{{ $car->description }}">

            <button>Save Changes</button>
        </form>
    @endsection

</body>

</html>
