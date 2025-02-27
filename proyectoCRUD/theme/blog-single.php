<?php
include_once 'config.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $noticia = $mysqli->query("SELECT * FROM NEWS WHERE id= $id;")->fetch_all(MYSQLI_ASSOC);
  $comments = $mysqli->query("SELECT c1.id, c1.new_id, c1.comment_id, c1.description, c1.date, c2.id AS reply_id, c2.description AS reply_text, c2.date AS reply_date FROM COMMENTS c1
        LEFT JOIN COMMENTS c2 ON c1.id = c2.comment_id
        WHERE c1.new_id = $id
        ORDER BY c1.date ASC, c2.date ASC;")->fetch_all(MYSQLI_ASSOC);
} else {
  header("Location: blog.php");
  exit;
}

echo '<pre>';
print_r($comments);
echo '</pre>';

?>

<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>Agen | Bootstrap Agency Template</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- ** Plugins Needed for the Project ** -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <!-- slick slider -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <!-- themefy-icon -->
  <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
  <!-- venobox css -->
  <link rel="stylesheet" href="plugins/venobox/venobox.css">
  <!-- card slider -->
  <link rel="stylesheet" href="plugins/card-slider/css/style.css">

  <!-- Main Stylesheet -->
  <link href="css/style.css" rel="stylesheet">

  <!--Favicon-->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">

</head>

