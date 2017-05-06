<?php

$emailAddress = 'esetnod1111@gmail.com';
// Адрес сайта, с которого он отправляет сообщения
$siteEmail = 'info@mysite.com';
// Тема сообщения
$emailTheme = 'Письмо с моего сайта';

// Проверяем была ли отправлена форма
if(isset($_POST['sended'])) {
    // Переменная, в которую будем собирать текст нашего сообщения
    $message = 'Форма была отправлена!<br />';
    // Текстовый инпут теперь ы переменной $first
    $first = isset($_POST['name']) ? $_POST['name'] : '';
    $message .= 'В текстовый инпут ввели: ' . htmlspecialchars($first) . '<br />';
    $second = isset($_POST['phone']) ? $_POST['phone'] : '';
    $message .= 'В текстовый инпут ввели: ' . htmlspecialchars($second) . '<br />';
    // Чекбоксы
    if(isset($_POST['one']))
        $message .= 'Первый чекбокс был выбран<br />';
    if(isset($_POST['two']))
        $message .= 'Второй чекбокс был выбран<br />';

    // Переключатели
    $sixth = isset($_POST['pay']) ? $_POST['pay'] : '';
    if(empty($sixth))
        $message .= 'Никакой переключатель не был выбран<br />';
    else
        $message .= 'Был выбран переключатель, у которого value = ' . htmlspecialchars($sixth) . '<br />';

    $headers = array(
        'MIME-Version: 1.0',
        'From: ' . $siteEmail,
        'Reply-To: ' . $siteEmail,
        'Content-Type: text/html; charset=utf-8'
    );
    if(mail($emailAddress, $emailTheme, $message, implode("\r\n", $headers)))
        $message .= '<br />PHP считает, что письмо отправлено, проверяй ящик! Загляни в спам, если письма не видно';
    else
        $message .= '<br />PHP считает, что письмо отправить не удалось...';
    // А также покажем на странице введённые данные и результат отправки письма
    echo($message);
}


