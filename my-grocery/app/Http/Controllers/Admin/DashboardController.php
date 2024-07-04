<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Category;


class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.dashboard', compact('user'));
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

    public function update_category(Request $request, $id){
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        
        toastr()->closeButton(true)->timeOut(2000)->success('Category updated successfully');
        return redirect()->route('category');
    }

    public function view_product()
    {
        return view('admin.product');
    }
}
