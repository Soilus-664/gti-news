<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('HomerSimpsons');
});

Route::view('/teste', 'tela-teste');        

Route::view('/cadastro', 'tela-cadastro')->name('telaCadastro');

Route::view('/login', 'tela-login')->name('telaLogin');

Route::view('/home','HomerSimpsons')->name('Home');

Route::post('/salva-usuario',
    function(Request $request){
        $user = new User();
        $user ->name = $request->nome;
        $user ->email = $request->email;
        $user ->password = $request->senha;
        $user ->save();
        return redirect()->route('Home');  
    }        
) ->name('SalvaUsuario');

route::post('tela-login',
function (Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }
 
        return back()->withErrors([
            'email' => 'Email ou senha inválidos.',
        ])->onlyInput('email');
    }
)->name('Logar');

route::get('/logout', 
    function(Request $request){
    Auth::logout();
    $request->session()->regenerate();
    return redirect()->route('Home');  
}
    )->name('logout');