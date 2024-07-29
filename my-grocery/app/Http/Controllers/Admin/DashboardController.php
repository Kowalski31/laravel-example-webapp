<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Category;
use App\Models\Product;
use App\Models\Product_picture;
use App\Models\Order;
use App\Models\Order_detail;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $product_quantity = Product::count();
        $order_quantity = Order::count();
        $category_quantity = Category::count();

        $top_5_products = Order_detail::select('product_id' , \DB::raw('sum(quantity) as total_quantity'))
            ->groupBy('product_id')
            ->orderBy('total_quantity', 'desc')
            ->limit(5)
            ->get();

        $top_products_name = array();
        $top_products_quantity = array();

        foreach ($top_5_products as $item){
            $product = Product::findOrFail($item->product_id);
            $top_products_name[] = $product->title;
            $top_products_quantity[] = $item->total_quantity;
        }

        return view('admin.dashboard', compact('user', 'product_quantity', 'order_quantity', 'category_quantity', 'top_products_name', 'top_products_quantity'));
    }

    // Start Category
    public function view_category()
    {
        $data = Category::all();
        return view('admin.categories', compact('data'));
    }

    public function add_category(Request $request){
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        toastr()->closeButton(true)->timeOut(2000)->success('Category added successfully');
        return redirect()->back();
    }

    public function delete_category($id){
        $category = Category::findOrFail($id);
        $category->delete();
        toastr()->closeButton(true)->timeOut(2000)->error('Category deleted successfully');
        return redirect()->back();
    }

    public function edit_category(Request $request, $id){
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->save();
        toastr()->closeButton(true)->timeOut(2000)->success('Category updated successfully');
        return redirect()->back();
    }
    // End Category


    // Start Product
    public function view_product()
    {
        $categories = Category::all();
        $products = Product::all();

        return view('admin.product', compact('categories', 'products'));
    }

    public function add_product(Request $request) {
        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->save();

        // Lưu product categories
        $product->categories()->sync($request->categories);


        $images = $request->images;
        if(!empty($images)) {

            foreach ($images as $image) {
                $name = time() . '-' . $image->getClientOriginalName();
                $image->move(public_path('images'), $name);

                $product_pics = new Product_picture();
                $product_pics->product_id = $product->id;
                $product_pics->link = $name;
                $product_pics->save();
            }
        }

        toastr()->closeButton(true)->timeOut(2000)->success('Product added successfully');
        return redirect()->back();
    }

    public function edit_product(Request $request, $id){

        $product_target = Product::findOrFail($id);
        $product_target->title = $request->title;
        $product_target->description = $request->description;
        $product_target->price = $request->price;
        $product_target->quantity = $request->quantity;
        $product_target->save();

        $product_target->categories()->sync($request->categories);


        $images = $request->images;
        if(!empty($images)) {

            foreach ($images as $image) {
                $name = time() . '-' . $image->getClientOriginalName();
                $image->move(public_path('images'), $name);

                $product_pics = new Product_picture();
                $product_pics->product_id = $product_target->id;
                $product_pics->link = $name;
                $product_pics->save();
            }
        }

        toastr()->closeButton(true)->timeOut(2000)->success('Product updated successfully');
        return redirect()->back();
    }

    public function delete_product(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $pictures_array = Product_picture::where('product_id', $product->id)->get();

        foreach ($pictures_array as $picture) {
            if (file_exists(public_path('images/' . $picture->link))) {
                unlink(public_path('images/' . $picture->link));
            }
            $picture->delete();
        }

        $product->categories()->detach();

        $product->delete();

        toastr()->closeButton(true)->timeOut(2000)->error('Product deleted successfully');
        return redirect()->back();
    }


}
