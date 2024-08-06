<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Category;
use App\Models\Product;
use App\Models\Product_picture;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $product_quantity = Product::count();
        $order_quantity = Order::count();
        $category_quantity = Category::count();

        // $top_5_products = Order_detail::select('product_id' , DB::raw('sum(quantity) as total_quantity'))
        //     ->groupBy('product_id')
        //     ->orderBy('total_quantity', 'desc')
        //     ->limit(5)
        //     ->get();

        // foreach ($top_5_products as $item){
        //     $product = Product::findOrFail($item->product_id);
        //     $top_products_name[] = $product->title;
        //     $top_products_quantity[] = $item->total_quantity;
        // }

        $top_5_products = DB::table('order_details')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->select('products.title', 'order_details.quantity as total_quantity')
            ->orderBy('total_quantity', 'desc')
            ->limit(5)
            ->get();

        $top_products_name = $top_5_products->pluck('title')->toArray();
        $top_products_quantity = $top_5_products->pluck('total_quantity')->toArray();

        return view('admin.dashboard', compact('user', 'product_quantity', 'order_quantity', 'category_quantity', 'top_products_name', 'top_products_quantity'));
    }

}
