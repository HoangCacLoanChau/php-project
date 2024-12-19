@extends('layout.app')
@section('content')

    <body>

        <section class="bg-gray-50 py-8 antialiased dark:bg-gray-900 md:py-12">
            {{-- search bar --}}
            <div class="max-w-md mx-auto">
                <!-- Search Form -->
                <form method="GET" action="{{ route('car.list') }}" class="mt-4">
                    <label for="search" class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Search</label>
                    <div class="relative">
                        <input name="search" type="text" id="search"
                            class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            placeholder="Search for cars" value="{{ old('search', $search) }}" />
                        <button type="submit"
                            class="absolute right-2.5 bottom-2 bg-blue-700 text-white hover:bg-blue-800 px-4 py-2 rounded-lg">
                            Search
                        </button>
                    </div>
                </form>
            
                <!-- Sort by Company Form -->
                <form method="GET" action="{{ route('car.list') }}" class="mt-4">
                    <label for="company" class="block text-sm font-medium text-gray-900 dark:text-white">Filter by Company</label>
                    <div class="flex space-x-3">
                        <select name="company" id="company" 
                        class="mt-2 block w-full p-3 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        <option value="">Select a company</option>
                        @foreach($companies as $company)
                            <option value="{{ $company }}" {{ request('company') == $company ? 'selected' : '' }}>
                                {{ $company }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit"
                        class="mt-2 bg-blue-700 text-white hover:bg-blue-800 px-4 py-2 rounded-lg">
                        Sort
                    </button>
                    </div>
                 
                </form>
            </div>
            
            <!-- Displaying the car list -->
            @if ($cars->isEmpty())
                <p class="text-7xl text-gray-500 font-semibold text-center mt-10"> No Car found</p>
            @else
                <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
                    <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
                        @foreach ($cars as $car)
                            <div
                                class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                                <div class="h-56 w-full">
                                    <a href="#">
                                        {{-- image --}}
                                        <img class="mx-auto h-full dark:hidden" src="{{ asset('storage/' . $car->image) }}"
                                            alt="" />
                                        <img class="mx-auto hidden h-full dark:block"
                                            src="{{ asset('storage/' . $car->image) }}" alt="" />

                                    </a>
                                </div>
                                <div class="pt-6">
                                    <div class="mb-4 flex items-center justify-between gap-4">
                                        <span
                                            class="me-2 rounded bg-primary-100 px-2.5 py-0.5 text-xs font-medium text-primary-800 dark:bg-primary-900 dark:text-primary-300">
                                            Up to 35% off </span>
                                    </div>
                                    {{-- name --}}
                                    <a href="#"
                                        class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">{{ $car['car_name'] }}</a>
                                    <p class="text-sm text-gray-700 dark:text-gray-400 mt-1">
                                        <span class="font-medium text-gray-800 dark:text-gray-300">Company: </span>
                                        <span>{{ $car->company }}</span>
                                    </p>
                                    <div class="mt-2 flex items-center gap-2">
                                        <div class="flex items-center">
                                            <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                            </svg>

                                            <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                            </svg>

                                            <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                            </svg>

                                            <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                            </svg>

                                            <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                            </svg>
                                        </div>

                                        <p class="text-sm font-medium text-gray-900 dark:text-white">5.0</p>
                                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">(455)</p>
                                    </div>

                                    <ul class="mt-2 flex items-center gap-4">
                                        <li class="flex items-center gap-2">
                                            <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M13 7h6l2 4m-8-4v8m0-8V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v9h2m8 0H9m4 0h2m4 0h2v-4m0 0h-5m3.5 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm-10 0a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                                            </svg>
                                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Fast Delivery
                                            </p>
                                        </li>

                                        <li class="flex items-center gap-2">
                                            <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                                    d="M8 7V6c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1h-1M3 18v-7c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                            </svg>
                                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Best Price</p>
                                        </li>
                                    </ul>

                                    <div class="mt-4 mb-2 flex items-center justify-between gap-4">
                                        <p class="text-2xl font-extrabold leading-tight text-gray-900 dark:text-white">
                                            @money($car->price, 'USD')</p>
                                    </div>
                                    <a href="{{ route('add.cart', $car->id) }}">
                                        <button type="button"
                                            class=" inline-flex items-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4  focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                            <svg class="-ms-2 me-2 h-5 w-5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                                            </svg>
                                            Add to cart
                                        </button>
                                    </a>

                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="">
                        {{ $cars->appends(['search' => request('search')])->links() }}
                    </div>
                </div>
            @endif
        </section>
        </div>
    </body>
@endsection
