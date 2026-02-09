<!DOCTYPE html>
<html lang="id">
<head>
    <title>Form Ajuan Penggunaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .header-green {
            background-color: #198754;
            color: white;
            padding: 15px 20px;
            border-radius: 5px 5px 0 0;
            font-weight: bold;
            font-size: 1.2rem;
        }
        .bg-alat-info {
            background-color: #f8f9fa;
            border-left: 5px solid #0dcaf0;
            padding: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body class="bg-light p-4">

    <div class="container" style="max-width: 800px;">
        <div class="card border-0 shadow-sm">
            
            <div class="header-green">
                <i class="fas fa-file-signature me-2"></i> Form Ajuan Penggunaan Alat
            </div>

            <div class="card-body p-4">
                
                <div class="bg-alat-info">
                    <strong>Alat yang akan digunakan:</strong><br>
                    <span class="fs-5 text-primary fw-bold"><?= $barang['nama_alat'] ?></span>
                    <small class="text-muted d-block">Lokasi: <?= $barang['lokasi'] ?></small>
                </div>

                <form action="<?= base_url('barang/simpan_ajuan') ?>" method="post">
                    
                    <input type="hidden" name="id_barang" value="<?= $barang['id'] ?>">

                    <h6 class="border-bottom pb-2 mb-3 text-muted">Identitas Peminjam</h6>
                    
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" required placeholder="Contoh: Budi Santoso">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">NIM</label>
                            <input type="text" name="nim" class="form-control" required placeholder="Contoh: 12345678">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Dosen Pembimbing</label>
                        <input type="text" name="dosen" class="form-control" required placeholder="Nama Dosen Pembimbing">
                    </div>

                    <h6 class="border-bottom pb-2 mb-3 mt-4 text-muted">Waktu Penggunaan</h6>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Mulai</label>
                            <input type="date" name="tgl_mulai" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Selesai</label>
                            <input type="date" name="tgl_selesai" class="form-control" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Jam Mulai</label>
                            <input type="time" name="jam_mulai" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Jam Selesai</label>
                            <input type="time" name="jam_selesai" class="form-control" required>
                        </div>
                    </div>

                    <h6 class="border-bottom pb-2 mb-3 mt-4 text-muted">Keperluan</h6>
                    
                    <div class="mb-4">
                        <label class="form-label">Tujuan Penggunaan</label>
                        <textarea name="tujuan" class="form-control" rows="3" required placeholder="Jelaskan tujuan penggunaan alat ini..."></textarea>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success fw-bold py-2">Kirim Ajuan</button>
                        <a href="javascript:history.back()" class="btn btn-outline-secondary">Batal</a>
                    </div>

                </form>

            </div>
        </div>
    </div>

</body>
</html>