<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    // Start Category
    public function viewCategory()
    {
        $data = Category::paginate(5);
        return view('admin.categories', compact('data'));
    }

    public function addCategory(Request $request){

        $request->validate([
            'name' => 'required|string|max:255|unique:categories'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        toastr()->closeButton(true)->timeOut(2000)->success('Category added successfully');
        return redirect()->back();
    }

    public function deleteCategory($id){
        $category = Category::findOrFail($id);
        $category->delete();
        toastr()->closeButton(true)->timeOut(2000)->error('Category deleted successfully');
        return redirect()->back();
    }

    public function editCategory(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->save();
        toastr()->closeButton(true)->timeOut(2000)->success('Category updated successfully');
        return redirect()->back();
    }
    // End Category
}
