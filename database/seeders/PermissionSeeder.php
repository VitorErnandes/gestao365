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
            'Excluir usuário',

            'Visualizar grupos produtos',
            'Cadastrar grupo produtos',
            'Alterar grupo produtos',
            'Excluir grupo produtos',

            'Visualizar produtos',
            'Cadastrar produto',
            'Alterar produto',
            'Excluir produto',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
