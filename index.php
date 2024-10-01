<?php
include('config.php');
include('fungsi.php');

// header
include('header.php');
?>

<section class="content">
    <style>
        /* Card Styles */
        .card {
            margin: 10px;
            max-width: 200px;
            border: 1px solid #1b0c29;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
            text-align: center;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card img {
            border-radius: 5px 10px 0 0;
            max-width: 100%;
            height: auto;
            transition: transform 0.3s ease;
        }

        .card img:hover {
            transform: scale(1.1);
        }

        .card-body {
            padding: 15px;
            text-align: center;
        }

        .card-title {
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: #007bff;
            text-decoration: none;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .card-title:hover {
            color: #0056b3;
        }

        /* Flexbox Row for horizontal layout */
        .cards-container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            flex-wrap: wrap;
        }

    </style>

    <h1>Selamat Datang Di Aplikasi SPK Toko Ajo Asli Store</h1>

    <div class="cards-container">
        <!-- Card 1 -->
        <div class="card">
		<img src="c03.png" class="card-img-top" alt="Perangkingan">
            <div class="card-body">
                <a href="kepentingan.php" class="card-title">Skala Penilaian</a>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="card">
		<img src="c1.png" class="card-img-top" alt="Desain">
            <div class="card-body">
                <a href="petunjuk.php" class="card-title">Cara Penggunaan</a>
          
            </div>
        </div>

        <!-- Card 3 -->
        <div class="card">
		<img src="c02.png" class="card-img-top" alt="Progres Pesanan">
            <div class="card-body">
                <a href="logs.php" class="card-title">Riwayat</a>
            </div>
        </div>
    </div>
	
<?php include('footer.php'); ?>
