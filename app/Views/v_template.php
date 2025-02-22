
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title> Risda_2201301185 <?= $judul?></title>
        <link href="<?= base_url('sb-Admin')?>/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous">
        </script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
            <script src="<?= base_url('sb-Admin')?>/js/scripts.js"></script>

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('sb-Admin/js/datatables-simple-demo.js') ?>"></script>





    </head>
    <body>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Titik Lokasi Sekolah Desa Bati-Bati</a>
            <!-- Sidebar Toggle-->
            <!-- <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button> -->
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
               
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <!-- <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="<?=base_url ('Home')?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a> -->
                            <div class="sb-sidenav-menu-heading">Tanpa Database</div>
                            <a class="nav-link" href="<?=base_url('Home/viewMap')?>">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-map"></i></i></div>
                                View Map
                            </a>
                            <a class="nav-link" href="<?=base_url('Home/baseMap')?>">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-layer-group"></i></i></div>
                                Base Map
                            </a>
                            <a class="nav-link" href="<?=base_url('Home/marker')?>">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-location-dot"></i></i></div>
                                Marker
                            </a>
                            <a class="nav-link" href="<?=base_url('Home/polygon')?>">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-arrow-trend-up"></i></i></div>
                                Polygon
                            </a>

                            <a class="nav-link" href="<?=base_url('Home/geojson')?>">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-gear"></i></div>
                               Geojson
                            </a>

                            <div class="sb-sidenav-menu-heading">Dengan Database</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                               Lokasi
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?=base_url('Lokasi/inputlokasi')?>">Input Lokasi</a>
                                    <a class="nav-link" href="<?=base_url('Lokasi/index')?>">Data Lokasi </a>
                                    <!-- <a class="nav-link" href="Input Lokasi</a> -->

                                    <a class="nav-link" href="<?=base_url('Lokasi/pemetaanlokasi')?>">Pemetaan Lokasi</a>
                                </nav>
                            </div>
                            
                            <!-- <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-gear"></i></div>
                                Tables
                            </a> -->
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">2201301185_UAS_SIG:</div>
                        Titik Lokasi Sekolah Desa Bati-Bati
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"><?= $judul?></h1>
                       <hr>
                       <?php if($page){
                        echo view($page);
                       }?>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Titik Lokasi Sekolah Desa Bati-Bati **Risda**</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </body>
</html>
