<?php

$about = mysqli_query($koneksi, "SELECT * FROM about");
$a = mysqli_fetch_array($about);

$wisata1 = mysqli_query($koneksi, "SELECT * FROM wisata ORDER BY id_wisata ASC LIMIT 1");
$w1 = mysqli_fetch_array($wisata1);

$wisata2 = mysqli_query($koneksi, "SELECT * FROM wisata ORDER BY id_wisata DESC LIMIT 1");
$w2 = mysqli_fetch_array($wisata2);
?>
<style>
    .team-item img,
    .package-item img,
    .popular-item1 img,
    .popular-item2 img,
    .popular-item3 img {
        width: 100%;
        /* Membuat lebar gambar selalu mengikuti lebar kontainer */
        height: 250px;
        /* Menentukan tinggi tetap untuk semua gambar */
        object-fit: cover;
        /* Memotong gambar agar sesuai dengan ukuran kontainer tanpa mengubah proporsi */
    }
</style>

<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="img-fluid position-absolute w-100 h-100" src="admin/uploads/<?= $a['gambar_about'] ?>" alt="" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
                <h1 class="mb-4">Welcome to <span class="text-primary">Wisata</span></h1>
                <p class="mb-4"><?= $a['visi'] ?></p>
                <p class="mb-4"><?= $a['misi'] ?> </p>

                <a class="btn btn-primary py-3 px-5 mt-2" href="?page=about">Read More</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Destination Start -->
<div class="container-xxl py-5 destination">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Destination</h6>
            <h1 class="mb-5">Popular Destination</h1>
        </div>
        <div class="row g-3">
            <div class="col-lg-7 col-md-6">
                <div class="row g-3">
                    <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                        <div class="popular-item1">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="admin/uploads/<?php echo $w1['gambar_wisata'] ?>" alt="">

                                <div
                                    class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">
                                    <?php echo $w1['judul_wisata'] ?></div>
                            </a>
                        </div>
                    </div>
                    <?php

                    $querywisata = mysqli_query($koneksi, "SELECT * FROM  wisata ORDER BY id_wisata ASC LIMIT 2 ");
                    while ($wisata =  mysqli_fetch_array($querywisata)) {
                    ?>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                            <div class="popular-item2">
                                <a class="position-relative d-block overflow-hidden" href="">
                                    <img class="img-fluid" src="admin/uploads/<?php echo $wisata['gambar_wisata'] ?>" alt="">

                                    <div
                                        class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">
                                        <?php echo $wisata['judul_wisata'] ?></div>
                                </a>
                            </div>

                        </div>
                    <?php } ?>

                </div>
            </div>
            <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
                <a class="position-relative d-block h-100 overflow-hidden" href="">
                    <img class="img-fluid position-absolute w-100 h-100" src="admin/uploads/<?php echo $w2['gambar_wisata'] ?>" alt=""
                        style="object-fit: cover;">

                    <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">
                        <?php echo $w2['judul_wisata'] ?></div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Destination Start -->
<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Kategori</h6>
            <h1 class="mb-5">Kategori</h1>
        </div>
        <div class="row g-4">
            <?php

            $querykategori = mysqli_query($koneksi, "SELECT * FROM  kategori");
            while ($kategori =  mysqli_fetch_array($querykategori)) {
            ?>

                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                            <h5><?php echo $kategori['nama_kategori'] ?> </h5>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</div>
<!-- Service End -->


<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Wisata</h6>
            <h1 class="mb-5">Wisata</h1>
        </div>
        <div class="row g-4">
            <?php
            if (isset($_POST['cari'])) {
                $keywords = $_POST['keyword'];
                $querywisata = mysqli_query($koneksi, "SELECT * FROM wisata
                            WHERE judul_wisata LIKE '%$keywords%'");
            } else {
                $nama_kategori = isset($_GET['nama_kategori']) ? $_GET['nama_kategori'] : null;

                if ($nama_kategori) {
                    $querywisata = mysqli_query($koneksi, "SELECT * FROM wisata
                                 JOIN kategori ON wisata.id_kategori=kategori.id_kategori
                                 WHERE nama_kategori ='$nama_kategori'
                                 ORDER BY id_wisata DESC");
                } else {
                    $querywisata = mysqli_query($koneksi, "SELECT * FROM wisata
                                 JOIN kategori ON wisata.id_kategori=kategori.id_kategori
                                 ORDER BY id_wisata DESC");
                }
            }

            while ($wisata =  mysqli_fetch_array($querywisata)) {
            ?>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid w-100" src="admin/uploads/<?php echo $wisata['gambar_wisata']; ?>">
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0"> <?php echo $wisata['judul_wisata'] ?></h5>
                            <small> <?php echo substr($wisata['isi_wisata'], 0, 50)  ?> </small>
                            <div class="">
                                <a href="detailwisata-<?php echo $wisata['slug'] ?>"
                                    class="btn btn-primary rounded-pill" style="margin-top: 7px;">Details</a>
                            </div>
                        </div>

                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- Team End -->




<!-- Package Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Armada</h6>
            <h1 class="mb-5">Armada</h1>
        </div>
        <div class="row g-4 justify-content-center">
            <?php
            $no = 1;
            $queryarmada = mysqli_query($koneksi, "SELECT * FROM armada ORDER BY id_armada ASC");
            while ($armada =  mysqli_fetch_array($queryarmada)) {

            ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="package-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="admin/uploads/<?php echo $armada['foto'] ?>" alt="">
                        </div>
                        <div class="d-flex border-bottom">
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $armada['nama_armada'] ?></small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i><?php echo $armada['kapasitas'] ?> Person</small>
                        </div>

                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</div>
<!-- Package End -->





<!-- Team Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h6 class="section-title bg-white text-center text-primary px-3">Tim</h6>
            <h1 class="mb-5">Tim</h1>
        </div>
        <div class="owl-carousel testimonial-carousel position-relative">
            <?php
            $no = 1;
            $querytim = mysqli_query($koneksi, "SELECT * FROM tim ORDER BY id_tim ASC");
            while ($tim =  mysqli_fetch_array($querytim)) {

            ?>
                <div class="testimonial-item bg-white text-center border p-4">
                    <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="admin/uploads/<?php echo $tim['foto']; ?>" style="width: 80px; height: 80px;">
                    <h5 class="mb-0"><?php echo $tim['nama_tim'] ?></h5>
                    <p><?php echo $tim['jabatan'] ?></p>
                    <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, soluta?</p>
                </div>
            <?php } ?>

        </div>
    </div>
</div>
<!-- Team End -->