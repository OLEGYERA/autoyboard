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
            $request->login['alias'] => $request->login['value'],
            'agreement' => $request->agreement['value'],
        ]);

        $this->generateTokens($user);

        $this->sendVerification($user);

        return $user;
    }

    private function generateTokens($user){
        $user->password = bcrypt((new Token())->Unique('users', 'password', 32));
        if($user->email != null){
            $user->remember_token = (new Token())->Unique('users', 'remember_token', 32);
        }
        else{
            $user->remember_token = (new Token())->UniqueNumber('users', 'remember_token', 6);
        }

        $user->save();
    }

    private function sendVerification($user){
        if($user->email != null){
            Mail::to($user->email)->send(new AuthEmail($user));
        }
        else{
            $api = new \Mobizon\MobizonApi('uaac68d8d02d1ba3fbebb4cc8c76bb93a966f1b2d206cfdcb9f7b1037c04631d1446c1', 'api.mobizon.ua');
            if ($api->call('message', 'sendSMSMessage', ['recipient' => $user->tel, 'text' => "Здравствуйте, " . $user->last_name . " " . $user->first_name . "! Ваш код подтверждения: " .  $user->remember_token . "."])){
                $messageId = $api->getData('messageId');
            }
        }
    }
}
