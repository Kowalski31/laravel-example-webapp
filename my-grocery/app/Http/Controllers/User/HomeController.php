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

    public function view_bank()
    {
        $user = Auth::user();
        $bank_accounts = Bank_account::where('user_id', $user->id)->get();

        return view('home.bank_account', compact('user', 'bank_accounts'));
    }

    public function add_bank(Request $request)
    {
        $user = Auth::user();

        $bank = new Bank_account();
        $bank->user_id = $user->id;

        $bank->bank_name = $request->bank_name;

        $bank->account_number = $request->account_number;
        $bank->save();

        toastr()->closeButton(true)->timeOut(2000)->success('bank account added successfully');
        return redirect()->back();
    }

    public function edit_bank(Request $request, $id)
    {
        $bank_account = Bank_account::findOrFail($id);
        $bank_account->bank_name = $request->bank_name;
        $bank_account->account_number = $request->account_number;
        $bank_account->save();

        toastr()->closeButton(true)->timeOut(2000)->success('bank account updated successfully');
        return redirect()->back();
    }

    public function delete_bank($id)
    {
        $bank_account = Bank_account::findOrFail($id);
        $bank_account->delete();

        toastr()->closeButton(true)->timeOut(2000)->info('bank account deleted successfully');
        return redirect()->back();
    }

    public function history()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id);
        $order_detail = array();

        if($orders->count() > 0){
            $orders = $orders->get();
            foreach($orders as $order){
                $order_details[$order->id] = Order_detail::where('order_id', $order->id)->get();
            }
        }

        // dd($order_detail);

        return view('home.history', compact('user', 'orders', 'order_details'));
    }


}
