<?php
    /** Підписати нову електронну адресу до розсилки. 
     * @param string $file файл для запису
     * @param string $name нова електронна адреса
     * @return void
    */
    function add_subscriber($file, $name) {
        # Відкрити або створити переданий файл
        $temp_file = fopen($file, "a+");

        # Дізнатись розмір файлу
        $size = filesize($file);

        # Оперування над $name
        $name = strtolower(trim($name));
        $name = ($size > 0)?"\n$name":$name;

        # Запис сформованого значення
        fwrite($temp_file, $name);

        # Закрити переданий файл
        fclose($temp_file);
    }
    /** Перевірка наявності рядка у файлі. 
     * @param string $file файл для перевірки
     * @param string $name шуканий рядок
     * @return bool
    */
    function is_in_file($file, $name) {
        $result = false;                    //значення результату
        $temp_file = fopen($file, "a+");    //відкрити переданий файл або створити його
        $another_string = fgets($temp_file);//спробувати прочитати перший рядок файлу
        if($another_string != false) {      //якщо перший рядок прочитано
            while($another_string != false) {
                # порівняти $another_string з $name
                if(trim($another_string) == strtolower(trim($name))) {
                    $result = true;
                    break;
                }
                $another_string = fgets($temp_file);//спробувати прочитати наступний рядок файлу
            }
        }
        fclose($temp_file);//закрити переданий файл
        return $result;
    }
    /**Дізнатись поточний курс біткоїн до гривні (BTC to UAH).
     * @return float
    */
    function get_rate() {
        # Назва сайту-джерела про поточний стан курсу
        $info = "http://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5";

        # Зчитування інформації із вказаного вище сайту
        $jsonData = file_get_contents($info);

        # Формування відповіді.
        $USDtoUAH = json_decode($jsonData)[0];
        $BTCtoUSD = json_decode($jsonData)[2];
        $resulting_rate = floatval($USDtoUAH->sale) * floatval($BTCtoUSD->sale);

        # Повернути отримане значення
        return $resulting_rate;
    }