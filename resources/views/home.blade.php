<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @include('sweetalert::alert')
    @auth
        <form action="/logout" method="POST">
            @csrf
            <button>log out</button>
        </form>
        <a href="{{ route('cart') }}">cart</a>

        <div>
            <h2>create new car</h2>
            <form action="/create-car" method="POST">
                @csrf
                <input type="text" name="car_name" placeholder="car name">
                <input type="text" name="company" placeholder="company name">
                <input type="number" name="price" placeholder="car price">
                <input type="text" name="image" placeholder="image">
                <input type="text" name="description" placeholder="description">

                <button>Save</button>
            </form>
        </div>
        <div>
            <h2>my cars</h2>
            @foreach ($cars as $car)
                <div style="background-color: gray; padding:10px; margin:10px">
                    <h3>{{ $car['car_name'] }} by {{ $car->user->name }}</h3>
                    <h3>{{ $car['company'] }}</h3>
                    <h3>@money($car->price, 'USD')</h3>
                    <h3>{{ $car['image'] }}</h3>
                    <p> <a href="{{ route('show.edit', $car->id) }}">Edit</a></p>
                    <form action="{{ route('delete.car', $car->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form>
                    <a href="{{ route('add.cart', $car->id) }}"> Add to cart</a>

                </div>
            @endforeach
        </div>
    @else
        <a href="{{ route('register.view') }}"> <button>register</button></a>
        <a href="{{ route('login.view') }}"> <button>Login</button></a>

        <h1>All Cars</h1>
        @foreach ($cars as $car)
            <div>
                <div style="background-color: gray; padding:10px; margin:10px">
                    <h3>{{ $car['car_name'] }} by {{ $car->user->name }}</h3>
                    <h3>{{ $car['company'] }}</h3>
                    <h3>@money($car->price, 'USD')</h3>
                    <h3>{{ $car['description'] }}</h3>
                    <h3>{{ $car['image'] }}</h3>
                    <a href="{{ route('add.cart', $car->id) }}"> Add to cart</a>
                </div>
        @endforeach
    @endauth
</body>

</html>
