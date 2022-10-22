<?php
  session_start(); /*Starter en PHP session*/
  require_once "/home/mir/lib/db.php";

  $username = ($_SESSION['user']);
  $title = ($_POST['titleEdit']);
  $content = ($_POST['contentEdit']);
  $modifyPost = modify_post($_POST['pid'], $title, $content);

  header ('location: https://wits.ruc.dk/~jpn/EksamensOpgaveV1/BlogPosts.php?pid='.$_POST['pid']);

?>
