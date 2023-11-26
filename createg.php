<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $nip = $_POST['nip'];

    $sql = "INSERT INTO data_guru (nama, nip) VALUES ('$nama', '$nip')";

    if ($conn->query($sql) === TRUE) {
        header("Location: indexg.php");
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
    <title>Add Guru</title>
</head>
<body>
    <h2>Add Student</h2>
    <form method="POST" action="">
        <label for="nama">Name  :</label>
        <input type="text" name="nama" required><br>

        <label for="email">nip    :</label>
        <input type="text" name="nip" required><br>

        <input type="submit" value="Save">
    </form>
</body>
</html>
