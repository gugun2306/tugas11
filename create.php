<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim = mysqli_real_escape_string($connection, $_POST['nim']);
    $nama = mysqli_real_escape_string($connection, $_POST['nama']);
    $jenjang = mysqli_real_escape_string($connection, $_POST['jenjang']);
    $jurusan = mysqli_real_escape_string($connection, $_POST['jurusan']);

    $query = "INSERT INTO mahasiswa (nim, nama, jenjang, jurusan) VALUES ('$nim', '$nama', '$jenjang', '$jurusan')";

    if (mysqli_query($connection, $query)) {
        echo "<script>
            alert('Data mahasiswa berhasil ditambahkan.');
            window.location='index.php';
        </script>";
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="form-container">
        <h2>Tambah Mahasiswa</h2>
        
        <form action="create.php" method="post">
            <div class="form-group">
                <label>NIM</label>
                <input type="number" name="nim" placeholder="Masukkan NIM..." required>
            </div>

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" placeholder="Masukkan nama lengkap..." required>
            </div>

            <div class="form-group">
                <label>Jenjang</label>
                <select name="jenjang" required>
                    <option value="">-- Pilih Jenjang --</option>
                    <option value="D3">D3</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                </select>
            </div>

            <div class="form-group">
                <label>Jurusan</label>
                <input type="text" name="jurusan" placeholder="Contoh: Teknik Informatika" required>
            </div>

            <button type="submit" class="btn-submit">Simpan Data</button>
        </form>

        <a href="index.php" class="back-link">← Kembali ke Daftar Mahasiswa</a>
    </div>

</body>
</html>