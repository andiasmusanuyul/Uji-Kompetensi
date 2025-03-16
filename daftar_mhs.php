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