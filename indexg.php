<?php
include 'db.php';

$sql = "SELECT * FROM data_guru";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guru CRUD</title>
</head>
<body>
    <h2>List Guru</h2>
    <a href="createg.php">Tambahkan Guru</a><br>
    <a href="index.php">List Siswa</a><br>
    <a href="indexm.php">List Mapel</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>nip</th>
            <th>Aksi</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['idg'] . "</td>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $row['nip'] . "</td>";
                echo "<td><a href='updateg.php?id=" . $row['idg'] . "'>Edit</a> | <a href='deleteg.php?id=" . $row['idg'] . "'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No records found</td></tr>";
        }
        ?>
    </table>
</body>
</html>