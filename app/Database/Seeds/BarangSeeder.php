<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BarangSeeder extends Seeder
{
    public function run()
    {
        $data = [
            // ADVANCE PHYSICS
            ['lokasi' => 'Advance Physics', 'nama_alat' => 'Kit efek Hall', 'tahun' => 2015, 'fungsi' => 'Mengukur tegangan Hall'],
            ['lokasi' => 'Advance Physics', 'nama_alat' => 'Kit spektrometer kisi', 'tahun' => 2015, 'fungsi' => 'Mengukur sudut deviasi cahaya'],
            ['lokasi' => 'Advance Physics', 'nama_alat' => 'Kit solar sel', 'tahun' => 2015, 'fungsi' => 'Mengukur peristiwa sel surya'],
            ['lokasi' => 'Advance Physics', 'nama_alat' => 'Bernoulli Tube', 'tahun' => 2016, 'fungsi' => 'Percobaan dinamika fluida'],

            // ASTROPHYSICS
            ['lokasi' => 'Astrophysics', 'nama_alat' => 'Kamera Astronomi', 'tahun' => 2018, 'fungsi' => 'Penangkap gambar objek astronomi'],
            ['lokasi' => 'Astrophysics', 'nama_alat' => 'Teleskop Sc 280/2800', 'tahun' => 2015, 'fungsi' => 'Mengamati benda langit'],
            ['lokasi' => 'Astrophysics', 'nama_alat' => 'Solar Filter', 'tahun' => 2018, 'fungsi' => 'Pelindung lensa teleskop'],

            // BASIC PHYSICS
            ['lokasi' => 'Basic Physics', 'nama_alat' => 'Neraca empat lengan', 'tahun' => 2007, 'fungsi' => 'Alat ukur massa'],
            ['lokasi' => 'Basic Physics', 'nama_alat' => 'Mikrometer sekrup', 'tahun' => 2013, 'fungsi' => 'Mengukur ketelitian 0.01 mm'],
            ['lokasi' => 'Basic Physics', 'nama_alat' => 'Jangka sorong', 'tahun' => 2013, 'fungsi' => 'Mengukur diameter benda'],
            ['lokasi' => 'Basic Physics', 'nama_alat' => 'Basic meter', 'tahun' => 2016, 'fungsi' => 'Alat ukur tegangan dasar'],

            // MODELING
            ['lokasi' => 'Modeling', 'nama_alat' => 'Server High Spec', 'tahun' => 2018, 'fungsi' => 'Running pemodelan fisika'],
            ['lokasi' => 'Modeling', 'nama_alat' => 'CPU Workstation', 'tahun' => 2019, 'fungsi' => 'Media komputasi'],

            // MECHANICAL WORKSHOP
            ['lokasi' => 'Mechanical Workshop', 'nama_alat' => 'Lathe Machine', 'tahun' => 2015, 'fungsi' => 'Mesin bubut logam'],
            ['lokasi' => 'Mechanical Workshop', 'nama_alat' => 'Drilling Machine', 'tahun' => 2015, 'fungsi' => 'Mesin bor duduk'],
            ['lokasi' => 'Mechanical Workshop', 'nama_alat' => 'Welding Point', 'tahun' => 2015, 'fungsi' => 'Mesin las'],

            // GEOPHYSICS
            ['lokasi' => 'Geophysics', 'nama_alat' => 'GPS Geodetik', 'tahun' => 2015, 'fungsi' => 'Navigasi presisi tinggi'],
            ['lokasi' => 'Geophysics', 'nama_alat' => 'GPR Radar', 'tahun' => 2015, 'fungsi' => 'Deteksi bawah tanah'],
            
            // INSTRUMENTATION
            ['lokasi' => 'Instrumentation', 'nama_alat' => 'Raspberry Pi 3', 'tahun' => 2019, 'fungsi' => 'Mikrokontroler'],
            ['lokasi' => 'Instrumentation', 'nama_alat' => 'Printer 3D', 'tahun' => 2019, 'fungsi' => 'Cetak objek 3D'],
        ];

        // Kosongkan tabel lalu isi baru
        $this->db->table('barang')->truncate(); 
        $this->db->table('barang')->insertBatch($data);
    }
}