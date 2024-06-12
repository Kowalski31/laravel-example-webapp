<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        
        return view('admin.index');
    }
    
    public function home() {
        $product = Product::all();

        if(Auth::id())
        {
            $user = Auth::user();
            $count = Cart::where('user_id', $user->id)->count();
        }
        else
        {
            $count = '';
        }
        return view('home.index', compact('product', 'count'));
    }

    public function login_home() {
        $product = Product::all();

        $user = Auth::user();
        $count = Cart::where('user_id', $user->id)->count();
        
        return view('home.index', compact('product', 'count'));
    }

    public function product_details($id) {
        $data = Product::find($id);

        if(Auth::id())
        {
            $user = Auth::user();
            $count = Cart::where('user_id', $user->id)->count();
        }
        else
        {
            $count = '';
        }

        return view('home.product_details', compact('data', 'count'));
    }

    public function add_cart($id) {
        $product_id = $id;

        $user = Auth::user();

        $user_id = $user->id;

        $data = new Cart();

        $data->user_id = $user_id;

        $data->product_id = $product_id;

        $data->save();

        toastr()->closeButton(true)->timeOut(2000)->success('Product Added to Cart Successfully');

        return redirect()->back();
    }

    public function mycart(){

        if(Auth::id())
        {
            $user = Auth::user();

            $count = Cart::where('user_id', $user->id)->count();

            $cart = Cart::where('user_id', $user->id)->get();
        }
        

        return view('home.mycart', compact('count', 'cart'));
    }

    public function delete_cart($id) {
        $data = Cart::find($id);

        $data->delete();

        toastr()->closeButton(true)->timeOut(2000)->warning('Product Deleted from Cart Successfully');

        return redirect()->back();
    }

    public function confirm_order(Request $request) {
        
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;
        $user_id = Auth::user()->id;
        $cart = Cart::where('user_id', $user_id)->get();

        foreach($cart as $data)
        {
            $order = new Order();

            $order->user_id = $user_id;
            $order->product_id = $data->product_id;

            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;

            $order->save();

        }
        
        $cart_remove = Cart::where('user_id', $user_id)->get();

        foreach($cart_remove as $item)
        {
            $data = Cart::find($item->id);
            $data->delete();
        }


        toastr()->closeButton(true)->timeOut(2000)->success('Order Confirmed Successfully');
        return redirect()->back();
        
    }
}
