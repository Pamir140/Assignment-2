<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
$catagory=$_POST['catagory'];


$db=new PDO('mysql:host=aws.computerstudi.es;dbname=gc200388184','gc200388184','NKn2VFm6kw');
$sql="INSERT INTO jack(catagory)VALUES(:catagory)";
$cmd=$db->prepare($sql);
$cmd->bindParam(':catagory',$catagory,PDO::PARAM_STR,50);
$cmd->execute();
$db=null;
echo'saved';
?>

</body>
</html>