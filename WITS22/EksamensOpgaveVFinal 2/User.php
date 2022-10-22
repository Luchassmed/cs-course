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

    <title>Homepage</title>

  </head>
  <body class = "background">
    <!--Her henter vi navbar fra navBar.php-->
    <?php include 'navBar.php' ?>

    <?php
      require_once "/home/mir/lib/db.php";


      if (empty($_GET ["uid"])) { /* Hvis der ikke bliver valgt en bruger, sendes der intet UID. Så skal den vise alle brugere i databasen*/
        ?>
        <h1>Alle oprettet brugere på databasen</h1>

        <?php
        $uids = get_uids();
        foreach($uids as $uid){ #Foreach loop
        $user = get_user($uid);
          ?>
          <div class="blog-container">
            <a href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/User.php?uid=<?php echo $uid; ?>"> <?php echo $uid; ?> </a>
          </div>
          <?php }
    } else if (!empty($_GET ["uid"])) { /*Hvis der klikkes på et brugernavn, så sendes UID som GET parametre og denne else if-sætning eksekveres*/
        $userID = $_GET ["uid"];
        $getUser = get_user($userID);
        $fName = $getUser['firstname'];
        $lName = $getUser['lastname'];
        $userPids = get_pids_by_uid($userID);
        /*Ovenstående i else if-sætning, henter den valgte bruges brugernavn, for- og efternavn og indlæg som bruger har skrevet */
      ?>

    <div class="blog-container">
      <h3><?php echo $userID;?></h3>
      <p><strong>Fornavn: </strong> <?php echo $fName;?> <br>
          <strong>Efternavn: </strong> <?php echo $lName;?> <br>
          <strong>Bruger siden: </strong> <?php echo $getUser['date'];?>
          <?php if (sizeof($userPids) == 0){ /* Hvis bruger ikke har nogle indlæg, så skriv dette*/?>
            <h5><?php echo $userID;?> har ikke skrevet et post endnu</h5>
      </p>
    </div>
  <?php } else { /*Hvis bruger har skrevet indlæg, skriv dette */?>
                <h5>Oplæg skrevet af <?php echo $userID;?></h5>
                  <?php

            foreach ($userPids as $pids){ /*For-each løkke som løber array over brugers indlæg igennem*/
              $thePost = get_post($pids);
              $postTitle = $thePost['title']; ?>

              <div class="blog-container">
              <a href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/BlogPosts.php?pid=<?php echo $pids;?>"><?php echo $postTitle; /*Viser link til brugers indlæg*/?></a>
              </div>

    <?php } } } ?>

    <!-- Bootstrap Javascript og Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>




  </body>
</html>
