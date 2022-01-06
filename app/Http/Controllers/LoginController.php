<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cookie;
class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Support\Renderable|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function index()
    {
       try {
            $link_referral = Cookie::get('link_referral');
            if( $link_referral ){
                $link_referral = json_decode($link_referral);
                Cookie::queue( 'link_referral', null, 10);
                Cookie::forget('link_referral');
                if(isset($link_referral->redirectTo) && isset($link_referral->reference_type)){
                    $productInfo = isset($link_referral->product_info_id) ? $link_referral->product_info_id: false;
                    $reference_type = isset($link_referral->reference_type) ? $link_referral->reference_type: false;
                    $data = [
                        'product_info_id' => $productInfo,
                        'reference_type' => $reference_type,
                    ];
                    return redirect($link_referral->redirectTo)->with($data);
                }
            }
       } catch (\Exception $e) {
            Log::critical("Oops!! some error occured while fetching cookie");
            Log::critical($e);
        }
        if(\Auth::user()->role == 'admin'){
            return redirect('/dashboard');
        }
        return redirect('/');
    }
}
