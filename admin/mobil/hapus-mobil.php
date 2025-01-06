<?php 
require "../functions.php";

$id = $_GET["id"];

if (hapusMobil($id) > 0) {
    echo "
        <script>
            alert('Data Berhasil Dihapus!');
            document.location.href = 'data-mobil.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert($id);
            document.location.href = 'data-mobil.php';
        </script>
    ";
}

?>