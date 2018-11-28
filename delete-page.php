<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
$jacketId=$_GET['jacketId'];

$db=new PDO('mysql:host=aws.computerstudi.es;dbname=gc200388184','gc200388184','NKn2VFm6kw');
$sql="DELETE FROM jacket WHERE jacketId=:jacketId";
$cmd=$db->prepare($sql);
$cmd->bindParam(':jacketId',$jacketId,PDO::PARAM_INT);
$cmd->execute();

$db=null;
header('location:TESTJACK.php');

?>
</body>
</html>