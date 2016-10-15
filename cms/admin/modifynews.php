<?php
session_start();
if($_SESSION['username']=='' || $_SESSION['password']==''){
	header('Location:login.html');
}
$id=$_GET['id'];
$title=$_GET['title'];
$pdo=new PDO('mysql:host=localhost;dbname=cms','root','');
$sql='UPDATE news SET subject=? WHERE id=?';
$stmt=$pdo->prepare($sql);
$stmt->execute(array($title,$id));