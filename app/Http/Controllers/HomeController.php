<?php

namespace App\Http\Controllers;

use App\Models\HomepageBannersModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->middleware('auth');

        return view('home');
    }

    public function homepage(){
        $data['banners'] = HomepageBannersModel::orderBy('banner_location')->get();

        return view('welcome', $data);
    }

}
