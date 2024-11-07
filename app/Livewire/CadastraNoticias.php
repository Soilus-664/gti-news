<?php

namespace App\Livewire;

use Livewire\Component;

class CadastraNoticias extends Component
{
    public $Titulo
    public $capa
    public $resumo
    public $conteudo
    
    public function render()
    {
        return view('livewire.cadastra-noticias');
    }
    
    public function save()
    {

        $Noticias = new Noticia();
        $Noticias ->Titulo = $request->titulo;
        $Noticias ->resumo = $request->resumo;
        $Noticias ->conteudo = $request->conteudo;
        $Noticias ->capa = $request->capa;
        
        $Noticias ->data = now();
        $Noticias ->user_id = Auth::id();
        $Noticias ->save();
    }
}
