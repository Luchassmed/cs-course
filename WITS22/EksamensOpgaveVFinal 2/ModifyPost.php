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

    <title>Oplæg</title>

  </head>
  <body>
    <!--Her henter vi navbar fra navBar.php-->
    <?php include 'navBar.php'; ?>

<?php
    require_once "/home/mir/lib/db.php";

    $postID = $_POST['pid']; /* Variabel som henter værdien "pid" via POST*/
    $title = $_POST['title']; /* Variabel som henter værdien "title" via POST*/
    $content = $_POST['content']; /* Variabel som henter værdien "content" via POST*/

?>


<div class="blog-container">
  <h3>Her kan du redigere dit post:</h3>
<form action="Processer/ModifyPostProces.php" method="POST">
  <div class="form-group">
  <label for="Titel" class="form-label"><strong>Titel:</strong></label>
  <input class="form-control" aria-label="Titel for indlæg" placeholder="Skriv titel" name="titleEdit" value="<?php echo $title;?>">
  </div>
  <div class="form-group">
  <label for="Titel" class="form-label"><strong>Content:</strong></label>
  <textarea class="form-control" aria-label="Content for indlæg" placeholder="Skriv indhold" name="contentEdit"><?php echo $content;?></textarea>
  <input type="hidden" name="pid" value="<?php echo $postID;?>">
</div>
<div class="col-12 mt-1">
    <button class="btn btn-primary" type="submit">Rediger post</button>
  </div>
  </form>

  </div>

    <!-- Bootstrap Javascript og Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>
