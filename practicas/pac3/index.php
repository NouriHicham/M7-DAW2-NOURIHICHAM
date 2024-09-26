<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.72.0">
  <title>Pràctica 3a : Un àlbum dels teus ídols</title>

  <link rel="canonical" href="https://v5.getbootstrap.com/docs/5.0/examples/album/">



  <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


</head>

<body>

  <header>
    <div class="collapse bg-dark" id="navbarHeader">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-md-7 py-4">
            <h4 class="text-white">About</h4>
            <p class="text-muted">Add some information about the album below, the author, or any other background
              context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off
              to some social networking sites or contact information.</p>
          </div>
          <div class="col-sm-4 offset-md-1 py-4">
            <h4 class="text-white">Contact</h4>
            <ul class="list-unstyled">
              <li><a href="#" class="text-white">Follow on Twitter</a></li>
              <li><a href="#" class="text-white">Like on Facebook</a></li>
              <li><a href="#" class="text-white">Email me</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
      <div class="container">
        <a href="#" class="navbar-brand d-flex align-items-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="mr-2"
            viewBox="0 0 24 24">
            <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z" />
            <circle cx="12" cy="13" r="4" /></svg>
          <strong>Album</strong>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader"
          aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </div>
  </header>

  <main>

    

    <div class="album py-5 bg-light">
      <div class="container">
        

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php
                $infoCartes = [
                    ["image" => "images/1.jpg", "nom" => "Juan Perez", "descripcio" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, voluptas consequatur dolor autem voluptate a numquam commodi rerum, deserunt tenetur quibusdam reiciendis dicta. Amet omnis magni ut quidem architecto vel"],
                    ["image" => "images/2.jpg", "nom" => "Mister Potato", "descripcio" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, voluptas consequatur dolor autem voluptate a numquam commodi rerum, deserunt tenetur quibusdam reiciendis dicta. Amet omnis magni ut quidem architecto vel"],
                    ["image" => "images/3.jpg", "nom" => "Jose Emilio", "descripcio" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, voluptas consequatur dolor autem voluptate a numquam commodi rerum, deserunt tenetur quibusdam reiciendis dicta. Amet omnis magni ut quidem architecto vel"],
                    ["image" => "images/4.jpg", "nom" => "Tristena Dominguez", "descripcio" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, voluptas consequatur dolor autem voluptate a numquam commodi rerum, deserunt tenetur quibusdam reiciendis dicta. Amet omnis magni ut quidem architecto vel"],
                    ["image" => "images/5.jpg", "nom" => "Pablo Emilio", "descripcio" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, voluptas consequatur dolor autem voluptate a numquam commodi rerum, deserunt tenetur quibusdam reiciendis dicta. Amet omnis magni ut quidem architecto vel"],
                    ["image" => "images/6.jpg", "nom" => "Sir Gonzalez", "descripcio" => " Un gatiño sit amet consectetur adipisicing elit. Expedita, voluptas consequatur dolor autem voluptate a numquam commodi rerum, deserunt tenetur quibusdam reiciendis dicta. Amet omnis magni ut quidem architecto vel"],
                    ["image" => "images/7.jpg", "nom" => "Big Mom", "descripcio" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, voluptas consequatur dolor autem voluptate a numquam commodi rerum, deserunt tenetur quibusdam reiciendis dicta. Amet omnis magni ut quidem architecto vel"],
                    ["image" => "images/8.jpg", "nom" => "Pablisimo III", "descripcio" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, voluptas consequatur dolor autem voluptate a numquam commodi rerum, deserunt tenetur quibusdam reiciendis dicta. Amet omnis magni ut quidem architecto vel"],
                    ["image" => "images/9.jpg", "nom" => "The GOAT", "descripcio" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, voluptas consequatur dolor autem voluptate a numquam commodi rerum, deserunt tenetur quibusdam reiciendis dicta. Amet omnis magni ut quidem architecto vel"],

                ];

                foreach($infoCartes as $carta){
                    echo '<div class="col">
                            <div class="card shadow-sm">

                            <img src="'.$carta["image"].'" class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg">
                            <div class="card-body">
                                <h3>'.$carta["nom"].'</h3>
                                <p class="card-text">'.$carta["descripcio"].'</p>
                                <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                </div>
                                <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                            </div>
                        </div>';
                }
            ?>
          
        </div>
      </div>
    </div>

  </main>

  <footer class="text-muted py-5">
    <div class="container">
      <p class="float-right mb-1">
        <a href="#">Back to top</a>
      </p>
      <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
      <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a
          href="/docs/5.0/getting-started/introduction/">getting started guide</a>.</p>
    </div>
  </footer>

</body>

</html>