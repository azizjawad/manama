<?php

namespace App\Http\Controllers;

use App\Models\HomepageBannersModel;
use App\Models\RecipeModel;
use Illuminate\Http\Request;

class WebsiteController extends Controller
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

    public function recipe_corner(){
        $data['recipes'] = RecipeModel::all();
        return view('website.recipe_corner', $data);
    }

    public function about_us(){
        return view('website.about_us');
    }

    public function contact_us(){
        return view('website.contact_us');
    }

    public function customer_testimonials(){
        return view('website.customer_testimonials');
    }

    public function our_distributors(){
        return view('website.our_distributors');
    }

    public function tips_techniques(){
        return view('website.tips_techniques');
    }

    public function tips_techniques_single(){
        return view('website.tips_techniques_single');
    }

    public function payment_fail(){
        return view('website.payment_fail');
    }

    public function support_center(){
        return view('website.support_center');
    }

    public function shipping_policy(){
        return view('website.shipping-policy');
    }

    public function terms_and_conditions(){
        return view('website.terms-and-conditions');
    }


}
