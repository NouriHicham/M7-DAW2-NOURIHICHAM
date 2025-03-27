<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['name'])) {
  header("Location: login.php");
  exit;
}

$user_id = $_SESSION['id'];
$grupo = $mysqli->query("SELECT * FROM group_users where user_id = $user_id")->fetch_all(MYSQLI_ASSOC);
$grupo = intval($grupo[0]['group_id']);

$id = $_GET['id'];
$memoria = $mysqli->query("SELECT * FROM memories WHERE id = $id")->fetch_assoc();

if (isset($_POST['editar_recuerdo'])) {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $date = $_POST['date'];
  $image_url = $_POST['image_url'];

  $sql = "UPDATE memories SET title = '$title', description = '$description', date = '$date', image_url = '$image_url' WHERE id = $id";
  $result = $mysqli->query($sql);

  if ($result) {
    header("Location: index.php");
    exit;
  } else {
    echo "Error: " . $mysqli->error;
  }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Recuerdo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
  <!-- Header -->
  <!-- Include your header here -->

  <!-- Main Content -->
  <main class="container py-5">
    <h2 class="h4 mb-4 text-dark">Editar Recuerdo</h2>
    <form action="" method="POST">
      <div class="mb-3">
        <label for="title" class="form-label">Título</label>
        <input type="text" class="form-control" id="title" name="title" value="<?php echo $memoria['title']; ?>">
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Descripción</label>
        <textarea class="form-control" id="description" name="description" rows="3"><?php echo $memoria['description']; ?></textarea>
      </div>
      <div class="mb-3">
        <label for="date" class="form-label">Fecha</label>
        <input type="date" class="form-control" id="date" name="date" value="<?php echo $memoria['date']; ?>">
      </div>
      <div class="mb-3">
        <label for="image_url" class="form-label">URL de la Imagen</label>
        <input type="text" class="form-control" id="image_url" name="image_url" value="<?php echo $memoria['image_url']; ?>">
      </div>
      <button type="submit" class="btn btn-primary" name="editar_recuerdo">Actualizar</button>
    </form>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>