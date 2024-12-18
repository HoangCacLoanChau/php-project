<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function viewCar()
    {
        $carList = [];

        $carList = Car::orderBy('created_at', 'desc')->paginate(8);

        return view('user.car-list', ['cars' => $carList]);
    }

    public function detailCar($carId)
    {
        // Fetch the car details by id
        $car = Car::findOrFail($carId);

        // Return a view with the car details
        return view('user.detail-car', compact('car'));
    }
    public function handleCar()
    {
        $carList = [];

        $carList = Car::orderBy('created_at', 'desc')->paginate(5);

        return view('admin.handle-car', ['items' => $carList]);
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
        if (!$newCar) {
            return redirect(route('handle.car'));
        }
        Car::create($newCar);
        return redirect(route('handle.car'));
    }
    public function showEditScreen(Car $car)
    {
        return view('admin.edit-car', ['car' => $car]);
    }
    public function updateCar(Car $car, Request $request)
    {
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
        return redirect(route('handle.car'));
    }
    public function deleteCar(Car $car)
    {
        $car->delete();
        return redirect(route('handle.car'));
    }
}
