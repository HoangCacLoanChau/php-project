@extends('layout.app')
@section('content')
    <div class="h-screen w-screen relative">
        <div class="absolute inset-0 bg-[url('/car.jpg')] bg-cover bg-right-bottom"></div>
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="absolute inset-0 flex flex-col items-center justify-center text-white space-y-6 px-4">
            <h1 class="text-5xl font-bold text-center">Welcome to Our Car Store</h1>
            <p class="text-lg text-center max-w-xl">
                Explore our wide selection of premium cars, designed to suit every style and need. Discover luxury, comfort,
                and performance, all in one place.
            </p>
            <div class="flex space-x-4">
                <a href={{route('car.list')}} class="px-6 py-3 bg-blue-600 hover:bg-blue-700 rounded text-lg font-semibold">Shop Now</a>
                <a href={{route('home')}} class="px-6 py-3 bg-gray-700 hover:bg-gray-800 rounded text-lg font-semibold">Learn
                    More</a>
            </div>
        </div>
    </div>
    <div class=" bg-gray-100 text-5xl font-bold text-center py-10">Our new Car</div>
    <div class="min-h-[400px] bg-gray-100 flex items-center justify-center">
        <!-- Horizontal Auto-Scroll Container -->
        <div class="relative w-full max-w-fullxl overflow-hidden">
            <div class="flex space-x-7 animate-auto-scroll">
                <!-- Card 1 -->
                @foreach ($cars as $car)
                    <div class="min-w-[300px] max-h-[370px] bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="{{ asset('storage/' . $car->image) }}" alt="Car 1" class="h-48 w-full object-cover">
                        <div class="p-4">
                            <h2 class="text-lg font-bold">{{ $car->car_name }}</h2>
                            <p class="text-sm text-gray-700 dark:text-gray-400 mt-1">
                                <span>{{ $car->company }}</span>
                            </p>
                            <p class="text-sm text-gray-600 mt-2">{{ $car->description }}</p>
                            <a href={{ route('detail.car', $car->id) }}
                                class="mt-4 block text-blue-600 font-semibold hover:underline">View Details</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <style>
        /* Auto-scroll animation */
        @keyframes auto-scroll {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .animate-auto-scroll {
            display: flex;
            animation: auto-scroll 20s linear infinite;
        }
    </style>
@endsection
