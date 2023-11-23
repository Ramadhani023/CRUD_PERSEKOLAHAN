<?php
include 'db.php';

$sql = "SELECT * FROM data_siswa";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student CRUD</title>
</head>
<body>
    <h2>List Siswa</h2>
    <a href="create.php">Tambahkan Siswa</a><br>
    <a href="indexg.php">List Guru</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>NoHp</th>
            <th>Jurusan</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $row['jenikel'] . "</td>";
                echo "<td>" . $row['alamat'] . "</td>";
                echo "<td>" . $row['nohp'] . "</td>";
                echo "<td>" . $row['jurusan'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td><a href='update.php?id=" . $row['id'] . "'>Edit</a> | <a href='delete.php?id=" . $row['id'] . "'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No records found</td></tr>";
        }
        ?>
    </table>
</body>
</html>