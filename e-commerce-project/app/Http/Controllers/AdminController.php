<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::all();
        return view('admin.category', compact('data'));
    }
    
    public function delete_category($id)
    {
        $category = Category::find($id);

        $category->delete();

        toastr()->closeButton(true)->timeOut(1000)->warning('Category Deleted Successfully');

        return redirect()->back();

    }


    public function add_category(Request $request)
    {
        $category = new Category;
        $category->category_name = $request->category;
        $category->save();

        // toastr()->success('');
        // toastr()->error('');
        // toastr()->warning('');
        // toastr()->info('');
        toastr()->closeButton(true)->timeOut(2000)->success('Category Added Successfully');
        return redirect()->back();
    }

    public function edit_category($id)
    {
        $data = Category::find($id);
        return view('admin.edit_category', compact('data'));
    }

    public function update_category(Request $request, $id)
    {
        $data = Category::find($id);
        $data['category_name'] = $request->category;
        $data->save();

        toastr()->closeButton(true)->timeOut(2000)->success('Category Updated Successfully');
        return redirect('view_category');
    }
    
    public function add_product()
    {
        $category = Category::all();
        return view('admin.add_product', compact('category')); 
    }

    public function upload_product(Request $request)
    {
        $product = new Product;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->image = $request->image;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->quantity = $request->quantity;

        $image = $request->image;

        if ($image){
            $imagename = time().'.'.$image->getClientOriginalExtension(); 
        
            $request->image->move('products', $imagename);

            $product->image = $imagename;
        }

        $product->save();

        toastr()->closeButton(true)->timeOut(2000)->success('Product Added Successfully');
        return redirect()->back();
    }

    public function view_product()
    {
        $data = product::paginate(3);
        return view('admin.view_product', compact('data'));
    }

    public function delete_product($id)
    {
        $product = Product::find($id);

        $image_path = public_path('products/'.$product->image);

        if(file_exists($image_path))
        {
            unlink($image_path);
        }

        $product->delete();

        toastr()->closeButton(true)->timeOut(1000)->warning('Product Deleted Successfully');

        return redirect()->back();

    }

}

