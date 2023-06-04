<?php

namespace App\Http\Livewire\App\Cadastros\Usuarios;

use Livewire\Component;

class Lista extends Component
{
    public $componente;
    public $dados;

    public function render()
    {
        // return view('livewire.app.cadastros.usuarios.lista');
        return view('livewire.app.cadastros.usuarios.lista')->with(['componente'=>$this->componente,'dados'=>$this->dados]);
    }
}
