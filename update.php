<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jenikel = $_POST['jenikel'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];
    $jurusan = $_POST['jurusan'];
    $email = $_POST['email'];

    $sql = "UPDATE data_siswa SET nama='$nama', jenikel='$jenikel', alamat='$alamat', nohp='$nohp', jurusan='$jurusan', email='$email' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$id = $_GET['id'];
$sql = "SELECT * FROM data_siswa WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
</head>
<body>
    <h2>Edit Student</h2>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
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
        <input type="submit" value="Update">
    </form>
</body>
</html>
