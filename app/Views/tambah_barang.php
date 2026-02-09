<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tambah Alat Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .header-green {
            background-color: #198754; /* Warna Hijau Bootstrap (Success) */
            color: white;
            padding: 15px 20px;
            border-radius: 5px 5px 0 0;
            font-weight: bold;
            font-size: 1.2rem;
        }
        .form-label {
            font-weight: bold;
            font-size: 0.9rem;
            margin-bottom: 5px;
        }
        .card {
            border: none;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body class="bg-light p-4">

    <div class="container" style="max-width: 900px;">
        
        <div class="card">
            <div class="header-green">
                Tambah Data Alat Baru
            </div>

            <div class="card-body p-4">
                <form action="<?= base_url('admin/simpan'); ?>"<?= base_url('barang/simpan'); ?>" method="post" enctype="multipart/form-data">
                    
                    <div class="mb-3">
                        <label class="form-label">Nama Alat</label>
                        <input type="text" name="nama_alat" class="form-control" placeholder="Contoh: Kit Efek Hall" required>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Tahun Pengadaan</label>
                            <input type="number" name="tahun" class="form-control" placeholder="Contoh: 2015" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Lokasi Laboratorium</label>
                            <select name="lokasi" class="form-select" required>
                                <option value="" disabled selected>-- Pilih Lab --</option>
                                <option value="Basic Physics">Basic Physics</option>
                                <option value="Advance Physics">Advance Physics</option>
                                <option value="Modeling">Modeling</option>
                                <option value="Astrophysics">Astrophysics</option>
                                <option value="Characteristic (Plant Usage)">Characteristic (Plant Usage)</option>
                                <option value="Instrumentation">Instrumentation</option>
                                <option value="Nuclear & Energi">Nuclear & Energi</option>
                                <option value="Geophysics">Geophysics</option>
                                <option value="Fisika Material (Fismatel)">Fisika Material (Fismatel)</option>
                                <option value="Mechanical Workshop">Mechanical Workshop</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Fungsi Alat</label>
                        <textarea name="fungsi" class="form-control" rows="3" placeholder="Jelaskan kegunaan alat..."></textarea>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Kondisi</label>
                            <select name="kondisi" class="form-select">
                                <option value="Baik">Baik</option>
                                <option value="Rusak Ringan">Rusak Ringan</option>
                                <option value="Rusak Berat">Rusak Berat</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="Tersedia">Tersedia</option>
                                <option value="Dipinjam">Dipinjam</option>
                                <option value="Diperbaiki">Diperbaiki</option>
                                <option value="Hilang">Hilang</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Foto Alat (Opsional)</label>
                        <input type="file" name="foto" class="form-control" accept="image/*">
                        <div class="form-text">Format: JPG, PNG, JPEG. Jika kosong akan memakai gambar default.</div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="<?= base_url('barang') ?>" class="btn btn-secondary px-4">Kembali</a>
                        <button type="submit" class="btn btn-primary px-4">Simpan Data</button>
                    </div>

                </form>
            </div>
        </div>

    </div>

</body>
</html>