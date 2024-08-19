<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Product_picture;
use App\Models\Bank_account;
use App\Models\Order_detail;

class OrderController extends Controller
{

    // "customer_name" => "user"
    // "address" => "Number 11"
    // "country" => "USA"
    // "city" => "New York"
    // "zip" => "1231312"
    // "phone" => "0977823441"
    // "email" => "user@gmail.com"
    // "additional_info" => null
    // "payment_method" => "bank_transfer"
    public function order(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'zip' => 'required|string|max:7',
            'phone' => 'required|string|max:10',
            'payment_method' => 'required|string|max:255',
        ]);

        $user = Auth::user();

        // Tính tổng giá trị của giỏ hàng trực tiếp bằng Eloquent
        $sum_price = Cart::where('user_id', $user->id)->sum('price');

        // Sử dụng transaction để đảm bảo tính toàn vẹn dữ liệu
        DB::beginTransaction();

        try {
            // Tạo đơn hàng mới
            $order = new Order();
            $order->user_id = $user->id;
            $order->address = implode(', ', [$request->address, $request->city, $request->country, $request->zip]);
            $order->phone = $request->phone;
            $order->total_price = $sum_price;
            $order->receiver_name = $request->customer_name;
            $order->payment_type = $request->payment_method;
            $order->status = $request->payment_method == 'TRANSFER' ? 'APPROVED' : 'PENDING';

            // Thêm thông tin tài khoản ngân hàng nếu phương thức thanh toán là chuyển khoản
            if ($request->payment_method == 'TRANSFER') {
                $order->bank_id = $request->bank_account;
            }
            else
            {
                $order->bank_id = null;
            }

            $order->ship_money = 0;
            $order->save();

            // Lưu chi tiết đơn hàng và xóa các sản phẩm trong giỏ hàng
            $cartItems = Cart::where('user_id', $user->id)->get();

            foreach ($cartItems as $item) {
                Order_detail::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                ]);

                // Xóa sản phẩm khỏi giỏ hàng
                $item->delete();
            }

            // Gửi thông báo thành công
            toastr()->closeButton(true)->timeOut(2000)->success('Order placed successfully');

            DB::commit();


            return redirect()->route('welcome');
        } catch (\Exception $exception) {
            DB::rollBack();

            toastr()->closeButton(true)->timeOut(2000)->error('Order failed: ' . $exception->getMessage());
            dd($exception->getMessage());

            return redirect()->back()->withInput();
        }
    }

    public function checkout(Request $request)
    {
        $user = Auth::user();
        $carts = Cart::where('user_id', $user->id)->get();
        $bank_accounts = Bank_account::where('user_id', $user->id)->get();

        if($carts->count() == 0)
        {
            return redirect()->route('cart');
        }

        $total_price = 0;
        foreach($carts as $cart){
            $total_price = $total_price + $cart->price;
        }
        return view('home.checkout', compact('user', 'carts', 'total_price', 'bank_accounts'));
    }

}
