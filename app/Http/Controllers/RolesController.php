<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\Permissions;
use Illuminate\Support\Facades\DB;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $roles=Roles::paginate(20)->toArray();
        
        // dd($roles);
        return view('livewire.app.cadastros.cadastros')->with(['componente'=>'livewire.app.cadastros.permissoes.lista','dados'=>$roles]);
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
        $role['permissions']=array();
        $role['role']=Roles::select('id','name', DB::raw('group_concat(permission_id) as permissoes'))
                        ->leftJoin('role_has_permissions','role_id','=','roles.id')
                        ->where('roles.id','=',$id)
                        ->groupBy('roles.id')
                        ->get()->toArray();
        $permissions['permissions']=Permissions::select('id','name as permissao')->orderBy('id')->get()->toArray();
        
        array_push($role['permissions'],$permissions['permissions']);
        // dd($role);            
        return view('livewire.app.cadastros.cadastros')->with(['componente'=>'livewire.app.cadastros.permissoes.show','dados'=>$role]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Roles $roles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Roles $roles)
    {
        //--Este update precisa, atualizar o nome do papel, e também remover ou criar o vinculo da permissão com o papel(role), delete na tabela role_has_permissions
        $oRoles = new Roles();
        $id=$request->input('id');
        $cRole=$oRoles->find($id);
        if( !$cRole->update($request->except('_token','_method')) ){
            //--mensagem de erro
            
        }

        
        $role_has_permissions = $request->input('role_has_permissions');
        $vinculos=DB::table('role_has_permissions')->select(DB::raw('group_concat(permission_id) as permission_ids'),'role_id','roles.name')
                            ->leftJoin('roles','id','=','role_id')
                            ->where('role_id','=',$id)->groupBy('role_id')->get()->toArray();
        
        foreach($role_has_permissions as $key=>$val){
            $arr=explode('|',$key);
            // $dados[]=$arr[1];
            $dados[]= Permission::findById($arr[1],'web')->getAttribute('name');
            
        }
        dd($request->all(),$vinculos,$dados);
        
        $permissions_assigned['permission_assigned_ids'] = implode(',',$dados);
        

        $aRole['permissions']=array();
        $aRole['role']=Roles::select('id','name', DB::raw('group_concat(permission_id) as permissoes'))
                        ->leftJoin('role_has_permissions','role_id','=','roles.id')
                        ->where('roles.id','=',$id)
                        ->groupBy('roles.id')
                        ->get()->toArray();
        
        $permissions['permissions']=Permissions::select('id','name as permissao')->orderBy('id')->get()->toArray();
        
        array_push($aRole['permissions'],$permissions['permissions']);
        // dd($role);            
        return view('livewire.app.cadastros.cadastros')->with(['componente'=>'livewire.app.cadastros.permissoes.show','dados'=>$aRole]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Roles $roles)
    {
        //
    }
}
