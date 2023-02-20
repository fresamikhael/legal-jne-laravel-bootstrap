<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'id' => 'USR001',
                'name' => 'Admin',
                'nik' => '123',
                'role' => 'ADMIN',
                'email' => 'admin@jne.co.id',
                'password' => bcrypt('admin'),
            ],
            [
                'id' => 'USR002',
                'name' => 'Joko',
                'nik' => '1234',
                'role' => 'USER',
                'email' => 'joko@jne.co.id',
                'password' => bcrypt('joko'),
            ],
            [
                'id' => 'USR003',
                'name' => 'Nanang',
                'nik' => '12345',
                'role' => 'LEGAL',
                'email' => 'nanang@jne.co.id',
                'password' => bcrypt('nanang'),
            ],
            [
                'id' => 'USR004',
                'name' => 'Udin',
                'nik' => '123456',
                'role' => 'CS',
                'email' => 'udin@jne.co.id',
                'password' => bcrypt('udin'),
            ],
            [
                'id' => 'USR005',
                'name' => 'Samson',
                'nik' => '1234567',
                'role' => 'LITI1',
                'email' => 'samson@jne.co.id',
                'password' => bcrypt('samson'),
            ],
            [
                'id' => 'USR006',
                'name' => 'Jafar',
                'nik' => '12345678',
                'role' => 'LITI2',
                'email' => 'jafar@jne.co.id',
                'password' => bcrypt('jafar'),
            ],
            [
                'id' => 'USR007',
                'name' => 'Riri',
                'nik' => '123456789',
                'role' => 'LITIMANAGER',
                'email' => 'riri@jne.co.id',
                'password' => bcrypt('riri'),
            ],
            [
                'id' => 'USR008',
                'name' => 'Vani',
                'nik' => '12345632',
                'role' => 'CD',
                'email' => 'vani@jne.co.id',
                'password' => bcrypt('vani'),
            ],
            [
                'id' => 'USR009',
                'name' => 'Sana',
                'nik' => '123123',
                'role' => 'HEADLEGAL',
                'email' => 'head@jne.co.id',
                'password' => bcrypt('kepala'),
            ],
            [
                'id' => 'USR010',
                'name' => 'Tono',
                'nik' => '0123',
                'role' => 'HEADUSER',
                'email' => 'tono@jne.co.id',
                'password' => bcrypt('kepalauser'),
            ],
            [
                'id' => 'USR012',
                'name' => 'Puji',
                'nik' => '01234',
                'role' => 'HEADDEPT',
                'email' => 'puji@jne.co.id',
                'password' => bcrypt('kepalauser'),
            ],
            [
                'id' => 'USR013',
                'name' => 'Joker',
                'nik' => '01235',
                'role' => 'HEADDIV',
                'email' => 'puji@jne.co.id',
                'password' => bcrypt('kepalauser'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
