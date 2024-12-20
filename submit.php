<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Очистка данных
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Проверка данных на стороне сервера
    if (strlen($name) < 2 || strlen($name) > 50) {
        die("Имя должно быть от 2 до 50 символов.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Некорректный Email.");
    }

    if (strlen($message) < 10 || strlen($message) > 500) {
        die("Сообщение должно быть от 10 до 500 символов.");
    }

    // Отправка сообщения
    $to = "Leonardo.Magne@outlook.com";
    $subject = "Новое сообщение с формы обратной связи";
    $headers = "From: $email";
    $body = "Имя: $name\nEmail: $email\nСообщение:\n$message";

    if (mail($to, $subject, $body, $headers)) {
        echo "Сообщение успешно отправлено!";
    } else {
        echo "Ошибка отправки сообщения.";
    }
} else {
    echo "Неправильный метод запроса.";
}