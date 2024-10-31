<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Rental_Mobil";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data
$sql = "SELECT * FROM t_biaya_rental";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Penyewaan Mobil</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
<div class="header">
        <div class="nav-links">
            <a href="index.html">Form Penyewaan</a>
            <a href="tampilkan_data.php">Tampilkan Data</a>
        </div>
        <h2 class="header-title">Rental Mobil</h2>
    </div>
    
    <h2>Data Penyewaan Mobil</h2>
    
    <?php
    // Memeriksa apakah ada data
    if ($result->num_rows > 0) {
        // Menampilkan data dalam tabel HTML
        echo "<table>";
        echo "<tr>
                <th>ID</th>
                <th>Nama Penyewa</th>
                <th>Nama Mobil</th>
                <th>Program Pilihan</th>
                <th>Lama Sewa (hari)</th>
                <th>Biaya per Hari</th>
                <th>Diskon</th>
                <th>Biaya Extra</th>
                <th>Total Biaya</th>
              </tr>";
        
        // Mengambil setiap baris data
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["nama_penyewa"] . "</td>
                    <td>" . $row["nama_mobil"] . "</td>
                    <td>" . $row["program_pilihan"] . "</td>
                    <td>" . $row["lama_sewa"] . "</td>
                    <td>" . number_format($row["biaya_per_hari"], 2) . "</td>
                    <td>" . number_format($row["diskon"], 2) . "</td>
                    <td>" . number_format($row["biaya_extra"], 2) . "</td>
                    <td>" . number_format($row["total_biaya"], 2) . "</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "Tidak ada data penyewaan.";
    }
    ?>

</body>
</html>

<?php
// Menutup koneksi
$conn->close();
?>
