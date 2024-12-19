@extends('admin.dashboard')
@section('title', 'Car Management')
@section('content')
    @auth
        <!-- Modal toggle -->

        <!-- Main modal -->
        <div id="authentication-modal" tabindex="-2" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Create new Car
                        </h3>
                        <button type="button"
                            class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="authentication-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                        <form action={{ route('create.car') }} method="POST" class="max-w-sm mx-auto "
                            enctype="multipart/form-data">
                            @csrf
                            <div class="grid grid-cols-2 gap-2">
                                <div class="mb-5">
                                    <label for="Car name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Car Name</label>
                                    <input type="text" name="car_name" placeholder="car name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required />
                                </div>
                                <div class="mb-5">
                                    <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Company</label>
                                    <input type="text" name="company" placeholder="company name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required />
                                </div>
                                <div class="mb-5">
                                    <label for="Price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Price</label>
                                    <input type="number" name="price" placeholder="car price"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required />
                                </div>
                                <div class="mb-5">
                                    <div>
                                        <label for="image" class="block text-sm font-medium text-gray-700">Upload
                                            Image</label>
                                        <input type="file" name="image" id="image" accept="image/*" required
                                            class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                                    </div>
                                </div>
                                <div class="mb-5 col-span-2">
                                    <label for="large-input"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                    <input type="text" name="description" placeholder="description"
                                        class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>


                            </div>

                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- end create car --}}
        <section class=" antialiased dark:bg-gray-900 w-full">
            {{-- search bar --}}
            <div class="flex  items-center">
                {{-- Create new car --}}
                <div>
                    <a href="#">
                        <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                            class="  block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 me-2 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">
                            Create new Car
                        </button>
                    </a>
                </div>
                <div class="w-2/3">
                    <form class="max-w-md" method="GET" action={{ route('handle.car') }}>
                        <label for="default-search"
                            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input name="search" type="search" id="default-search"
                                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Search Car" required />
                            <button type="submit"
                                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                        </div>
                    </form>
                </div>

            </div>

            <!-- Displaying the car list -->
            @if ($items->isEmpty())
                <p class="text-7xl text-gray-500 font-semibold text-center mt-10"> No Car found</p>
            @else
                <div class="w-full   2xl:px-0">
                    <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
                        <div class= "w-full">
                            <div class="space-y-6 w-full">
                                <table
                                    class=" min-w-full table-auto bg-white border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                                    <thead>
                                        <tr class="text-left border-b dark:border-gray-700">
                                            <th class="py-3 px-6 text-sm font-medium text-gray-900 dark:text-white">Image</th>
                                            <th class="py-3 px-6 text-sm font-medium text-gray-900 dark:text-white">Name</th>
                                            <th class="py-3 px-6 text-sm font-medium text-gray-900 dark:text-white">Company
                                            </th>
                                            <th class="py-3 px-6 text-sm font-medium text-gray-900 dark:text-white">Price</th>
                                            <th class="py-3 px-6 text-sm font-medium text-gray-900 dark:text-white">Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items as $item)
                                            <tr class="border-b dark:border-gray-700">
                                                <td class="py-4 px-6">
                                                    <a href="#" class="shrink-0">
                                                        <img class="h-20 w-20 dark:hidden"
                                                            src="{{ asset('storage/' . $item->image) }}" alt="item image" />
                                                        <img class="hidden h-20 w-20 dark:block"
                                                            src="{{ asset('storage/' . $item->image) }}" alt="item image" />
                                                    </a>
                                                </td>
                                                <td class="py-4 px-6 text-sm font-medium text-gray-900 dark:text-white">
                                                    <a href="#" class="hover:underline">{{ $item->car_name }}</a>
                                                </td>
                                                <td class="py-4 px-6 text-sm text-gray-500 dark:text-gray-400">
                                                    {{ $item->company }}
                                                </td>
                                                <td class="py-4 px-6 text-sm font-medium text-gray-500 dark:text-gray-400">
                                                    @money($item->price)
                                                </td>
                                                <td class="py-4 px-6 text-sm">
                                                    <div class="flex justify-start space-x-2">
                                                        <!-- Delete Button -->
                                                        <form action="{{ route('delete.car', $item->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button
                                                                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                                                Delete
                                                            </button>
                                                        </form>

                                                        <!-- Edit Button -->
                                                        <a href="{{ route('show.edit', $item->id) }}">
                                                            <button
                                                                class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                                                Edit
                                                            </button>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- Pagination Links -->
                                <div class=" py-4">
                                    {{ $items->appends(['search' => request('search')])->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </section>
    @endauth
@endsection
