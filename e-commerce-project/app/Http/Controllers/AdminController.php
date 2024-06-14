<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;
use App\Models\Order;

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

    public function edit_product($id)
    {
        $data = Product::find($id);
        $category = Category::all();
        return view('admin.edit_product', compact('data', 'category'));
    }

    public function update_product(Request $request, $id)
    {
        $data = product::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;

        $data->image = $request->image;

        $image = $request->image;
        if ($image){
            $imagename = time().'.'.$image->getClientOriginalExtension(); 
            
            $request->image->move('products', $imagename);
            
            $data->image = $imagename;
        }
            
        $data->save();
        
        toastr()->closeButton(true)->timeOut(2000)->success('Product Updated Successfully');
        return redirect()->back();
    }

    public function product_search(Request $request)
    {
        $search = $request->search;
        $data = Product::where('title', 'LIKE', '%'.$search.'%')->orWhere('category', 'LIKE', '%'.$search.'%')->paginate(3);

        return view('admin.view_product', compact('data'));
    }

    public function view_order() 
    {
        $data = Order::all();
        return view('admin.view_order', compact('data'));
    }

    public function on_the_way($id)
    {
        $data = Order::find($id);

        $data->status = 'On The Way';

        $data->save();

        return redirect('view_order');
    }

    public function delivered($id)
    {
        $data = Order::find($id);

        $data->status = 'Delivered';

        $data->save();

        return redirect('view_order');
    }

    public function print_pdf($id)
    {
        
    }
}

