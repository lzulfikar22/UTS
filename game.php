<?php
session_start();
$kiri = rand(1, 2);
function bagi($n)
{
    $faktor = array();

    for ($i = 1; $i <= $n; $i++) {
        if ($n % $i == 0) {
            array_push($faktor, $i);
        }
    }
    $acak = rand(0, count($faktor) - 1);
    $pembagi = $faktor[$acak];
    $jumlah = $n / $pembagi;
    echo $n . '/' . $pembagi . "<br>";
    return $jumlah;
}
if (isset($_GET["benar"])) {
    $_SESSION['score'] = $_SESSION['score'] + 10;
    $_SESSION['count'] = $_SESSION['count'] + 1;
}
if (isset($_GET['salah'])) {
    $_SESSION['hp'] = $_SESSION['hp'] - 1;
    $_SESSION['count'] = $_SESSION['count'] + 1;
}
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

        .jawab {
            float: left;
            width: 50%;
        }
    </style>
</head>

<body>
    <h1>This or That : Math Edition</h1>
    <div class="kiri">
        <?php
        $bil1 = rand(0, 100);
        $bil2 = rand(0, 100);
        $bil3 = rand(0, 1000);
        $bil4 = rand(0, 1000);
        $level1 = rand(0, 1);
        $level2 = rand(0, 3);
        $acak = rand(-10, 10);
        if ($acak == 0) {
            $acak = 1;
        }
        $answer = 0;
        // Untuk menghitung Level
        if ($_SESSION['count'] < 11) { // Level 1
            switch ($level1) {
                case 0:
                    $answer = $bil1 + $bil2;
                    echo $bil1 . '+' . $bil2 . "<br>";
                    $penipu = $answer - $acak;
                    break;
                case 1:
                    $answer = $bil1 - $bil2;
                    echo $bil1 . '-' . $bil2 . "<br>";
                    $penipu = $answer - $acak;
                    break;
                default:
                    break;
            }
        } elseif ($_SESSION['score'] >= 70 and $_SESSION['count'] < 21) { // Level 2
            switch ($level1) {
                case 0:
                    $answer = $bil3 + $bil4;
                    echo $bil3 . '+' . $bil4 . "<br>";
                    $penipu = $answer - $acak;
                    break;
                case 1:
                    $answer = $bil3 - $bil4;
                    echo $bil3 . '-' . $bil4 . "<br>";
                    $penipu = $answer - $acak;
                    break;
                default:
                    break;
            }
        } elseif ($_SESSION['score'] >= 150 and $_SESSION['count'] > 20) { // Level 3
            switch ($level2) {
                case 0:
                    $answer = $bil3 + $bil4;
                    echo $bil3 . '+' . $bil4 . "<br>";
                    $penipu = $answer - $acak;
                    break;
                case 1:
                    $answer = $bil3 - $bil4;
                    echo $bil3 . '-' . $bil4 . "<br>";
                    $penipu = $answer - $acak;
                    break;
                case 2:
                    $answer = $bil1 * $bil2;
                    echo $bil1 . '*' . $bil2 . "<br>";
                    $penipu = $answer - $acak;
                    break;
                case 3:
                    $answer = bagi($bil1);
                    $penipu = $answer - $acak;
                    break;
                default:
                    break;
            }
        } else {
            header("Location: index.php");
            exit;
        }
        ?>
        <div>
            <div class="jawab" style="background-color:whitesmoke;">
                <?php
                if ($kiri == 1) {
                    ?>
                    <form method="get" action="game.php">
                        <input type="submit" name="salah" value="<?php echo $penipu; ?>">
                    </form>
                <?php
            } else {
                ?>
                    <form method="get" action="game.php">
                        <input type="submit" name="benar" value="<?php echo $answer; ?>">
                    </form>
                <?php
            }
            ?>
            </div>
            <div class="jawab" style="background-color:tomato;">
                <?php
                if ($kiri == 1) {
                    ?>
                    <form method="get" action="game.php">
                        <input type="submit" name="benar" value="<?php echo $answer; ?>">
                    </form>
                <?php
            } else {
                ?>
                    <form method="get" action="game.php">
                        <input type="submit" name="salah" value="<?php echo $penipu; ?>">
                    </form>
                <?php
            }
            ?>
            </div>
        </div>
    </div>
    <?php
    echo "Nyawa anda : " . $_SESSION['hp'] . "<br>";
    echo "Score anda : " . $_SESSION['score'] . "<br>";
    echo "level " . $_SESSION['count'] . "/ 10";
    ?>
</body>

</html>