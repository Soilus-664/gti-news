<?php

namespace App\Livewire;

use App\Models\Noticia;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CadastraNoticias extends Component
{
    public $capa;
    public $titulo;
    public $resumo;
    public $conteudo;

    public function SalvaNoticia(){
         
         Noticia::create([
            'capa' => $this->capa,
            'titulo' => $this->titulo,
            'resumo' => $this->resumo,
            'conteudo' => $this->conteudo,
            'data' => now(),
            'user_id' => Auth::id(),
        ]);
        
        return redirect()->route('gerenciaNoticias');
    }

    public function render()
    {
        return view('livewire.cadastra-noticias');
    }
}
