<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    session_start(); /*Starter en PHP session*/
    $getRandomNumber = $_GET['loggedOut']; /* Variabel som via GET henter værdien "loggedOut".  */
    function userLoggedOut() { /* Når funktionen bliver kaldt, fjernes sessionerne "user" og "userSession", samt brugeren sendes til forsiden*/
    unset($_SESSION['user']);
    unset($_SESSION['userSession']);
    header ('location: https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php');
 }
if ($_GET['loggedOut'] == $_SESSION['userSession'] && !empty($_SESSION['user']) ){
   userLoggedOut(); /* Hvis parameteren "loggedOut" = sessionen "userSession", samt brugeren er logged ind, kør funktionen userLoggedOut()  */
 } else if ($_GET['loggedOut'] != $_SESSION['userSession'] || $_GET['loggedOut'] == NULL || empty($_SESSION['user'])) {
   unset($_SESSION['userSession']); /* Ellers fjernes session "userSession", samt brugeren sendes til forsiden*/
   header ('location: https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php');
 }
 /* Note til "$getRandomNumber":
    I navigationsbaren generes der et tilfældigt tal, som sendes via GET som en SESSION.
    Dette tilfældige tal skal stemme overens med session, for at der logges ud.
    Dermed mindskes chancen for, at brugeren ved en fejl får tilgået "LogOut.php"
  */
 ?>

  </body>
</html>
