<?php
include "db_conn.php";

if (isset($_POST["submit"])) {
   $username = $_POST['username'];
   $user_id = $_POST['user_id'];
   $Buku_id = $_POST['Buku_id'];
   $ulasan = $_POST['ulasan'];
   $rating = $_POST['rating'];
   $sql = "INSERT INTO `buku_ulasan`(`id`, `username`, `user_id`, `Buku_id`, `ulasan`, `rating`) VALUES (NULL,'$username','$user_id','$Buku_id','$ulasan','$rating')";

   $result = mysqli_query($conn, $sql);

   if ($result) {
      header("Location: ulasan.php?msg=New record created successfully");
      exit(); // Penting: pastikan untuk keluar dari skrip setelah melakukan redirect
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
               <input type="text" class="form-control" name="username" placeholder="Username">
            </div>

                <div class="mb-3">
               <label class="form-label"></label>
               <input type="text" class="form-control" name="user_id" placeholder="Judul">
            </div> 

            <div class="mb-3">
               <label class="form-label"></label>
               <input type="text" class="form-control" name="Buku_id" placeholder="Jumlah Ulasan">
            </div>

            <div class="form-group">
             <label for="ulasan"></label>
             <textarea class="form-control" id="ulasan" name="ulasan"  placeholder="Ulasan"  rows="3"></textarea>
             </div>

              <div class="form-group">
                    <label for="rating">Rating (1-5):</label>
                    <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" required>
                </div>

            <div>
               <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="ulasan.php" class="btn btn-danger">Cancel</a>
            </div>
         </form>
      </div>
   </div>

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>