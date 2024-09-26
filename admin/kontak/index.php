 <div class="container">
     <div class="row">
         <div class="col-md-12">
             <div class="card">
                 <div class="card-header">
                     <h4 class="card-title">Kontak</h4>
                     <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                         Tambah Data
                     </button>
                 </div>
                 <div class="card-body">
                     <div class="table-responsive">
                         <table
                             id="basic-datatables"
                             class="display table table-striped table-hover">
                             <thead class="thead-light">
                                 <tr>
                                     <th>No</th>
                                     <th>Facebook</th>
                                     <th>Instagram</th>
                                     <th>No Hp</th>
                                     <th>Alamat</th>
                                     <th>Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php
                                    $no = 1;
                                    $query = mysqli_query($koneksi, "SELECT * FROM kontak ORDER BY id_kontak DESC");
                                    while ($data =  mysqli_fetch_array($query)) {

                                    ?>
                                     <tr>
                                         <td><?php echo $no++ ?></td>
                                         <td> <?php echo $data['facebook'] ?></td>
                                         <td> <?php echo $data['instagram'] ?></td>
                                         <td> <?php echo $data['no_telp'] ?></td>
                                         <td> <?php echo substr($data['alamat'], 0, 50)  ?></td>

                                         <td>
                                             <!-- Tombol untuk memunculkan modal Ubah -->
                                             <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ubahModal<?php echo $data['id_kontak']; ?>">
                                                 <i class="fa fa-edit"></i>
                                             </button>
                                             <a href="kontak/hapus.php?id_kontak=<?php echo $data['id_kontak'] ?>"
                                                 class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kontak ini?')">
                                                 <i class="fa fa-trash"></i></a>

                                         </td>

                                     </tr>
                                     <!-- Modal Ubah Data -->
                                     <div class="modal fade" id="ubahModal<?php echo $data['id_kontak']; ?>" tabindex="-1" aria-labelledby="ubahModalLabel" aria-hidden="true">
                                         <div class="modal-dialog modal-dialog-centered">
                                             <div class="modal-content">
                                                 <div class="modal-header">
                                                     <h5 class="modal-title" id="ubahModalLabel">Ubah Data Kontak</h5>
                                                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                 </div>
                                                 <form action="kontak/proses_ubah.php" method="POST">
                                                     <div class="modal-body">
                                                         <input type="hidden" name="id_kontak" value="<?php echo $data['id_kontak']; ?>">

                                                         <div class="form-group">
                                                             <label for="">Facebook</label>
                                                             <input type="text" class="form-control" name="facebook" value="<?php echo $data['facebook']; ?>" required>
                                                         </div>

                                                         <div class="form-group">
                                                             <label for="">Instagram</label>
                                                             <input type="text" class="form-control" name="instagram" value="<?php echo $data['instagram']; ?>" required>

                                                         </div>

                                                         <div class="form-group">
                                                             <label for="">No Hp</label>
                                                             <input type="text" class="form-control" name="no_telp" value="<?php echo $data['no_telp']; ?>" required>

                                                         </div>

                                                         <div class="form-group">
                                                             <label for="">Alamat</label>
                                                             <textarea class="form-control" name="alamat" required><?php echo $data['alamat']; ?></textarea>

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
                 <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Kontak</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form action="kontak/proses_tambah.php" method="POST">
                 <div class="modal-body">
                     <div class="form-group">
                         <label for="">Facebook</label>
                         <input type="text" name="facebook" class="form-control" required>
                     </div>
                     <div class="form-group">
                         <label for="">Instagram</label>
                         <input type="text" name="instagram" class="form-control" required>
                     </div>
                     <div class="form-group">
                         <label for="">No Hp</label>
                         <input type="number" name="no_telp" class="form-control" required>
                     </div>

                     <div class="form-group">
                         <label for="">Alamat</label>
                         <textarea name="alamat" class="form-control" required></textarea>
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