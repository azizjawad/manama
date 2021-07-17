<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewsController extends Controller
{

    public function new_reviews_page(){
        return view('admin.reviews.new');
    }

    public function moderated_reviews_page(){
        return view('admin.reviews.moderated');
    }
}
