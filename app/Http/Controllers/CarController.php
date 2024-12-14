<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function viewCar(){
    $carList = [];
    // if (auth()->check()) {
    //     $carList = auth()->user()->usersCar()->latest()->get();
    // }else{
        $carList = Car::all()->sort();
    // }
    return view('home', ['cars' => $carList]);
    }
    public function createCar(Request $request)
    {
        $newCar = $request->validate([
            'car_name' => 'required',
            'company' => 'required',
            'price' => 'required',
            'image' => 'nullable',
            'description' => 'nullable',
        ]);
        //  not allow to add code like <> to db

        $newCar['car_name'] = strip_tags($newCar['car_name']);
        $newCar['company'] = strip_tags($newCar['company']);
        $newCar['price'] = strip_tags($newCar['price']);
        $newCar['image'] = strip_tags($newCar['image']);
        $newCar['description'] = strip_tags($newCar['description']);

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
        if (auth()->user()->id !== $car['user_id']) {
            return redirect('/');
        }
        $updateCar = $request->validate([
            'car_name' => 'required',
            'company' => 'required',
            'price' => 'required',
            'image' => 'nullable',
            'description' => 'nullable',

        ]);
        //  not allow to add code like <> to db
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
        if (auth()->user()->id !== $car['user_id']) {
            return redirect('/');
        }
        $car->delete();
        return redirect('/');

    }
  
}