<?php
    $email = $_POST['email'];
    $theme = $_POST['theme'];
    $message = $_POST['message'];

    $subject = "=?utf-8?B?".base64_encode("Сообщение с сайта")."?=";
    $headers = "From: $email\r\nReply-to: $email\r\nContent-type: text\html; charset=utf-8\r\n";

    $success = mail ("roman1199@mail.ru, $subject, $message, $headers");

    echo $success;
?>