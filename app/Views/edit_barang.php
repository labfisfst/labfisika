<!DOCTYPE html>
<html lang="id">
<head>
    <title>Edit Data Alat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .header-orange {
            background-color: #fd7e14; /* Warna Orange untuk Edit */
            color: white;
            padding: 15px 20px;
            border-radius: 5px 5px 0 0;
            font-weight: bold;
            font-size: 1.2rem;
        }
    </style>
</head>
<body class="bg-light p-4">

    <div class="container" style="max-width: 900px;">
        <div class="card border-0 shadow-sm">
            <div class="header-orange">
                <i class="fas fa-edit me-2"></i> Edit Data: <?= $barang['nama_alat'] ?>
            </div>

            <div class="card-body p-4">
                <form action="<?= base_url('admin/update/' . $barang['id']); ?>" method="post" enctype="multipart/form-data">
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Alat</label>
                        <input type="text" name="nama_alat" class="form-control" value="<?= $barang['nama_alat'] ?>" required>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Tahun Pengadaan</label>
                            <input type="number" name="tahun" class="form-control" value="<?= $barang['tahun'] ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Lokasi Laboratorium</label>
                            <select name="lokasi" class="form-select" required>
                                <?php 
                                    $labs = ['Basic Physics', 'Advance Physics', 'Modeling', 'Astrophysics', 'Characteristic (Plant Usage)', 'Instrumentation', 'Nuclear & Energi', 'Geophysics', 'Fisika Material (Fismatel)', 'Mechanical Workshop'];
                                    foreach($labs as $lab): 
                                ?>
                                    <option value="<?= $lab ?>" <?= ($barang['lokasi'] == $lab) ? 'selected' : '' ?>>
                                        <?= $lab ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Fungsi Alat</label>
                        <textarea name="fungsi" class="form-control" rows="3"><?= $barang['fungsi'] ?></textarea>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Kondisi</label>
                            <select name="kondisi" class="form-select">
                                <option value="Baik" <?= ($barang['kondisi'] == 'Baik') ? 'selected' : '' ?>>Baik</option>
                                <option value="Rusak Ringan" <?= ($barang['kondisi'] == 'Rusak Ringan') ? 'selected' : '' ?>>Rusak Ringan</option>
                                <option value="Rusak Berat" <?= ($barang['kondisi'] == 'Rusak Berat') ? 'selected' : '' ?>>Rusak Berat</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Status</label>
                            <select name="status" class="form-select">
                                <option value="Tersedia" <?= ($barang['status'] == 'Tersedia') ? 'selected' : '' ?>>Tersedia</option>
                                <option value="Dipinjam" <?= ($barang['status'] == 'Dipinjam') ? 'selected' : '' ?>>Dipinjam</option>
                                <option value="Diperbaiki" <?= ($barang['status'] == 'Diperbaiki') ? 'selected' : '' ?>>Diperbaiki</option>
                                <option value="Hilang" <?= ($barang['status'] == 'Hilang') ? 'selected' : '' ?>>Hilang</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Ganti Foto (Opsional)</label>
                        <div class="d-flex align-items-center gap-3">
                            <?php if($barang['foto']): ?>
                                <img src="<?= base_url('uploads/' . $barang['foto']) ?>" class="rounded border" width="60">
                            <?php endif; ?>
                            
                            <input type="file" name="foto" class="form-control" accept="image/*">
                        </div>
                        <div class="form-text">Biarkan kosong jika tidak ingin mengubah foto.</div>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-between align-items-center">
                        
                        <a href="<?= base_url('admin/hapus/' . $barang['id']) ?>" 
                           class="btn btn-danger"
                           onclick="return confirm('PERINGATAN! Data akan dihapus permanen. Apakah Anda yakin?');">
                           <i class="fas fa-trash-alt me-1"></i> Hapus Alat
                        </a>

                        <div class="d-flex gap-2"> 
                            <?php 
                                // Logika agar tombol Batal kembali ke Lab asalnya
                                $url_asal = str_replace(' ', '-', $barang['lokasi']); 
                            ?>
                            
                            <a href="<?= base_url('barang/' . $url_asal) ?>" class="btn btn-secondary px-4">
                                Batal
                            </a>
                            
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fas fa-save me-1"></i> Simpan
                            </button>
                        </div>

                    </div>
                    </form>
            </div>
        </div>
    </div>

</body>
</html>