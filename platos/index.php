<?php
require '../database.php';

$stmt = $pdo->query('SELECT * FROM platos');
$platos = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src=""></script>
    <title>Página principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Platos</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                  
                    <th>Código de plato</th>
                    <th>Nombre</th>
                    <th>Tipo ID</th>
                    <th>Elaboración</th>
                    <th>PVP</th>
                    <th>IVA</th>
                    <th>Menú</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($platos as $plato): ?>
                    <tr>
                      
                        <td><?php echo htmlspecialchars($plato['codigo_plato']); ?></td>
                        <td><?php echo htmlspecialchars($plato['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($plato['id_tipo']); ?></td>
                        <td><?php echo htmlspecialchars($plato['elaboracion']); ?></td>
                        <td><?php echo htmlspecialchars($plato['pvp']); ?></td>
                        <td><?php echo htmlspecialchars($plato['iva']); ?></td>
                        <td><?php echo htmlspecialchars($plato['en_menu']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>   
</body>

</html>