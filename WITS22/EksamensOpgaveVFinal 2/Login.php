<?php
session_start(); /*Starter en PHP session*/

if(!empty($_SESSION['user'])){ /*Hvis session "user" IKKE er tom (altså brugeren er logget ind)*/
  header('Location:HomePage.php'); /*Send brugeren til startsiden*/
  exit;
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="Styles/stylesmain.css">


        <script language="javascript" type="text/javascript"> // Taget fra: https://www.mediacollege.com/internet/javascript/form/remove-spaces.html
        function removeSpaces(string) { //Funktionen bruges til at fjerne mellemrum. Vi bruger denne til udvalgte forms på vores blog
         return string.split(' ').join('');
        }

        </script>
    <title>Login</title>

  </head>
  <body>

    <!--Her henter vi navbar fra navBar.php-->
    <?php include 'navBar.php' ?>

<?php require_once "/home/mir/lib/db.php";


$userID = login($_POST['uid'], $_POST['password']); /* Boolean variabel, returnerer true hvis indtastet brugernavn + kode er korrekt */
                                                    /* Vi bruger POST til at hente "uid" og "password" fra loginform */
if ($userID) /* hvis brugernavn + kode er korrekt */
{
  header('Location:HomePage.php'); /* Send bruger til startsiden */
  $_SESSION['user'] = $_POST['uid']; /* Sætter PHP session til brugernavn */
}
else{ /* Ellers skrives der "forkert brugernavn og kode" */
  if (!empty($_POST['submitKnap'])){
  ?><div class="alert alert-danger" role="alert"> <!--Bootstrap som vi bruger til at vise advarsel om forkert login-->
  Forkert brugernavn eller password!
</div>
    <?php
}

}

?>

<div class="blog-container">
            <form action="Login.php" method="POST">
              <form class="row g-3"> <!--Bootstrap til layout af loginform -->
      <div class="col-md-12">
        <label for="validationDefaultUsername" class="form-label">Brugernavn</label>
        <div class="input-group">
          <span class="input-group-text" id="inputGroupPrepend">@</span>
          <input type="text" class="form-control" id="validationDefaultUsername" name="uid" value="" onblur="this.value=removeSpaces(this.value);" aria-describedby="inputGroupPrepend" required pattern="\S+.*" required>
        </div>
      </div>
      <div class="col-md-12">
        <label for="validationDefaultPassword" class="form-label">Adgangskode</label>
        <div class="input-group">
          <span class="input-group-text" id="inputGroupPrepend">#</span>
          <input type="password" class="form-control" id="validationDefaultPassword" name="password" value=""  aria-describedby="inputGroupPrepend" required pattern="\S+.*" required>
        </div>
      </div>
      <div class="col-12">
        <button class="btn btn-primary" type="submit" name="submitKnap">Login</button>
        <input type="hidden" name="submitKnap" value="Login">
      </div>
    </form>
</div>



<!-- Bootstrap Javascript og Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>
