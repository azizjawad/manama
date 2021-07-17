<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function category_index_page(){
        return view('admin.category.index');
    }

    public function category_add_page(){
        return view('admin.category.add');
    }

    public function category_image_page(){
        return view('admin.category.image');
    }
}
