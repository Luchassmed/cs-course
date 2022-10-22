<?php
session_start(); /*Starter en PHP session*/ //skal vi bruge denne her?

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- Behøves der at være HTML her?-->
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title></title>
  </head>
  <body>

  </body>
</html>

<?php require_once '/home/mir/lib/db.php'; ?>

<?php
?>


<ul class="pagination justify-content-center">
<?php if ($currentPageNumber >= 2 || $currentPageNumber == NULL) {  ?>
<li class="page-item"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber-1?>">Previous</a></li>
<?php } else { ?>
<li class="page-item disabled"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber-1?>">Previous</a></li>
<?php  }

switch ($numberOfPages) {
case '1':
?> <li class="page-item active"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber?>"><?php echo $currentPageNumber; ?></a></li>

<?php
break;

case '2':
?> <li class="page-item"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber-1?>"><?php echo $currentPageNumber-1; ?></a></li>
<li class="page-item active"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber?>"><?php echo $currentPageNumber; ?></a></li>

<?php
break;

case '3':
?> <li class="page-item"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber-2?>"><?php echo $currentPageNumber-2; ?></a></li>
<li class="page-item"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber-1?>"><?php echo $currentPageNumber-1; ?></a></li>
<li class="page-item active"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber?>"><?php echo $currentPageNumber; ?></a></li>


<?php
break;

case '4':
?> <li class="page-item"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber-3?>"><?php echo $currentPageNumber-3; ?></a></li>
<li class="page-item"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber-2?>"><?php echo $currentPageNumber-2; ?></a></li>
<li class="page-item"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber-1?>"><?php echo $currentPageNumber-1; ?></a></li>
<li class="page-item active"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber?>"><?php echo $currentPageNumber; ?></a></li>

<?php
break;

default:
if ($currentPageNumber >=1 && $currentPageNumber <= $numberOfPages-$paginationNumbersToShow  ){
switch ($currentPageNumber) {
case '1':
?>
<li class="page-item active"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber?>"><?php echo $currentPageNumber; ?></a></li>
<li class="page-item"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber+1?>"><?php echo $currentPageNumber+1; ?></a></li>
<li class="page-item"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber+2?>"><?php echo $currentPageNumber+2; ?></a></li>
<li class="page-item"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber+3?>"><?php echo $currentPageNumber+3; ?></a></li>
<?php
  break;

  case '2':
  ?>
  <li class="page-item"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber-1?>"><?php echo $currentPageNumber-1; ?></a></li>
  <li class="page-item active"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber?>"><?php echo $currentPageNumber; ?></a></li>
  <li class="page-item"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber+1?>"><?php echo $currentPageNumber+1; ?></a></li>
  <li class="page-item"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber+2?>"><?php echo $currentPageNumber+2; ?></a></li>
<?php
    break;
    case '3':
    ?>
    <li class="page-item"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber-2?>"><?php echo $currentPageNumber-2; ?></a></li>
    <li class="page-item"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber-1?>"><?php echo $currentPageNumber-1; ?></a></li>
    <li class="page-item active"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber?>"><?php echo $currentPageNumber; ?></a></li>
    <li class="page-item"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber+1?>"><?php echo $currentPageNumber+1; ?></a></li>
    <?php
      break;

      case '4':
      ?>
      <li class="page-item"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber-3?>"><?php echo $currentPageNumber-3; ?></a></li>
      <li class="page-item"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber-1?>"><?php echo $currentPageNumber-2; ?></a></li>
      <li class="page-item"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber-1?>"><?php echo $currentPageNumber-1; ?></a></li>
      <li class="page-item active"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber?>"><?php echo $currentPageNumber; ?></a></li>
      <?php
        break;

default:
  ?> <li class="page-item active"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber?>"><?php echo $currentPageNumber; ?></a></li>
  <li class="page-item"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber+1?>"><?php echo $currentPageNumber+1; ?></a></li>
  <li class="page-item"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber+2?>"><?php echo $currentPageNumber+2; ?></a></li>
  <li class="page-item"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber+3?>"><?php echo $currentPageNumber+3; ?></a></li> <?php
  break;
}
?>


<?php } elseif ($currentPageNumber >= $paginationNumbersToShow && $currentPageNumber > $numberOfPages-$paginationNumbersToShow){
switch ($currentPageNumber) {
case ($numberOfPages):
  ?> <li class="page-item"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber-3?>"><?php echo $currentPageNumber-3; ?></a></li>
  <li class="page-item"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber-2?>"><?php echo $currentPageNumber-2; ?></a></li>
  <li class="page-item"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber-1?>"><?php echo $currentPageNumber-1; ?></a></li>
  <li class="page-item active"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber?>"><?php echo $currentPageNumber; ?></a></li>
  <?php
  break;

  case ($numberOfPages-1):
   ?> <li class="page-item"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber-2?>"><?php echo $currentPageNumber-2; ?></a></li>
   <li class="page-item"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber-1?>"><?php echo $currentPageNumber-1; ?></a></li>
   <li class="page-item active"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber?>"><?php echo $currentPageNumber; ?></a></li>
   <li class="page-item"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber+1?>"><?php echo $currentPageNumber+1; ?></a></li>
  <?php
    break;

    case ($numberOfPages-2):
    ?> <li class="page-item"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber-1?>"><?php echo $currentPageNumber-1; ?></a></li>
    <li class="page-item active"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber?>"><?php echo $currentPageNumber; ?></a></li>
    <li class="page-item"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber+1?>"><?php echo $currentPageNumber+1; ?></a></li>
    <li class="page-item"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber+2?>"><?php echo $currentPageNumber+2; ?></a></li>
    <?php
      break;

      case ($numberOfPages-3):
      ?> <li class="page-item active"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber?>"><?php echo $currentPageNumber; ?></a></li>
      <li class="page-item"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber+1?>"><?php echo $currentPageNumber+1; ?></a></li>
      <li class="page-item"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber+2?>"><?php echo $currentPageNumber+2; ?></a></li>
      <li class="page-item"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber+3?>"><?php echo $currentPageNumber+3; ?></a></li>
        <?php
        break;

default:
?> <li class="page-item"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber-1?>"><?php echo $currentPageNumber-1; ?></a></li>
<li class="page-item active"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber?>"><?php echo $currentPageNumber; ?></a></li>
<li class="page-item"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber+1?>"><?php echo $currentPageNumber+1; ?></a></li>
<li class="page-item"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber+2?>"><?php echo $currentPageNumber+2; ?></a></li>
<?php
  break;
}


}
else {
?> <li class="page-item active"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber?>"><?php echo $currentPageNumber; ?></a></li>
<li class="page-item"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber+1?>"><?php echo $currentPageNumber+1; ?></a></li>
<li class="page-item"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber+2?>"><?php echo $currentPageNumber+2; ?></a></li>
<li class="page-item"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber+3?>"><?php echo $currentPageNumber+3; ?></a></li>
<?php
}
?>

<?php if ($currentPageNumber >= $numberOfPages){ ?>
<li class="page-item disabled"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber+1?>">Next</a></li>
<?php } else {  ?>
<li class="page-item"><a class="page-link" href="https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=<?php echo $currentPageNumber+1?>">Next</a></li>
<?php } ?>
</ul>
</nav>
<?php
break;
}  ?>
