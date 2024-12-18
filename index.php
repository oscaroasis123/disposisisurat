<?php
include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Disposisi Surat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            position: relative;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        a {
            text-decoration: none;
            color: #3498db;
        }
        .btn {
            padding: 10px 15px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #2980b9;
        }
        .home-btn {
            position: absolute;
            top: 20px;
            right: 20px;
        }
        .logo {
            display: block;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 20px;
            width: 50px; /* Adjusted the width to be smaller */
            height: auto; /* Maintain aspect ratio */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="home-btn">
            <a href="../index.html" class="btn">Home</a>
        </div>
        <img src="icon-surat.png" alt="Logo Surat" class="logo">
        <h1>Disposisi Surat</h1>
        <a href="creat.php" class="btn">Tambah Disposisi Surat</a>
        <table>
            <tr>
                <th>No Surat</th>
                <th>Tujuan Surat</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>File</th>
                <th>Aksi</th>
            </tr>
            <?php
            $sql = "SELECT * FROM disposisi_surat";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['no_surat']}</td>
                            <td>{$row['tujuan_surat']}</td>
                            <td>{$row['tanggal']}</td>
                            <td>{$row['status']}</td>
                            <td><a href='uploads/{$row['file']}' target='_blank'>Lihat File</a></td>
                            <td>
                                <a href='update.php?id={$row['id']}'>Edit</a> | 
                                <a href='delete.php?id={$row['id']}' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Tidak ada data</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
