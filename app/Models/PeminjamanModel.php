<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanModel extends Model
{
    protected $table = 'peminjaman';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_barang', 
        'nama_peminjam', 
        'nim', 
        'dosen', 
        'tgl_mulai', 
        'tgl_selesai', 
        'jam_mulai', 
        'jam_selesai', 
        'tujuan', 
        'status',
        'created_at'
    ];
    
    // Agar created_at terisi otomatis
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = ''; 
}