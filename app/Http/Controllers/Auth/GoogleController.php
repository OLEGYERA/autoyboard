<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Socialite;
use App\User;
use Carbon\Carbon;
use Laravel\Socialite\Contracts\User as ProviderUser;
use App\Http\Controllers\Controller;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }
    /**
     * Return a callback method from google api.
     *
     * @return callback URL from google
     */
    public function callback()
    {
        $user = $this->createOrGetUser(Socialite::driver('google')->user());
        return redirect()->route('home');
    }

    protected function createOrGetUser(ProviderUser $providerUser){
        $seek_user = User::where('google_id', $providerUser->getId())->first();

        if(empty($seek_user)){
            $is_email = User::where('email', $providerUser->getEmail())->first();

            if($is_email){
                $is_email->update([
                    'google_id' => $providerUser->getId(),
                    'email_verified_at' => Carbon::now(),
                    'remember_token' => null,
                ]);

                Auth::login($is_email);
            }
            else{
                $new_user = User::create([
                    'google_id' => $providerUser->getId(),
                    'first_name' => $providerUser->user['given_name'],
                    'last_name' => $providerUser->user['family_name'],
                    'email' => $providerUser->getEmail(),
                    'email_verified_at' => Carbon::now(),
                ]);

                Auth::login($new_user);
            }
        }
        else{
            Auth::login($seek_user, true);
        }



    }
}

//ya29.a0AfH6SMCW29g6nl7RWWGNeXp2b41rNwhKDUMEF5DSg2x_cvaTGvcCPopBd8OcgU94XGCGVUoyxuWhcUf36dFUv1KUuaNB8_2GrGYew9XVcqE3drPnwAFcYzD1D0J_DXutdpNkGAPOkjVqtfW_aTYvTp2KHEkn-ax3ueE
//ya29.a0AfH6SMAYE3wQdvKLW8OL9AJ_WICmVsCQ_qpqCB1AspeXhA_ynlWnPEg0u4OXwnStKDvKzlkfgW_aT3CiLbiIfuqGN2LRKM6ZENeJly3OJKuDf9Oou4Iy-YjLA8m6P2iqC34XekTLdI7SvUetafTv6O6kNvsapGmk09E
