@extends('admin.dashboard')
@section('title', 'Edit Car')
 @section('content')     
     <div class="p-4 md:p-5">
        <h1 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Edit Car</h1>

         <form action="{{ route('update.car', $car->id) }}" method="POST" class="max-w-sm mx-auto " enctype="multipart/form-data">
             @csrf
             @method('PUT')
             <div class="grid grid-cols-2 gap-2">
                 <div class="mb-5">
                     <label for="Car name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                         Car Name</label>
                     <input type="text" name="car_name" placeholder="car name" value="{{ $car->car_name }}"
                         class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                         required />
                 </div>
                 <div class="mb-5">
                     <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                         Company</label>
                     <input type="text" name="company" placeholder="company name" value="{{ $car->company }}"
                         class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                         required />
                 </div>
                 <div class="mb-5">
                     <label for="Price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                         Price</label>
                     <input type="number" name="price" placeholder="car price"  value="{{ $car->price }}"
                         class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                         required />
                 </div>
                 <div class="mb-5">
                     <div>
                         <label for="image" class="block text-sm font-medium text-gray-700">Upload Image</label>
                         <input type="file" name="image" id="image" accept="image/*" required 
                             class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                     </div>
                 </div>
                 <div class="mb-5 col-span-2">
                     <label for="large-input"
                         class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                     <input type="text" name="description" placeholder="description" value="{{ $car->description }}"
                         class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                 </div>


             </div>

             <button type="submit"
                 class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save Changes</button>
         </form>
     </div>
 @endsection
