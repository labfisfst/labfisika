<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\PeminjamanModel;

class Barang extends BaseController
{
    protected $barangModel;
    protected $peminjamanModel;

    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->peminjamanModel = new PeminjamanModel();
    }

    // --- HALAMAN PUBLIK ---

    public function index($kategori = 'semua')
    {
        $kategori = urldecode($kategori);
        $kategori = str_replace('-', ' ', $kategori);

        if ($kategori == 'semua') {
            $data['barang'] = $this->barangModel->findAll();
            $data['judul'] = 'Semua Alat';
        } else {
            $data['barang'] = $this->barangModel->like('lokasi', $kategori)->findAll();
            $data['judul'] = 'Lab ' . ucwords($kategori);
        }

        return view('tampilan_barang', $data);
    }

    // UPDATE: Fungsi Detail sekarang mengirim data riwayat peminjaman
    public function detail($id)
    {
        $data = [
            'judul' => 'Detail Alat',
            'barang' => $this->barangModel->find($id),
            // Mengambil data peminjaman berdasarkan ID barang, diurutkan dari yang terbaru
            'riwayat' => $this->peminjamanModel
                            ->where('id_barang', $id)
                            ->orderBy('tgl_mulai', 'DESC')
                            ->findAll()
        ];

        if (empty($data['barang'])) {
            return redirect()->to('/');
        }

        return view('detail_barang', $data);
    }

    // --- FITUR AJUAN PENGGUNAAN ---

    public function ajuan($id)
    {
        $data = [
            'judul' => 'Form Ajuan Penggunaan',
            'barang' => $this->barangModel->find($id)
        ];

        if (empty($data['barang'])) {
            return redirect()->to('/');
        }

        return view('form_ajuan', $data);
    }

    public function simpan_ajuan()
    {
        $this->peminjamanModel->save([
            'id_barang'     => $this->request->getPost('id_barang'),
            'nama_peminjam' => $this->request->getPost('nama'),
            'nim'           => $this->request->getPost('nim'),
            'dosen'         => $this->request->getPost('dosen'),
            'tgl_mulai'     => $this->request->getPost('tgl_mulai'),
            'tgl_selesai'   => $this->request->getPost('tgl_selesai'),
            'jam_mulai'     => $this->request->getPost('jam_mulai'),
            'jam_selesai'   => $this->request->getPost('jam_selesai'),
            'tujuan'        => $this->request->getPost('tujuan'),
            'status'        => 'Pending'
        ]);

        return redirect()->to('barang/detail/' . $this->request->getPost('id_barang'));
    }

    // --- HALAMAN ADMIN (CRUD) ---

    public function tambah()
    {
        return view('tambah_barang');
    }

    public function simpan()
    {
        $fileFoto = $this->request->getFile('foto');
        $namaFoto = '';

        if ($fileFoto->isValid() && !$fileFoto->hasMoved()) {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('uploads', $namaFoto);
        }

        $this->barangModel->save([
            'nama_alat' => $this->request->getPost('nama_alat'),
            'lokasi'    => $this->request->getPost('lokasi'),
            'tahun'     => $this->request->getPost('tahun'),
            'kondisi'   => $this->request->getPost('kondisi'),
            'fungsi'    => $this->request->getPost('fungsi'),
            'foto'      => $namaFoto
        ]);

        return redirect()->to('/barang');
    }

    public function edit($id)
    {
        $data['barang'] = $this->barangModel->find($id);
        return view('edit_barang', $data);
    }

    public function update($id)
    {
        $fileFoto = $this->request->getFile('foto');
        $barangLama = $this->barangModel->find($id);
        $namaFoto = $barangLama['foto'];

        if ($fileFoto->isValid() && !$fileFoto->hasMoved()) {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('uploads', $namaFoto);
        }

        $this->barangModel->save([
            'id'        => $id,
            'nama_alat' => $this->request->getPost('nama_alat'),
            'lokasi'    => $this->request->getPost('lokasi'),
            'tahun'     => $this->request->getPost('tahun'),
            'kondisi'   => $this->request->getPost('kondisi'),
            'fungsi'    => $this->request->getPost('fungsi'),
            'foto'      => $namaFoto
        ]);

        return redirect()->to('/barang');
    }

    public function hapus($id)
    {
        $this->barangModel->delete($id);
        return redirect()->to('/barang');
    }
}