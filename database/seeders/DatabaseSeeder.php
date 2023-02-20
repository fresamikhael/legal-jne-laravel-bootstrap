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
                'nik' => '1779',
                'role' => 'HEADLEGAL',
                'email' => 'sana@jne.co.id',
                'password' => bcrypt('kepala'),
            ],
            [
                'id' => 'USR010',
                'name' => 'Tono',
                'nik' => '0123',
                'role' => 'HEADUSER',
                'email' => 'tono@jne.co.id',
                'password' => bcrypt('tono'),
            ],
            [
                'id' => 'USR011',
                'name' => 'Puji',
                'nik' => '01234',
                'role' => 'HEADDEPT',
                'email' => 'puji@jne.co.id',
                'password' => bcrypt('puji'),
            ],
            [
                'id' => 'USR012',
                'name' => 'Joker',
                'nik' => '01235',
                'role' => 'HEADDIV',
                'email' => 'joker@jne.co.id',
                'password' => bcrypt('joker'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }

        // RegulationType::create([
        //     'name' => 'Peraturan Perusahaan',
        //     'type' => 'Internal'
        // ]);

        // RegulationType::create([
        //     'name' => 'SK DIREKSI',
        //     'type' => 'Internal'
        // ]);

        // RegulationType::create([
        //     'name' => 'SE DIREKSI',
        //     'type' => 'Internal'
        // ]);

        // RegulationType::create([
        //     'name' => 'Internal Memo',
        //     'type' => 'Internal'
        // ]);

        // RegulationType::create([
        //     'name' => 'Undang-Undang',
        //     'type' => 'Normatif'
        // ]);

        // RegulationType::create([
        //     'name' => 'Peraturan Pemerintah',
        //     'type' => 'Normatif'
        // ]);

        // RegulationType::create([
        //     'name' => 'Peraturan Menteri',
        //     'type' => 'Normatif'
        // ]);

        // RegulationType::create([
        //     'name' => 'PERDA Provinsi/Kota',
        //     'type' => 'Normatif'
        // ]);

    }
}
