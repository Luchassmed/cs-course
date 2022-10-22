<?php
  session_start(); /*Starter en PHP session*/
  require_once "/home/mir/lib/db.php";
  $deleteImg = $_POST['deleteImg'];
  $checkDeleteImg = 'deleteImg';
  $deleteComment = $_POST['deleteComment'];
  $checkDeleteComment = 'deleteComment';

  if ($deleteImg == $checkDeleteImg) {
    $pageID = ($_POST['imgPID']); //hent pid fra billede som skal slettes
    $imgID = ($_POST['imgID']); // hent iid fra billede som skal slettes

    $deleteImage = delete_attachment($pageID, $imgID);

    header ('location: https://wits.ruc.dk/~jpn/EksamensOpgaveV1/BlogPosts.php?pid='.$pageID);
  }
  if ($deleteComment == $checkDeleteComment) {

      $pageID = ($_POST['pid']); //hent pid fra billede som skal slettes
      $cid = ($_POST['cid']); // hent iid fra billede som skal slettes
      $deleteComment = delete_comment($cid);

      header ('location: https://wits.ruc.dk/~jpn/EksamensOpgaveV1/BlogPosts.php?pid='.$pageID);


  }
 ?>
