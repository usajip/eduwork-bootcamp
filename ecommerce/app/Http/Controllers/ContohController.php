<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContohController extends Controller
{
    public function index()
    {
        $title = 'Contoh Halaman Blade';
        $products = ['Laptop', 'Keyboard', 'Mouse', 'Monitor'];
        // return view('contoh', ['products' => $products, 'title'=> $title]);
        return view('contoh', compact('products', 'title'));
    }

    public function coba(){
        $title = 'Coba Controller Blade';
        $ifLogin = false;
        $products = ['Laptop', 'Keyboard', 'Mouse', 'Monitor'];
        return view('coba', compact('title', 'ifLogin', 'products'));
    }
}
