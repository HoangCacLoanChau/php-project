<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function viewCar()
    {
        $carList = [];
        // if (auth()->check()) {
        //     $carList = auth()->user()->usersCar()->latest()->get();
        // }else{
        $carList = Car::orderBy('created_at', 'desc')->get();
        // }
        return view('home', ['cars' => $carList]);
    }

    public function detailCar($carId)
    {
        // Fetch the car details by id
        $car = Car::findOrFail($carId);

        // Return a view with the car details
        return view('detail-car', compact('car'));
    }
    public function handleCar()
    {
        $carList = [];

        $carList = Car::orderBy('created_at', 'desc')->get();

        return view('handle-car', ['items' => $carList]);
    }
    public function createCar(Request $request)
    {
        $newCar = $request->validate([
            'car_name' => 'required',
            'company' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable',
        ]);

        //  not allow to add code like <> to db
        $fileName = time() . '.' . $request->image->extension();
        $newCar['car_name'] = strip_tags($newCar['car_name']);
        $newCar['company'] = strip_tags($newCar['company']);
        $newCar['price'] = strip_tags($newCar['price']);
        $newCar['description'] = strip_tags($newCar['description']);
        $newCar['image'] = $request->image->storeAs('image', $fileName, 'public');

        $newCar['user_id'] = auth()->id();
        Car::create($newCar);
        return redirect('/');
    }
    public function showEditScreen(Car $car)
    {
        if (auth()->user()->id !== $car['user_id']) {
            return redirect('/');
        }
        return view('edit-car', ['car' => $car]);
    }
    public function updateCar(Car $car, Request $request)
    {
        // check if user is the creator of car
        // if (auth()->user()->id !== $car['user_id']) {
        //     return redirect('/');
        // }
        $updateCar = $request->validate([
            'car_name' => 'required',
            'company' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable',
        ]);

        // strip_tags: not allow to add code like HTML or PHP tags.
        $fileName = time() . '.' . $request->image->extension();
        $updateCar['image'] = $request->image->storeAs('image', $fileName, 'public');
        $updateCar['car_name'] = strip_tags($updateCar['car_name']);
        $updateCar['company'] = strip_tags($updateCar['company']);
        $updateCar['price'] = strip_tags($updateCar['price']);
        $updateCar['image'] = strip_tags($updateCar['image']);
        $updateCar['description'] = strip_tags($updateCar['description']);

        $car->update($updateCar);
        return redirect('/');
    }
    public function deleteCar(Car $car)
    {
        // if (auth()->user()->id !== $car['user_id']) {
        //     return redirect('/');
        // }
        $car->delete();
        return back();
    }
}
