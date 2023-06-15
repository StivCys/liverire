<?php

namespace App\Http\Livewire\App\Cadastros\Permissoes;

use Livewire\Component;

class Lista extends Component
{
    public $componente;
    public $dados;

    public function render()
    {
        return view('livewire.app.cadastros.permissoes.lista')->with(['componente'=>$this->componente,'dados'=>$this->dados]);

        
    }
}
