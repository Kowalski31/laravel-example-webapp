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

        toastr()->closeButton(true)->timeOut(1000)->success('Category Updated Successfully');
        return redirect('view_category');
    }
    
    public function add_product()
    {
        return view('admin.add_product'); 
    }

}

