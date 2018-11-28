<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
</head>
<body>
<?php
$db=new PDO('mysql:host=aws.computerstudi.es;dbname=gc200388184','gc200388184','NKn2VFm6kw');
$sql="SELECT * FROM jacket";
$cmd=$db->prepare($sql);
$cmd->execute();
$jacket=$cmd->fetchAll();
echo'<table border="2"><thead><th>name</th><th>length</th><th>size</th></thead>';
foreach ($jacket as $j){
echo "<tr><td>".$j['name']."</td><td>".$j['length']."</td><td>".$j['size']."</td></tr>";
}
echo'</table>';
$db=null;
?>
</body>
</html>