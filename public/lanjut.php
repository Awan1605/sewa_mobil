<?php
require "../admin/functions.php";

// Ambil ID mobil dari URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
  $idMobil = intval($_GET['id']);
  $mobil = query($conn, "SELECT * FROM tb_mobil WHERE id_mobil = $idMobil");

  // Pengecekan apakah data mobil berhasil ditemukan
  if ($mobil && is_array($mobil) && count($mobil) > 0) {
    $mobil = $mobil[0]; // Ambil data mobil pertama jika ada
  } else {
    echo "<script>alert('Mobil tidak ditemukan!'); window.location.href = 'index.php';</script>";
    exit;
  }
} else {
  echo "<script>alert('ID mobil tidak ditemukan!'); window.location.href = 'index.php';</script>";
  exit;
}

// Convert harga-sewa-nama to numeric value by removing "Rp" and dots
$hargaPerHari = (int) str_replace(['Rp', '.'], '', $mobil['harga-sewa-nama']);
$totalHarga = 0;
$waktuSewa = isset($_POST['waktu-sewa']) ? (int) $_POST['waktu-sewa'] : 1;
$tanggalSewa = isset($_POST['tanggal-sewa']) ? $_POST['tanggal-sewa'] : 'Belum dipilih';

// Calculate total price
$totalHarga = $hargaPerHari * $waktuSewa;
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Sewa - <?= isset($mobil['merek-mobil']) ? $mobil['merek-mobil'] : 'Mobil Tidak Ditemukan'; ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Arial', sans-serif;
    }

    .container {
      max-width: 90%;
      margin-top: 50px;
    }

    .btn-sewa {
      background-color: #28a745;
      border-color: #28a745;
      color: white;
    }

    .btn-sewa:hover {
      background-color: #218838;
      border-color: #1e7e34;
    }

    .modal-header {
      background-color: #007bff;
      color: white;
    }

    .modal-footer button {
      background-color: #6c757d;
      color: white;
    }

    .modal-footer button:hover {
      background-color: #5a6268;
    }

    .form-label {
      font-weight: bold;
    }

    .car-card {
      border: 1px solid #e0e0e0;
      border-radius: 8px;
      padding: 20px;
      background-color: white;
      margin-bottom: 20px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .car-card img {
      max-height: 300px;
      object-fit: cover;
      border-radius: 8px;
      margin-bottom: 15px;
    }

    .car-details {
      text-align: center;
    }

    .car-details h5 {
      font-size: 1.4rem;
      font-weight: 600;
      color: #f39c12;
    }

    .car-details h4 {
      font-size: 1.6rem;
      color: #2980b9;
      margin-bottom: 20px;
    }

    .car-info p {
      font-size: 1rem;
      color: #7f8c8d;
    }

    .car-info p i {
      margin-right: 10px;
    }

    .btn-sewa {
      background-color: #28a745;
      border-color: #28a745;
      color: white;
      font-weight: bold;
    }

    .btn-sewa:hover {
      background-color: #218838;
      border-color: #1e7e34;
    }

    .spec-item {
      background-color: #f1f1f1;
      padding: 15px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .spec-item i {
      color: #3498db;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card shadow-lg border-0 rounded-lg mt-4">
          <div class="card-header bg-primary text-white text-center py-3">
            <h2 class="mb-0">
              <i class="fas fa-car-side me-2"></i>
              <?= isset($mobil['merek-mobil']) ? $mobil['merek-mobil'] : 'Mobil Tidak Ditemukan'; ?>
            </h2>
          </div>

          <div class="card-body">
            <?php if (isset($mobil['gambar-mobil'])): ?>
              <div class="car-showcase p-3">
                <div class="position-relative">
                  <img src="../mobil/<?= $mobil["gambar-mobil"]; ?>" class="img-fluid rounded shadow-sm w-100"
                    style="max-height: 400px; object-fit: contain;" alt="<?= $mobil["merek-mobil"]; ?>">
                  <div class="position-absolute top-0 end-0 m-3">
                    <span class="badge bg-success fs-5">
                      <?= $mobil["harga-sewa-nama"]; ?>/Hari
                    </span>
                  </div>
                </div>

                <div class="car-specs mt-4">
                  <div class="row text-center g-3">
                    <div class="col-md-3">
                      <div class="spec-item">
                        <i class="fas fa-car fa-2x"></i>
                        <p class="mt-2 mb-0"><?= $mobil["mobil-sopir"]; ?></p>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="spec-item">
                        <i class="fas fa-gas-pump fa-2x"></i>
                        <p class="mt-2 mb-0"><?= $mobil["bbm"]; ?></p>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="spec-item">
                        <i class="fas fa-users fa-2x"></i>
                        <p class="mt-2 mb-0"><?= $mobil["jumblah-penumpang"]; ?> Penumpang</p>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="spec-item">
                        <i class="fas fa-id-card fa-2x"></i>
                        <p class="mt-2 mb-0">Plat: <?= $mobil["plat-mobil"]; ?></p>
                      </div>
                    </div>
                  </div>
                </div>

                <form method="POST" class="mt-4">
                  <input type="hidden" name="id_mobil"
                    value="<?= isset($mobil['id_mobil']) ? $mobil['id_mobil'] : ''; ?>">

                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label class="form-label fw-bold">
                        <i class="far fa-calendar-alt me-2"></i>Tanggal Sewa
                      </label>
                      <input type="date" name="tanggal-sewa" class="form-control form-control-lg" id="tanggal-sewa"
                        required min="<?= date('Y-m-d'); ?>"
                        value="<?= isset($_POST['tanggal-sewa']) ? $_POST['tanggal-sewa'] : ''; ?>">
                    </div>

                    <div class="col-md-6 mb-3">
                      <label class="form-label fw-bold">
                        <i class="far fa-clock me-2"></i>Lama Sewa (Hari)
                      </label>
                      <input type="number" name="waktu-sewa" class="form-control form-control-lg" id="waktu-sewa" min="1"
                        value="<?= $waktuSewa; ?>" required>
                    </div>
                  </div>

                  <div class="d-grid gap-2">
                    <button type="button" class="btn btn-success btn-lg" onclick="showModal()">
                      <i class="fas fa-hand-holding-usd me-2"></i>Sewa Sekarang
                    </button>
                    <!-- <button type="submit" class="btn btn-success btn-lg">
                      <i class="fas fa-hand-holding-usd me-2"></i>Sewa Sekarang
                    </button> -->
                  </div>
                </form>
              </div>
            <?php else: ?>
              <div class="alert alert-danger">
                <i class="fas fa-exclamation-triangle me-2"></i>Mobil tidak ditemukan!
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Detail Sewa -->
  <div class="modal fade" id="modalSewa" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Detail Sewa</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <p><strong>Tanggal Sewa:</strong> <span id="tanggal-sewa-detail"></span></p>
          <p><strong>Waktu Sewa (Hari):</strong> <span id="waktu-sewa-detail"></span></p>
          <p><strong>Total Harga:</strong> <span id="total-harga-detail"></span></p>
          <input type="hidden" name="total-harga" id="total-harga-hidden">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success bg-success" data-bs-dismiss="modal">Sewa Sekarang</button>

          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>
  </div>
  <?php
  // Process form submission
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idMobil = $_POST['id_mobil'];
    $tanggalSewa = $_POST['tanggal-sewa'];
    $waktuSewa = $_POST['waktu-sewa'];
    $totalHarga = $hargaPerHari * $waktuSewa;

    // Insert into database
    $sql = "INSERT INTO tb_transaksi (id_mobil, tanggal_sewa, lama_sewa, total_harga, status) 
        VALUES ('$idMobil', '$tanggalSewa', '$waktuSewa', '$totalHarga', 'pending')";

    if (mysqli_query($conn, $sql)) {
      echo "<script>
        alert('Pesanan berhasil dibuat!');
        window.location.href = 'index.php';
      </script>";
    } else {
      echo "<script>
        alert('Error: " . mysqli_error($conn) . "');
      </script>";
    }
  }
  ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    function showModal() {
      const tanggalSewa = document.getElementById('tanggal-sewa').value;
      const waktuSewa = parseInt(document.getElementById('waktu-sewa').value) || 1;
      const hargaPerHari = <?= $hargaPerHari ?>;
      const totalHarga = hargaPerHari * waktuSewa;

      document.getElementById('tanggal-sewa-detail').textContent = tanggalSewa || 'Belum dipilih';
      document.getElementById('waktu-sewa-detail').textContent = waktuSewa + ' Hari';
      document.getElementById('total-harga-detail').textContent = 'Rp ' + totalHarga.toLocaleString();
      document.getElementById('total-harga-hidden').value = totalHarga;

      var myModal = new bootstrap.Modal(document.getElementById('modalSewa'));
      myModal.show();
    }
  </script>
</body>

</html>