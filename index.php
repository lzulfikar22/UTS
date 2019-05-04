<?php
$kiri = rand(1, 2);
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

        .jawab {
            float: left;
            width: 50%;
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
        // $rand = rand(0, 3);
        $rand = rand(0, 2);
        $acak = rand(1, 100);
        $answer = 0;
        switch ($rand) {
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
            case 2:
                $answer = $bil1 * $bil2;
                echo $bil1 . '*' . $bil2 . "<br>";
                $penipu = $answer - $acak;
                break;
                // case 3:
                //     $answer = $bil1 / $bil2;
                // echo $bil1 . '/' . $bil2;
                //     break;
            default:
                # code...
                break;
        }
        ?>
        <div>
            <div class="jawab" style="background-color:whitesmoke;">
                <?php
                if ($kiri == 1) {
                    echo $penipu;
                } else {
                    echo $answer;
                }
                ?>
            </div>
            <div class="jawab" style="background-color:tomato;">
                <?php
                if ($kiri == 1) {
                    echo $answer;
                } else {
                    echo $penipu;
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>