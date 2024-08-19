<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $products = Product::where('status', 'active')->paginate(8);
        $categories = Category::all();

        return view('welcome', compact('user', 'products', 'categories'));
    }

    public function filterProductHome(Request $request)
    {
        $user = Auth::user();
        $category_id = $request->category;
        $categories = Category::all();

        $products = Product::where('status', 'active')->when($category_id, function($query) use ($category_id) {
            $query->whereHas('categories', function($query) use ($category_id) {
                $query->where('category_id', $category_id);
        });
        })->paginate(8);

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

    public function addAvatar(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $user = Auth::user();

        if($user->avatar) {
            Storage::delete('public/user-ava' . $user->avatar);
        }

        $profile_picture = $request->file('profile_picture');
        $profile_picture_name = time() . '_' . $profile_picture->getClientOriginalName();
        $profile_picture->move(public_path('user-ava'), $profile_picture_name);

        $user->avatar = $profile_picture_name;
        $user->save();

        \toastr()->success('Avatar updated successfully');
        return redirect()->back();
    }
}
