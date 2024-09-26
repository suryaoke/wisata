<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Kategori</h4>

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Tambah Data
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $query = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY id_kategori DESC");
                                while ($data =  mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $data['nama_kategori'] ?></td>
                                        <td>
                                            <!-- Tombol untuk memunculkan modal Ubah -->
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ubahModal<?php echo $data['id_kategori']; ?>">
                                                <i class="fa fa-edit"></i>
                                            </button>

                                            <a href="kategori/hapus.php?id_kategori=<?php echo $data['id_kategori'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- Modal Ubah Data -->
                                    <div class="modal fade" id="ubahModal<?php echo $data['id_kategori']; ?>" tabindex="-1" aria-labelledby="ubahModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="ubahModalLabel">Ubah Data Kategori</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="kategori/proses_ubah.php" method="POST">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id_kategori" value="<?php echo $data['id_kategori']; ?>">
                                                        <div class="form-group">
                                                            <label for="Nama Kategori">Nama Kategori</label>
                                                            <input type="text" name="nama_kategori" class="form-control" value="<?php echo $data['nama_kategori']; ?>" placeholder="Masukkan Nama Kategori">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-success">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="kategori/proses_tambah.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Nama Kategori">Nama Kategori</label>
                        <input type="text" name="nama_kategori" class="form-control" placeholder="Masukkan Nama Kategori">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if ($_SESSION['save_success']) :
?>

    <script>
        Swal.fire({
            position: "center",
            icon: "success",
            title: "<?= $_SESSION['save_success'] ?>",
            showConfirmButton: false,
            timer: 1500
        });
    </script>

<?php
    unset($_SESSION['save_success']);
endif; ?>


<?php
if ($_SESSION['update_success']) :
?>

    <script>
        Swal.fire({
            position: "center",
            icon: "success",
            title: "<?= $_SESSION['update_success'] ?>",
            showConfirmButton: false,
            timer: 1500
        });
    </script>

<?php
    unset($_SESSION['update_success']);
endif; ?>


<?php
if ($_SESSION['delete_success']) :
?>

    <script>
        Swal.fire({
            position: "center",
            icon: "success",
            title: "<?= $_SESSION['delete_success'] ?>",
            showConfirmButton: false,
            timer: 1500
        });
    </script>

<?php
    unset($_SESSION['delete_success']);
endif; ?>