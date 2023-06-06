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
        $permission = Permission::create(['name' => 'gerenciar usuarios']);
        $permission->assignRole($adminRole);
 
        $adminUser = User::factory()->create([
            'email' => 'admin@admin.com',
            'password' => bcrypt('SecurePassword')
        ]);
        $adminUser->assignRole('Administrator');
    }
}