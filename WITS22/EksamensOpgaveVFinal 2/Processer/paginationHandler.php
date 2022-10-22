<?php
$currentPageNumber = $_GET['currentPage']; // Henter "currentPage" fra URL, bruges til at vise hvilken side man er på

$postsPerPage = 10; // Antallet af blogindlæg, som skal vises pr. side
$numberOfPosts = count($allPosts); //Antal posts i alt, her bruges php count funktion som tæller antallet af elementer i array
$numberOfPages = ceil($numberOfPosts / $postsPerPage); //Antal sider der er i alt. Her bruges php ceil funktionen, til at runde op til nærmeste heltal
$paginationNumbersToShow = 4; //Antallet af af sider, som man ønsker skal vises i pagination bar. Variabel bruges til at sikre, at der ikke vises flere pagination sider end der er.
$firstPostOnPage = ($currentPageNumber - 1) * $postsPerPage; //Denne funktion bruges til at angive hvilket posts, som er det første på hver side.
if (!isset($_GET['currentPage']) || (empty($_GET['currentPage'])) || $_GET['currentPage'] <=0 || $_GET['currentPage'] > $numberOfPages ){ //Hvis "currentPage" er tom, ikke er sat, er mindre/større end længden af numberOfPages, så vis forsiden
  header ('location: https://wits.ruc.dk/~jpn/EksamensOpgaveV1/HomePage.php?currentPage=1');
}
$allPosts = array_reverse($allPosts); /*Her bruger vi PHP funktion "array_reverse", til at gøre arrayet over blogindlæg omvendt. Derfor vises de nyeste indlæg hermed først*/
$allPosts = array_slice($allPosts, $firstPostOnPage, $postsPerPage); /*Her bruge vi php funktionen array_slice, som returnerer dele af et array.
                                                                      array_slice modtager her et array (allPosts), startværdi (første post på hver side), samt lenghtværdi som er længden af array som skal returneres (antallet af posts pr side) */
?>
