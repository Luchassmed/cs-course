<?php
session_start(); /*Starter en PHP session*/ //skal vi bruge denne her?

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>


    <title></title>
  </head>
  <body>

  </body>
</html>

<!-- Nedenstående forhindrer adgang direkte til URL -->
<?php
if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
die ("<h2>Access Denied!</h2> This file is protected and not available to public.");
}
?>
<!-- Ovenstående er fra: https://hidayatabisena.medium.com/how-to-prevent-direct-url-access-to-php-form-files-e5e983bc3cb1 -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link active" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php">Hjem</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/User.php">Brugere</a>
        </li>
        <?php
        if(!empty($_SESSION['user'])){
          $_SESSION["userSession"] = rand();
         ?>
          <li class="nav-item">
            <a class="nav-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/LogOut.php?loggedOut=<?php echo $_SESSION["userSession"]?>">Log ud</a>
          </li>
          <?php
      } else { ?>
        <li class="nav-item">
          <a class="nav-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/Login.php">Login</a>
        </li>
      <?php }

      if(!empty($_SESSION['user'])){
      ?>
      <li class="nav-item">
        <a class="nav-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/UserPage.php">Egen Profil</a>
      </li>
    <?php
  } else { ?>
        <li class="nav-item">
          <a class="nav-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/SignUp.php">Opret Bruger</a>
        </li>
      <?php } ?>
      </ul>
    </div>
  </div>
</nav>
