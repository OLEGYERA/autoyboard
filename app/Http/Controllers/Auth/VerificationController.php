<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
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
//        $this->middleware('auth');
//        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:3,2')->only('emailVerification');
    }

    protected function emailVerification($token){
        $user = $this->findUserByToken($token);
        if($user && $user->email_verified_at == null){
            $user->email_verified_at = Carbon::now();
            $user->remember_token = null;
            $user->save();

            $this->manuallyAuth($user);
        }
        else{
            abort(404);
        }
    }


    private function findUserByToken($token){
        $user = User::where('remember_token', $token)->first();

        return !empty($user) ? $user : false;
    }

    private function manuallyAuth($user){
        Auth::loginUsingId($user->id);
    }
}
