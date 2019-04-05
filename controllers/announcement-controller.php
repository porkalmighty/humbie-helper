<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once MODELS . '/announcement_db.php';
require_once MODELS . '/Project.php';

$db = Database::getDatabase();
$a = new Announcement();
$p = new Project();
$myannounce = $a->getAllAnnouncements(Database::getDatabase());
$annoucebyid = $a->getAnnouncementById(filter_input(INPUT_GET, 'id'), Database::getDatabase());
$projects = $p->listProjects($_SESSION['studentId'], $db);

$id = filter_input(INPUT_GET, 'id');
$student_id = filter_input(INPUT_POST, 'student_id');
$project_id = filter_input(INPUT_POST, 'project_id');
$annoucement = filter_input(INPUT_POST, 'announcement');
$annoucement_time = date("d/m/Y");



//Adding New Annoucement
if (isset($_POST['annouce'])) {
    $c = $a->addAnnouncement($announcement_time, $announcement, $student_id, $project_id, $db);
    if($c){
        header('Location:' . RVIEWS . '/quotes/list-quotes.php');
    } else {
        echo "There was a problem adding quote.";
    }
}
//Udate Existing Annoucemenmt
if (isset($_POST['updatequote'])) {
    $c = $a->editAnnouncement($id, $quote_author, $quote, $db);
    if($c){
        header('Location: list-quotes.php');
    } else {
        echo "There was a problem updating quote.";
  }
}
//Deleting Annoucement
if (isset($_POST['deletequote'])) {
    $c = $a->deleteAnnouncement($id, $db);
    if($c){
        header('Location: list-announcements.php');
    } else {
        echo "There was a problem deleting quote.";
    }
}