<?php

// Mengambil data kategori berdasarkan id_kategori
$kontak = mysqli_query($koneksi, "SELECT * FROM kontak");
$k = mysqli_fetch_array($kontak);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Wisata</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="assets/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i><?= $k['alamat'] ?></small>
                    <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i><?= $k['no_telp'] ?></small>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">

                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="<?= $k['facebook'] ?>"><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="<?= $k['instagram'] ?>"><i class="fab fa-instagram fw-normal"></i></a>

                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="" class="navbar-brand p-0">
                <h1 class="text-primary m-0"><i class="fa fa-map-marker-alt me-3"></i>Wisata</h1>
                <!-- <img src="assets/img/logo.png" alt="Logo"> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <?php
                    // Mendapatkan parameter 'page' dari URL, default adalah 'home'
                    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
                    ?>
                    <a href="/" class="nav-item nav-link <?php echo ($page == 'home') ? 'active' : ''; ?>">Home</a>
                    <a href="?page=about" class="nav-item nav-link <?php echo ($page == 'about') ? 'active' : ''; ?>">About</a>
                    <a href="?page=tim" class="nav-item nav-link <?php echo ($page == 'tim') ? 'active' : ''; ?>">Tim</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Kategori</a>
                        <div class="dropdown-menu m-0">
                            <?php

                            $querykategori = mysqli_query($koneksi, "SELECT * FROM kategori 
                                                               ORDER BY nama_kategori DESC");
                            while ($datakategori =  mysqli_fetch_array($querykategori)) {
                            ?>
                                <a href="index.php?nama_kategori=<?= $datakategori['nama_kategori'] ?>"
                                    class="dropdown-item"><?php echo $datakategori['nama_kategori'] ?> </a>
                            <?php } ?>
                        </div>
                    </div>
                    <a href="contact" class="nav-item nav-link <?php echo ($page == 'contact') ? 'active' : ''; ?>">Contact</a>
                </div>
                <!-- <a href="" class="btn btn-primary rounded-pill py-2 px-4">Register</a> -->
            </div>
        </nav>

        <?php
        $page = isset($_GET['page']) ? $_GET['page'] : 'home';

        if ($page == 'home') {


        ?>
            <div class="container-fluid bg-primary py-5 mb-5 hero-header">
                <div class="container py-5">
                    <div class="row justify-content-center py-5">
                        <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                            <h1 class="display-3 text-white mb-3 animated slideInDown">Enjoy Your Vacation With Us</h1>
                            <p class="fs-4 text-white mb-4 animated slideInDown">Tempor erat elitr rebum at clita diam amet diam et eos erat ipsum lorem sit</p>
                            <div class="position-relative w-75 mx-auto animated slideInDown">
                                <form action="index.php" method="post">
                                    <input class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5" name="keyword" type="text" placeholder="Eg: Puncak Seribu ">
                                    <button name="cari" type="submit" class="btn btn-primary rounded-pill py-2 px-4 position-absolute top-0 end-0 me-2" style="margin-top: 7px;">Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } elseif ($page == 'about') { ?>


            <div class="container-fluid bg-primary py-5 mb-5 hero-header">
                <div class="container py-5">
                    <div class="row justify-content-center py-5">
                        <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                            <h1 class="display-3 text-white animated slideInDown">About Us</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                    <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        <?php } elseif ($page == 'tim') { ?>

            <div class="container-fluid bg-primary py-5 mb-5 hero-header">
                <div class="container py-5">
                    <div class="row justify-content-center py-5">
                        <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                            <h1 class="display-3 text-white animated slideInDown">Tim</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                    <li class="breadcrumb-item text-white active" aria-current="page">Guides</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        <?php } elseif ($page == 'contact') { ?>

            <div class="container-fluid bg-primary py-5 mb-5 hero-header">
                <div class="container py-5">
                    <div class="row justify-content-center py-5">
                        <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                            <h1 class="display-3 text-white animated slideInDown">Contact Us</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                    <li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        <?php } elseif ($page == 'detail') { ?>

            <div class="container-fluid bg-primary py-5 mb-5 hero-header">
                <div class="container py-5">
                    <div class="row justify-content-center py-5">
                        <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                            <h1 class="display-3 text-white animated slideInDown">Detail Wisata</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                    <li class="breadcrumb-item text-white active" aria-current="page">Detail Wisata</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <!-- Navbar & Hero End -->