<?php

define('protection', true);

require 'system/bootstrap.php';
include_once ROOT .  DS . 'system' . DS . 'classes' . DS . 'phpmailer.php';
include_once ROOT .  DS . 'system' . DS . 'classes' . DS . 'smtp.php';

$form = [
    'property_title' => isset($_POST['property_title']) ? escape($_POST['property_title']) : null,
    'name' => isset($_POST['name']) ? escape($_POST['name']) : null,
    'phone' => isset($_POST['phone']) ? escape($_POST['phone']) : null,
    'email' => isset($_POST['email']) ? escape($_POST['email']) : null,
    'services' => isset($_POST['services']) ? escape($_POST['services']) : null,
    'number' => isset($_POST['number']) ? escape($_POST['number']) : null,
    'message' => isset($_POST['message']) ? escape($_POST['message']) : null,
    'error' => [],
];

// Фильтруем ботов. Поля email и phone скрыты в формах. А поле phones является обязательным.

            // Отправка на почту
            $mail = new PHPMailer;
            // $mail->isSMTP();
            $mail->CharSet = 'UTF-8';
            $mail->SMTPDebug = 0;
            $mail->Host = $config['mail']['host'];
            $mail->Port = $config['mail']['port'];
            $mail->SMTPAuth = true;
            $mail->Username = $config['mail']['username'];
            $mail->Password = $config['mail']['password'];
            $mail->setFrom($config['mail']['username']);
            $mail->addAddress($config['mail']['emailTo']);
            $mail->Subject = $form['property_title'];
            $mail->Body = "Новое письмо " . date('d-m-y H:i') . "
                            Имя: " . $form['name'] . "
                            Телефон: " . $form['phone'] . "
                            Почта: " . $form['email'] . "
                            Сообщение: " . $form['message'] . "";

            if (!$mail->send()) {
                echo "Mailer error : " . $mail->ErrorInfo . "<br>";
                $form['error']['mailer'] = 'Error';
            }

            if(count($form['error']) >= 2) {
                print_r(4);
                // die(header('HTTP/1.0 404 Not Found'));
                // header('location: /');
                // exit;
            }

else {
    print_r(2);
    die(header('HTTP/1.0 404 Not Found'));
    header('location: /');
    exit;
}