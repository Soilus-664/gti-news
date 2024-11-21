<?php

namespace App\Livewire;

use App\Models\Noticia;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class EditaNoticia extends Component
{
    public $noticia;
    public $titulo;
    public $resumo;
    public $conteudo;
    public $capa;

    public function mount(Noticia $noticia)
    {
        // Preenche os campos com os dados da notícia
        $this->noticia = $noticia;
        $this->titulo = $noticia->Titulo;
        $this->resumo = $noticia->resumo;
        $this->conteudo = $noticia->conteudo;
        $this->capa = $noticia->capa;
    }

    public function SalvaEdicao()
    {
        // Atualiza a notícia com os novos valores
        $this->noticia->update([
            'titulo' => $this->titulo,
            'resumo' => $this->resumo,
            'conteudo' => $this->conteudo,
            'capa' => $this->capa,
            'data' => now(),
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('gerenciaNoticias');
    }

    public function render()
    {
        return view('livewire.edita-noticia');
    }
}
