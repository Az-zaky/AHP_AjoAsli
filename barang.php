<?php



// Insert data
if (isset($_POST['insert'])) {
    $no = $_POST['no'];
    $barang = $_POST['barang'];
    $kategori = $_POST['kategori'];
    $nama_barang = $_POST['nama_barang'];
    $stok = $_POST['stok'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $satuan = $_POST['satuan'];

    $sql = "INSERT INTO goods (no, barang, kategori, nama_barang, stok, harga_beli, harga_jual, satuan)
            VALUES ('$no', '$barang', '$kategori', '$nama_barang', '$stok', '$harga_beli', '$harga_jual', '$satuan')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch data
$sql = "SELECT * FROM goods";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>
</head>
<body>
    <h1>Data Barang</h1>
    <form method="post" action="">
        <input type="text" name="no" placeholder="No">
        <input type="text" name="barang" placeholder="Barang">
        <input type="text" name="kategori" placeholder="Kategori">
        <input type="text" name="nama_barang" placeholder="Nama Barang">
        <input type="text" name="stok" placeholder="Stok">
        <input type="text" name="harga_beli" placeholder="Harga Beli">
        <input type="text" name="harga_jual" placeholder="Harga Jual">
        <input type="text" name="satuan" placeholder="Satuan">
        <button type="submit" name="insert">Insert Data</button>
    </form>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>No.</th>
            <th>Barang</th>
            <th>Kategori</th>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Satuan</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"]. "</td>
                        <td>" . $row["no"]. "</td>
                        <td>" . $row["barang"]. "</td>
                        <td>" . $row["kategori"]. "</td>
                        <td>" . $row["nama_barang"]. "</td>
                        <td>" . $row["stok"]. "</td>
                        <td>" . $row["harga_beli"]. "</td>
                        <td>" . $row["harga_jual"]. "</td>
                        <td>" . $row["satuan"]. "</td>
                      </tr>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
