<?php
session_start(); /*Starter en PHP session*/

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

    <script language="javascript" type="text/javascript"> //Hentet fra: https://www.mediacollege.com/internet/javascript/form/remove-spaces.html
    function removeSpaces(string) {
     return string.split(' ').join('');
    }

    </script>




    <title>Opret Bruger</title>

  </head>
  <!-- Bootstrap Javascript og Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <body class="background">
    <!--Her henter vi navbar fra navBar.php-->
    <?php include 'navBar.php';
    require_once "/home/mir/lib/db.php";?>

    <?php


      add_user($_POST['uid'], $_POST['firstname'], $_POST['lastname'], $_POST['password']); /* Her bruger vi "add_user" funktion, samt henter de nødvendige informationer til oprettelse af bruger via POST */
      $_SESSION['user'] = $_POST['uid'];
      if (!empty($_SESSION['user'])) {
    header('Location: https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php');
    }
    ?>

<div class="blog-container">

    <form action="SignUp.php" method="POST" class="was-validated">
        <form class="row g-3 needs-validation" novalidate>
      <div class="col-md-12">
        <label for="firstName" class="form-label">Fornavn</label>
        <input type="text" class="form-control" id="firstName" name="firstname" value=""required pattern="\S+.*" required>
        <div class="valid-feedback">Det ser godt ud</div>
          <div class="invalid-feedback">Du skal skrive dit korrekte fornavn</div>
      </div>
      <div class="col-md-12">
        <label for="lastName" class="form-label">Efternavn</label>
        <input type="text" class="form-control" id="lastName" name ="lastname" value="" required pattern="\S+.*" required>
        <div class="valid-feedback">Skide godt</div>
          <div class="invalid-feedback">Du skal skrive dit korrekte efternavn</div>
      </div>
      <div class="col-md-12">
        <label for="validationCustomUsername" class="form-label">Brugernavn</label>
        <div class="input-group has-validation">
          <span class="input-group-text" id="inputGroupPrepend">@</span>
          <input type="text" class="form-control" id="validationCustomUsername" name ="uid" onblur="this.value=removeSpaces(this.value);" aria-describedby="inputGroupPrepend" required pattern="\S+.*" required>
          <div class="valid-feedback">Sejt brugernavn ;)</div>
          <div class="invalid-feedback">Hov hov, du skal skrive et gyldigt brugernavn!</div>
        </div>
      </div>
      <div class="col-md-12">
        <label for="validationCustomPassword" class="form-label">Adgangskode</label>
        <div class="input-group has-validation">
          <span class="input-group-text" id="inputGroupPrepend">#</span>
          <input type="password" class="form-control" id="validationCustomPassword" name ="password" value="" aria-describedby="inputGroupPrepend" required pattern="\S+.*" required> <!--- https://www.freecodecamp.org/news/how-to-check-if-an-input-is-empty-with-css-1a83715f9f3e/ --->
          <div class="valid-feedback">Nu kan du ikke hackes</div>
          <div class="invalid-feedback">Den går ikke, du skal have en skudsikker kode!</div>
        </div>
      </div>

      <div class="col-12">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
          <label class="form-check-label" for="invalidCheck">
            <a href="https://www.youtube.com/watch?v=BBJa32lCaaY"target="_blank">Klik på linket for at læse vores regelsæt</a>
          </label>
          <div class="invalid-feedback">
            Kryds boksen af, når du har læst
          </div>
        </div>
      </div>
      <div class="col-12">
        <button class="btn btn-primary" type="submit">Opret bruger</button>
      </div>
    </form>
</div>




    <!-- Bootstrap Javascript og Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>




  </body>
</html>
