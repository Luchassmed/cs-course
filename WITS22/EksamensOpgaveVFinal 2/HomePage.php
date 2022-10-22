<?php
session_start(); /*Starter en PHP session*/
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS importeret fra vores eget CSS stylesheet -->
    <link rel="stylesheet" href="Styles/stylesmain.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Bootstrap Javascript og Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <title>Homepage</title>
  </head>
  <body class = "background"> <!--Sikrer at bootstrap ikke ødelægger vores eget stylesheet-->

    <!--Her henter vi navbar fra navBar.php-->
    <?php include 'navBar.php'; ?>

    <?php require_once '/home/mir/lib/db.php'; ?>

    <h1>Alle Blogposts</h1>

<?php
    $allPosts = get_pids(); /* Opretter variabel, som henter alle PIDS fra databasen*/
    include 'Processer/paginationHandler.php'; /* Henter paginationHandler.php, som bruges til at håndtere vores pagination bar*/

    foreach ($allPosts as $posts){ /* foreach løkke, som løber igennem arrayet af indlæg*/

      $hentetPost = get_post($posts); /* Variabel som gemmer et associativt array for hvert indlæg. Hertil gør vi brug af "get_post" funktionen */

      ?>

      <div class="blog-container"> <!-- Henter CSS style for hvert post, fra vores CSS klasse "blog-container"-->
          <h3> <a href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/BlogPosts.php?pid= <?php echo $hentetPost['pid']; ?>"> <?php echo $hentetPost['title']; ?></a>  </h3>
          <h4> Skrevet af: <a href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/User.php?uid= <?php echo $hentetPost['uid']; ?>"> <?php echo $hentetPost['uid']; ?></a>  </h4>
          <p> <?php echo $hentetPost['content']; ?> </p>
        </div>

    <?php } ?>

<?php  include 'Pagination.php'; /* Henter vores pagination bar, fra Pagination.php */?>


  </body>
</html>
