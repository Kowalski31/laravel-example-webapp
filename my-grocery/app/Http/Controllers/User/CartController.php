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

class CartController extends Controller
{
    public function cart()
    {
        $user = Auth::user();

        $cart = Cart::where('user_id', $user->id)->get();

        // Tạo mảng để lưu subtotal cho từng sản phẩm trong giỏ hàng
        $item_subtotals = [];

        $subtotal = 0;
        foreach ($cart as $item) {
            $itemTotal = $item->quantity * $item->product->price;
            $item_subtotals[$item->id] = $itemTotal;
            $subtotal += $itemTotal;
        }

        $shipping_fee = 0; // Có thể thay đổi nếu cần
        $total = $subtotal + $shipping_fee;

        $cart_count = Cart::where('user_id', $user->id)->count();

        return view('home.cart', compact('user', 'cart', 'cart_count', 'subtotal', 'total', 'item_subtotals'));
    }


    public function addCart(Request $request, $id)
    {

        // $user = Auth::user();
        // $existed_cart = Cart::where('product_id', $id)->where('user_id', $user->id)->first();


        // $product_price = Product::where('id', $id)->first()->price;

        // if(!empty($existed_cart)){
        //     $quantity_check = $request->quantity;

        //     if(!empty($quantity_check)){
        //         $existed_cart->quantity = $existed_cart->quantity + $quantity_check;
        //         $existed_cart->price = $existed_cart->quantity * $product_price;
        //         $existed_cart->save();
        //     }else{
        //         $existed_cart->quantity = $existed_cart->quantity + 1;
        //         $existed_cart->price = $existed_cart->price + $product_price;
        //         $existed_cart->save();
        //     }
        //     toastr()->closeButton(true)->timeOut(2000)->success('product added');
        //     return redirect()->back();
        // }

        // $cart = new Cart();
        // $cart->product_id = $id;
        // $cart->user_id = $user->id;

        // $quantity_check = $request->quantity;
        // if(!empty($quantity_check)){
        //     $cart->quantity = $request->quantity;
        //     $cart->price = $request->quantity * $product_price;
        // }else{
        //     $cart->quantity = 1;
        //     $cart->price = $product_price;
        // }

        // $cart->link = Product_picture::where('product_id', $id)->first()->link;
        // $cart->save();

        // toastr()->closeButton(true)->timeOut(2000)->success('product added successfully');
        // return redirect()->back();

        $user = Auth::user();

        // Sử dụng transaction để đảm bảo tính nhất quán
        DB::transaction(function () use ($user, $request, $id) {

            // Tìm sản phẩm trong giỏ hàng của người dùng hiện tại
            $existed_cart = Cart::where('product_id', $id)
                                ->where('user_id', $user->id)
                                ->first();


            // Truy xuất giá sản phẩm và liên kết hình ảnh trong một lần truy vấn
            $product = Product::with('pictures')->findOrFail($id);
            $product_price = $product->price;
            $product_link = $product->pictures->first()->link ?? '';

            if ($existed_cart) {
                // Nếu sản phẩm đã tồn tại trong giỏ hàng, cập nhật số lượng và giá
                $quantity = $request->quantity ?? 1;
                $existed_cart->quantity += $quantity;
                $existed_cart->price = $existed_cart->quantity * $product_price;
                $existed_cart->save();
            } else {
                // Nếu sản phẩm chưa có trong giỏ hàng, tạo mới
                $cart = new Cart();
                $cart->product_id = $id;
                $cart->user_id = $user->id;
                $cart->quantity = $request->quantity ?? 1;
                $cart->price = $cart->quantity * $product_price;
                $cart->link = $product_link;
                $cart->save();
            }

            toastr()->closeButton(true)->timeOut(2000)->success('Product added successfully');
        });

        return redirect()->back();

    }

    public function deleteCartProduct($id)
    {
        $user = Auth::user();

        // Tìm sản phẩm trong giỏ hàng và xác thực quyền sở hữu
        $cart = Cart::where('id', $id)->where('user_id', $user->id)->firstOrFail();

        $cart->delete();

        $subtotal = Cart::where('user_id', $user->id)->sum('price');
        $total = $subtotal;
        $cartCount = Cart::where('user_id', $user->id)->count();

        return response()->json([
            'subtotal' => $subtotal,
            'total' => $total,
            'cartCount' => $cartCount
        ]);

    }

    public function updateQuantity(Request $request, $id)
    {
    //    $cart = Cart::findOrFail($id);

    //     // Cập nhật số lượng sản phẩm
    //     $cart->quantity = $request->input('quantity');
    //     $cart->price = $cart->quantity * $cart->product->price; // Cập nhật giá trị của sản phẩm
    //     $cart->save();

    //     // Tính toán lại tổng giá trị của sản phẩm
    //     $itemTotal = $cart->price;

    //     // Cập nhật subtotal và total cho giỏ hàng
    //     $subtotal = Cart::sum('price');
    //     $total = $subtotal;

    //     // Trả về phản hồi JSON
    //     return response()->json([
    //         'itemTotal' => $itemTotal,
    //         'subtotal' => $subtotal,
    //         'total' => $total
    //     ]);

    $cart = Cart::findOrFail($id);

    // Cập nhật số lượng sản phẩm
    $cart->quantity = $request->input('quantity');
    $cart->price = $cart->quantity * $cart->product->price; // Cập nhật giá trị của sản phẩm
    $cart->save();


    $itemTotal = $cart->price;


    $cartItems = Cart::all();
    $subtotal = $cartItems->sum(function ($item) {
        return $item->quantity * $item->product->price;
    });


    $total = $subtotal;


    return response()->json([
        'itemTotal' => $itemTotal,
        'subtotal' => $subtotal,
        'total' => $total,
    ]);
    }

}
