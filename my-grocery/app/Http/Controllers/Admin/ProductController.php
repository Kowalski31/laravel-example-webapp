<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;
use App\Models\Product_picture;

class ProductController extends Controller
{
    // Start Product
    public function viewProduct()
    {
        $categories = Category::all();
        $products = Product::all();

        return view('admin.product', compact('categories', 'products'));
    }

    public function addProduct(Request $request) {
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

    public function editProduct(Request $request, $id){

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

    public function deleteProduct(Request $request, $id)
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
