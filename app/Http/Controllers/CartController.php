<?php

namespace App\Http\Controllers;

use App\Models\CartDetail;
use App\Models\CartHeader;
use App\Models\Food;
use App\Models\TransactionHeader;
use App\Models\TransactionDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function viewCart()
    {
        $carts = CartDetail::where('CartID', session('cart')->getAttributes()['CartID'])->get();
        return view('pages.cart.cart', ['carts' => $carts]);
    }

    public function cartRouter()
    {
        return view('pages.cart.cart');
    }

    public function checkoutRouter()
    {
        return view('pages.checkout.checkout');
    }

    public function addToCart(Request $request)
    {

        $cart = CartDetail::where('CartID', '=', session('cart')->getAttributes()['CartID'])->where('FoodID', '=', $request->FoodID)->first();

        if(!$cart){
            $newCart = new CartDetail();
            $newCart->CartID = session('cart')->getAttributes()['CartID'];
            $newCart->FoodID = $request->FoodID;
            $newCart->Quantity = 1;
            $newCart->save();
        } else{
            $cart->Quantity++;
            $cart->save();
        }



        session()->flash('success', 'Foods are successfully added to cart');
        return back();
    }

    public function deleteFromCart(Request $request)
    {
        $food = CartDetail::where('CartID', session('cart')->getAttributes()['CartID'])->where('FoodID', $request->input('FoodID'))->first();
        if (!$food) {
            // Cart item not found
            return back()->with('error', 'Cart item not found.');
        }
        $food->delete();
        return back()->with('success', 'Cart item deleted successfully.');
    }

    public function checkOutValidation(Request $request)
    {
        //TODO ASDSAD
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:5',
            'phone' => 'required|min:8',
            'address' => 'required|min:5',
            'city' => 'required|min:5',
            'card_name' => 'required|min:5',
            'card_number' => 'required|min:16',
            'country' => 'required',
            'zip' => 'nullable|numeric',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Delete cart items


        // Create transaction header
        $temp = mt_rand(100, 999);
        $transactionHeader = new TransactionHeader();
        $transactionHeader->TransactionID = 'TR'.$temp;
        $transactionHeader->UserID = session('user')->getAttributes()['UserID'];
        $transactionHeader->TransactionDate = date('Y-m-d H:i:s');
        $transactionHeader->save();

        // Create transaction details from cart items
        $cartItems = CartDetail::where('CartID', session('cart')->getAttributes()['CartID'])->get();
//        dd(session('cart')->getAttributes()['CartID']);
//        dd($transactionHeader);
        foreach ($cartItems as $cartItem) {
            $transactionDetail = new TransactionDetail();
            $transactionDetail->TransactionID = 'TR'.$temp;
            $transactionDetail->FoodID = $cartItem->FoodID;
            $transactionDetail->Quantity = $cartItem->Quantity;
            $transactionDetail->save();
        }
        CartDetail::where('CartID', session('cart')->getAttributes()['CartID'])->delete();
        return redirect('home');
    }

    public function editQuantity(Request $request){

        $cart = CartDetail::where('CartID', '=', $request->cart_id)->where('FoodID', '=', $request->food_id)->first();

        if($request->action_type === "decrease"){
            if(!($cart->Quantity === 1)) $cart->Quantity = --$cart->Quantity;
        }
        else if($request->action_type === "increase"){
            $cart->Quantity = ++$cart->Quantity;
        }
        $cart->save();

        return back();
    }
}

