<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Peminjam</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    
<header>
    <h1>Perpustakaan Ceria</h1>
</header>
<nav>
    <ul>
        <li><a href="#">Buku Baca</a></li>
        <div class="topbar-divider d-none d-sm-block"></div>
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <!-- Dropdown - User Information -->
            <div id="userDropdown" class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="../login.php" data-toggle="modal" data-target="#../logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
<div class="container">
    <div class="library">
        <h2>Selamat Datang di Perpus Ceria</h2>
        <p>menyediakan berbagai koleksi buku terbaru dan terbaik</p>
        <div class="pos">
            <div class="card">
                <div class="card-image">
                    <img src="maling.jpg" alt="Judul Buku">
                </div>
                <div class="card-details">
                    <h3 class="book-title">Maling Kundang</h3>
                    <p class="book-details">Penulis : Andre </p>
                    <p class="book-details">Tahun Terbit : 2001 </p>
                </div>
                <div class="button">
                    <button id="pinjamBtn1" class="btn" onclick="ubahTombol('pinjamBtn1')">Pinjam</button>
                    <button class="btn" onclick="Detail()">Baca</button>
                    
                </div>
            </div>
            <div class="card">
                <div class="card-image">
                    <img src="dilan.webp" alt="Judul Buku">
                </div>
                <div class="card-details">
                    <h3 class="book-title">Dilan&Milea</h3>
                    <p class="book-details">Penulis : Abia </p>
                    <p class="book-details">Tahun Terbit : 1990 </p>
                </div>
                <div class="button">
                    <button id="pinjamBtn2" class="btn" onclick="ubahTombol('pinjamBtn2')">Pinjam</button>
                    <button class="btn" onclick="goToDetail()">Baca</button>
                    
                </div>
            </div>
            <div class="card">
                <div class="card-image">
                    <img src="sejarah.webp" alt="Judul Buku">
                </div>
                <div class="card-details">
                    <h3 class="book-title">Karakter Sejarah</h3>
                    <p class="book-details">Penulis : Fahrezi </p>
                    <p class="book-details">Tahun Terbit : 2020 </p>
                </div>
                <div class="button">
                    <button id="pinjamBtn3" class="btn" onclick="ubahTombol('pinjamBtn3')">Pinjam</button>
                    <button class="btn" onclick="ToDetail()">Baca</button>
                    
                </div>
            </div>
        </div>
    </div>
</div>
    

<script>
    function ubahTombol(id) {
        var button = document.getElementById(id);
        if (button.innerHTML === "Dikembalikan") {
            button.innerHTML = "Pinjam";
        } else {
            button.innerHTML = "Dikembalikan";
        }
    }

function Detail() {
    window.location.href = "detail.php";
}

    function goToDetail() {
       
        window.location.href = "baca1.php";
    }
    function ToDetail() {
       
       window.location.href = "baca2.php";
   }
    
    function goToReview() {
        window.location.href = "review.php";

    } 
</script>

</body>
</html>
