<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Mapel</title>
</head>
<body>
    <h2>Delete Mapel</h2>
    <p>Apakah yakin akan menghapus Mapel?</p>
    <form method="POST" action="">
        <input type="submit" value="Yes, Delete">
    </form>
</body>
</html>

<?php
include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM data_mapel WHERE idm=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: indexm.php");
    exit();
} else {
    echo "Error deleting record: " . $conn->error;
}
?>