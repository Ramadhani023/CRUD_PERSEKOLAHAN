<?php
include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM data_siswa WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
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
    <title>Delete Student</title>
</head>
<body>
    <h2>Delete Student</h2>
    <p>Are you sure you want to delete this student?</p>
    <form method="POST" action="">
        <input type="submit" value="Yes, Delete">
    </form>
</body>
</html>