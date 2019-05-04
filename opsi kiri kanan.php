<?php
$kiri = rand(1, 2);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <style>
        .kiri {
            float: left;
            width: 50%;
        }
    </style>
</head>

<body>
    <div class="kiri">
        <?php
        if ($kiri == 1) {
            echo '<p>1</p>';
        } else {
            echo '<p>2</p>';
        }
        ?>
    </div>
    <div class="kiri">
        <?php
        if ($kiri == 1) {
            echo '<p>2</p>';
        } else {
            echo '<p>1</p>';
        }
        ?>
    </div>
</body>

</html>