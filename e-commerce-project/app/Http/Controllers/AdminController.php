<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::all();
        return view('admin.category', compact('data'));
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
        toastr()->closeButton(true)->timeOut(1000)->success('Category Added Successfully');
        return redirect()->back();
    }

    public function delete_category($id)
    {
        $category = Category::find($id);

        $category->delete();

        toastr()->closeButton(true)->timeOut(1000)->warning('Category Deleted Successfully');

        return redirect()->back();
        
    }
}

