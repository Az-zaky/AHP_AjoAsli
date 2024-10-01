<?php
include('config.php');
include('fungsi.php');
include('header.php');
?>

<html>
<head>
    <title>Riwayat Hasil Perbandingan</title>
</head>
<body>
    <section class="content">
        <h2>Riwayat Hasil Perbandingan</h2>

        <?php
        // Proses penghapusan log
        if (isset($_GET['delete'])) {
            $waktu = $_GET['delete'];
            $query_delete = "DELETE FROM logs WHERE waktu = '$waktu'";
            $result_delete = mysqli_query($koneksi, $query_delete);
            if ($result_delete) {
                echo "<p>Log berhasil dihapus.</p>";
            } else {
                echo "<p>Gagal menghapus log: " . mysqli_error($koneksi) . "</p>";
            }
        }

        // Query untuk mengambil data dari tabel logs
        $query = "SELECT waktu, kriteria, toko FROM logs ORDER BY waktu DESC"; 
        $result = mysqli_query($koneksi, $query);

        // Cek apakah ada data yang diambil
        if (mysqli_num_rows($result) > 0) {
            echo "<table border='1' cellpadding='10' cellspacing='0' style='width: 100%;'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Waktu</th>";
            echo "<th>Kriteria</th>";
            echo "<th>Toko Terpilih/Tertinggi</th>";
            echo "<th>Aksi</th>"; // Kolom untuk tombol hapus
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['waktu']) . "</td>";
                echo "<td>" . htmlspecialchars($row['kriteria']) . "</td>";
                echo "<td>" . htmlspecialchars($row['toko']) . "</td>"; // Tampilkan toko terpilih
                echo "<td>
                        <form action='logs.php' method='GET' style='display:inline;'>
                            <input type='hidden' name='delete' value='" . htmlspecialchars($row['waktu']) . "'>
                            <button type='submit' class='ui button red' onclick='return confirm(\"Apakah Anda yakin ingin menghapus log ini?\")'>
                                <i class='right remove icon'></i> Hapus
                            </button>
                        </form>
                      </td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p>Tidak ada log yang ditemukan.</p>";
        }
        ?>
    </section>
</body>
</html>

<?php include('footer.php'); ?>
