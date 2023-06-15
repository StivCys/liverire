<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\Permissions;
use Illuminate\Support\Facades\DB;


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
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Roles $roles)
    {
        //
    }
}
