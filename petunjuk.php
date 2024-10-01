<?php
include('config.php');
include('fungsi.php');

// header
include('header.php');
?>

<section class="content">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        
        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50; /* Warna hijau untuk header */
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1; /* Warna latar belakang saat hover */
        }

        ol {
            margin: 10px 0;
            padding-left: 20px;
        }

        li {
            margin-bottom: 20px;
        }

        a {
            color: black; /* Warna hitam untuk link */
            text-decoration: none; /* Menghilangkan garis bawah */
            font-weight: bold; /* Menebalkan teks link */
        }

        a:hover {
            text-decoration: underline; /* Garis bawah saat hover */
        }
    </style>

    <h1>Langkah-langkah Menggunakan Aplikasi SPK AHP Pemilihan Toko Terbaik Pada Toko Ajo Asli Store</h1>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Langkah</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td><strong>Menambahkan Kriteria</strong></td>
                <td>Klik opsi <strong><a href="kriteria.php">Kriteria</a></strong>. Tambahkan kriteria yang akan digunakan untuk menilai toko terbaik (misalnya: kualitas barang, harga, reputasi, ketersediaan stok). Tekan tombol atau isikan nilai pada form kriteria yang tersedia.</td>
            </tr>
            <tr>
                <td>2</td>
                <td><strong>Menambahkan Alternatif</strong></td>
                <td>Klik opsi <strong><a href="alternatif.php">Alternatif</a></strong>. Tambahkan alternatif toko yang akan dipilih (misalnya: Toko A, Toko B, Toko C). Isi nama toko pada form dan simpan.</td>
            </tr>
            <tr>
                <td>3</td>
                <td><strong>Melakukan Perbandingan Kriteria</strong></td>
                <td>Klik opsi <strong><a href="bobot_kriteria.php">Perbandingan Kriteria</a></strong>. Di sini, Anda akan membandingkan setiap kriteria berdasarkan tabel skala penilaian. Misalnya, kualitas barang lebih penting dari harga atau reputasi. Masukkan perbandingan sesuai tingkat kepentingan, kemudian simpan hasilnya.</td>
            </tr>
            <tr>
                <td>4</td>
                <td><strong>Melakukan Perbandingan Alternatif</strong></td>
                <td>Klik opsi <strong><a href="bobot.php?c=1">Perbandingan Alternatif</a></strong>. Pilih kriteria, lalu lakukan perbandingan antar toko (alternatif) berdasarkan kriteria tersebut. Misalnya, bandingkan Toko A dengan Toko B dalam hal kualitas barang.</td>
            </tr>
            <tr>
                <td>5</td>
                <td><strong>Melihat Hasil Akhir</strong></td>
                <td>Klik opsi <strong><a href="hasil.php">Hasil</a></strong>. Di sini, aplikasi akan menampilkan rangking toko berdasarkan bobot yang sudah dihitung menggunakan metode AHP. Toko dengan peringkat tertinggi adalah toko terbaik yang dipilih berdasarkan kriteria yang telah dimasukkan.</td>
            </tr>
			<tr>
    			<td>6</td>
   				 <td><strong>Riwayat</strong></td>
  				  <td>Klik opsi <strong><a href="logs.php">Riwayat</a></strong> pada Dashboard utama. Halaman Riwayat dirancang untuk menampilkan data yang dikumpulkan dari hasil sebelumnya melalui proses AHP. Informasi yang ditampilkan meliputi waktu, kriteria yang digunakan, dan toko yang terpilih dalam pemilihan tertentu.</td>
			</tr>
			<tr>
    			<td>7</td>
   				 <td><strong>Kasir</strong></td>
  				  <td>Pilihan <strong><a href="#">Kasir</a></strong> Pada sidebar hanya opsional yang di rencanakan untuk mempermudah akses langsung ke aplikasi kasir milik toko Ajo Asli Store, Agar admin dapat mengetahui jumlah stok barang guna menentukan jenis & jumlah barang yang akan di beli pada toko terpilih.</td>

        </tbody>
    </table>

    <p>Dengan mengikuti langkah-langkah ini, aplikasi akan membantu menentukan toko terbaik secara otomatis sesuai kriteria yang telah ditentukan.</p>
  

</section>

<?php include('footer.php'); ?>
