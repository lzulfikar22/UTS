<?php
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Crazy Math</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
    <style>
        .kiri {
            width: 70%;
            float: left;
            /*background-color: lightblue;*/
        }

        .kanan {
            width: 30%;
            float: left;
            /*background-color: whitesmoke;*/
        }
    </style>
</head>

<body>
    <h1>Game Tambah-tambahan</h1>
    <div class="kiri">
        <?php
        session_start();
        $bil1 = rand(0, 100);
        $bil2 = rand(0, 100);
        if (isset($_POST['maju']) == null) {
            if ($_POST['jawab'] == $_SESSION['hasil']) {
                $_SESSION['score'] = $_SESSION['score'] + 10;
                echo "Benar !" . "<br>";
            } else {
                echo "Salah !" . "<br>";
                $_SESSION['score'] = $_SESSION['score'] - 5;
                $_SESSION['hp'] = $_SESSION['hp'] - 1;
            }
        }
        if ($_SESSION['hp'] > 0) {
            echo "$bil1 + $bil2 = ?";
            $_SESSION['hasil'] = $bil1 + $bil2;
            echo '<form action="game.php" method="POST">';
            echo '<input type="text" name="jawab" autofocus>';
            echo '<input type="submit" name="submit" value="Cek !">';
            echo "</form>";
        } else {
            echo "Sayang Sekali, " . $_COOKIE["user"] . ". Anda Kalah :(";
            session_destroy();
        }
        ?>
    </div>
    <div class="kanan">
        <?php
        echo "Nyawa anda : " . $_SESSION['hp'] . "<br>";
        echo "Score anda : " . $_SESSION['score'] . "<br>";
        ?>
    </div>
    <div>
        <?php
        if ($_SESSION['hp'] == 0) {
            // Kode untuk masukin kukii
            setcookie("score", $_SESSION['score'], time() + (86400 * 30));
            setcookie('lasttime', date('d/m/Y H:i'), time() + 3600 * 24 * 30);
            // kode untuk masukin ke databeeeees

            require "config.php";
            $db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
            $query = "INSERT INTO leaderboard (username, score, tanggal, foto) 
                    VALUES ('" . $_COOKIE['user'] . "','" . $_SESSION['score'] . "','" . date('Y-m-d H:i:s') . "','" . $_COOKIE['photo'] . "')";
            $result = mysqli_query($db, $query);
            echo "<a href = 'index.php'>Kembali Ke Awal</a>";
        }
        ?>
    </div>
</body>

</html> 