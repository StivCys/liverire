<?php

namespace App\Http\Livewire\App\Cadastros\Components;

use Livewire\Component;

class MenuOpcoes extends Component
{
    public $componente;
    public $dados;
    public function render()
    {
        return view('livewire.app.cadastros.components.menu-opcoes');
    }
}
