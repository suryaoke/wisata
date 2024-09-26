 <div class="container">
     <div class="row">
         <div class="col-md-12">
             <div class="card">
                 <div class="card-header">
                     <h4 class="card-title">About</h4>

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
                                     <th>Visi</th>
                                     <th>Misi</th>
                                     <th>Gambar</th>
                                     <th>Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php
                                    $no = 1;
                                    $query = mysqli_query($koneksi, "SELECT * FROM about ORDER BY id_about DESC");
                                    while ($data =  mysqli_fetch_array($query)) {

                                    ?>
                                     <tr>

                                         <td><?php echo $no++ ?></td>
                                         <td> <?php echo $data['visi'] ?></td>
                                         <td> <?php echo $data['misi'] ?></td>
                                         <td class="text-center"> <img width="100" src="../admin/uploads/<?php echo $data['gambar_about'] ?>" alt=""></td>


                                         <td>
                                             <!-- Tombol untuk memunculkan modal Ubah -->
                                             <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ubahModal<?php echo $data['id_about']; ?>">
                                                 <i class="fa fa-edit"></i>
                                             </button>
                                             <a href="about/hapus.php?id_about=<?php echo $data['id_about'] ?>"
                                                 class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus about ini?')">
                                                 <i class="fa fa-trash"></i></a>

                                         </td>

                                     </tr>


                                     <!-- Modal Ubah Data -->
                                     <div class="modal fade" id="ubahModal<?php echo $data['id_about']; ?>" tabindex="-1" aria-labelledby="ubahModalLabel" aria-hidden="true">
                                         <div class="modal-dialog modal-dialog-centered">
                                             <div class="modal-content">
                                                 <div class="modal-header">
                                                     <h5 class="modal-title" id="ubahModalLabel">Ubah Data About</h5>
                                                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                 </div>
                                                 <form action="about/proses_ubah.php" method="POST">
                                                     <div class="modal-body">
                                                         <input type="hidden" name="id_about" value="<?php echo $data['id_about'] ?>">

                                                         <div class="form-group mb-3">
                                                             <label for="">Visi</label>
                                                             <input type="text" name="visi" class="form-control" value="<?php echo $data['visi']; ?>">

                                                         </div>
                                                         <div class="form-group mb-3">
                                                             <label for="">Misi</label>
                                                             <input type="text" name="misi" class="form-control" value="<?php echo $data['misi']; ?>">

                                                         </div>


                                                         <div class="form-group mb-3">
                                                             <label for="">Gambar_about</label>
                                                             <img width="100" src="../admin/uploads/<?php echo $data['gambar_about'] ?>" alt="">
                                                             <input type="hidden" name="foto_lama" value="<?php echo $data['gambar_about'] ?>" id="">
                                                             <input type="file" name="gambar_about" class="form-control" value="<?php echo $data['gambar_about'] ?>">
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
                 <h5 class="modal-title" id="staticBackdropLabel">Tambah Data About</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form action="about/proses_tambah.php" method="POST">
                 <div class="modal-body">
                     <div class="form-group mb-3">
                         <label for="">Visi </label>
                         <input type="text" name="visi" class="form-control" required>
                     </div>

                     <div class="form-group mb-3">
                         <label for="">Misi</label>
                         <input name="misi" class="form-control" required>
                     </div>


                     <div class="form-group mb-3">
                         <label for="">Gambar</label>
                         <input type="file" name="gambar_about" class="form-control" required>
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