<?php require "../header.php"; ?>

<!-- Menampilkan Data (SELECT.PHP) -->
<?php require "../functions.php";

$data_mobil = query($conn, "SELECT * FROM mobil");

if (isset($_POST)) {

}

if (isset($_POST["cari"])) {
  $data_mobil = cariMobil($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Admin</title>
</head>

<body>
  <!-- awal-container  -->
  <div class="container">

    <!-- form data barang  -->
    <div class="card mt-4 mb-4">
      <div class="card-header bg-dark text-white text-center">
        Data Mobil
      </div>
      <div class="card-body">
        <a href="tambah-mobil.php">
          <button type="button" class="btn btn-success mb-4">Tambahkan Data</button>
        </a>
        <table class="table table-dark table-striped table-hover table-bordered">
          <tr>
            <th>No.</th>
            <th>Gambar</th>
            <th>Merek</th>
            <th>Model</th>
            <th>Harga Sewa</th>
            <th>BBM</th>
            <th>Jumblah Kursi</th>
            <th>Plat Mobil</th>
            <th>Ketersediaan</th>
            <th style="width: 160px;">Aksi</th>
          </tr>

          <?php $nomor = 1; ?>
          <?php foreach ($data_mobil as $row): ?>
            <tr>
              <td><?= $nomor ?></td>
              <td>
                <img src="../../mobil/<?= $row["gambar"]; ?>" alt="" width="80px" height="60px">
              </td>
              <td><?= $row["merk"]; ?></td>
              <td><?= $row["model"]; ?></td>
              <td><?= $row["harga"]; ?></td>
              <td><?= $row["bbm"]; ?></td>
              <td width="100px"><?= $row["jumlah_kursi"]; ?></td>
              <td><?= $row["plat"]; ?></td>
              <td><?= $row["ketersediaan"]; ?></td>
              <td class="text-center">
                <a href="edit-mobil.php?id=<?= $row["id"]; ?>" class="btn btn-warning">Edit</a>
                <a href="hapus-mobil.php?id=<?= $row["id"]; ?>>
                  <button type=" button" class="btn btn-danger" data-bs-toggle="modal"
                  data-bs-target="#staticBackdrop">
                  Delete
                  </button>
                </a>
              </td>
            </tr>
            <?php $nomor++ ?>
          <?php endforeach; ?>
        </table>
      </div>
      <div class="card-footer bg-dark"></div>
    </div>
    <!-- form data barang  -->

  </div>
  <!-- awal-container  -->
  <!-- awal-container  -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Hapus Data Costumer</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Ingin Menghapus Data ini ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <a href="hapus-mobil.php?id=<?= $row["id"]; ?>">
            <button type="submit" class="btn btn-danger">Hapus</button>
          </a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
<style>