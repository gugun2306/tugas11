<?php
include 'connection.php';
$result = mysqli_query($connection, "SELECT * FROM mahasiswa");
?>

<html>
<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h2>Daftar Mahasiswa</h2>

        <div style="text-align: center;">
            <a href="create.php" class="button">Tambah Mahasiswa Baru</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jenjang</th>
                    <th>Jurusan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while($mahasiswa_data = mysqli_fetch_array($result)): ?>
                        <tr>
                            <td><?php echo $mahasiswa_data['NIM']; ?></td>
                            <td><?php echo $mahasiswa_data['nama']; ?></td>
                            <td><?php echo $mahasiswa_data['jenjang']; ?></td>
                            <td><?php echo $mahasiswa_data['jurusan']; ?></td>
                            <td class="action-links">
                                <a href="edit.php?NIM=<?php echo $mahasiswa_data['NIM']; ?>" class="edit-btn">Edit</a>
                                <a href="delete.php?NIM=<?php echo $mahasiswa_data['NIM']; ?>" class="delete-btn" onclick="return confirm('Yakin hapus data?');">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile;
                } else { ?>
                    <tr>
                        <td colspan="5" style="text-align: center;">Belum ada data mahasiswa</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="footer-links">
            <a href="index.php">Lihat Data Mahasiswa</a>
        </div>
    </div>

</body>
</html>