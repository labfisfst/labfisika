<!DOCTYPE html>
<html lang="id">
<head>
    <title>Detail Data Alat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .header-cyan {
            background-color: #0dcaf0;
            color: white;
            padding: 15px 20px;
            border-radius: 5px 5px 0 0;
            font-weight: bold;
            font-size: 1.2rem;
        }
        .form-control:read-only {
            background-color: #e9ecef;
            opacity: 1;
        }
        .status-box {
            font-weight: bold;
            text-align: center;
            padding: 6px;
            border-radius: 4px;
        }
        .bg-available {
            background-color: #d1e7dd;
            color: #0f5132;
            border: 1px solid #badbcc;
        }
        .img-container {
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 10px;
            text-align: center;
            background: #fff;
        }
        /* Style Tambahan untuk Tabel Jadwal */
        .table-schedule thead {
            background-color: #f8f9fa;
        }
        .badge-pending { background-color: #ffc107; color: #000; }
        .badge-disetujui { background-color: #198754; color: #fff; }
        .badge-selesai { background-color: #6c757d; color: #fff; }
        .badge-ditolak { background-color: #dc3545; color: #fff; }
    </style>
</head>
<body class="bg-light p-4">

    <div class="container" style="max-width: 900px;">
        <div class="card border-0 shadow-sm">
            <div class="header-cyan">
                Detail Data Alat
            </div>

            <div class="card-body p-4">
                
                <div class="mb-3">
                    <label class="form-label fw-bold">Nama Alat</label>
                    <input type="text" class="form-control" value="<?= $barang['nama_alat'] ?>" readonly>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Tahun Pengadaan</label>
                        <input type="text" class="form-control" value="<?= $barang['tahun'] ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Lokasi Laboratorium</label>
                        <input type="text" class="form-control" value="<?= $barang['lokasi'] ?>" readonly>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Fungsi Alat</label>
                    <textarea class="form-control" rows="3" readonly><?= $barang['fungsi'] ?></textarea>
                </div>

                <div class="row mb-3 align-items-end">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Kondisi</label>
                        <input type="text" class="form-control" value="<?= $barang['kondisi'] ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Status Fisik</label>
                        <div class="status-box bg-available">
                            Tersedia
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold">Foto Alat</label>
                    <div class="img-container">
                        <?php if($barang['foto']): ?>
                            <img src="<?= base_url('uploads/' . $barang['foto']) ?>" class="img-fluid rounded" style="max-height: 400px;">
                        <?php else: ?>
                            <p class="text-muted my-5">Tidak ada foto tersedia.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <hr class="my-4">

                <h5 class="fw-bold mb-3"><i class="fas fa-calendar-alt me-2"></i>Jadwal Penggunaan Alat</h5>
                
                <div class="table-responsive">
                    <table class="table table-bordered table-schedule">
                        <thead>
                            <tr>
                                <th>Peminjam</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($riwayat)): ?>
                                <?php foreach($riwayat as $r): ?>
                                <tr>
                                    <td>
                                        <?= $r['nama_peminjam'] ?><br>
                                        <small class="text-muted"><?= $r['nim'] ?></small>
                                    </td>
                                    <td>
                                        <?= date('d M Y', strtotime($r['tgl_mulai'])) ?> <br>
                                        <span class="text-muted small">s/d</span> <br>
                                        <?= date('d M Y', strtotime($r['tgl_selesai'])) ?>
                                    </td>
                                    <td><?= substr($r['jam_mulai'], 0, 5) ?> - <?= substr($r['jam_selesai'], 0, 5) ?></td>
                                    <td>
                                        <?php 
                                            $badgeClass = 'badge-pending';
                                            if($r['status'] == 'Disetujui') $badgeClass = 'badge-disetujui';
                                            if($r['status'] == 'Selesai') $badgeClass = 'badge-selesai';
                                            if($r['status'] == 'Ditolak') $badgeClass = 'badge-ditolak';
                                        ?>
                                        <span class="badge <?= $badgeClass ?>"><?= $r['status'] ?></span>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-3">
                                        Belum ada jadwal penggunaan untuk alat ini.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                </div>
        </div>

        <div class="mt-3">
            <a href="<?= base_url('barang/ajuan/' . $barang['id']) ?>" class="btn btn-success w-100 py-2 fw-bold mb-2">
                Ajukan Penggunaan
            </a>
            
            <a href="javascript:history.back()" class="btn btn-outline-secondary w-100 py-2">
                Kembali
            </a>
        </div>

    </div>

</body>
</html>