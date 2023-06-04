<?php

namespace App\Http\Livewire\App\Cadastros\Produtos;

use Livewire\Component;

class Lista extends Component
{
    public $componente;
    public $dados;
    
    public function render()
    {
        return view('livewire.app.cadastros.produtos.lista')->with(['componente'=>$this->componente,'dados'=>$this->dados]);
    }
}
