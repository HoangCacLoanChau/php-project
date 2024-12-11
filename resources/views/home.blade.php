<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @auth

        <form action="/logout" method="POST">
            @csrf
            <button>log out</button>
        </form>
        <div>
            <h2>create new car</h2>
            <form action="/create-car" method="POST">
                @csrf
                <input type="text" name="car_name" placeholder="car name">
                <input type="text" name="company" placeholder="company name">
                <input type="number" name="price" placeholder="car price">
                <input type="text" name="image" placeholder="image">
                <button>Save</button>
            </form>
        </div>
        <div>
            <h2>All Posts</h2>
            @foreach ($cars as $car)
                <div style="background-color: gray; padding:10px; margin:10px">
                    <h3>{{ $car['car_name'] }} by {{ $car->user->name }}</h3>
                    <h3>{{ $car['company'] }}</h3>
                    <h3>{{ $car['price'] }}</h3>
                    <h3>{{ $car['image'] }}</h3>
                    <p> <a href="/edit-car/{{ $car->id }}">Edit</a></p>
                    <form action="/delete-car/{{ $car->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    @else
        <div>
            <h1>Register</h1>
            <form action="/create" method="POST">
                @csrf
                <input type="text" placeholder="name" name="name">
                <input type="text" placeholder="email" name="email">
                <input type="password" placeholder="password" name="password">
                <button>Add</button>
            </form>
        </div>
        <div>
            <h1>Login</h1>
            <form action="/login" method="POST">
                @csrf
                <input type="text" placeholder="login name" name="loginname">
                <input type="password" placeholder="login password" name="loginpassword">
                <button>Add</button>
            </form>
        </div>
        @foreach ($cars as $car)
            <div>
                <div style="background-color: gray; padding:10px; margin:10px">
                    <h3>{{ $car['car_name'] }} by {{ $car->user->name }}</h3>
                    <h3>{{ $car['company'] }}</h3>
                    <h3>{{ $car['price'] }}</h3>
                    <h3>{{ $car['image'] }}</h3>
                </div>
        @endforeach
    @endauth

</body>

</html>
