<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_mapel = mysqli_real_escape_string($conn, $_POST['nama_mapel1']);
    $kode_mapel = mysqli_real_escape_string($conn, $_POST['kode_mapel']);
    $guru_id = mysqli_real_escape_string($conn, $_POST['guru_id']);

    // Insert mapel data into data_mapel table
    $sql = "INSERT INTO data_mapel (nama_mapel, kode_mapel, guru_id) VALUES ('$nama_mapel', '$kode_mapel', '$guru_id')";
    if ($conn->query($sql) === TRUE) {
        // Redirect to the page that displays the mapel information
        header("Location: indexm.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Display form to add a new mapel
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Mapel</title>
</head>

<body>
    <h2>Add Mapel</h2>
    <form method="POST" action="createm.php">
        <h2>Add Mapel</h2>

        <label for="nama_mapel">Nama Mapel :</label>
        <input type="text" name="nama_mapel" required><br>

        <label for="kode_mapel">Kode :</label>
        <input type="text" name="kode_mapel" required><br>

        <label for="guru_id">Guru :</label>
        <select name="guru_id">
            <?php
            $guru_id = mysqli_query($conn, "SELECT * FROM data_guru ORDER BY idg DESC");

            while ($guru_data = mysqli_fetch_array($guru_id)) {
                echo '<option value="' . $guru_data['idg'] . '">' . $guru_data['nama'] . '</option>';
            }
            ?>
        </select>
        <br>    
        <input type="submit" value="Save">
    </form>
</body>

</html>