<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use User;
use Auth;
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
    /**
     * redirect user to the appropriate social login page.
     * @param unknow
     * @return void
     */
    public function socialLogin($social)
    {
        return Socialite::driver($social)->redirect();
    }
    /**
     * work as a callback function.
     * @param unknow
     * @return void
     */
    public function handleProviderCallback($social)
    {
        $userSocial = Socialite::driver($social)->user();
        $user =User::where(['email' => $userSocial->getEmail()])->first();
        /**
         * if the user exists it authenticates itand will redirect to home
         * And uf the user is not exists will redirect to the Register page
         */
        if ($user) {
            Auth::login($user);
            return redirect()->action('HomeController@index');
        } else {
            return view('auth.register',['name' => $userSocial->getName()
                                    ,'email' => $userSocial->getEmail()]);
        }
    }
}
