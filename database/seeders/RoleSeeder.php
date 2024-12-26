<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [];
        foreach(config('permessions_en') as $permission => $value)
        {
            $permissions[] = $permission;
        }

        Role::create([
            'role'=>[
                'ar' => 'مدير',
                'en' => 'Manger',
            ],
            'permession' =>json_encode($permissions),
        ]);
    }
}
