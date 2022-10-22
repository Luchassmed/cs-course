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
    <?php include 'navBar.php' ?>

<?php
require_once "/home/mir/lib/db.php";

$allPosts = get_pids(); // Laver varibale for Databasen der indeholder et array med posts
$post = get_post($_GET['pid']); // Henter nummer 2 post i arrayet - kalder variablen 'post'
$postID = $post['pid']; // Henter ID for indlæg og overføre dem til variable fot postID
$title = $post ['title']; // Laver variable der skal hente titlen for indlægget
$indhold = $post ['content']; // Laver variable der skal hente indholdet for indlægget

$author = $post ['uid']; // Laver variable der skal hente brugerens id for indlægget (fra users)
$uName = get_user($author); // Laver variable som henter forfatter ID fra ovenstående variabel
$sName = $uName['firstname']; // Laver variable der henter forfatter ID's fornavn
$lName = $uName['lastname'];
?>

<div class="blog-container"> <!-- CSS -->


<h6><?php echo '<a href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/User.php?uid=', $author,'">',$author, '</a>'; ?> - <?php echo $post['date']; ?></h6>
<p>
<?php if($_SESSION['user'] == $author){?>

  <form action="ModifyPost.php" method="POST">
    <input type="hidden" name="pid" value="<?php echo $postID;?>">
    <input type="hidden" name="title" value="<?php echo $title;?>">
    <input type="hidden" name="content" value="<?php echo $indhold;?>">
    <input class="btn btn-primary" type="submit" value="Redigér post" name="modifyPid">  <!-- Bootstrap !-->
  </form>

<?php } ?>
</p>
<h3><?php echo $title; ?></h3>
<p> <?php echo $indhold; ?></p>


<?php
$getImgPid = get_iids_by_pid($postID); /*Henter et array af alle billedeID og
returnere dem til getImgPid. Benytter ID fra postID. */

foreach ($getImgPid as $i) { // For hvert element i arrayet af billedeID
$getImg = get_image($i); // Hent billede af hvert element i getImgPid
$getImgIID = $getImg['iid'];
$getImgPath = $getImg['path']; // Hent billedets URL af hvert element i getImgPid
?><div class="postimg"><?php
echo '<img src="'.$getImgPath.'" width="100">'; // Printer listen af getImgPid's URL's
?></div><?php
?>
<?php if (isset($_SESSION['user']) && $_SESSION['user'] == $author){ ?>



  <div class="btn-group dropend mt-1 mb-1">
    <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="5,10">
      Slet billede
    </button>
    <form class="dropdown-menu p-4" action='Processer/Delete.php' method="post">

    <div class="mb-3">
      <label for="confirmDeletion" class="form-label"><strong>Bekræft valg</strong></label>
      <button type="submit" id="confirmDeletion" class="btn btn-danger">Ja</button>
      <a class="btn btn-primary" id="confirmDeletion" href="#" role="button">Nej</a>
      <input type ='hidden' name ='imgID' value ="<?php echo $getImgIID;?>">
      <input type="hidden" name="imgPID" value="<?php echo $postID;?>">
      <input type="hidden" name="deleteImg" value="deleteImg">
    </div>
  </form>
  </div>

<?php
  }
}
if (isset($_SESSION['user']) && $_SESSION['user'] == $author){
  ?>

<form action='Processer/Add.php' method="post" enctype="multipart/form-data">
  <div class="mt-5"> <!--- Bruger margin-top 5, som er den højeste værdi --->
    <label for="formFile" class="form-label"><strong>Upload et billede</strong></label>
    <input class="form-control" type="file" id="formFile" name='picture' required>
  </div>
  <div class="mt-1">
    <button type="submit" class="btn btn-primary" name ='submit'>Upload</button>
    <input type="hidden" name="pid" value="<?php echo $postID;?>">
    <input type="hidden" name="img" value="img">
  </div>
  </form>


<?php } ?>

<br><br>
<h5>Kommentarfelt</h5>
<?php
$getCommentsPid = get_cids_by_pid($postID); // Samme teknik som med billeder.
foreach ($getCommentsPid as $i){
$getComments = get_comment($i);
$commentContent = $getComments['content'];
$authorComment = $getComments['uid'];
?>
  <h6><?php echo '<a href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/User.php?uid=', $authorComment,'">',$authorComment, '</a> - ', $getComments['date']; ?></h6>
  <p><?php echo $commentContent; ?>
<?php if($_SESSION['user'] == $authorComment || $_SESSION['user'] == $author){ ?>


  <div class="btn-group dropend mt-1 mb-1">
    <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="5,10">
      Slet kommentar
    </button>
    <form class="dropdown-menu p-4" action='Processer/Delete.php' method="post">

    <div class="mb-3">
      <label for="confirmDeletion" class="form-label"><strong>Bekræft valg</strong></label>
      <button type="submit" id="confirmDeletion" class="btn btn-danger">Ja</button>
      <a class="btn btn-primary" id="confirmDeletion" href="#" role="button">Nej</a>
      <input type ='hidden' name ='cid' value ="<?php echo $getComments['cid'];?>">
      <input type="hidden" name="pid" value="<?php echo $postID;?>">
      <input type="hidden" name="deleteComment" value="deleteComment">
    </div>
  </form>
  </div>

<?php
  }
}
?>

<?php if (isset($_SESSION['user'])){?>

  <form action="Processer/Add.php" method="POST">
    <form class="needs-validation">
    <div class="col-md-12">
      <label for="validationDefault02" class="form-label"><strong>Skriv en kommentar...:</strong></label>
      <textarea class="form-control" aria-label="Content for indlæg" placeholder="Skriv indhold" name="content" value=""required></textarea>
      <input type="hidden" name="pid" value="<?php echo $postID;?>">
      <input type="hidden" name="comment" value="comment">
    </div>
    <div class="col-12 mt-1">
      <button class="btn btn-primary" type="submit">Kommenter</button>
    </div>
  </form>


<?php } else {?>

<h6>Du skal være logget ind for at skrive en kommentar</h6>

<?php } ?>

</div>

    <!-- Bootstrap Javascript og Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>
