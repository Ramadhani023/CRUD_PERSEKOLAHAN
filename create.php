<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $jenikel = $_POST['jenikel'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];
    $jurusan = $_POST['jurusan'];
    $email = $_POST['email'];

    $sql = "INSERT INTO data_siswa (nama, jenikel, alamat, nohp, jurusan, email) VALUES ('$nama', '$jenikel', '$alamat', '$nohp', '$jurusan', '$email')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
</head>
<body>
    <h2>Add Student</h2>
    <form method="POST" action="">
        <label for="nama">Name  :</label>
        <input type="text" name="nama" required><br>

        <label for="jenikel">Gender :</label>
        <input type="text" name="jenikel" required><br>

        <label for="alamat">Address :</label>
        <input type="text" name="alamat" required><br>

        <label for="nohp">Phone :</label>
        <input type="text" name="nohp" required><br>

        <label for="jurusan">Department :</label>
        <input type="text" name="jurusan" required><br>

        <label for="email">Email    :</label>
        <input type="email" name="email" required><br>

        <input type="submit" value="Save">
    </form>
</body>
</html>
