<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Product_picture;

class HomeController extends Controller
{

    public function welcome()
    {
        $user = Auth::user();
        $products = Product::all();
        $categories = Category::all();
        return view('welcome', compact('user', 'products', 'categories'));
    }

    public function product_detail($id)
    {

        $user = Auth::user();
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('home.product_detail', compact('user', 'product', 'categories'));
    }

    public function add_cart(Request $request, $id){

        $user = Auth::user();
        $existed_cart = Cart::where('product_id', $id)->where('user_id', $user->id)->first();

        if(!empty($existed_cart)){
            $quantity_check = $request->quantity;

            if(!empty($quantity_check)){
                $existed_cart->quantity = $existed_cart->quantity + $quantity_check;
                $existed_cart->price = $existed_cart->price + ($quantity_check * Product::where('id', $id)->first()->price);
                $existed_cart->save();
            }else{
                $existed_cart->quantity = $existed_cart->quantity + 1;
                $existed_cart->price = $existed_cart->price + Product::where('id', $id)->first()->price;
                $existed_cart->save();
            }
            toastr()->closeButton(true)->timeOut(2000)->success('product added');
            return redirect()->back();
        }

        $cart = new Cart();
        $cart->product_id = $id;
        $cart->user_id = $user->id;

        $quantity_check = $request->quantity;
        if(!empty($quantity_check)){
            $cart->quantity = $request->quantity;
            $cart->price = $request->quantity * Product::where('id', $id)->first()->price;
        }else{
            $cart->quantity = 1;
            $cart->price = Product::where('id', $id)->first()->price;
        }

        $cart->link = Product_picture::where('product_id', $id)->first()->link;
        $cart->save();

        toastr()->closeButton(true)->timeOut(2000)->success('product added successfully');
        return redirect()->back();
    }

    public function cart()
    {
        $user = Auth::user();

        $cart = Cart::where('user_id', $user->id)->get();
        return view('home.cart', compact('user', 'cart'));
    }

    public function checkout()
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->get();

        return view('home.checkout', compact('user', 'cart'));
    }
}
