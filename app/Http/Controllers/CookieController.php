<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;
use Log;

class CookieController extends Controller
{
    public function createCookie(Request $request)
    {
        try {
            Log::info( $request->post('cookie_name'));
            $cookie_value = json_encode( $request->post('cookie_value') );
            $cookie_name = $request->post('cookie_name');
            \Cookie::queue( $cookie_name, $cookie_value, 10);
            return response()->json(['success' => false, 'message' => 'cookie created successfully'], 200);
        } catch (\Exception $e) {
            Log::critical("Oops!! some error occured while creating cookie");
            Log::critical($e);
        }
    }
    public function getCookie($sesion_name)
    {
        try {
            return response()->json(['success' => false, 'data' => Cookie::get($sesion_name)], 200);
        } catch (\Exception $e) {
            Log::critical("Oops!! some error occured while fetching cookie");
            Log::critical($e);
        }
    }
}
