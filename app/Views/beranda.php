<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Fisika UIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        .navbar { background-color: #1a1a1a; }
        .judul-halaman { text-align: center; margin: 40px 0 10px 0; color: #0d6efd; font-weight: bold; }
        .sub-judul { text-align: center; color: #6c757d; margin-bottom: 40px; }
        
        /* Gaya Kartu */
        .card { 
            border: none; 
            border-radius: 10px;
            transition: 0.3s;
            cursor: pointer;
            background: white;
        }
        .card:hover { 
            transform: translateY(-5px); 
            box-shadow: 0 10px 20px rgba(0,0,0,0.1); 
        }
        /* Mengatur gambar agar rapi di kiri */
        .card-body {
            display: flex;
            align-items: center;
            padding: 20px;
        }
        .card-img-wrapper {
            width: 80px;
            height: 80px;
            flex-shrink: 0;
            margin-right: 20px;
        }
        .card-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px;
        }
        .card-text-wrapper h5 {
            margin: 0;
            font-weight: bold;
            font-size: 1.1rem;
        }
        .card-text-wrapper p {
            margin: 5px 0 0 0;
            font-size: 0.85rem;
            color: #888;
        }
    </style>
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark px-4 py-3">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">
                <i class="fas fa-atom fa-lg me-2"></i> Lab Fisika UIN
            </a>
            
            <div>
                <?php if(session()->get('is_admin')): ?>
                    <span class="text-white me-3 fw-bold">
                        <i class="fas fa-user-shield"></i> Halo, Admin
                    </span>
                    <a href="<?= base_url('logout') ?>" class="btn btn-danger btn-sm px-4">Logout</a>
                <?php else: ?>
                    <a href="<?= base_url('login') ?>" class="btn btn-primary btn-sm px-4">Login Admin</a>
                <?php endif; ?>
            </div>

        </div>
    </nav>

    <div class="container mb-5">
        <h2 class="judul-halaman">Fasilitas Laboratorium</h2>
        <p class="sub-judul">Pilih Laboratorium untuk melihat daftar alat</p>

        <div class="row g-4">
            
            <div class="col-md-4">
                <div class="card shadow-sm" onclick="window.location='<?= base_url('barang/Basic-Physics') ?>'">
                    <div class="card-body">
                        <div class="card-img-wrapper">
                            <img src="https://via.placeholder.com/150?text=Basic" alt="Icon">
                        </div>
                        <div class="card-text-wrapper">
                            <h5>Basic Physics</h5>
                            <p>Klik untuk lihat alat</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm" onclick="window.location='<?= base_url('barang/Advance-Physics') ?>'">
                    <div class="card-body">
                        <div class="card-img-wrapper">
                            <img src="https://via.placeholder.com/150?text=Advance" alt="Icon">
                        </div>
                        <div class="card-text-wrapper">
                            <h5>Advance Physics</h5>
                            <p>Klik untuk lihat alat</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm" onclick="window.location='<?= base_url('barang/Modeling') ?>'">
                    <div class="card-body">
                        <div class="card-img-wrapper">
                            <img src="https://via.placeholder.com/150?text=Modeling" alt="Icon">
                        </div>
                        <div class="card-text-wrapper">
                            <h5>Modeling</h5>
                            <p>Klik untuk lihat alat</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm" onclick="window.location='<?= base_url('barang/Astrophysics') ?>'">
                    <div class="card-body">
                        <div class="card-img-wrapper">
                            <img src="https://via.placeholder.com/150?text=Astro" alt="Icon">
                        </div>
                        <div class="card-text-wrapper">
                            <h5>Astrophysics</h5>
                            <p>Klik untuk lihat alat</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm" onclick="window.location='<?= base_url('barang/Characteristic-Plant-Usage') ?>'">
                    <div class="card-body">
                        <div class="card-img-wrapper">
                            <img src="https://via.placeholder.com/150?text=Plant" alt="Icon">
                        </div>
                        <div class="card-text-wrapper">
                            <h5>Characteristic (Plant Usage)</h5>
                            <p>Klik untuk lihat alat</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm" onclick="window.location='<?= base_url('barang/Instrumentation') ?>'">
                    <div class="card-body">
                        <div class="card-img-wrapper">
                            <img src="https://via.placeholder.com/150?text=Instru" alt="Icon">
                        </div>
                        <div class="card-text-wrapper">
                            <h5>Instrumentation</h5>
                            <p>Klik untuk lihat alat</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm" onclick="window.location='<?= base_url('barang/Nuclear-Energi') ?>'">
                    <div class="card-body">
                        <div class="card-img-wrapper">
                            <img src="https://via.placeholder.com/150?text=Nuclear" alt="Icon">
                        </div>
                        <div class="card-text-wrapper">
                            <h5>Nuclear & Energi</h5>
                            <p>Klik untuk lihat alat</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm" onclick="window.location='<?= base_url('barang/Geophysics') ?>'">
                    <div class="card-body">
                        <div class="card-img-wrapper">
                            <img src="https://via.placeholder.com/150?text=Geo" alt="Icon">
                        </div>
                        <div class="card-text-wrapper">
                            <h5>Geophysics</h5>
                            <p>Klik untuk lihat alat</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm" onclick="window.location='<?= base_url('barang/Fisika-Material') ?>'">
                    <div class="card-body">
                        <div class="card-img-wrapper">
                            <img src="https://via.placeholder.com/150?text=Fismatel" alt="Icon">
                        </div>
                        <div class="card-text-wrapper">
                            <h5>Fisika Material (Fismatel)</h5>
                            <p>Klik untuk lihat alat</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm" onclick="window.location='<?= base_url('barang/Mechanical-Workshop') ?>'">
                    <div class="card-body">
                        <div class="card-img-wrapper">
                            <img src="https://via.placeholder.com/150?text=Mech" alt="Icon">
                        </div>
                        <div class="card-text-wrapper">
                            <h5>Mechanical Workshop</h5>
                            <p>Klik untuk lihat alat</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm border-primary" onclick="window.location='<?= base_url('barang') ?>'">
                    <div class="card-body bg-white text-primary">
                        <div class="card-img-wrapper">
                            <img src="https://via.placeholder.com/150?text=ALL" alt="Icon">
                        </div>
                        <div class="card-text-wrapper">
                            <h5 class="fw-bold">Lihat Semua Alat</h5>
                            <p class="text-primary">Klik untuk lihat alat</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>
</html>