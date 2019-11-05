<?php
session_start();
include("database.php");
$id=$_GET['id'];
$res_qual=mysql_query("select * from answer where id='$id'");
$row_qual=mysql_fetch_assoc($res_qual);
$q_no=$row_qual['question_no'];
$winner=$row_qual['submitter_name'];
$postDate=date('d/m/Y');
$user=$_SESSION['username123'];

$insert = 'INSERT INTO winner(question_no,winner,date,user)
        VALUES("'.$q_no.'","'.$winner.'","'.$postDate.'","'.$user.'")';
$insert1=mysql_query($insert);
echo "<script>javascript:window.location = 'list.php'</script>";
?>