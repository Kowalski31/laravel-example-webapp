<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Product;
use App\Models\Category;


class HomeController extends Controller
{
    public function home($id = null)
    {
        $users = Auth::user();
        $products = Product::all();
        $categories = Category::all();

        return view('home.home', compact('users', 'products', 'categories'));
    }

    public function welcome()
    {
        $users = Auth::user();
        $products = Product::all();
        $categories = Category::all();
        return view('welcome', compact('users', 'products', 'categories'));
    }
}
