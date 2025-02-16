<?php

if (isset($_GET['patrones'])) {
   switch ($_GET['patrones']) {
      case 'home':
         header('Location: index.php');
         break;
      case 'estructural':
         header('Location: estructural.php');
         break;
      case 'creacio':
         header('Location: creacion.php');
         break;
      case 'comportament':
         header('Location: comportament.php');
         break;
      default:
         header('Location: index.php');
         break;
   }
}

function navbar()
{
   return '
   <nav class="mb-3 mt-2">
      <section>
         <form action="" method="get">
            <input type="submit" value="home" name="patrones">
            <input type="submit" value="estructural" name="patrones">
            <input type="submit" value="creacio" name="patrones">
            <input type="submit" value="comportament" name="patrones">
         </form>
      </section>
   </nav>';
}
