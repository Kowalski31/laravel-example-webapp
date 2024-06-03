<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __construct() {
       
    }

    // Hien thi danh sach chuyen muc
    public function index()
    {
        return view('/clients/categories/list');
    }

    // Phuong thuc GET
    public function getCategory($id=null) {
        return view('/clients/categories/edit');
    } 

    // Phuong thuc POST
    public function updateCategory($id=null) {
        return 'Submit sửa chuyên mục '. $id;
    }

    // Phuong thuc GET
    public function addCategory() {
        return view('/clients/categories/add');
    }

    // Phuong thuc POST
    public function handleAddCategory() {
        return 'Submit thêm chuyên mục';
    }

    // Phuong thuc DELETE
    public function deleteCategory($id){
        return 'Submit xóa chuyên mục: '.$id;
    }
}
