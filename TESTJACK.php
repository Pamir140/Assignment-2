
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <a href="jacket.php">add details</a>
</head>
<body>
<?php
try {
    //db connction
$db=new PDO('mysql:host=aws.computerstudi.es;dbname=gc200388184','gc200388184','NKn2VFm6kw');
$sql="SELECT * FROM jacket";
$cmd=$db->prepare($sql);
$cmd->execute();
$jacket=$cmd->fetchAll();

echo'<table border="1"><thead><th>name</th><th>length</th><th>size</th><th>comment</th><th>action</th></thead>';
foreach ($jacket as $j) {
    if (isset($r['logo'])) {
        echo "<td><img src=\"img/{$r['logo']}\" alt=\"Logo\" height=\"50px\" /></td>";
    }
    echo '<tr><td>'.$j['name'].'</td><td>'.$j['length'].'</td><td>'.$j['size'].
        '</td><td>'.$j['comment'];
    echo "<td><a href=\"jacket.php?jacketId={$j['jacketId']}\">Edit</a> | 
                <a href=\"delete-page.php?jacketId={$j['jacketId']}\" 
                class=\"text-danger confirmation\">Delete</a></td>";

}
echo'</table>';
$db=null;
}
//declar the exception for error in web site
catch (Exception $e) {
    // send
    mail('Pamirban@gmail.com', 'Error', $e);
    // show generic error page
    header('location:error.php');
}
?>
<script src="jquery-3.3.1.min.js"></script>
<script src="js/scripts.js"></script>

</body>
</html>