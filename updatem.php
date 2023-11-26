<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama = $_POST['nama_mapel'];
    $kode = $_POST['kode_mapel'];
    $guru = $_POST['guru_id'];

    $sql = "UPDATE data_mapel SET nama_mapel='$nama', kode_mapel='$kode', guru_id='$guru' WHERE idm=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: indexm.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$id = $_GET['id'];
$sql = "SELECT * FROM data_mapel WHERE idm=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mapel</title>
</head>
<body>
    <h2>Edit Mapel</h2>
    <form method="POST" action="updatem.php">
        <input type="hidden" name="id" value="<?php echo $row['idm']; ?>">
        <label for="nama_mapel">Nama Mapel :</label>
        <input type="text" name="nama_mapel" required value="<?php echo $row['nama_mapel']; ?>"><br>

        <label for="kode_mapel">Kode :</label>
        <input type="text" name="kode_mapel" required value="<?php echo $row['kode_mapel']; ?>"><br>

        <label for="guru_id">Guru :</label>
        <select name="guru_id">
            <?php
            $guru_id = mysqli_query($conn, "SELECT * FROM data_guru ORDER BY idg DESC");

            while ($guru_data = mysqli_fetch_array($guru_id)) {
                $selected = ($guru_data['idg'] == $row['guru_id']) ? 'selected' : '';
                echo '<option value="'.$guru_data['idg'].'" ' . $selected . '>' . $guru_data['nama']. '</option>';
            }
            ?>
        </select>

        <br>
        
        <input type="submit" value="Update">
    </form>
</body>
</html>