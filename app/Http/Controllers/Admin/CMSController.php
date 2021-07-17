<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CMSController extends Controller
{

    public function home_banner_page(){
        return view('admin.cms.home_banner');
    }

    public function advertisement_page(){
        return view('admin.cms.advertisement');
    }

    public function recipes_page(){
        return view('admin.cms.recipes');
    }

    public function news_events_page(){
        return view('admin.cms.news_events');
    }

    public function news_events_gallery_page(){
        return view('admin.cms.news_events_gallery');
    }

    public function meta_page(){
        return view('admin.cms.metas');
    }
}
