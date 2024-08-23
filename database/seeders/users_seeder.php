<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class users_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'id' => '1',
                'nama' => 'Management PSC',
                'email' => 'Management@gmail.com',
                'password' => bcrypt('managementpsc2024'),
                'id_level' => '1'
            ],
            [
                'id' => '2',
                'nama' => 'Finance PSC',
                'email' => 'finance@gmail.com',
                'password' => bcrypt('financepsc2024'),
                'id_level' => '2'
            ],
            [
                'id' => '3',
                'nama' => 'Logistic PSC',
                'email' =>'logistic@gmail.com',
                'password' => bcrypt('logisticpscbeton'),
                'id_level' => '3'
            ],
            [
                'id' => '4',
                'nama' => 'Didin PSC',
                'email' => 'didin@gmail.com',
                'password' => bcrypt('didinpscbeton'),
                'id_level' => '5'
            ],
            [
                'id' => '5',
                'nama' => 'Jalil PSC',
                'email' =>'jalil@gmail.com',
                'password' => bcrypt('jalilpscbeton'),
                'id_level' => '3'
            ],
            [
                'id' => '6',
                'nama' => 'Abel PSC',
                'email' =>'sales@gmail.com',
                'password' => bcrypt('abelpscbeton'),
                'id_level' => '2'
            ],
            [
                'id' => '7',
                'nama' => 'Marcel PSC',
                'email' => 'marcel@gmail.com',
                'password' => bcrypt('marcelpscbeton'),
                'id_level' => '2'
            ],
            [
                'id' => '8',
                'nama' => 'Technician PSC',
                'email' => 'teknisi@gmail.com',
                'password' => bcrypt('teknisipscbeton'),
                'id_level' => '5',
            ]
        ];

        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
