<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Додати нового підписника</title>
</head>
<body>
    <center>
        <form method="POST">
            <h1 style="border: dashed; background-color: gray">Додати нового підписника</h1>
            <p style="font-size: 20px; border: double">
                Введіть бажану електронну адресу в поле нижче та нaтисніть кнопку "Додати!"
                <br><br>
                <input style="width:100x;height:25px" type="email" name="email" placeholder="Введіть e-mail">
                <input style="width:100x;height:25px" type="submit" value="Додати!">
            </p>
        </form>
    </center>
</body>
</html>
<?php
    if(count($_POST) > 0) {
        # Підключити файл із створеними функціями
        require_once("functions.php");
        # Назва файлу, де зберігаються електронні пошти підписників
        $file_with_subscribers = "subscribers.txt";

        if(!is_in_file($file_with_subscribers, $_POST["email"])) {
            //якщо ця електронна адреса раніше не додавалась
            add_subscriber($file_with_subscribers, $_POST["email"]);
            echo "<h1 style=\"color:green\" align=\"center\">Нового підписника було успішно додано</h1>";
            http_response_code(200);
        }
        else {//якщо ця електронна адреса була додана раніше
            echo "<h1 style=\"color:red\" align=\"center\">Такий підписник вже існує...</h1>";
            http_response_code(409);
        }
    }
?>