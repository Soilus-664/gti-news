<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Noticia;
use Illuminate\Support\Facades\Auth;

class CadastraNoticias extends Component
{
    public $titulo;
    public $resumo;
    public $conteudo;
    public $capa;
    public $drawerOpen = false;  // Controls the drawer visibility

    protected $rules = [
        'titulo' => 'required|string|max:255',
        'resumo' => 'required|string|max:500',
        'conteudo' => 'required|string',
        'capa' => 'required|string', // Assuming 'capa' is a URL or file path
    ];

    public function saveNoticia()
    {
        // Validate form input
        $this->validate();

        // Save the noticia (news article)
        Noticia::create([
            'Titulo' => $this->titulo,
            'resumo' => $this->resumo,
            'conteudo' => $this->conteudo,
            'capa' => $this->capa,
            'data' => now(),
            'user_id' => Auth::id(), // Assuming the user is logged in
        ]);

        // Close the drawer after submission
        $this->drawerOpen = false;

        // Optionally, you can redirect or display a success message
        session()->flash('message', 'Notícia salva com sucesso!');
        return redirect()->route('gerenciaNoticias');
    }

    public function render()
    {
        return view('livewire.cadastra-noticias');
    }
}
