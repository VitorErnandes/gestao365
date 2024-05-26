<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            'Visualizar permissões',
            'Cadastrar permissão',
            'Alterar permissão',
            'Excluir permissão',

            'Visualizar regras',
            'Cadastrar regra',
            'Alterar regra',
            'Excluir regra',

            'Visualizar usuários',
            'Cadastrar usuário',
            'Alterar usuário',
            'Alterar senha usuário',
            'Excluir usuário'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
