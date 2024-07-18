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
}
