<?php
require 'database.php';

$stmt = $pdo->query('SELECT * FROM platos');
$stmt->execute();
$posts = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página principal</title>
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Platos</h2>
    </div>    
</body>

</html>