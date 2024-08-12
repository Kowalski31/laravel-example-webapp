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
use App\Models\Bank_account;
use App\Models\Order_detail;

class HomeController extends Controller
{

    public function welcome()
    {
        $user = Auth::user();
        $products = Product::all();
        $categories = Category::all();

        return view('welcome', compact('user', 'products', 'categories'));
    }

    public function productDetail($id)
    {
        $user = Auth::user();
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('home.product_detail', compact('user', 'product', 'categories'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('home.profile', compact('user'));
    }

    public function history()
    {
        $user = Auth::user();

        $orders = Order::with('order_detail')->where('user_id', $user->id)->get();

        $order_details = array();
        foreach($orders as $order) {
            $order_details[$order->id] = $order->order_detail;
        }

        return view('home.history', compact('user', 'orders', 'order_details'));
    }


}
