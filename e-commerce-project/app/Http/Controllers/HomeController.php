<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\User;
use App\Models\Cart;

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
}
