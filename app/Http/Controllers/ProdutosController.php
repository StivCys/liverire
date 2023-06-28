<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('livewire.app.cadastros.produtos.lista');
        $produtos= Produtos::paginate(5)->toArray();
        $produtos['route']='produtos.create';
        $produtos['title']='Lista de Produtos';
        // dd($produtos);
        return view('livewire.app.cadastros.cadastros')->with(['componente'=>'livewire.app.cadastros.produtos.lista','dados'=>$produtos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $dados=array('route'=>'produtos.create','title'=>'Formulario Novo Produto');
        return view('livewire.app.cadastros.cadastros')->with(['componente'=>'livewire.app.cadastros.produtos.edit-create-form','dados'=>$dados]);   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        if($request->input('_token')!='' && $request->input('id')==''){
            $regras=[
                'nome'=>'required|min:5|max:30',
                'descricao'=>'required|min:10|max:100',
                'peso'=>'required',
                // 'unidade_id'=>'required',
            ];

            $feedback=[
                'nome.required'=>"O Título do produto é obrigatório",
                'nome.min'=>"O Título do produto precisa ter ao menos 5 caracteres",
                'descricao.required'=>"A Descriação do produto é obrigatória",
                'descricao.min'=>"A Descriação do produto precisa ter no mínimo 10 caracteres",
                'descricao.max'=>"A Descriação do produto precisa ter no máximo 100 caracteres",
                'peso.required'=>"O peso precisa ser informado",
                // 'unidade_id.required'=>"A unidade precisa ser informada",
            ];

            //dd($request);
            $request->validate($regras,$feedback);

            Produtos::create($request->all());
        }
        return $this->index();
    }

    /**
     * Display the specified resource.
     */
    public function show(Produtos $produtos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produtos $produtos, string $id)
    {
        //
        $produto= Produtos::find($id);
        // dd($produto);
        // $produto['route']='produtos.edit';
        $produto['title']='Editar Produto';
        return view('livewire.app.cadastros.cadastros')->with(['componente'=>'livewire.app.cadastros.produtos.edit-create-form','dados'=>$produto]);   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produtos $produtos)
    {
        //
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produtos $produtos)
    {
        //
    }
}
