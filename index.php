<?php
$title = "Mon Site Azure";
$message = "Hello Azure !";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        h1 {
            color: #0078d4;
        }
        p {
            font-size: 1.2em;
            color: #333;
        }
        .emoji {
            font-size: 2em;
        }
    </style>
</head>
<body>
    <h1><?= $title ?></h1>
    <p><?= $message ?></p>
</body>
</html>
