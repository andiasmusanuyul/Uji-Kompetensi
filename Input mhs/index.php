<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_mhs";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $gender = $_POST['gender'];
    $jurusan = $_POST['jurusan'];

    $sql = "INSERT INTO mahasiswa (nim, nama, gender, jurusan) 
            VALUES ('$nim', '$nama', '$gender', '$jurusan')";

    if ($conn->query($sql) === TRUE) {
        echo "Data mahasiswa berhasil disimpan!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #007bff;
        }
        label {
            font-weight: bold;
        }
        .form-group {
            margin-bottom: 15px;
        }
        input[type="text"], input[type="number"], select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .btn {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
        }
        .btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Tambah Data Mahasiswa</h2>
        <form action="tambah_mahasiswa.php" method="POST">
            <div class="form-group">
                <label for="nim">NIM:</label>
                <input type="text" id="nim" name="nim" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="jurusan">Jurusan:</label>
                <input type="text" id="jurusan" name="jurusan" required>
            </div>
            <button type="submit" class="btn">Simpan Data</button>
        </form>
    </div>

</body>
</html>