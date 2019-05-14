<?php
include 'dbconfig.php';
// koneksi ke db
$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$query = "SELECT * FROM score ORDER BY score DESC LIMIT 0, 10";
$result = mysqli_query($db, $query);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>This or That</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>

<body>
    <h1>TOP 10</h1>
    <table>
        <tr>
            <th>Username</th>
            <th>Score</th>
            <th>Playtime</th>
            <th>Capaian Soal</th>
        </tr>
        <?php
        while ($data = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $data['username'] . "</td>";
            echo "<td>" . $data['score'] . "</td>";
            echo "<td>" . $data['playtime'] . "</td>";
            echo "<td>Soal Ke : " . $data['capaian'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <button><a href="index.php">Kembali</a></button>
</body>

</html>