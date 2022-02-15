<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\CartModel;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function credentials(Request $request)
    {
        $user = User::where('email', $request->email)->select('id','role')->first();

        if ($user->role == 'admin'){
            $request->session()->forget('guest_user_id');
        }

        if ($request->session()->get('guest_user_id')){
            $user_id = $request->session()->get('guest_user_id');
            CartModel::where('user_id', $user_id)->update(['user_id' => $user->id]);
        }

        if (isset($request->login_from) && $request->login_from == 'default-login' && $user->role == 'admin'){
            return [];
        }else {
            return [
                'email' => $request->email,
                'password' => $request->password,
                'status' => 1,
            ];
        }
    }
}
