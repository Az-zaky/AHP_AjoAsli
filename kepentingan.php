<?php
include('config.php');
include('fungsi.php');

// header
include('header.php');
?>
<section class="content">
    <style>
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
        }

        th, td {
            border: 2px solid #333; /* Garis tabel lebih tebal */
            border-width: 2px; /* Mengatur ketebalan border */
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
    </style>

    <h1>Tabel Skala Penilaian Menurut Saaty (1980)</h1>
    <table>
        <thead>
            <tr>
                <th>Nilai Numerik</th>
                <th>Tingkat Kepentingan <em>(Preference)</em></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Sama pentingnya <em>(Equal Importance)</em></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Sama hingga sedikit lebih penting</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Sedikit lebih penting <em>(Slightly more Importance)</em></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Sedikit lebih hingga jelas lebih penting</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Jelas lebih penting <em>(Materially more Importance)</em></td>
            </tr>
            <tr>
                <td>6</td>
                <td>Jelas hingga sangat jelas lebih penting</td>
            </tr>
            <tr>
                <td>7</td>
                <td>Sangat jelas lebih penting <em>(Significantly more Importance)</em></td>
            </tr>
            <tr>
                <td>8</td>
                <td>Sangat jelas hingga mutlak lebih penting</td>
            </tr>
            <tr>
                <td>9</td>
                <td>Mutlak lebih penting <em>(Absolutely more Importance)</em></td>
            </tr>
        </tbody>
    </table>
</section>

<?php include('footer.php'); ?>
