<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $no_surat = $_POST['no_surat'];
    $tujuan_surat = $_POST['tujuan_surat'];
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];

    $file = $_FILES['file']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($file);

    // Check if the uploads directory exists, if not, create it
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
        $sql = "INSERT INTO disposisi_surat (no_surat, tujuan_surat, tanggal, status, file) VALUES ('$no_surat', '$tujuan_surat', '$tanggal', '$status', '$file')";
        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error uploading file.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Disposisi Surat</title>
    <link rel="icon" href="icon-surat.png" type="image/png">
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
        }
        .header {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .header img {
            margin-right: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            width: 100%;
            margin-top: 20px;
        }
        input[type="text"], input[type="date"], select, input[type="file"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        input[type="submit"] {
            padding: 10px 15px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #2980b9;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="surat.jpg" alt="Surat" width="100" height="100">
            <h1>Tambah Disposisi Surat</h1>
        </div>
        <form method="POST" enctype="multipart/form-data">
            <label for="no_surat">No Surat</label>
            <input type="text" id="no_surat" name="no_surat" required>

            <label for="tujuan_surat">Tujuan Surat</label>
            <input type="text" id="tujuan_surat" name="tujuan_surat" required>

            <label for="tanggal">Tanggal</label>
            <input type="date" id="tanggal" name="tanggal" required>

            <label for="status">Status</label>
            <select id="status" name="status" required>
                <option value="Diterima">Diterima</option>
                <option value="Belum">Belum</option>
            </select>

            <label for="file">File</label>
            <input type="file" id="file" name="file" required>

            <input type="submit" value="Tambah">
        </form>
    </div>
</body>
</html>
