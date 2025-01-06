<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "db_rental_mobil";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
// if ($conn->connect_error) {
//  die("Connection failed: " . $conn->connect_error);
// } else {
//     echo "Connection Succes!";
// }

function query($conn, $query)
{
    // global $conn;  

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


//Data Mobil
function tambahMobil($data)
{
    global $conn;

    $gambarMobil = upload();
    if (!$gambarMobil) {
        return false;
    }
    $merekMobil = htmlspecialchars($data["merek-mobil"]);
    $modelMobil = htmlspecialchars($data["model-mobil"]);
    $bbm = htmlspecialchars($data["bbm"]);
    $hargaSewa = htmlspecialchars($data["harga-sewa"]);
    $jumblahKursi = htmlspecialchars($data["jumblah-kursi"]);
    $platMobil = htmlspecialchars($data["plat-mobil"]);

    $insert = "INSERT INTO mobil (gambar, merk, model, bbm, harga, jumlah_kursi, plat) 
               VALUES ('$gambarMobil','$merekMobil','$modelMobil','$bbm','$hargaSewa','$jumblahKursi','$platMobil')";

    mysqli_query($conn, $insert);

    return mysqli_affected_rows($conn);
}

function upload()
{
    global $error;
    $namaFile = $_FILES['gambar-mobil']['name'];
    $sizeFile = $_FILES['gambar-mobil']['size'];
    $error = $_FILES['gambar-mobil']['error'];
    $tmpName = $_FILES['gambar-mobil']['tmp_name'];

    //cek apakah gambar sudah di upload
    if ($error === 4) {
        echo '<div class="alert alert-danger" role="alert">
                Pilih Gambar Terlebih Dahulu !
              </div>';
        return false;
    }

    // cek ekstensi file agar user tidak memasukkan gambar yang tidak disarankan
    $formatEkstensiValid = ['jpg', 'png', 'jpeg'];
    //explode untuk memecah format file menjadi array => (nama file) . (ekstensi) contoh : sandika.jpg
    $ekstensiGambar = explode('.', $namaFile);
    //strtolower => mengubah namafile huruf kecil semua
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    // cek apakah gambar yang di upload sudah sesuai
    if (!in_array($ekstensiGambar, $formatEkstensiValid)) {
        echo '<div class="alert alert-danger" role="alert">
                    Format Tidak Sesuai !, Pastikan memilih telah gambar.
                  </div>';
        return false;
    }

    // cek apakah ukuran gambar terlalu besar
    if ($sizeFile > 1000000) {
        echo '<div class="alert alert-danger" role="alert">
                    Ukuran Gambar Terlalu Besar !
                  </div>';
        return false;
    }

    // jika file sesuai maka upload gambar pada lokasi file yang telah ditentukan
    // generate nama file sehingga gambar tidak tertimpa 
    $namaFileGenerate = uniqid();
    $namaFileGenerate .= '.';
    $namaFileGenerate .= $ekstensiGambar;

    // pindah lokasi file 
    move_uploaded_file($tmpName, '../../mobil/' . $namaFileGenerate);

    return $namaFileGenerate;
}

function ubahMobil($data)
{
    global $conn;

    $id = $data["id-mobil"];
    $merekMobil = htmlspecialchars($data["merek-mobil"]);
    $modelMobil = htmlspecialchars($data["model-mobil"]);
    $bbm = htmlspecialchars($data["bbm"]);
    $hargaSewa = htmlspecialchars($data["harga-sewa"]);
    $jumblahKursi = htmlspecialchars($data["jumlah-kursi"]);
    $platMobil = htmlspecialchars($data["plat-mobil"]);

    // Check if new image is uploaded
    if ($_FILES['gambar-mobil']['error'] === 4) {
        // No new image uploaded, keep existing image
        $gambarMobil = $data['gambar-lama'];
    } else {
        // New image uploaded
        $gambarMobil = upload();
        if (!$gambarMobil) {
            return false;
        }
        // Delete old image
        if ($data['gambar-lama'] != '') {
            unlink('../../mobil/' . $data['gambar-lama']);
        }
    }

    $update = "UPDATE mobil SET 
               gambar='$gambarMobil', 
               merk='$merekMobil', 
               model='$modelMobil', 
               bbm='$bbm', 
               harga='$hargaSewa', 
               jumlah_kursi='$jumblahKursi', 
               plat='$platMobil' 
               WHERE id=$id";

    mysqli_query($conn, $update);
    return mysqli_affected_rows($conn);
}

function hapusMobil($ids)
{
    global $conn;

    $delete = "DELETE FROM mobil WHERE id = $ids";
    mysqli_query($conn, $delete);
    return mysqli_affected_rows($conn);
}


function hapusCostumer($ids)
{
    global $conn;

    $delete = "DELETE FROM tb_costumer WHERE id_costumer = $ids";
    mysqli_query($conn, $delete);
    return mysqli_affected_rows($conn);
}


function hapusOrder($ids)
{
    global $conn;

    $delete = "DELETE FROM tb_transaksi WHERE id_sewa = $ids";
    mysqli_query($conn, $delete);
    return mysqli_affected_rows($conn);
}

function tambahCostumer($data)
{
    global $conn;

    $namaCostumer = htmlspecialchars($data["nama-costumer"]);
    $alamatCostumer = htmlspecialchars($data["alamat-costumer"]);
    $nomerTelepon = htmlspecialchars($data["nomer-telepon"]);
    $jenisKelamin = htmlspecialchars($data["jenis-kelamin"]);

    $insert = "INSERT INTO tb_costumer VALUES ('', '$namaCostumer', '$alamatCostumer', '$nomerTelepon', '$jenisKelamin')";

    mysqli_query($conn, $insert);

    return mysqli_affected_rows($conn);
}


function tambahOrder($data)
{
    global $conn;

    $namaCostumer = htmlspecialchars($data["nama-costumer"]);
    $merekMobil = htmlspecialchars($data["merek-mobil"]);
    $awalSewa = htmlspecialchars($data["awal-sewa"]);
    $jangkaWaktu = htmlspecialchars($data["jangka-waktu"]);
    $hargaSewa = htmlspecialchars($data["harga-sewa"]);
    $totalBayar = htmlspecialchars($data[""]);
    $statusBayar = htmlspecialchars($data["status-bayar"]);

    $insert = "INSERT INTO tb_transaksi VALUES ('', '$namaCostumer', '$merekMobil', '$awalSewa', '$jangkaWaktu', '$hargaSewa','$totalBayar', '$statusBayar')";

    mysqli_query($conn, $insert);

    return mysqli_affected_rows($conn);
}

function ubahCostumer($data)
{
    global $conn;

    $id = $data["id-costumer"];
    $namaCostumer = htmlspecialchars($data["nama-costumer"]);
    $alamatCostumer = htmlspecialchars($data["alamat-costumer"]);
    $nomerTelepon = htmlspecialchars($data["nomer-telepon"]);
    $jenisKelamin = htmlspecialchars($data["jenis-kelamin"]);

    $update = "UPDATE tb_costumer SET nama_costumer = '$namaCostumer', alamat_costumer = '$alamatCostumer', nomer_telepon = '$nomerTelepon', jenis_kelamin = '$jenisKelamin' WHERE id_costumer = $id";

    mysqli_query($conn, $update);

    return mysqli_affected_rows($conn);
}


function ubahTransaksi($data)
{
    global $conn;

    $id = $data["id-sewa"];
    $namaCostumer = htmlspecialchars($data["nama-costumer"]);
    $merekMobil = htmlspecialchars($data["merek-mobil"]);
    $awalSewa = htmlspecialchars($data["awal-sewa"]);
    $jangkaWaktu = htmlspecialchars($data["jangka-waktu"]);
    $hargaSewa = htmlspecialchars($data["harga-sewa"]);
    $totalBayar = htmlspecialchars($data["total-bayar"]);
    $statusBayar = htmlspecialchars($data["status-bayar"]);

    $update = "UPDATE tb_transaksi SET nama_costumer = '$namaCostumer', merek_mobil = '$merekMobil', tanggal_awal_sewa = '$awalSewa', jangka_waktu_sewa = '$jangkaWaktu', harga_sewa_perhari = '$hargaSewa', total_bayar = '$totalBayar', status_sewa = '$statusBayar' WHERE id_sewa = $id";

    mysqli_query($conn, $update);

    return mysqli_affected_rows($conn);
}



//Register
function registrasi($data)
{
    global $conn;

    // Bersihkan input
    $email = strtolower(trim($data["email"]));
    $password = trim($data["password"]);
    $nama = mysqli_real_escape_string($conn, trim($data["nama"]));
    $tlpn = mysqli_real_escape_string($conn, trim($data["tlpn"]));
    $alamat = mysqli_real_escape_string($conn, trim($data["alamat"]));
    $role = mysqli_real_escape_string($conn, trim($data["role"]));

    // Validasi input
    if (empty($email) || empty($password) || empty($nama) || empty($tlpn) || empty($alamat) || empty($role)) {
        echo '<div class="alert alert-danger" role="alert">
                Semua kolom wajib diisi!
              </div>';
        return false;
    }

    // Validasi format email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<div class="alert alert-danger" role="alert">
                Format email tidak valid!
              </div>';
        return false;
    }

    // Periksa apakah email sudah terdaftar
    $result = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");
    if (mysqli_fetch_assoc($result)) {
        echo '<div class="alert alert-danger" role="alert">
                Email sudah terdaftar!
              </div>';
        return false;
    }

    // Enkripsi password
    $encryptedPwd = password_hash($password, PASSWORD_DEFAULT);

    // Masukkan data ke database
    $query = "INSERT INTO user (nama, email, password, nomor_telepon, alamat, role) 
          VALUES ('$nama', '$email', '$encryptedPwd', '$tlpn', '$alamat', '$role')";

    if (!mysqli_query($conn, $query)) {
        echo '<div class="alert alert-danger" role="alert">
                Error: ' . htmlspecialchars(mysqli_error($conn)) . '
              </div>';
        return false;
    }
    return mysqli_affected_rows($conn);
}

