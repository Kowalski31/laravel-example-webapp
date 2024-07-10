<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Category;
use App\Models\Product;
use App\Models\Product_picture;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $product = Product::count();
        return view('admin.dashboard', compact('user', 'product'));
    }

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
        $category = Category::find($id);
        $category->delete();
        toastr()->closeButton(true)->timeOut(2000)->error('Category deleted successfully');
        return redirect()->back();
    }

    public function edit_category(Request $request, $id){
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        toastr()->closeButton(true)->timeOut(2000)->success('Category updated successfully');
        return redirect()->back();
    }

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

        toastr()->closeButton(true)->timeOut(2000)->success('Product added successfully');
        return redirect()->back();
    }

    public function edit_product(Request $request, $id){

        $product_target = Product::find($id);
        $product_target->title = $request->title;
        $product_target->description = $request->description;
        $product_target->price = $request->price;
        $product_target->quantity = $request->quantity;
        $product_target->save();

        // Update product categories
        $product_target->categories()->sync($request->categories);

        // Xử lý ảnh sản phẩm
        $images = $request->images;
        if($images) {
            // Lưu ảnh vào cơ sở dữ liệu
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
        $product = Product::find($id);
        $product->delete();

        toastr()->closeButton(true)->timeOut(2000)->error('Product deleted successfully');
        return redirect()->back();
    }
}
