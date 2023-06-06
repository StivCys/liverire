<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    

    public function index()
    {
        //
        $usuarios=Usuarios::all();
        
        return view('livewire.app.cadastros.cadastros')->with(['componente'=>'livewire.app.cadastros.usuarios.lista','dados'=>$usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // echo"<pre>";
        // var_dump($usuarios);
        // echo"</pre>";
        // dd($usuarios);
        $usuarios=Usuarios::findOrFail($id)->toArray();
        return view('livewire.app.cadastros.cadastros')->with(['componente'=>'livewire.app.cadastros.usuarios.show','dados'=>$usuarios]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuarios $usuarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuarios $usuarios)
    {
        //
        // dd($request);
        if($request->input('_token')!='' && $request->input('id')!=''){
            $regras=[
                'usuario_nome'=>'required|min:2|max:30',
                'usuario_email'=>'email',
                'usuario_senha'=>'required|min:4',
            ];

            $feedback=[
                'usuario_nome.required'=>"O nome é obrigatório",
                'usuario_email.email'=>"O email é obrigatorio",
                'usuario_senha.min'=>"A senha precisa ter no minimo 4 caracteres",
                'usuario_senha.required'=>"A senha é obrigatoria",
            ];

            $request->validate($regras,$feedback);
            
            // $usuarios->update($request->except('_token','_method','confirmar_senha'));
            $usuarios = new Usuarios();

            $senha = Hash::make($request->input('usuario_senha'));

            $request->merge(
                [
                    'usuario_senha' => $senha,
                ]
            );
            $usuario =$usuarios->find($request->input('id'));
            
            if(!$usuario->update($request->except('_token','_method'))){

                
            }
        }else{
            
        }
        
        $usuarios=Usuarios::find($request->input('id'));
        // dd($usuarios);
        return view('livewire.app.cadastros.cadastros')->with(['componente'=>'livewire.app.cadastros.usuarios.show','dados'=>$usuarios]);
        // return redirect()->route('usuarios.show',['produto'=>$usuarios->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuarios $usuarios)
    {
        //
    }
}
