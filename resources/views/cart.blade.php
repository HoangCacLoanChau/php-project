<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        @if (Session::has('success'))
            <div class="alert alert-success">
                <h1>{{ Session::get('success') }}</h1>
            </div>
        @endif
        @if($cartTotalQuantity == 0)    
        <div> No Item here</div>
        @else
        <div>Total @money($total, 'USD')</div>
        <div><a href="{{route('clear.cart')}}">Clear All</a></div>
        @foreach ($items as $item)
            <h4>{{ $item->name }}</h4>
            <img src="{{ $item->attributes->image }}" alt="" style="height:30px">
            {{-- quantity --}}
            <div>
                <span><a href="{{route('decrease.quantity',$item->id)}}">-</a></span>
                <input type="text" value="{{ $item->quantity }}">
                <span><a href="{{route('increase.quantity',$item->id)}}">+</a></span>
            </div>
            <span>@money($item->price, 'USD')</span>
            <button>
                <a href="{{route('remove.cart',$item->id)}}">remove</a>
            </button>
        @endforeach
        @endif
    </div>
</body>
</html>