<?php
session_start();

include_once "actions.php";
//var_dump($_SESSION['basura']);

if($_GET['accion']=="vaciarCamion"){
   vaciarBasura();
}else if($_GET['accion']==$_SESSION['basura'][0]){
   llenarBasura($_GET['accion']);

}else if(isset($_GET['accion']) && $_GET['accion']!=$_SESSION['basura'][0]){
   $error = "Basura llena";
}
//var_dump($_SESSION['arrayBasuras']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Basura</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include_once 'components/navbar.php'; ?>

    <div class="container mt-4">
        <h1 class="text-center">Gestión del reciclaje</h1>

        <!-- Mensaje de contenedores llenos -->
         
         <div class="container mb-2 bg-danger"><?= $error?></div>
        <!-- Contador de basura procesada -->
       
        <button type="button" class="btn p-3 btn-secondary text-white">
        Basura procesada: <span class="badge bg-danger"> <?= $_SESSION['contador']?></span>
        </button>
        <hr>


      <!-- Visualización de la cola de basura -->
<div class="mt-4">
   <h3>¿Qué toca reciclar ahora?</h3>
    <div class="d-flex align-items-center justify-content-center mb-4">
        <!-- Basura actual -->
         <?php
            echo '
            <div class="text-center p-3 mx-2 border border-success rounded" style="background-color: #d4edda;">
               <h4 class="text-success">Ahora: '.$_SESSION['basura'][0].'</h4>
               <img src="images/'.$_SESSION['basura'][0].'.jpg" alt="'.$_SESSION['basura'][0].'" class="img-fluid" style="width: 80px;">
            </div>
            ';
         ?>
        <!-- Cola de basura -->
        <?php
            for($i=1;$i<5;$i++){
               echo '
                  <div class="d-flex gap-2">
                     <div class="text-center p-3 mx-2 border rounded" style="background-color: #f8f9fa;">
                        <h6>'.$_SESSION['basura'][$i].'</h6>
                        <img src="images/'.$_SESSION['basura'][$i].'.jpg" alt="'.$_SESSION['basura'][$i].'" class="img-fluid" style="width: 50px;">
                     </div>
                  </div>
               ';
            }
         ?>
        
    </div>
</div>

        <!-- Botones de contenedores -->
        <div class="d-flex justify-content-center flex-wrap gap-3">
            <a href="index.php?accion=Glass" class="btn btn-success">
                 Glass
            </a>
            <a href="index.php?accion=Organic" class="btn btn-secondary">
               Organic
            </a>
            <a href="index.php?accion=Paper" class="btn btn-primary">
                Paper
            </a>
            <a href="index.php?accion=Plastic" class="btn btn-warning">
               Plastic
            </a>
            <a href="index.php?accion=vaciarCamion" class="btn btn-danger">
                <img src="images/camion.png" alt="Vaciar Camión" class="img-fluid" style="width: 50px;"> Vaciar Camión
            </a>
        </div>


        <!-- Estado de los contenedores -->
        <h2 class="mt-5">Estado de los Contenedores</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
               <?php
                  foreach($_SESSION['arrayBasuras'] as $basuras){
                     echo '
                        <tr>
                           <td>'.$basuras["name"].'</td>
                           <td>'.$basuras["amount"].' / 7</td>
                        </tr>
                     ';
                  }
               ?>
               
            </tbody>
        </table>
    </div>


    <?php include 'components/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
