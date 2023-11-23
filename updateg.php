<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nip = $_POST['nip'];

    $sql = "UPDATE data_guru SET nama='$nama', nip='$nip' WHERE idg=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$id = $_GET['id'];
$sql = "SELECT * FROM data_guru WHERE idg=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Guru</title>
</head>
<body>
    <h2>Edit Guru</h2>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $row['idg']; ?>">
        <label for="nama">Nama  :</label>
        <input type="text" name="nama" required><br>

        <label for="email">Nip    :</label>
        <input type="text" name="nip" required><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
