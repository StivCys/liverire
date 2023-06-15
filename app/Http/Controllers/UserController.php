<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Roles;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Policies\UsersPolicy;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('read user');
        $users=User::select('users.id as id' ,'users.email as email', 'users.name as nome','roles.name as permissao')
                    ->leftJoin('model_has_roles','id','=','model_id')
                    ->leftJoin('roles','roles.id','=','role_id')
                    ->paginate(5)->toArray();
        // dd($users);
        return view('livewire.app.cadastros.cadastros')->with(['componente'=>'livewire.app.cadastros.usuarios.lista','dados'=>$users]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user = Auth::user();
        $user->can('create user');
        
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $user = Auth::user();
        $user->can('create user');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $user = Auth::user();
        $user->can('read user');
        
        //--LISTAR DADOS DO USUARIO
        $aUser['user']=array();
        $cUser=User::select('users.id as id' ,'users.email as email', 'users.name as nome',DB::raw('group_concat(roles.id) as permissoes_do_usuario'))
                    ->leftJoin('model_has_roles','id','=','model_id')
                    ->leftJoin('roles','roles.id','=','role_id')
                    ->where('users.id','=',$id)
                    ->groupBy('users.id')
                    ->get()
                    ->toArray()
                    ;
        
        //--ajustando o retorno
        $aUser=array_pop($cUser);

        //--LISTAR PAPEIS DISPONIVEIS                    
        $aUser['permissoes_existentes']=array();
        $roles=Roles::select('id','name')->get()->toArray();
        foreach($roles as $key){
            array_push($aUser['permissoes_existentes'],$key);
        }
        $aUser['permissoes_do_usuario']=explode(',',$aUser['permissoes_do_usuario']);
        // dd($aUser);
        return view('livewire.app.cadastros.cadastros')->with(['componente'=>'livewire.app.cadastros.usuarios.show','dados'=>$aUser]);
        

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user = Auth::user();
        $user->can('update user');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $user = Auth::user();
        $user->can('update user');
        if($request->input('_token')!='' && $request->input('id')!=''){
            $regras=[
                'name'=>'required|min:2|max:30',
                'email'=>'email',
                
            ];
            
            $feedback=[
                'name.required'=>"O nome é obrigatório",
                'suario_email.email'=>"O email é obrigatorio",
                
            ];

            if( $request->input('password')!= null && $request->input('password') !='' ){
                $regras_senha=[
                    // regex:/((^[A-Za-z]|[0-9])$/i)|
                    'password'=>'required|min:8|',
                ];
                $feedbackSenha=[
                    // 'password.regex'=>"A senha não pode conter espaços em branco",
                    'password.min'=>"A senha precisa ter no minimo 8 caracteres",
                    'password.required'=>"A senha é obrigatoria",
                ];

                $regras = array_merge($regras,$regras_senha);
                $feedback = array_merge($feedback,$feedbackSenha);

            }

            //--VALIDANDO AS REGRAS
            $request->validate($regras,$feedback);
            
            
            $usuarios = new User();

            //--NÃO É OBRIGATORIO TROCAR A SENHA AO SALVAR O FORMULARIO
            $except_pasword='';
            if( $request->input('password')== null  || trim($request->input('password'))==''){
                $except_pasword='password';

            }else{
                $senha = Hash::make($request->input('password'));
                $request->merge(
                    [
                        'password' => $senha,
                        ]
                );
            }

            $usuario =$usuarios->find($request->input('id'));
            
            
            if(!$usuario->update($request->except('_token','_method',$except_pasword))){
                //--mensagem de erro
                
            }
        }
        
        // $usuarios=User::find($request->input('id'));
        // // dd($usuarios);
        // return view('livewire.app.cadastros.cadastros')->with(['componente'=>'livewire.app.cadastros.usuarios.show','dados'=>$usuarios]);
        // // return redirect()->route('usuarios.show',['produto'=>$usuarios->id]);

        //--LISTAR DADOS DO USUARIO
        $aUser['user']=array();
        $cUser=User::select('users.id as id' ,'users.email as email', 'users.name as nome',DB::raw('group_concat(roles.id) as permissoes_do_usuario'))
                    ->leftJoin('model_has_roles','id','=','model_id')
                    ->leftJoin('roles','roles.id','=','role_id')
                    ->where('users.id','=',$request->input('id'))
                    ->groupBy('users.id')
                    ->get()
                    ->toArray()
                    ;

        //--ajustando o retorno
        $aUser=array_pop($cUser);

        //--LISTAR PAPEIS DISPONIVEIS                    
        $aUser['permissoes_existentes']=array();
        $roles=Roles::select('id','name')->get()->toArray();
        foreach($roles as $key){
            array_push($aUser['permissoes_existentes'],$key);
        }
        $aUser['permissoes_do_usuario']=explode(',',$aUser['permissoes_do_usuario']);
        // dd($aUser);
        return view('livewire.app.cadastros.cadastros')->with(['componente'=>'livewire.app.cadastros.usuarios.show','dados'=>$aUser]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = Auth::user();
        $user->can('delete user');
    }
}
