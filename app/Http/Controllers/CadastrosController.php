<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CadastrosController extends Controller
{
    public function index(){
        return view('livewire.app.cadastros.cadastros')->with(['componente'=>'','dados'=>array()]);
    }
}
