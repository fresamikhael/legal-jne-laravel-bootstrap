<?php

namespace Database\Seeders;

use App\Models\RegulationType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $user = [
            [
                'id' => 'USR001',
                'name' => 'Admin',
                'username' => 'admin',
                'role' => 'ADMIN',
                'email' => 'admin@jne.co.id',
                'password' => bcrypt('admin'),
            ],
            [
                'id' => 'USR002',
                'name' => 'Joko',
                'username' => 'joko',
                'role' => 'USER',
                'email' => 'joko@jne.co.id',
                'password' => bcrypt('joko'),
            ],
            [
                'id' => 'USR003',
                'name' => 'Nanang',
                'username' => 'nanang',
                'role' => 'LEGALPERMIT',
                'email' => 'nanang@jne.co.id',
                'password' => bcrypt('nanang'),
            ],
            [
                'id' => 'USR004',
                'name' => 'Udin',
                'username' => 'udin',
                'role' => 'LEGALLEASE',
                'email' => 'udin@jne.co.id',
                'password' => bcrypt('udin'),
            ],
            [
                'id' => 'USR005',
                'name' => 'Marko',
                'username' => 'marko',
                'role' => 'LEGALLITIGASI2',
                'email' => 'marko@jne.co.id',
                'password' => bcrypt('marko'),
            ],
            [
                'id' => 'USR006',
                'name' => 'Komar',
                'username' => 'komar',
                'role' => 'LEGALMANAGER',
                'email' => 'komar@jne.co.id',
                'password' => bcrypt('komar'),
            ],
            [
                'id' => 'USR007',
                'name' => 'abc',
                'username' => 'abc',
                'role' => 'TEAMCS',
                'email' => 'abc@jne.co.id',
                'password' => bcrypt('abc'),
            ],
            [
                'id' => 'USR008',
                'name' => 'abcd',
                'username' => 'abcd',
                'role' => 'USER',
                'email' => 'abcd@jne.co.id',
                'password' => bcrypt('abc'),
            ],
            [
                'id' => 'USR009',
                'name' => 'Arif',
                'username' => 'arif',
                'role' => 'LEGALLITIGASI1',
                'email' => 'arif@jne.co.id',
                'password' => bcrypt('arif'),
            ],
            [
                'id' => 'USR0010',
                'name' => 'Juna',
                'username' => 'juna',
                'role' => 'LEGALLITIGASI2',
                'email' => 'juna@jne.co.id',
                'password' => bcrypt('juna'),
            ],
            [
                'id' => 'USR011',
                'name' => 'Lani',
                'username' => 'lani',
                'role' => 'LEGALMANAGER',
                'email' => 'lani@jne.co.id',
                'password' => bcrypt('lani'),
            ],
            [
                'id' => 'USR012',
                'name' => 'Contract Business',
                'username' => 'cd',
                'role' => 'CONTRACTBUSINESS',
                'email' => 'cd@jne.co.id',
                'password' => bcrypt('cd'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }

        RegulationType::create([
            'name' => 'Regulasi 1',
            'type' => 'Internal'
        ]);

        RegulationType::create([
            'name' => 'Regulasi 5',
            'type' => 'Normatif'
        ]);
    }
}
