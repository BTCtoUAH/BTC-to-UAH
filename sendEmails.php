<?php
    # Підключити файл із створеними функціями
    require_once("functions.php");

    $rate_to_send = get_rate();
    $message = "1 BTC = $rate_to_send UAH";
    $to = "btc.to.uah.info@gmail.com";
    $from = "btc.to.uah.info@gmail.com";
    $subject = "Актуальний курс Bitcoin";

    $headers = "From: $from\r\nReply-to: $from\r\nContent-type: text/plain; charset=utf-8\r\n";

    $temp_file = fopen("subscribers.txt", "a+");    //відкрити файл або створити його
    $another_string = fgets($temp_file);//спробувати прочитати перший рядок файлу
    if($another_string != false) {      //якщо перший рядок прочитано
        while($another_string != false) {
            $to = $another_string;
            $headers = "From: $from\r\nReply-to: $from\r\nContent-type: text/plain; charset=utf-8\r\n";
            if(mail($to, $subject, $message, $headers)) {
                
            }
            else {
                echo "Через помилку E-mailʼи не відправлено";
                break;
            }
            $another_string = fgets($temp_file);//спробувати прочитати наступний рядок файлу
            if($another_string == null)
                echo "E-mailʼи відправлено";
        }
    }
    fclose($temp_file);//закрити файл