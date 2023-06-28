<?php

namespace App\Http\Livewire\App\Cadastros\Produtos;

use Livewire\Component;

class EditCreateForm extends Component
{
    public $componente;
    public $dados=array();

    public function render()
    {
        
        return view('livewire.app.cadastros.produtos.edit-create-form')->with(['componente'=>$this->componente,'dados'=>$this->dados]);
    }
}
