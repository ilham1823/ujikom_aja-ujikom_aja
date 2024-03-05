<?php
include "../db_conn.php";

if (isset($_POST["submit"])) {
   $id = $_GET["id"];
   $judul = $_POST['judul'];
   $penulis = $_POST['penulis'];
   $penerbit = $_POST['penerbit'];
   $tahun_terbit = $_POST['tahun_terbit'];
   $kategori_id = $_POST['kategori_id'];
   $sql = "UPDATE buku SET judul='$judul', penulis='$penulis', penerbit='$penerbit', tahun_terbit='$tahun_terbit', kategori_id='$kategori_id' WHERE id=$id";

   $result = mysqli_query($conn, $sql);

   if ($result) {
      header("Location: buku.php?msg=Record updated successfully");
      exit();
   } else {
      echo "Failed: " . mysqli_error($conn);
   }
}

// Retrieve data to populate the form
$id = $_GET["id"];
$sql = "SELECT * FROM buku WHERE id = $id LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
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
      <h3>Edit</h3>
      <p class="text-muted">PERPUSTAKAAN</p>
    </div>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
          <div class="mb-3">
            <label class="form-label">Judul Buku</label>
            <input type="text" class="form-control" name="judul" placeholder="Judul Buku" value="<?php echo $row['judul']; ?>">
          </div>
          <div class="mb-3">
            <label class="form-label">Penulis</label>
            <input type="text" class="form-control" name="penulis" placeholder="Penulis" value="<?php echo $row['penulis']; ?>">
          </div>
          <div class="mb-3">
            <label class="form-label">Penerbit</label>
            <input type="text" class="form-control" name="penerbit" placeholder="Penerbit" value="<?php echo $row['penerbit']; ?>">
          </div>
          <div class="mb-3">
            <label class="form-label">Tahun Terbit</label>
            <input type="date" class="form-control" name="tahun_terbit" placeholder="Tahun Terbit" value="<?php echo $row['tahun_terbit']; ?>">
          </div>
          <label for="kategori_id">Kategori</label>
          <select id="kategori_id" name="kategori_id" class="form-select mb-3">
            <option value="Comedy" <?php if ($row['kategori_id'] == 'Comedy') echo 'selected'; ?>>Comedy</option>
            <option value="Horor" <?php if ($row['kategori_id'] == 'Horor') echo 'selected'; ?>>Horor</option>
            <option value="Romantis" <?php if ($row['kategori_id'] == 'Romantis') echo 'selected'; ?>>Romantis</option>
            <option value="Anak pintar" <?php if ($row['kategori_id'] == 'Anak pintar') echo 'selected'; ?>>Anak pintar</option>
          </select>
          <div>
            <button type="submit" class="btn btn-success" name="submit">Update</button>
            <a href="buku.php" class="btn btn-danger">Cancel</a>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
