<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Socialite;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Register Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users as well as their
      | validation and creation. By default this controller uses a trait to
      | provide this functionality without requiring any additional code.
      |
     */

use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
                    'first_name' => 'required|string|max:255',
                    'last_name' => 'required|string|max:255',
                    'mobile' => 'bail|required|numeric|digits_between:8,20',
                    'email' => 'required|string|email|max:255|unique:students',
                    'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data) {
        return User::create([
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'mobile' => $data['mobile'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'center_assigned_to' => $data['center_assigned_to'],
        ]);
    }

    protected function getRegister() {
        $centers = array('1' => 'ABC', '2' => 'XYZ');

        return view('auth.register', compact('centers'));
    }

    /**
     * Redirect the user to the OAuth Provider.
     *
     * @return Response
     */
    public function redirectToProvider($provider) {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from provider.  Check if the user already exists in our
     * database by looking up their provider_id in the database.
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that 
     * redirect them to the authenticated users homepage.
     *
     * @return Response
     */
    public function handleProviderCallback(Request $request, $provider) {

        if (!$request->has('code') || $request->has('denied')) {
            return redirect('/');
        }

        try {
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e) {

            return redirect('/');
        }
        //echo "<pre>"; print_r($user); die;
        $userData['provider'] = $provider;
        $userData['provider_id'] = $user->getId();
        $name = explode(' ', $user->getName());
        $userData['first_name'] = $name[0];
        $userData['last_name'] = '';
        if (isset($name[1])) {
            for ($i = 1; $i < count($name); $i++) {
                $userData['last_name'] = $userData['last_name'] . ' ' . $name[$i];
            }
        }

        $userData['email'] = $user->getEmail();
        $userData['token'] = $user->token;

        $userData['refresh_token'] = $user->refreshToken;
        $userData['expires_in'] = $user->expiresIn;

        return redirect('register')->with('user', $userData);
//        $authUser = $this->findOrCreateUser($user, $provider);
//        Auth::login($authUser, true);
//        return redirect($this->redirectTo);
    }

    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findOrCreateUser($user, $provider) {
        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }
        return User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'provider' => $provider,
                    'provider_id' => $user->id
        ]);
    }

    public function showRegistrationForm($user, $provider) {

        //return view('auth.register', compact('user'));
    }

}
