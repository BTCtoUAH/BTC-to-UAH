<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bitcoin Rate</title>
</head>
<body>
    
<?php
    # Підключити файл із створеними функціями
    require_once("functions.php");
    
    $rate = get_rate();

    $date = date("d.m.y H:i:s");
    //$gained_data = "<h1 style=\"font-family:verdana;\" align=\"center\">Поточний курс:</h1><h3 align=\"center\">1 BTC = $rate UAH";
    //$gained_data .="<h5 style=\"font-family:verdana;\" align=\"center\">*станом на $date</h5>";
    //echo $gained_data;
?>
<center>
    <h1 style="border: dashed; font-family: verdana; background-color: gray">Поточний курс:</h1>
    <p style="border: double; font-family: verdana; font-size: 20px">
        1 BTC = <?php echo $rate; ?> UAH
        <br><br>
        *станом на <?php echo $date; ?>
    </p>
</center>
</body>
</html>