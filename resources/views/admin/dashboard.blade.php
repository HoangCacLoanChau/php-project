<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</head>

<body class="font-sans bg-gray-100">

    <!-- Sidebar -->
    <div class="flex h-screen ">
        <div class="w-64 bg-blue-800 text-white p-4">
            <div class="text-2xl font-semibold mb-6">Dashboard</div>
            <ul>
                <li class="mb-4">
                    <a href={{ route('handle.car') }} class="text-lg hover:text-blue-300">Products</a>
                </li>
               
              
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6 overflow-y-auto">
            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">@yield('title', 'DashBoard')</h1>
                <div class="flex">
                    <div >
                        <a href='/'>
                            <button
                                class="text-white bg-purple-700 hover:bg-purple-800 font-medium rounded-lg px-5 text-sm me-2 mb-2 py-2.5   ">HomePage</button></a>
                    </div>
                    <form action="/logout" method="POST">
                        @csrf
                        <button
                            class=" focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Log
                            out</button>
                    </form>
                </div>
            </div>

            <div>
                @yield('content')
            </div>
        </div>
    </div>

</body>

</html>
