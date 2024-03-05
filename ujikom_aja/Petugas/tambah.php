<?php
include "../db_conn.php";

if (isset($_POST["submit"])) {
   $nama_buku = $_POST['nama_buku'];
   $nama = $_POST['nama'];
   $tanggal = $_POST['tanggal'];
   $status_pinjam = $_POST['status_pinjam'];
   $sql = "INSERT INTO peminjaman( nama_buku, nama, tanggal, status_pinjam) VALUES ('$nama_buku','$nama','$tanggal','$status_pinjam')";

   $result = mysqli_query($conn, $sql);

   if ($result) {
      header("Location: peminjam.php?msg=New record created successfully");
   } else {
      echo "Failed: " . mysqli_error($conn);
   }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <title>PERPUSTAKAAN</title>
</head>

<body>
   

   <div class="container">
      <div class="text-center mb-4">
         <h3>Tambah</h3>
         <p class="text-muted">PERPUSTAKAAN KU</p>
      </div>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">

                <div class="mb-3">
               <label class="form-label"></label>
               <input type="text" class="form-control" name="nama_buku" placeholder="Nama Buku">
            </div>

            <div class="mb-3">
               <label class="form-label"></label>
               <input type="text" class="form-control" name="nama" placeholder="Nama Peminjam">
            </div>

           
            <div class="mb-3">
               <label class="form-label"></label>
               <input type="date" class="form-control" name="tanggal" placeholder="Tanggal Peminjaman">
            </div>
              <label for="buah">Status:</label>
               <select id="buah " name="status_pinjam">
               <option value="di baca">di baca</option>
               <option value="di kembalikan">di kembalikan</option>
               <option value="di pinjam">di pinjam</option>
             </select>
            <div>
               <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="peminjam.php" class="btn btn-danger">Cancel</a>
            </div>
         </form>
      </div>
   </div>

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html> 