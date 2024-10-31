<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Rental_Mobil";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$nama_penyewa = $_POST['nama_penyewa'];
$nama_mobil = $_POST['nama_mobil'];
$program_pilihan = $_POST['program_pilihan'];
$pilihan_tambahan = $_POST['pilihan_tambahan'];
$biaya_per_hari = 0;

// Set biaya per hari berdasarkan mobil
switch ($nama_mobil) {
    case "Avanza":
        $biaya_per_hari = 640000;
        break;
    case "Innova":
        $biaya_per_hari = 890000;
        break;
    case "New Altis":
        $biaya_per_hari = 1500000;
        break;
    case "New Camry":
        $biaya_per_hari = 2190000;
        break;
    case "Alphard":
        $biaya_per_hari = 3220000;
        break;
}

// Set diskon dan lama sewa berdasarkan program
$diskon = 0;
$lama_sewa = 0;
$tambahan = 0;
switch ($program_pilihan) {
    case "Paket 1":
        $lama_sewa = 4;
        $diskon = 0.10;
        break;
    case "Paket 2":
        $lama_sewa = 7;
        $diskon = 0.20;
        break;
    case "Paket 3":
        $lama_sewa = 10;
        $diskon = 0.25;
        break;
    case "Harian":
        $lama_sewa = 1;
        $diskon = 0;
        break;
    
}
switch ($pilihan_tambahan) {
    case "Biaya 1":
        $tambahan = 100000;
        break;
    case "Biaya 2":
        $tambahan = 400000;
        break;
    case "Biaya 3":
        $tambahan = 800000;
        break;
    case "Biaya 4":
        $tambahan = 1200000;
        break;
    case "Biaya 5":
        $tambahan = 0;
        break;
}

$biaya_sewa = $biaya_per_hari * $lama_sewa + $tambahan;
$total_diskon = $biaya_sewa * $diskon;
$total_biaya = $biaya_sewa - $total_diskon;

// Simpan ke database
$sql = "INSERT INTO t_biaya_rental (nama_penyewa, nama_mobil, program_pilihan, lama_sewa, biaya_per_hari, diskon, biaya_extra, total_biaya)
VALUES ('$nama_penyewa', '$nama_mobil', '$program_pilihan', '$lama_sewa', '$biaya_per_hari', '$total_diskon','$tambahan', '$total_biaya')";

if ($conn->query($sql) === TRUE) {
    // Redirect kembali ke form dengan parameter status=success
    header("Location: index.html?status=success");
    exit(); 
} else {
    // Redirect kembali dengan status error
    header("Location: index.html?status=error");
    exit(); 
}


