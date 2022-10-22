<?php
session_start(); /*Starter en PHP session*/

if(empty($_SESSION['user'])){
  header('Location:Login.php');
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

    <title>UserPage</title>

  </head>
  <body>
    <!--Her henter vi navbar fra navBar.php-->
    <?php include 'navBar.php';
    require_once "/home/mir/lib/db.php";

      $uid = $_SESSION['user'];
      $profil = get_user($uid);
      $fName = $profil['firstname'];
      $lName = $profil['lastname'];
      $date = $profil['date'];
      $profilPosts = get_pids_by_uid($uid);

    ?>
    <h1> <?php echo $uid; ?></h1>

    <div class="blog-container">
    <p>
      <strong>Fornavn: </strong> <?php echo $fName;?> <br>
      <strong>Efternavn: </strong> <?php echo $lName;?> <br>
      <strong>Bruger siden: </strong> <?php echo $date; ?>
    </p>
  </div>

<?php if (sizeof($profilPosts) == 0){ ?>
    <h2>Du har endnu ikke skrevet et oplæg. Skriv dit første nedenfor!</h2>
    <div class="blog-container">
      <form action="Processer/Add.php" method="POST">
      <form class="row g-3">
        <div class="col-md-12">
          <label for="validationDefault01" class="form-label">Titel:</label>
          <input type ="text" class="form-control" aria-label="Titel for indlæg" placeholder="Skriv titel" name="title" value="" required>
        </div>
        <div class="col-md-12">
          <label for="validationDefault02" class="form-label">Indhold</label>
          <textarea class="form-control" aria-label="Content for indlæg" placeholder="Skriv indhold" name="content" value="" required></textarea>
          <input type="hidden" name="post" value="post">
        </div>

        <div class="col-12">
          <button class="btn btn-primary" type="submit">Opret!</button>
        </div>
      </form>
      </div>
<?php } else { ?>
  <h2>Skriv et nyt oplæg</h2>
  <div class="blog-container">
    <form action="Processer/Add.php" method="POST">
    <form class="row g-3">
      <div class="col-md-12">
        <label for="validationDefault01" class="form-label"><strong>Titel:</strong></label>
        <input type ="text" class="form-control" aria-label="Titel for indlæg" placeholder="Skriv titel" name="title" value="" required>
      </div>
      <div class="col-md-12">
        <label for="validationDefault02" class="form-label"><strong>Indhold:</strong></label>
        <textarea class="form-control" aria-label="Content for indlæg" placeholder="Skriv indhold" name="content" value="" required></textarea>
        <input type="hidden" name="post" value="post">
      </div>

      <div class="col-12 mt-1">
        <button class="btn btn-primary" type="submit">Opret!</button>
      </div>
    </form>
    </div>



    <h2>Dine oplæg</h2>
    <?php
      foreach ($profilPosts as $posts){
        $hentetPost = get_post($posts);
        ?>
        <div class="blog-container">
          <a href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/BlogPosts.php?pid=<?php echo $hentetPost['pid']; ?>"> <?php echo $hentetPost['title']; ?>
        </div>
      <?php } } ?>



  </body>
  </html>
