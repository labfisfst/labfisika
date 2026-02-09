<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Barang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'foto' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'nama_alat' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'lokasi' => [ // Lokasi Laboratorium
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'tahun' => [
                'type'       => 'INT',
                'constraint' => 4, 
            ],
            'fungsi' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            // --- KOLOM BARU SESUAI GAMBAR ---
            'kondisi' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'default'    => 'Baik', 
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'default'    => 'Tersedia', 
            ],
            // --------------------------------
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('barang');
    }

    public function down()
    {
        $this->forge->dropTable('barang');
    }
}