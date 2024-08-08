<?php 
require_once("include/initialize.php");  
if (!isset($_SESSION['StudentID'])) {
  # code...
  redirect('login.php');
}
$content='student/home.php';
$view = (isset($_GET['q']) && $_GET['q'] != '') ? $_GET['q'] : '';
switch ($view) { 
  case 'lesson':
    $title = "Lesson";
    $content = 'student/lesson.php';
   # code...
   break; 
  case 'exercises':
    $title = "Exercises";
    $content = 'student/exercises.php';
   # code...
   break; 
  case 'download':
    $title = "Download";
    $content = 'student/download.php';
   # code...
   break; 
  case 'about':
    $title = "About Us";
    $content = 'student/about.php';
   # code...
   break; 
  case 'playvideo':
    $title = "Play Video";
    $content = 'student/playvideo.php';
   # code...
   break; 
  case 'viewpdf':
    $title = "Play Video";
    $content = 'student/viewpdf.php';
   # code...
   break; 
  case 'question':
    $title = "Question";
    $content = 'student/question.php';
   # code...
   break; 
  case 'quizresult':
    $title = "Result";
    $content = 'student/quizresult.php';
   # code...
   break; 
  default :
    $title = "Home";
    $content    = 'student/home.php';
}
require_once("navigation/navigations.php");
