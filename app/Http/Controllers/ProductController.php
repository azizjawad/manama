<?php

namespace App\Http\Controllers;

use App\Models\NewsEventModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index_page()
    {
        return view('website/products');
    }

    public function category_page()
    {
        return view('website/category');
    }

}
