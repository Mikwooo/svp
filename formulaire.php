<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = htmlspecialchars($_POST["nom"]);
    $email = htmlspecialchars($_POST["email"]);
    $tel = htmlspecialchars($_POST["tel"]);
    $sujet = htmlspecialchars($_POST["sujet"]);
    $message = htmlspecialchars($_POST["message"]);

    $to = "aux4saisonssedan@gmail.com"; 
    $subject = "📩 Nouveau message depuis le site AUX 4 SAISONS";
    $body = "
        <h2>Nouveau message de contact</h2>
        <p><strong>Nom :</strong> $nom</p>
        <p><strong>Email :</strong> $email</p>
        <p><strong>Téléphone :</strong> $tel</p>
        <p><strong>Sujet :</strong> $sujet</p>
        <p><strong>Message :</strong><br>$message</p>
    ";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: $nom <$email>\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
