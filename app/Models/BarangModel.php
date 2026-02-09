<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table            = 'barang';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';

    // Kolom yang boleh diisi oleh user (Keamanan)
    protected $allowedFields = ['foto', 'nama_alat', 'lokasi', 'tahun', 'fungsi', 'kondisi', 'status'];

    // Mengaktifkan fitur tanggal otomatis (Created At & Updated At)
    protected $useTimestamps = true;
}