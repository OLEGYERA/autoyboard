<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Socialite;
use App\User;
use Carbon\Carbon;
use Laravel\Socialite\Contracts\User as ProviderUser;
use App\Http\Controllers\Controller;

class FacebookController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }
    /**
     * Return a callback method from google api.
     *
     * @return callback URL from google
     */
    public function callback()
    {
        $user = $this->createOrGetUser(Socialite::driver('facebook')->user());
        return redirect()->route('home');
    }

    protected function createOrGetUser(ProviderUser $providerUser){
        $seek_user = User::where('facebook_id', $providerUser->getId())->first();

        if(empty($seek_user)){
            $new_user = User::create([
                'facebook_id' => $providerUser->getId(),
                'first_name' => explode(' ', $providerUser->getName())[0],
                'last_name' => explode(' ', $providerUser->getName())[1],
                'avatar_original' => $providerUser->getAvatar()
            ]);

            Auth::login($new_user);
        }
        else{
            Auth::login($seek_user, true);
        }



    }
}

//ya29.a0AfH6SMCW29g6nl7RWWGNeXp2b41rNwhKDUMEF5DSg2x_cvaTGvcCPopBd8OcgU94XGCGVUoyxuWhcUf36dFUv1KUuaNB8_2GrGYew9XVcqE3drPnwAFcYzD1D0J_DXutdpNkGAPOkjVqtfW_aTYvTp2KHEkn-ax3ueE
//ya29.a0AfH6SMAYE3wQdvKLW8OL9AJ_WICmVsCQ_qpqCB1AspeXhA_ynlWnPEg0u4OXwnStKDvKzlkfgW_aT3CiLbiIfuqGN2LRKM6ZENeJly3OJKuDf9Oou4Iy-YjLA8m6P2iqC34XekTLdI7SvUetafTv6O6kNvsapGmk09E
