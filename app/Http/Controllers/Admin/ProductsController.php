<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{

    public function products_index_page(){
        return view('admin.products.index');
    }

    public function products_add_page(){
        return view('admin.products.add');
    }

    public function products_bestseller_page(){
        return view('admin.products.bestseller');
    }

    public function products_price_page(){
        return view('admin.products.price');
    }

    public function products_gallery_page(){
        return view('admin.products.gallery');
    }

    public function products_visibility_page(){
        return view('admin.products.visibility');
    }
}
