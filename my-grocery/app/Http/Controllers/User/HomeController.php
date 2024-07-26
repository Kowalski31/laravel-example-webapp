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

        $cart_count = Cart::where('user_id', $user->id)->count();

        return view('home.cart', compact('user', 'cart', 'cart_count'));
    }

    public function checkout(Request $request)
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->get();
        $bank_accounts = Bank_account::where('user_id', $user->id)->get();

        if($cart->count() == 0)
        {
            return redirect()->route('cart');
        }

        $total_price = 0;
        foreach($cart as $c){
            $total_price = $total_price + $c->price;
        }
        return view('home.checkout', compact('user', 'cart', 'total_price', 'bank_accounts'));
    }

    public function delete_CartProduct($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();

        toastr()->closeButton(true)->timeOut(2000)->info('product deleted successfully');
        return redirect()->back();
    }

    public function order(Request $request)
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->get();

        $order = new Order();
        $order->user_id = $user->id;
        $customer_address = $request->address . ', ' . $request->city . ', ' . $request->country . ', ' . $request->zip;
        $order->address = $customer_address;
        $order->phone = $request->phone;

        $sum_price = 0;
        foreach($cart as $c){
            $sum_price = $sum_price + $c->price;
        }
        $order->total_price = $sum_price;

        $order->receiver_name = $request->customer_name;

        $order->payment_type = $request->payment_method;
        $order->status = 'PENDING';

        if($request->payment_method == 'TRANSFER')
        {
            $order->bank_id = $request->bank_account;
            $order->status = 'APPROVED';
        }

        $order->ship_money = 0;
        $order->save();

        foreach($cart as $c){
            $order_detail = new Order_detail();
            $order_detail->order_id = $order->id;
            $order_detail->product_id = $c->product_id;
            $order_detail->quantity = $c->quantity;
            $order_detail->price = $c->price;
            $c->delete();
            $order_detail->save();
        }

        // "customer_name" => "user"
        // "address" => "Number 11"
        // "country" => "USA"
        // "city" => "New York"
        // "zip" => "1231312"
        // "phone" => "0977823441"
        // "email" => "user@gmail.com"
        // "additional_info" => null
        // "payment_method" => "bank_transfer"

        toastr()->closeButton(true)->timeOut(2000)->success('order placed successfully');
        return redirect()->route('welcome');
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
        $order = Order::where('user_id', $user->id)->first();
        dd($order->id);
        // $orders_detail = Order_detail::where('order_id', $order->id)->get();
        return view('home.history', compact('user', 'orders_detail'));
    }
}
