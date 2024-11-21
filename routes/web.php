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

route::get('/gerenciar-noticias', 
    function(){
        
        $Noticias = Noticia::orderBy('id','desc')->get();
        return view('gerencia-noticias', compact('Noticias'));
    }
    )->name('gerenciaNoticias');

route::get('/cadastra-noticias', 
function(){
    
    $Noticias = new Noticia();

    return view('cadastra-noticias', compact('Noticias'));
}
)->name('cadastraNoticia');

Route::post('/salva-noticia',
    
    function(Request $request){
        $Noticias = new Noticia();
        $Noticias ->Titulo = $request->titulo;
        $Noticias ->resumo = $request->resumo;
        $Noticias ->conteudo = $request->conteudo;
        $Noticias ->capa = $request->capa;
        
        $Noticias ->data = now();
        $Noticias ->user_id = Auth::id();
        $Noticias ->save();

        return redirect()->route('cadastraNoticia');  
    }        
) ->name('salvaNoticia');

Route::get(
    '/exibir-noticia/{noticia}', 
    
    function (Noticia $Noticia) {
    
    // $Noticia = Noticia::find($Noticia)
    return view('exibir-noticia', compact('Noticia'));
}
)->name('ExibeNoticia');

Route::get(
    '/edita-noticias/{noticia}', 
    
    function (Noticia $noticia) {
    
    // $Noticia = Noticia::find($Noticia)
    return view('edita-noticias', compact('noticia'));
}
)->name('EditaNoticia');

Route::post(
    '/altera-noticia/{noticia}',
    
    function(Request $request, Noticia $Noticias){

        $Noticias ->Titulo = $request->titulo;
        $Noticias ->resumo = $request->resumo;
        $Noticias ->conteudo = $request->conteudo;
        $Noticias ->capa = $request->capa;
        
        $Noticias ->data = now();
        $Noticias ->user_id = Auth::id();
        $Noticias ->save();

        return redirect()->route('gerenciaNoticias');  
    }        
) ->name('alteraNoticia');

Route::get(
    '/deleta-noticia/{noticia}', 
    
    function (Noticia $noticia) {
    
    $noticia->delete();
    return redirect()->route('gerenciaNoticias');
}
)->name('DeletaNoticia');