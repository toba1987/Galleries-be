<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('jwt.auth')->only('logout');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        try{
            if(!$token = \JWTAuth::attempt($credentials))
            {
               //   \Log::info($token);
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        }catch(Exception $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        $user = \Auth::user();

        return response()->json(['token' => $token, 'user' => $user]);
    }
}
