<?php
$kontak = mysqli_query($koneksi, "SELECT * FROM kontak");
$k = mysqli_fetch_array($kontak);
?>

<!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Kategori</h4>
                <?php

                $querykategori = mysqli_query($koneksi, "SELECT * FROM kategori 
                                                               ORDER BY nama_kategori DESC");
                while ($datakategori =  mysqli_fetch_array($querykategori)) {
                ?>
                    <a class="btn btn-link" href=""> <?= $datakategori['nama_kategori'] ?> </a>
                <?php } ?>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Contact</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i> <?= $k['alamat'] ?> </p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i> <?= $k['no_telp'] ?> </p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href="<?= $k['instagram'] ?> "><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-outline-light btn-social" href="<?= $k['facebook'] ?>"><i class="fab fa-facebook-f"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Gallery</h4>
                <div class="row g-2 pt-2">
                    <?php
                    $querywisata = mysqli_query($koneksi, "SELECT * FROM wisata
                                 JOIN kategori ON wisata.id_kategori=kategori.id_kategori
                                 ORDER BY id_wisata DESC LIMIT 6");
                    while ($wisata =  mysqli_fetch_array($querywisata)) {
                    ?>
                        <div class="col-4" >
                            <img class="img-fluid bg-light p-1" src="admin/uploads/<?php echo $wisata['gambar_wisata'] ?>" alt="">
                        </div>
                    <?php } ?>


                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Newsletter</h4>
                <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                <div class="position-relative mx-auto" style="max-width: 400px;">
                    <input class="form-control border-primary w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                    <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">Surya Sahputra 2024</a>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                        <a href="">Home</a>
                        <a href="">Cookies</a>
                        <a href="">Help</a>
                        <a href="">FQAs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/lib/wow/wow.min.js"></script>
<script src="assets/lib/easing/easing.min.js"></script>
<script src="assets/lib/waypoints/waypoints.min.js"></script>
<script src="assets/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="assets/lib/tempusdominus/js/moment.min.js"></script>
<script src="assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Template Javascript -->
<script src="assets/js/main.js"></script>
</body>

</html>