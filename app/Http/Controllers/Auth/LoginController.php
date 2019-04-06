<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        $valid = Validator::make($request->all(),[
            $this->username() => 'required|string',
            'password' => 'required|string',
        ],[
            'login.required'=>'Введите логин' ,
            'password.required'=>'Введите пароль'
        ]);
        if (!$valid->fails()) {
            if ($this->attemptLogin($request)) {
                $user = $this->guard()->user();
                return response()->json([
                    'status' => true,
                    'token' => $user->generateToken()
                ])->setStatusCode(200, 'Successful');
            } else {
                return response()->json(['status' => false, 'message' => ['login' => 'Логин или пароль введен неверно']])->setStatusCode('400', 'Invalid data');
            }
        }else{
            return response()->json([
                'status'=>false,
                'message'=>$valid->errors()
            ]);
        }
    }
}
