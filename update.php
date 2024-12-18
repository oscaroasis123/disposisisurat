<?php
include 'config.php';

$id = $_GET['id'];
$sql = "SELECT * FROM disposisi_surat WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $no_surat = $_POST['no_surat'];
    $tujuan_surat = $_POST['tujuan_surat'];
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];

    if (!empty($_FILES['file']['name'])) {
        $file = $_FILES['file']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($file);

        if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
            $sql = "UPDATE disposisi_surat SET no_surat='$no_surat', tujuan_surat='$tujuan_surat', tanggal='$tanggal', status='$status', file='$file' WHERE id=$id";
        }
    } else {
        $sql = "UPDATE disposisi_surat SET no_surat='$no_surat', tujuan_surat='$tujuan_surat', tanggal='$tanggal', status='$status' WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Disposisi Surat</title>
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Update Disposisi Surat</h1>
        <form method="POST" enctype="multipart/form-data">
            <label for="no_surat">No Surat</label>
            <input type="text" id="no_surat" name="no_surat" value="<?php echo $row['no_surat']; ?>" required>

            <label for="tujuan_surat">Tujuan Surat</label>
            <input type="text" id="tujuan_surat" name="tujuan_surat" value="<?php echo $row['tujuan_surat']; ?>" required>

            <label for="tanggal">Tanggal</label>
            <input type="date" id="tanggal" name="tanggal" value="<?php echo $row['tanggal']; ?>" required>

            <label for="status">Status</label>
            <select id="status" name="status" required>
                <option value="Diterima" <?php if ($row['status'] == 'Diterima') echo 'selected'; ?>>Diterima</option>
                <option value="Belum" <?php if ($row['status'] == 'Belum') echo 'selected'; ?>>Belum</option>
            </select>

            <label for="file">File</label>
            <input type="file" id="file" name="file">
            <p>Current File: <?php echo $row['file']; ?></p>

            <input type="submit" value="Update">
        </form>
    </div>
</body>
</html>
