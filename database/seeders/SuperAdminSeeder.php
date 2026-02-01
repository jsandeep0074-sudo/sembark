<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("
        INSERT INTO roles (name) VALUES
        ('SuperAdmin'), ('Admin'), ('Member')
        ");

        $roleId = DB::table('roles')->where('name','SuperAdmin')->value('id');

        DB::statement("
        INSERT INTO users (name,email,password,role_id)
        VALUES (
        'Super Admin',
        'super@admin.com',
        '".bcrypt('password')."',
        {$roleId}
        )
        ");

    }
}
