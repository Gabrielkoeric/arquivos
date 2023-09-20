<?php

namespace App\Http\Controllers;

use App\Mail\NovoUsuario;
use App\Models\User;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function hendProviderCallback()
    {
        $user = Socialite::driver('google')->user();


        $existingUser = User::where('email', $user->getEmail())->first();

        if (!$existingUser) {
            $usuario = new User();
            $usuario->nome_completo = $user->name;
            $usuario->email = $user->email;
            $usuario->celular = 123;
            $usuario->imagem = $user->getAvatar();
            $usuario->save();
            $existingUser = User::where('email', $user->getEmail())->first();
            Auth::login($existingUser);
            //email
                $email = new NovoUsuario($user->getName());
                Mail::to($user->getEmail())->queue($email);
        }else{
            if ($existingUser->imagem !== $user->getAvatar()) {
                $existingUser->imagem = $user->getAvatar();
                $existingUser->save();
            }
        }

        Auth::login($existingUser);
        session([
            'id' => $user->getId(),
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'avatar' =>$user->getAvatar()
        ]);
        return to_route('home.index');
    }

    public function destroy(){
        Auth::logout();
        //dd(Auth::user());
        return to_route('home.index');
    }


}
