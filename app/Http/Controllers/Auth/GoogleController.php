<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Socialite;
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
    }

    protected function createOrGetUser(ProviderUser $providerUser){
        dd($providerUser);
    }
}

//ya29.a0AfH6SMCW29g6nl7RWWGNeXp2b41rNwhKDUMEF5DSg2x_cvaTGvcCPopBd8OcgU94XGCGVUoyxuWhcUf36dFUv1KUuaNB8_2GrGYew9XVcqE3drPnwAFcYzD1D0J_DXutdpNkGAPOkjVqtfW_aTYvTp2KHEkn-ax3ueE
//ya29.a0AfH6SMAYE3wQdvKLW8OL9AJ_WICmVsCQ_qpqCB1AspeXhA_ynlWnPEg0u4OXwnStKDvKzlkfgW_aT3CiLbiIfuqGN2LRKM6ZENeJly3OJKuDf9Oou4Iy-YjLA8m6P2iqC34XekTLdI7SvUetafTv6O6kNvsapGmk09E
