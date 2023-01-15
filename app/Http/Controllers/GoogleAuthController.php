<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallBack()
    {
        try {
            $googleUser=Socialite::driver('google')->user();

            $user=User::where('google_id', $googleUser->getId())->first();

            if(!$user){
                $new_user=User::create([
                    'name'=>$googleUser->getName(),
                    'email'=>$googleUser->getEmail(),
                    'google_id'=>$googleUser->getId(),
                ]);

                Auth::login($new_user);
            }else{
                Auth::login($user);
            }
        } catch (\Throwable $th) {
          dd('something went wrong' . $th->getMessage());
        }
    }
}
