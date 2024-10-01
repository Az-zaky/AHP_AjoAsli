<?php
include('config.php');
include('fungsi.php');

// Menghitung perangkingan
$jmlKriteria  = getJumlahKriteria();
$jmlAlternatif = getJumlahAlternatif();
$nilai = array();

// Mendapatkan nilai tiap alternatif
for ($x = 0; $x <= ($jmlAlternatif - 1); $x++) {
    // Inisialisasi
    $nilai[$x] = 0;

    for ($y = 0; $y <= ($jmlKriteria - 1); $y++) {
        $id_alternatif = getAlternatifID($x);
        $id_kriteria = getKriteriaID($y);

        $pv_alternatif = getAlternatifPV($id_alternatif, $id_kriteria);
        $pv_kriteria = getKriteriaPV($id_kriteria);

        $nilai[$x] += ($pv_alternatif * $pv_kriteria);
    }
}

// Update nilai ranking
for ($i = 0; $i <= ($jmlAlternatif - 1); $i++) {
    $id_alternatif = getAlternatifID($i);
    $query = "INSERT INTO ranking (id_alternatif, nilai) 
              VALUES ($id_alternatif, $nilai[$i]) 
              ON DUPLICATE KEY UPDATE nilai=$nilai[$i]";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        echo "Gagal mengupdate ranking: " . mysqli_error($koneksi);
        exit();
    }
}

// Mendapatkan alternatif tertinggi
$query_tinggi = "SELECT alternatif.nama AS nama_alternatif, ranking.nilai 
                 FROM alternatif 
                 INNER JOIN ranking ON alternatif.id = ranking.id_alternatif 
                 ORDER BY ranking.nilai DESC LIMIT 1";
$result_tinggi = mysqli_query($koneksi, $query_tinggi);
if ($row_tinggi = mysqli_fetch_assoc($result_tinggi)) {
    $alternatif_tertinggi = $row_tinggi['nama_alternatif'];
    $nilai_tertinggi = $row_tinggi['nilai'];
}

// Simpan toko terpilih ke logs
$waktu = date('Y-m-d H:i:s');
$kriteria = implode(', ', array_map('getKriteriaNama', range(0, $jmlKriteria - 1)));
$query_logs = "INSERT INTO logs (waktu, kriteria, toko) 
               VALUES ('$waktu', '$kriteria', '$alternatif_tertinggi')";
$result_logs = mysqli_query($koneksi, $query_logs);
if (!$result_logs) {
    echo "Gagal menyimpan log: " . mysqli_error($koneksi);
    exit();
}

include('header.php');
?>

<section class="content">
    <h2 class="ui header">Hasil Perhitungan</h2>
    <table class="ui celled table">
        <thead>
            <tr>
                <th>Overall Composite Height</th>
                <th>Priority Vector (rata-rata)</th>
                <?php
                for ($i = 0; $i <= (getJumlahAlternatif() - 1); $i++) {
                    echo "<th>" . getAlternatifNama($i) . "</th>\n";
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($x = 0; $x <= (getJumlahKriteria() - 1); $x++) {
                echo "<tr>";
                echo "<td>" . getKriteriaNama($x) . "</td>";
                echo "<td>" . round(getKriteriaPV(getKriteriaID($x)), 5) . "</td>";

                for ($y = 0; $y <= (getJumlahAlternatif() - 1); $y++) {
                    echo "<td>" . round(getAlternatifPV(getAlternatifID($y), getKriteriaID($x)), 5) . "</td>";
                }

                echo "</tr>";
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2">Total</th>
                <?php
                for ($i = 0; $i <= ($jmlAlternatif - 1); $i++) {
                    echo "<th>" . round($nilai[$i], 5) . "</th>";
                }
                ?>
            </tr>
        </tfoot>
    </table>

    <h2 class="ui header">Perangkingan</h2>
    <table class="ui celled collapsing table">
        <thead>
            <tr>
                <th>Peringkat</th>
                <th>Alternatif</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query_ranking = "SELECT id, nama, id_alternatif, nilai 
                              FROM alternatif, ranking 
                              WHERE alternatif.id = ranking.id_alternatif 
                              ORDER BY nilai DESC";
            $result_ranking = mysqli_query($koneksi, $query_ranking);
            $i = 0;
            while ($row_ranking = mysqli_fetch_array($result_ranking)) {
                $i++;
                ?>
                <tr>
                    <?php if ($i == 1) {
                        echo "<td><div class=\"ui ribbon label\">Pertama</div></td>";
                    } else {
                        echo "<td>" . $i . "</td>";
                    }
                    ?>
                    <td><?php echo $row_ranking['nama'] ?></td>
                    <td><?php echo round($row_ranking['nilai'], 5) ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</section>

<?php include('footer.php'); ?>
