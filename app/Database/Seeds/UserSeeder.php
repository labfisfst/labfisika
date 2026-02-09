<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'admin',
            // Passwordnya: admin703 (kita enkripsi)
            'password' => password_hash('admin703', PASSWORD_DEFAULT),
        ];

        $this->db->table('users')->insert($data);
    }
}