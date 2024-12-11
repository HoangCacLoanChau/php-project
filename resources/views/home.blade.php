<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>create</h1>
        <form action="create" method="POST">
            @csrf
            <input type="text" placeholder="name" name="name">
            <input type="text" placeholder="email" name="email">
            <input type="password" placeholder="password" name="password">
            <button>Add</button>
        </form>
    </div>
</body>
</html>