//Login
function login($data)
{
    global $conn;

    // Bersihkan input
    $email = strtolower(trim($data["email"]));
    $password = trim($data["password"]);

    // Validasi input
    if (empty($email) || empty($password)) {
        echo '<div class="alert alert-danger" role="alert">
                Email dan password wajib diisi!
              </div>';
        return false;
    }

    // Validasi format email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<div class="alert alert-danger" role="alert">
                Format email tidak valid!
              </div>';
        return false;
    }

    // Gunakan prepared statement untuk mencegah SQL injection
    $stmt = mysqli_prepare($conn, "SELECT * FROM user WHERE email = ?");
    if ($stmt === false) {
        echo '<div class="alert alert-danger" role="alert">
                Error dalam persiapan query.
              </div>';
        return false;
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Periksa apakah email ada di database
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        // Verifikasi password
        if (password_verify($password, $row["password"])) {
            // Mulai sesi
            session_start();
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["role"] = $row["role"];

            // Arahkan berdasarkan role
            switch ($row["role"]) {
                case "admin":
                    echo "<script>document.location.href = 'admin/costumer/data-costumer.php';</script>";
                    break;
                default:
                    echo "<script>document.location.href = 'index.php';</script>";
                    break;
            }
            return true;
        } else {
            // Password tidak cocok
            echo "<script>alert('Password salah!');</script>";
        }
    } else {
        // Email tidak ditemukan
        echo "<script>alert('Email tidak ditemukan!');</script>";
    }

    return false;
}



