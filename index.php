<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" rel="stylesheet">
        <title>Dinee</title>
    </head>
    <body>
    <?php
    include ("ConnectBDD.php");

    $route = $_GET["route"] ?? null;
    $id = $_GET["id"] ?? null;    
    
    switch ($route) {
        case '':
        case '/':
        case 'home':
            require __DIR__ . '/views/home.php';
            break;

        // case 'listClass':
        //     $classController->browse();
        //     break;

        default:
        echo $route;
            http_response_code(404);
            require __DIR__ . '/views/404.php';
            break;
    }
    ?>
</body>