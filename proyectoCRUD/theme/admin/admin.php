<?php
   session_start();
   require_once '../config.php';

   
   if(!isset($_SESSION['id']) || $_SESSION['role']!= 'admin'){
      header('Location: index.php');
      exit;
   }

?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Panel de administrador</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
   <div class="container-fluid">
      <div class="row flex-nowrap">
         <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
               <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                  <a href="#" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                     <span class="fs-5 d-none d-sm-inline mt-3">Panel de administrador</span>
                  </a>
                  <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                     <li class="nav-item">
                           <a href="../index.php" class="nav-link align-middle px-0"><span class="ms-1 d-none d-sm-inline">🏠 Home</span></a>
                     </li>
                     <li>
                           <a href="./projects/project.php" class="nav-link px-0 align-middle"><span class="ms-1 d-none d-sm-inline">Proyectos</span></a>
                     </li>
                     <li>
                           <a href="./testimonials/testimonials.php" class="nav-link px-0 align-middle"><span class="ms-1 d-none d-sm-inline">Testimonios</span></a>
                     </li>
                     <li>
                           <a href="./news/news.php" class="nav-link px-0 align-middle"><span class="ms-1 d-none d-sm-inline">Noticias</span></a>
                     </li>
                     <li>
                           <a href="./users/user.php" class="nav-link px-0 align-middle"><span class="ms-1 d-none d-sm-inline">Usuarios</span></a>
                     </li>
                  </ul>
                  <hr>
                  <div class="dropdown pb-4">
                     <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                           <img src="<?php echo $_SESSION['avatar'] ?>" alt="hugenerd" width="30" height="30" class="rounded-circle">
                           <span class="d-none d-sm-inline mx-1"><?php echo $_SESSION['username'] ?></span>
                     </a>
                     <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                           <li><a class="dropdown-item" href="../perfil.php">Perfil</a></li>
                           <li>
                              <hr class="dropdown-divider">
                           </li>
                           <li><a class="dropdown-item" href="../logout.php">Cerrar sesion</a></li>
                     </ul>
                  </div>
               </div>
         </div>
         <div class="col py-3">

            <h2 class="mx-4">Últimos usuarios registrados</h2>
            <table class="table mx-4">
               <thead>
               <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Apellido</th>
                  <th scope="col">Correo Electrónico</th>
                  <th scope="col">Edad</th>
                  <th scope="col">Trabajo</th>
                  <th scope="col">Rol</th>
               </tr>
               </thead>
               <tbody>
               <?php
                  $users = $mysqli->query("SELECT * FROM USERS order by id desc LIMIT 3")->fetch_all(MYSQLI_ASSOC);
                  foreach($users as $user){
                     echo '<tr style="line-height: 16px;">';
                     echo "<td scope='row'>".$user['id']."</td>";
                     echo "<td>".$user['name']."</td>";
                     echo "<td>".$user['surname']."</td>";
                     echo "<td>".$user['email']."</td>";
                     echo "<td>".$user['age']."</td>";
                     echo "<td>".$user['job']."</td>";
                     echo "<td>".$user['role']."</td>";
                     echo "</tr>";
                  }
               ?>
               </tbody>
            </table>

            <h2 class="mx-4 mt-5">Últimos testimonios</h2>
            <table class="table mx-4">
               <tr >
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Descripción</th>
                  <th>Foto</th>
                  <th>Puntuación</th>
               </tr>

               <?php
                  $testimonials = $mysqli->query("SELECT * FROM TESTIMONIALS order by id desc LIMIT 5")->fetch_all(MYSQLI_ASSOC);
                  foreach($testimonials as $testimonial){
                     echo '<tr style="line-height: 16px;">';
                     echo "<td>".$testimonial['id']."</td>";
                     echo "<td>".$testimonial['name']."</td>";
                     echo "<td>".$testimonial['surname']."</td>";
                     echo "<td>".substr($testimonial['description'],0,30)." ...</td>";
                     echo "<td><img src='uploads/testimonials/".$testimonial['photo']."' alt='Foto testimonio".$testimonial['id']."'></td>";
                     echo "<td>";
                     for($i=1; $i<=$testimonial['rating']; $i++){
                        echo '<span>⭐</span>';
                     }
                  }
               ?>
            </table>

            <h2 class="mx-4 mt-5">Últimas noticias añadidas</h2>
            <table class="table mx-4">
               <tr >
                  <th>ID</th>
                  <th>Fecha</th>
                  <th>Titulo</th>
                  <th>Subtitulo</th>
                  <th>Contenido</th>
                  <th>Foto</th>
               </tr>

               <?php
                  $news = $mysqli->query("SELECT * FROM NEWS order by id desc LIMIT 5")->fetch_all(MYSQLI_ASSOC);
                  foreach($news as $new){
                     echo '<tr style="line-height: 16px;">';
                     echo "<td>".$new['id']."</td>";
                     echo "<td>".$new['new_date']."</td>";
                     echo "<td>".$new['title']."</td>";
                     echo "<td>".$new['subtitle']."</td>";
                     echo "<td>".$new['description']."</td>";
                     echo "<td><img src='uploads/testimonials/".$new['thumbnail']."' alt='Foto testimonio".$new['id']."'></td>";
                     echo "</tr>";
                  }
               ?>
            </table>

            <div class="col-12 mt-5">
               <h2 class="mx-4">Últimos proyectos añadidos</h2>
               <div class="row row-cols-1 row-cols-md-3 g-4">
                  <?php
                     $projects = $mysqli->query("SELECT * FROM PROJECTS order by id desc LIMIT 6")->fetch_all(MYSQLI_ASSOC);

                     foreach($projects as $project){
                        echo '<div class="col">';
                        echo '<div class="card shadow-sm">';
                        echo '<img src="uploads/projects/'.$project['thumbnail'].'" class="card-img-top" alt="Thumbnail '.$project['title'].'">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">'.$project['title'].'</h5>';
                        echo '<p class="card-text">'.$project['description'].'</p>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                     }
                  ?>
               </div>
            </div>

            
            </div>
         </div>
   </div>   


   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>