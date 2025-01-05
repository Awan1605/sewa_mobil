<?php require "header.php"; ?>
<?php require "../admin/functions.php";
$merekMobil = query($conn, "SELECT * FROM tb_mobil");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarBOOK</title>
    <style>
        .car-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .car-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s ease;
            background: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .car-card:hover {
            transform: translateY(-5px);
        }

        .car-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .car-details {
            padding: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card-header bg-dark text-white text-center py-3 mb-4">
            <h2 class="m-0">Form Data Rental Mobil</h2>
        </div>

        <div class="car-grid">
            <?php foreach ($merekMobil as $row): ?>
                <div class="car-card">
                    <img src="../mobil/<?= $row["gambar-mobil"]; ?>" class="car-img" alt="<?= $row["merek-mobil"]; ?>">
                    <div class="car-details">
                        <h5 class="text-warning mb-2"><?= $row["merek-mobil"]; ?></h5>
                        <h4 class="text-primary mb-3"><?= $row["harga-sewa-nama"]; ?></h4>
                        <div class="car-info">
                            <p class="mb-1"><i class="fas fa-car"></i> <?= $row["mobil-sopir"]; ?></p>
                            <p class="mb-1"><i class="fas fa-gas-pump"></i> <?= $row["bbm"]; ?></p>
                            <p class="mb-1"><i class="fas fa-users"></i> <?= $row["jumblah-penumpang"]; ?> Penumpang</p>
                            <p class="mb-3"><i class="fas fa-id-card"></i> Plat: <?= $row["plat-mobil"]; ?></p>
                        </div>
                        <a href="lanjut.php?id=<?= $row["id_mobil"] ?>" class="btn btn-primary w-100">Sewa Sekarang</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>
</div>