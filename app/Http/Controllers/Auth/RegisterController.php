<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\AuthEmail;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Dirape\Token\Token;

class RegisterController extends Controller
{
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    protected function signup(Request $request){
        $user = User::create([
            'first_name' => $request->first_name['value'],
            'last_name' => $request->last_name['value'],
            'tel' => $request->tel['value'],
            'email' => $request->email['value'],
            'agreement' => $request->agreement['value'],
        ]);

        $this->generateTokens($user);

        $this->sendVerificationEmail($user);

        return true;
    }

    private function generateTokens($user){
        $user->password = bcrypt((new Token())->Unique('users', 'password', 32));
        $user->remember_token = (new Token())->Unique('users', 'remember_token', 32);

        $user->save();
    }

    private function sendVerificationEmail($user){
        Mail::to($user->email)->send(new AuthEmail($user));
    }
}
