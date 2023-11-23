<?php
include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM data_guru WHERE idg=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: indexg.php");
    exit();
} else {
    echo "Error deleting record: " . $conn->error;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Guru</title>
</head>
<body>
    <h2>Delete Guru</h2>
    <p>Apakah yakin akan menghapus Guru?</p>
    <form method="POST" action="">
        <input type="submit" value="Yes, Delete">
    </form>
</body>
</html>