<?php 
 
include_once './../db_conn.php';

  if (isset($_POST['title'])) {
    // require '../db_conn.php';
    $title =$_POST['title'];
    echo $title;
 
   if (empty($_POST['title'])) {
      header('Location: ./../index.php?message=error');
   }else{
      $stm = $conn->prepare("INSERT INTO todos(title) VALUE(?) ");
      $res = $stm->execute([$title]); 
   }
   if ($res) {
      header('Location: ./../index.php?message=success');
    } else {
      header('Location: ./../index.php');
   }
   
  }else{
    header('Location: ./../index.php?message=error');
  }
