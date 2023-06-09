<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
 
class AdminUserSeeder extends Seeder
{
    public function run()
    {
        $adminRole = Role::create(['name' => 'Administrador']);
        $permissionC = Permission::create(['name' => 'Usuarios|create user']);
        $permissionC->assignRole($adminRole);
        
        $permissionR = Permission::create(['name' => 'Usuarios|read user']);
        $permissionR->assignRole($adminRole);
        
        $permissionU = Permission::create(['name' => 'Usuarios|update user']);
        $permissionU->assignRole($adminRole);
        
        $permissionD = Permission::create(['name' => 'Usuarios|delete user']);
        $permissionD->assignRole($adminRole);
 
        $adminUser = User::find(1);//--id do meu usuario
        $adminUser->assignRole('Administrador');

        $caixaUserRole = Role::create(['name' => 'Caixa']);
        $permissionC = Permission::create(['name' => 'Pedidos|criar pedido']);
        $permissionC->assignRole($caixaUserRole);
        
        $permissionR = Permission::create(['name' => 'Pedidos|listar pedidos']);
        $permissionR->assignRole($caixaUserRole);
        
        $permissionU = Permission::create(['name' => 'Pedidos|Atualizar pedidos']);
        $permissionU->assignRole($caixaUserRole);
        
        $permissionD = Permission::create(['name' => 'Pedidos|Deletar Pedidos']);
        $permissionD->assignRole($caixaUserRole);
        
        $permissionD = Permission::create(['name' => 'Pedidos|Cancelar Pedidos']);
        $permissionD->assignRole($caixaUserRole);
 
        // $caixaUserRole = User::find(1);
        // $caixaUserRole->assignRole('Caixa');
    }
}