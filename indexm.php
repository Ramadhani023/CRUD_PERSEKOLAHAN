<?php
include 'db.php';

$sql = "SELECT data_mapel.idm, data_mapel.nama_mapel, data_mapel.kode_mapel, data_guru.nama AS guru_name
        FROM data_mapel
        INNER JOIN data_guru ON data_mapel.guru_id = data_guru.idg";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapel CRUD</title>
</head>
<body>
    <h2>List Mapel</h2>
    <a href="createm.php">Tambahkan Mapel</a><br>
    <a href="index.php">List Siswa</a><br>
    <a href="indexg.php">List Guru</a><br>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Mapel</th>
            <th>Kode Mapel</th>
            <th>Guru</th>
            <th>Aksi</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['idm'] . "</td>";
                echo "<td>" . $row['nama_mapel'] . "</td>";
                echo "<td>" . $row['kode_mapel'] . "</td>";
                echo "<td>" . $row['guru_name'] . "</td>";
                echo "<td><a href='updatem.php?id=" . $row['idm'] . "'>Edit</a> | <a href='deletem.php?id=" . $row['idm'] . "'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No records found</td></tr>";
        }
        ?>
    </table>
</body>
</html>
