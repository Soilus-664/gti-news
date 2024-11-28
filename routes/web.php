<?php

use App\Models\User;
use App\Models\Noticia;
use App\Http\Livewire\CadastraNoticias;
use App\Http\Livewire\EditaNoticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    $Noticias = Noticia::latest()->paginate(8);
    return view('HomerSimpsons', compact('Noticias'));
})->name('home');

Route::get('/{any}', function () {
    return redirect()->route('home');
})->where('any', 'home|Home|HomerSimpsons');

Route::view('/teste', 'tela-teste');        

Route::view('/cadastro', 'tela-cadastro')->name('telaCadastro');

Route::view('/login', 'tela-login')->name('telaLogin');

Route::redirect('/login2', '/login')->name('login');

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
)->name('logar');

route::get('/logout', 
    function(Request $request){
    Auth::logout();
    $request->session()->regenerate();
    return redirect()->route('Home');  
}
    )->name('logout');

route::get('/gerenciar-noticias', 
    function(){
        
        $Noticias = Noticia::orderBy('id','desc')->paginate(5)->withQueryString();

        return view('gerencia-noticias', compact('Noticias'));
    }
    )->name('gerenciaNoticias')->middleware('auth');

Route::get(
    '/exibir-noticia/{noticia}', 
    
    function (Noticia $Noticia) {
    
    // $Noticia = Noticia::find($Noticia)
    return view('exibir-noticia', compact('Noticia'));
}
)->name('ExibeNoticia');

Route::get(
    '/deleta-noticia/{noticia}', 
    
    function (Noticia $noticia) {
    
    $noticia->delete();
    return redirect()->route('gerenciaNoticias');
}
)->name('DeletaNoticia');

Route::view('/Contador', 'default-pagina')->name('ContadorBacana');