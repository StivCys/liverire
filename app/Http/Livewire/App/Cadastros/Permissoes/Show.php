<?php

namespace App\Http\Livewire\App\Cadastros\Permissoes;

use Livewire\Component;

class Show extends Component
{
    protected $componente;
    public $dados;

    public function render()
    {
        
        return view('livewire.app.cadastros.permissoes.show');
    }
}
