<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Socialite;
use App\User;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //Facebooklogin //////////////////// ->
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallback()
    {

        try {
            $user = Socialite::driver('facebook')->user();

        } catch (Exception $e) {
            return redirect('/');
        }

        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return redirect('/');
    }

    private function findOrCreateUser($facebookUser)
    {
        $authUser = User::where('facebook_id', $facebookUser->id)->first();

        if ($authUser){
            return $authUser;
        }


        $newUser = new User;
        $newUser->name = $facebookUser->name;
        $newUser->facebook_id = $facebookUser->id;
        $newUser->email = $facebookUser->email;
        $newUser->avatar = $facebookUser->avatar;
        $newUser->password = bcrypt('secret');
        $newUser->save();
        return $newUser;
        // return User::create([
        //     'name' => $facebookUser->name,
        //     'facebook_id' => $facebookUser->id,
        //     'avatar' => $facebookUser->avatar,
        //     'email' => $facebookUser->email,
        //     'password' => bcrypt('secret'),
        // ]);
    }

}
