<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;



class HomeController extends Controller
{
    public function index(){
        $title = 'Mobilesuit Gundam';
        $content = 'Gundam: Exia - Pilot: Setsuna F. Seiei';
        
        // [
        //     'title' => $title,
        //     'content' => $content,
        // ]
        // compact('title', 'content')
        
        return view('home')->with(['title' => $title, 'content' => $content]);

        // return View::make('home', compact('title', 'content'));

        // $contentView = view('home');
    }

    public function getProductDetail($id){
        return view('clients.products.detail', compact('id'));
    }

}
