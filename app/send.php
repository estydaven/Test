<?php

$sendto = "esetnod1111@gmail.com"; // почта, на которую будет приходить письмо !!! Измените на свою!!!
$username = $_POST['name']; // сохраняем в переменную данные полученные из поля c именем
$usertel = $_POST['phone']; // сохраняем в переменную данные полученные из поля c телефонным номером

// проверяем наличие данных в чекбоксе и сохраняем их

$aCheck = '';
if(empty($aCheck))
{
    $aCheck = "Вы ничего не выбрали";
}
elseif(isset($_POST['box']) &&
    $_POST['box'] == 'On')
{
    $aCheck = "Требуется доступ.";
}
else
{
    $aCheck = "Доступ не нужен.";
}

// проверяем наличие данных в радиокнопке  и сохраняем их
$radio = '';
if (empty($_POST["radio"]))
{
    $radio = "Данные по оплате не указаны";
}
elseif(isset($_POST['radio']) &&
    $_POST['radio'] == '1')
{
    $radio =  "Требуется доступ.";
}
else
{
    $radio =  "Доступ не нужен.";
}

// Формирование заголовка письма
$subject = "Новое сообщение";
$headers = "From: " . strip_tags($sendto) . "\r\n";
$headers .= "Reply-To: ". strip_tags($sendto) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html;charset=utf-8 \r\n";

// Формирование тела письма
$msg = "<html><body style='font-family:Arial,sans-serif;'>";
$msg .= "<h2 style='font-weight:bold;border-bottom:1px dotted #ccc;'>Cообщение с сайта</h2>\r\n";
$msg .= "<p><strong>От кого:</strong> ".$username."</p>\r\n";
$msg .= "<p><strong>Телефон:</strong> ".$usertel."</p>\r\n";
$msg .= "<p><strong>Дополнительные параметры:<br/> </strong> ".$aCheck."</p>\r\n";
$msg .= "<p>".$radio."</p>\r\n";
$msg .= "</body></html>";

// отправка сообщения
if(@mail($sendto, $subject, $msg, $headers)) {
    echo "<p>Ваше сообщение отправлено</p>"; // Здесь может быть любой html код. Вместо картинки можно задать div и в нем что угодно
} else {
    echo "<p>Сообщение почему-то не отправилось...</p>"; // Здесь может быть любой html код. Вместо картинки можно задать div и в нем что угодно
}



