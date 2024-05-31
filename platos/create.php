<?php
require '../database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $codigo_plato = trim(htmlspecialchars($_POST['codigo_plato']));
    $nombre = trim(htmlspecialchars($_POST['nombre']));
    $id_tipo = trim(htmlspecialchars($_POST['id_tipo']));
    $elaboracion = trim(htmlspecialchars($_POST['elaboracion']));
    $pvp = trim(htmlspecialchars($_POST['pvp']));
    $iva = trim(htmlspecialchars($_POST['iva']));
    $en_menu = trim(htmlspecialchars($_POST['en_menu']));

    $sql = 'INSERT INTO posts (submit, codigo_plato, nombre, id_tipo, elaboracion, pvp, iva, en_menu) VALUES (:submit, :codigo_plato, :nombre, :id_tipo,:elaboracion, :pvp, :iva, :en_menu)';
    $stmt = $pdo->prepare($sql);

    $params = [
        'codigo_plato' => $codigo_plato,
        'nombre' => $nombre,
        'id_tipo' => $id_tipo,
        'elaboracion' => $elaboracion,
        'pvp' => $pvp,
        'iva' => $iva,
        'en_menu' => $en_menu
    ];
    $stmt->execute($params);

    header('Location: index.php');
    exit();
}

$stmt = $pdo->query('SELECT * FROM platos');
$platos = $stmt->fetchAll();
?> <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Página principal</title>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Platos</h2>

        <!-- <Añadir un nuevo plato -->
        <form method="post" action="">
            <div class="form-group">
                <label for="codigo_plato">Código Plato</label>
                <input type="text" name="codigo_plato" id="codigo_plato" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="id_tipo">Tipo</label>
                <input type="text" name="id_tipo" id="id_tipo" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="elaboracion">Elaboración</label>
                <input type="text" name="elaboracion" id="elaboracion" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="pvp">PVP</label>
                <input type="text" name="pvp" id="pvp" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="iva">IVA</label>
                <input type="text" name="iva" id="iva" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="en_menu">En Menú</label>
                <input type="text" name="en_menu" id="en_menu" class="form-control" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Añadir Plato</button>
        </form>

        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>IVA</th>
                    <th>En Menú</th>
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
</body>
</html>