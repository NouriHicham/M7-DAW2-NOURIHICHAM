<?php
session_start();

echo '
   <header class="container border">
      <div class="row">
         <div class="col" style="margin: auto;">'. $_SESSION['name'].' '. $_SESSION['ap1'].' '. $_SESSION['ap2'].'</div>
         <div class="col" style="margin: auto;">'. $_SESSION['dificultad'].'</div>
         <div class="col-2"><img src="'.$_SESSION['avatar'].'" alt="user" class="rounded-circle border" style="width: auto; height: 50px; "></div>
      </div>
   </header>
';

?>