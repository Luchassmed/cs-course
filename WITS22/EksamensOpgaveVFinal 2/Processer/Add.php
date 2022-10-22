<?php
  session_start(); /*Starter en PHP session*/
  require_once "/home/mir/lib/db.php";

  $formPost = $_POST['post'];
  $checkPost = 'post';
  $formComment = $_POST['comment'];
  $checkComment = 'comment';
  $formImg = $_POST['img'];
  $checkImg = 'img';

  if($formPost == $checkPost){

  $username = ($_SESSION['user']);
  $title = ($_POST['title']);
  $content = ($_POST['content']);
  $addPost = add_post($username, $title, $content);

  header ('location: https://wits.ruc.dk/~jpn/EksamensOpgaveV1/BlogPosts.php?pid='.$addPost);
}

if ($formComment == $checkComment) {
  $username = ($_SESSION['user']);
  $pageID = ($_POST['pid']);
  $content = ($_POST['content']);
  $addComment = add_comment($username, $pageID, $content);

  header ('location: https://wits.ruc.dk/~jpn/EksamensOpgaveV1/BlogPosts.php?pid='.$pageID);
}

if ($formImg == $checkImg) {
  $temp = $_FILES['picture']['tmp_name'];
  $mimeType = $_FILES['picture']['type'];
  $pageID = ($_POST['pid']);

  if ($mimeType == 'image/png'){
    $type = '.png';
  } elseif($mimeType =='image/jpg') {
    $type = '.jpg';
  } elseif($mimeType == 'image/jpeg'){
    $type = '.jpeg';
  }

  $billede = add_image($temp, $type);
  $getBillede = get_image($billede);
  $getBilledeIid = $getBillede['iid'];

  $addImage = add_attachment($pageID, $getBilledeIid);

  echo $addImage;

  header ('location: https://wits.ruc.dk/~jpn/EksamensOpgaveV1/BlogPosts.php?pid='.$pageID);

}
?>
