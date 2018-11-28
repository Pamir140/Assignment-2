<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
$name=$_POST['name'];
$length=$_POST['length'];
$size=$_POST['size'];
$comment=$_POST['comment'];
$logo = null;
$ok=true;
if (empty($name)){
    echo("name is required.<br />");
    $ok=false;
}
if (empty($length)){
    echo("length is required.<br />");
$ok=false;
}
if (empty($size)){
    echo("size is required.<br />");
    $ok=false;
}
if (empty($comment)){
    echo("comment is required");
    $ok=false;
}

if (isset($_FILES['logo'])) {
    $logoFile = $_FILES['logo'];
    if ($logoFile['size'] > 0) {
        // generate unique file name
        $logo = session_id() . "-" . $logoFile['name'];
        // check file type
        $fileType = null;
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $fileType = finfo_file($finfo, $logoFile['tmp_name']);
        // allow only jpeg & png
        if (($fileType != "image/jpeg") && ($fileType != "image/png")) {
            echo 'Please upload a valid logo<br />';
            $ok = false;
        }
        else {
            // save the file
            move_uploaded_file($logoFile['tmp_name'], "img/{$logo}");
        }
    }
}

if ($ok) {
    $db = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200388184', 'gc200388184', 'NKn2VFm6kw');
if (empty($jacketId)) {
    $sql = "INSERT INTO jacket(name,length,size,comment,logo)VALUES(:name,:length,:size,:comment,:logo)";}
    else {
        $sql = "UPDATE jacket SET name=:name, length = :length, size = :size,
                        comment = :comment, logo = :logo WHERE jacketId = :jacketId";
    }

    $cmd = $db->prepare($sql);
    $cmd->bindParam(':name', $name, PDO::PARAM_STR, 50);
    $cmd->bindParam(':length', $length, PDO::PARAM_STR, 50);
    $cmd->bindParam(':size', $size, PDO::PARAM_STR, 50);
    $cmd->bindParam(':comment', $comment, PDO::PARAM_STR, 50);
    $cmd->bindParam(':logo', $logo, PDO::PARAM_STR, 50);
    $cmd->execute();
    if (!empty($jacketId)) {
        $cmd->bindParam(':jacketId', $jacketId, PDO::PARAM_INT);
    }
    $db = null;
    echo 'saved';
    header('location:TESTJACK.php');
}
?>

</body>
</html>