function cariCostumer($keyword)
{
    global $conn;
    $search = "SELECT * FROM tb_costumer WHERE  nama_costumer LIKE '%$keyword%' OR
                                                alamat_costumer LIKE '%$keyword%' OR
                                                nomer_telepon LIKE '%$keyword%' OR
                                                jenis_kelamin LIKE '%$keyword%'
              ";
    return query($conn, $search);
}

function cariMobil($keyword)
{
    global $conn;
    $search = "SELECT * FROM tb_mobil WHERE     merek_mobil LIKE '%$keyword%' OR
                                                harga_sewa_nama LIKE '%$keyword%' OR
                                                harga_sewa_angka LIKE '%$keyword%' OR
                                                mobil_sopir LIKE '%$keyword%' OR
                                                bbm LIKE '%$keyword%' OR
                                                jumblah_penumpang LIKE '%$keyword%' OR
                                                plat_mobil LIKE '%$keyword%'
              ";
    return query($conn, $search);
}

function cariOrder($keyword)
{
    global $conn;
    $search = "SELECT * FROM tb_transaksi WHERE nama_costumer LIKE '%$keyword%' OR
                                                merek_mobil LIKE '%$keyword%' OR
                                                tanggal_awal_sewa LIKE '%$keyword%' OR
                                                jangka_waktu_sewa LIKE '%$keyword%' OR
                                                harga_sewa_perhari LIKE '%$keyword%' OR
                                                total_bayar LIKE '%$keyword%' OR
                                                status_sewa LIKE '%$keyword%'
              ";
    return query($conn, $search);
}

?>