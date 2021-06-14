<?php
    $email = $_POST['email'];
    $theme = $_POST['theme'];
    $message = $_POST['message'];
    $subject = "Сообщение с сайта " . 'Тема: ' . $theme;
    $subject = "=?utf-8?B?".base64_encode($subject)."?=";
    $headers   = 'From: ' . $email . "\r\n" . 'Reply-To: ' . $email . "\r\n";
    $message_cont = $message . " пришло от " . $email;
    $success = mail('centaprint@mail.ru', $subject, $message_cont, $headers);

    echo $success;
?>