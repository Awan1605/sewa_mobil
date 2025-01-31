<?php require "../header.php"; ?>

<!-- Menampilkan Data (SELECT.PHP) -->
<?php require "../functions.php";

$costumer = query($conn, "SELECT * FROM tb_costumer");

if (isset($_POST)) {

}

if (isset($_POST["cari"])) {
  $costumer = cariCostumer($_POST["keyword"]);
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
        Data Costumer
      </div>
      <div class="card-body">
        <a href="tambah-costumer.php">
          <button type="button" class="btn btn-success mb-4">Tambahkan Data</button>
        </a>
        <table class="table table-dark table-striped table-hover table-bordered">
          <tr>
            <th>No.</th>
            <th>Nama Costumer</th>
            <th>Alamat Costumer</th>
            <th>Nomer Telepon</th>
            <th>Jenis Kelamin</th>
            <th>Aksi</th>
          </tr>

          <?php $id = 1; ?>
          <?php foreach ($costumer as $row): ?>
            <tr>
              <td><?= $id ?></td>
              <td><?= $row["nama-costumer"]; ?></td>
              <td><?= $row["alamat-costumer"]; ?></td>
              <td><?= $row["nomer-telepon"]; ?></td>
              <td><?= $row["jenis-kelamin"]; ?></td>

              <!-- tombol edit dan delete -->
              <td class="text-center">
                <a href="edit-costumer.php?id=<?= $row["id_costumer"]; ?>" class="btn btn-warning">Edit</a>

                <a>
                  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Delete
                  </button>
                </a>
              </td>

            </tr>
            <?php $id++ ?>
          <?php endforeach; ?>
        </table>
      </div>
      <div class="card-footer bg-dark"></div>
    </div>
    <!-- form data barang  -->
  </div>
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
          <a href="hapus-costumer.php?id=<?= $row["id_costumer"]; ?>">
            <button type="submit" class="btn btn-danger">Hapus</button>
          </a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>