<body>


  <header class="navigation fixed-top">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="Egen"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
        aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse text-center" id="navigation">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="services.php">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="blog.php">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="portfolio.php">Portfolio</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="team.php">Team</a>
              <a class="dropdown-item" href="team-single.php">Team Details</a>
              <a class="dropdown-item" href="career.php">Career</a>
              <a class="dropdown-item" href="career-single.php">Career Details</a>
              <a class="dropdown-item" href="blog-single.php">Blog Details</a>

              <a class="dropdown-item" href="faqs.php">FAQ's</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- page-title -->
  <section class="page-title bg-cover" data-background="images/backgrounds/page-title.jpg">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <h1 class="display-1 text-white font-weight-bold font-primary"><?= $noticia[0]['title'] ?></h1>
        </div>
      </div>
    </div>
  </section>
  <!-- /page-title -->

  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <h3 class="font-tertiary mb-5"></h3>
          <img src="images/blog/<?= $noticia[0]['thumbnail'] ?>" alt="post-thumb" class="img-fluid w-100 mb-3">
          <p class="float-left mr-4">Post by Themefisher</p>
          <p>May 26, 2017</p>
          <div class="content">
            <h5><?= $noticia[0]['subtitle'] ?></h5>
            <p><?= $noticia[0]['description'] ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <div class="p-5 mb-4">
            <?php
            
            $comentariosPrincipales = array_filter($comments, function ($comment) {
              return is_null($comment['reply_id']);
            });

            foreach ($comentariosPrincipales as $comment) {
              if (is_null($comment['comment_id'])) {
                echo ' 
                    <div class="media border-bottom py-4">
                      <img src="images/user-1.jpg" class="img-fluid align-self-start mr-3" alt="">
                      <div class="media-body">
                        <h5 class="mb-0 text-secondary">Carole Marvin.</h5>
                        <span class="mr-3">' . $comment['date'] . '</span>
                        <a href="#" class="btn btn-transparent py-1 px-2 "><i class="ti-share-alt"></i> Reply</a>
                        <p>' . $comment['description'] . '</p>';
                foreach ($comment as $respuesta) {
                  if ($respuesta['comment_id'] == $comment['id']) {
                    echo '
                        <div class="media my-5">
                          <img src="images/user-2.jpg" class="img-fluid align-self-start mr-3" alt="">
                          <div class="media-body">
                            <h5 class="mb-0 text-secondary">Jaquan Rolfson.</h5>
                            <span class="mr-3">' . $respuesta['date'] . '</span>
                            <a href="#" class="btn btn-transparent py-1 px-2 "><i class="ti-share-alt"></i> Reply</a>
                            <p>' . $respuesta['description'] . '</p>
                          </div>
                        </div>
                    ';
                  }
                }
                echo '</div></div>';
              }
            }
            ?>

            
          <h4 class="mt-3 mb-3 pb-3 text-secondary">Leave a Comment</h4>
          <form action="#" class="row">
            <div class="col-12">
              <textarea name="comment" id="comment" placeholder="Message" class="form-control mb-4 border"></textarea>
            </div>
            <div class="col-md-5">
              <input type="text" name="name" id="name" class="form-control mb-4 mb-lg-0 border" placeholder="Name">
            </div>
            <div class="col-md-5">
              <input type="email" name="Email" id="Email" class="form-control mb-4 mb-lg-0 border" placeholder="Email">
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-secondary rounded-0">Send</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- blog -->
  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 mx-auto text-center">
          <h2>Latest News</h2>
          <div class="section-border"></div>
        </div>
      </div>
      <div class="row">

        <?php
        $ultimasNoticias = $mysqli->query("SELECT * FROM NEWS ORDER BY new_date DESC LIMIT 3;")->fetch_all(MYSQLI_ASSOC);

        foreach ($ultimasNoticias as $noticia) {
          echo '
              <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                <article class="card">
                  <img src="images/blog/' . $noticia['thumbnail'] . '" alt="post-thumb" class="card-img-top mb-2">
                  <div class="card-body p-0">
                    <time>' . $noticia['new_date'] . '</time>
                    <a href="blog-single" class="h4 card-title d-block my-3 text-dark hover-text-underline">' . $noticia['title'] . '</a>
                    <a href="blog-single.php?id=' . $noticia['id'] . '" class="btn btn-transparent">Read more</a>
                  </div>
                </article>
              </div>
            ';
        }
        ?>
      </div>
    </div>
  </section>
  <!-- /blog -->

  <!-- footer -->
  <footer class="bg-secondary position-relative">
    <img src="images/backgrounds/map.png" class="img-fluid overlay-image" alt="">
    <div class="section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-3 col-6">
            <h4 class="text-white mb-5">About</h4>
            <ul class="list-unstyled">
              <li><a href="#" class="text-light d-block mb-3">Service</a></li>
              <li><a href="#" class="text-light d-block mb-3">Conatact</a></li>
              <li><a href="#" class="text-light d-block mb-3">About us</a></li>
              <li><a href="#" class="text-light d-block mb-3">Blog</a></li>
              <li><a href="#" class="text-light d-block mb-3">Support</a></li>
            </ul>
          </div>
          <div class="col-md-3 col-6">
            <h4 class="text-white mb-5">Company</h4>
            <ul class="list-unstyled">
              <li><a href="#" class="text-light d-block mb-3">Service</a></li>
              <li><a href="#" class="text-light d-block mb-3">Conatact</a></li>
              <li><a href="#" class="text-light d-block mb-3">About us</a></li>
              <li><a href="#" class="text-light d-block mb-3">Blog</a></li>
              <li><a href="#" class="text-light d-block mb-3">Support</a></li>
            </ul>
          </div>
          <div class="col-md-6">
            <div class="bg-white p-4">
              <h3>Contact us</h3>
              <form action="#">
                <input type="text" id="name" name="name" class="form-control mb-4 px-0" placeholder="Full name">
                <input type="text" id="name" name="name" class="form-control mb-4 px-0" placeholder="Email address">
                <textarea name="message" id="message" class="form-control mb-4 px-0" placeholder="Message"></textarea>
                <button class="btn btn-primary" type="submit">Send</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="pb-4">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 text-center text-md-left">
            <p class="text-light mb-0">Copyright &copy; 2019 a theme by <a class="text-gradient-primary" href="https://themefisher.com">themefisher.com</a>
            </p>
          </div>
          <div class="col-md-6">
            <ul class="list-inline text-md-right text-center">
              <li class="list-inline-item"><a class="d-block p-3 text-white" href="#"><i class="ti-facebook"></i></a></li>
              <li class="list-inline-item"><a class="d-block p-3 text-white" href="#"><i class="ti-twitter-alt"></i></a></li>
              <li class="list-inline-item"><a class="d-block p-3 text-white" href="#"><i class="ti-instagram"></i></a></li>
              <li class="list-inline-item"><a class="d-block p-3 text-white" href="#"><i class="ti-github"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- /footer -->

  <!-- jQuery -->
  <script src="plugins/jQuery/jquery.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="plugins/bootstrap/bootstrap.min.js"></script>
  <!-- slick slider -->
  <script src="plugins/slick/slick.min.js"></script>
  <!-- venobox -->
  <script src="plugins/venobox/venobox.min.js"></script>
  <!-- shuffle -->
  <script src="plugins/shuffle/shuffle.min.js"></script>
  <!-- apear js -->
  <script src="plugins/counto/apear.js"></script>
  <!-- counter -->
  <script src="plugins/counto/counTo.js"></script>
  <!-- card slider -->
  <script src="plugins/card-slider/js/card-slider-min.js"></script>
  <!-- google map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
  <script src="plugins/google-map/gmap.js"></script>

  <!-- Main Script -->
  <script src="js/script.js"></script>

</body>

</html>