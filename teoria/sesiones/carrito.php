<?php
    session_start();

    //inicializar el carrito

    if (!isset($_SESSION['carrito'])){
        $_SESSION['carrito']= [];
    }

    var_dump($_SESSION['carrito']);

    $item = $_POST['item'];

    //manera 1 de hacer push
    $_SESSION['carrito'][] = $item;

    //manera 2 de hacer push
    array_push($_SESSION['carrito'], $item);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <h2>Carrito de compra con sesiones</h2>
    <form method="post">
        <input type="text" placeholder="añade un producto" required name="item">
        <button type="submit">Agregar producto</button>
    </form>

    <section>
        <h3>Productos del carrito</h3>
        <table>
            <thead>
                <tr>
                    <th>Nombre del producto</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php foreach($_SESSION['carrito'] as $producto):?>
                        <tr>
                            <td><?php echo $producto;?></td>
                        </tr>
                    <?php endforeach;?>
                </tr>
            </tbody>
        </table>
    </section>
</body>
</html>