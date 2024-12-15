@extends('layout')
@section('content')
    @auth
        <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
            <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Car Management</h2>

                <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
                    <div class="mx-auto w-full flex-none lg:max-w-2xl xl:max-w-4xl">
                        <div class="space-y-6">
                            @foreach($items as $item)
                                <div
                                    class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-6">
                                    <div class="gap-10 space-y-4 md:flex md:items-center justify-between md:gap-6 md:space-y-0">
                                        <div class="flex justify-between space-x-2">
                                            {{-- image --}}
                                            <div>
                                                <a href="#" class="shrink-0 md:order-1">
                                                    <img class="h-20 w-20 dark:hidden"
                                                        src="{{ asset('storage/' . $item->image) }}" alt="imac image" />
                                                    <img class="hidden h-20 w-20 dark:block"
                                                        src="{{ asset('storage/' . $item->image) }}" alt="imac image" />
                                                </a>
                                            </div>

                                            {{-- name, company --}}
                                            <div class="">
                                                <a href="#"
                                                    class="text-base font-medium text-gray-900 hover:underline dark:text-white">{{ $item->name }}</a>
                                                <p>
                                                    <span class="text-sm text-gray-500 font-semibold">Company: </span>
                                                    <span class="">{{ $item->company }}</span>
                                                </p>
                                                <p
                                                    class="text-sm font-medium text-gray-500 hover:text-gray-900 hover:underline dark:text-gray-400 dark:hover:text-white">
                                                    price: @money($item->price)</p>
                                            </div>
                                        </div>
                                        <div
                                            class="flex w-full min-w-0  justify-end content-between	  md:order-2 md:max-w-md">
                                            {{-- update delete --}}
                                            <div class="self-center">
                                                <form action="{{ route('delete.car', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                        <button 
                                                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"> Delete</button>
                                                </form>
                                               
                                            </div>

                                            <div>
                                                <a href={{route('show.edit',$item->id)}}>
                                                    <button 
                                                        class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Edit</button>

                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>


                </div>
            </div>
        </section>
    @endauth
@endsection
