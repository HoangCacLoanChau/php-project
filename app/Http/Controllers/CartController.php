<?php

namespace App\Http\Controllers;
use Cart;
use session;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //view cart
    public function cart()
    {
        $userId = auth()->user()->id;
        $items = Cart::session($userId)->getContent()->sort();
        $total = Cart::session($userId)->getTotal();
        $cartTotalQuantity = Cart::session($userId)->getTotalQuantity() ?? 0;
        return view('user.cart', compact('items', 'total', 'cartTotalQuantity'));
    }
    // add cart
    public function addCart($carId)
    {
        $userId = auth()->user()->id;
        $cars = Car::findOrFail($carId);

        \Cart::session($userId)->add([
            'id' => $carId,
            'name' => $cars->car_name,
            'price' => $cars->price,
            'quantity' => 1,
            'attributes' => [
                'company' => $cars->company,
                'image' => $cars->image,
            ],
            'associatedModel' => $cars,
        ]);
        toast('Item has been added to cart','success');
        return redirect('/')->with('success', 'Item has been added to cart');
    }
    //add quantity
    public function increaseQuantity($carId)
    {
        $userId = auth()->user()->id;
        Cart::session($userId)->update($carId, ['quantity' => +1]);
        return redirect()->back()->with('success', 'quantity has been increased');
    }
    //decrease quantity
    public function decreaseQuantity($carId)
    {
        $userId = auth()->user()->id;
        $quantity = Cart::session($userId)->get($carId, ['quantity']);
        Cart::session($userId)->update($carId, ['quantity' => -1]);

        return redirect()->back()->with('success', 'quantity has been decreased');
    }
    //remove item
    public function removeCart($carId)
    {
        $userId = auth()->user()->id;
        Cart::session($userId)->remove($carId);
        return back()->with('remove', 'remove successfully');
    }
    //clear cart
    public function clearCart()
    {
        $userId = auth()->user()->id;
        Cart::session($userId)->clear();
        return back()->with('checkout', 'Checkout successfully.Thank you for shopping at our store 😘');

    }
}
