<?php
require "../functions.php";

if (isset($_POST["submit"])) {

  if (tambahMobil($_POST) > 0) {
    echo "
            <script>
                alert('Data Berhasil Ditambahkan!');
                document.location.href = 'data-mobil.php';
            </script>
        ";
  } else {
    echo "
            <script>
                alert('Data Gagal Ditambahkan!');
                // document.location.href = 'data-mobil.php';
            </script>
        ";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambahkan Data</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>

  <div class="container">
    <!-- Form Tambah Data -->
    <form action="" method="post" enctype="multipart/form-data">
      <div class="card mt-4">
        <div class="card-header text-center bg-dark text-white">
          Tambahkan Data Mobil
        </div>
        <div class="card-body">
          <div class="mb-3 text-left">
            <label for="gambar-mobil" class="form-label">Gambar Mobil</label>
            <input type="file" name="gambar-mobil" class="form-control" id="gambar-mobil">
          </div>
          <div class="mb-3">
            <label for="merek-mobil" class="form-label">Merek Mobil</label>
            <input type="text" name="merek-mobil" class="form-control" id="merek-mobil"
              placeholder="Masukkan Merek Mobil" required>
          </div>
          <div class="mb-3">
            <label for="model-mobil" class="form-label">Model Mobil</label>
            <input type="text" name="model-mobil" class="form-control" id="model-mobil"
              placeholder="Masukkan Model Mobil" required>
          </div>
          <div class="mb-3">
            <label for="harga-sewa" class="form-label">Harga Sewa per Hari</label>
            <input type="text" name="harga-sewa" class="form-control" id="harga-sewa" placeholder="Masukkan Harga Sewa"
              required>
          </div>
          <div class="mb-3">
            <label for="bbm" class="form-label">Jenis BBM</label>
            <input type="text" name="bbm" class="form-control" id="bbm" placeholder="Masukkan Jenis BBM" required>
          </div>
          <div class="mb-3">
            <label for="jumblah-kursi" class="form-label">Jumlah Kursi</label>
            <input type="number" name="jumblah-kursi" class="form-control" id="jumblah-kursi"
              placeholder="Masukkan Kapasitas Jumlah Penumpang" required>
          </div>
          <div class="mb-3">
            <label for="plat-mobil" class="form-label">Plat Mobil</label>
            <input type="text" name="plat-mobil" class="form-control" id="plat-mobil" placeholder="Masukkan Plat Mobil"
              required>
          </div>
          <!-- <div class="mb-3">
            <label for="ketersediaan" class="form-label">Tersedia</label>
            <input type="checkbox" name="ketersediaan"  id="ketersediaan" checked="checked" />
          </div> -->
        </div>
        <div class="card-footer bg-dark"></div>

        <!-- Button Save & Cancel -->
        <div class="text-center mb-4">
          <button type="submit" name="submit" class="btn btn-success">Save</button>
          <a href="tambah-mobil.php" class="btn btn-danger">Batal</a>
        </div>
      </div>
    </form>
    <!-- Form Tambah Data -->
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
    crossorigin="anonymous"></script>

</body>

</html>