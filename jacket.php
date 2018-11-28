<?php
$title = "Details";

$name = null;
$length = null;
$size = null;
$action = null;
$comment=null;
$logo = null;

// the id will PASS FROM FETCH THE ID
if (!empty($_GET['jacketId'])) {
$jacketId = $_GET['jacketId'];
// connect
    $db=new PDO('mysql:host=aws.computerstudi.es;dbname=gc200388184','gc200388184','NKn2VFm6kw');

// set up and execute query
$sql = "SELECT * FROM jacket WHERE jacketId = :jacketId";
$cmd = $db->prepare($sql);
$cmd->bindParam(':jacketId', $jacketId, PDO::PARAM_INT);
$cmd->execute();
$r = $cmd->fetch();
// store each column value in a variable
$name = $r['name'];
$length = $r['length'];
$size = $r['size'];

$comment=$r['comment'];
// disconnect
$db = null;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <a href="TESTJACK.php">details</a>
</head>

<body>
<form action="jacketsave.php"method="post">

    <fieldset>
        <label for="name">name:</label>
        <input name="name"id="name" value="<?php echo $name; ?>"/>
    </fieldset>
    <fieldset>
        <label for="length">length:</label>
        <input name="length"id="length" value="<?php echo $length; ?>"/>
    </fieldset>
    <fieldset>
        <label for="size">size:</label>
        <input name="size"id="size" required value="<?php echo $size; ?>"/>
    </fieldset>
    <fieldset>
        <label for="comment">comment:</label>
        <select name="comment" id="comment">
            <?php
            $db=new PDO('mysql:host=aws.computerstudi.es;dbname=gc200388184','gc200388184','NKn2VFm6kw');
            $sql="SELECT catagory FROM jack";
            $cmd=$db->prepare($sql);
            $cmd->execute();
            $jack=$cmd->fetchAll();

            foreach ($jack as $j){
                echo"<option>{$j['catagory']}</option>";
            }
            $db=null;
            ?>
        </select>
    </fieldset>
    <fieldset>
        <label for="logo" class="col-md-1">Logo:</label>
        <input type="file" name="logo" id="logo" />
    </fieldset>
    <div class="col-md-offset-1">
<!--        from here it will select from img src -->
        <?php
        if (isset($logo)) {
            echo "<img src=\"img/$logo\" alt=\"Logo\" />";
        }
        ?>
    </div>
    <button>
        save
    </button>
</form>
</body>
</html>